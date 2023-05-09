<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Content;
use Auth;
use App\Models\User;



class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 一般ユーザーが投稿したコンテンツを取得
    $contents = Content::getAllOrderByUpdated_at();

    // 管理者としてログインしている場合、管理者が投稿したコンテンツも取得
    if (Auth::guard('admin')->check()) {
        $adminContents = Auth::guard('admin')->user()->contents()->orderBy('updated_at', 'desc')->get();
        $contents = $contents->merge($adminContents);
    }

    return response()->view('content.index', compact('contents'));
    }
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //送る内容を再度定義する
        $content = new Content();
                //idの
                $content->admin_id = Auth::guard('admin')->user()->id;

                //title_contentの
                $content -> title_content = request() -> title_content;
                //image_contentの
                if(request('image_content')){
                        $original = request() -> file("image_content") -> getClientoriginalName();
                        $name = date("Ymd_His")."_".$original; 
                        request() -> file("image_content") -> move("storage/contents/images", $name);
                $content -> image_content =  $name;
                    }   
                //audioの
                if(request('audio')){
                        $original = request() -> file("audio") -> getClientoriginalName();
                        $name = date("Ymd_His")."_".$original; 
                        request() -> file("audio") -> move("storage/contents/audios", $name);
                $content -> audio =  $name;
                    }   
        //tweet/description/image/audioをまとめて保存する
        $content -> save();  
            
        //バリデーション
        $validator = Validator::make($request->all(), 
            [
                'title_content' => 'required | max:191',
                'image_content' => 'required',
                'audio' => 'required',
            ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
              ->route('content.index')
              ->withInput()
              ->withErrors($validator);
            }
          
        // フォームから送信されてきたデータとユーザIDをマージし，DBにinsertする
        $data = $request->merge(['admin_id' => Auth::user()->id])->all();
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Content::create($data);
        // ルーティング「partner.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route("content.index", "dashboard", "admin.dashboard");
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::find($id);
        
        return response()->view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // マイデータのところ
    public function mydata()
    {
        // Userモデルに定義したリレーションを使用してデータを取得する．
        $contents = User::query()
         ->find(Auth::guard('admin')->user() ? Auth::guard('admin')->user()->id : Auth::user()->id)
          ->contents()
          ->orderBy('created_at','desc')
          ->get();
          
        // 管理者の場合
        if (Auth::guard('admin')->check()) {
            $adminContents = Auth::guard('admin')->user()->contents()->orderBy('created_at', 'desc')->get();
            $contents = $contents->merge($adminContents);
        }
          
        return response()->view('content.index', compact('contents'));
    }
    
    

}
