<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::getAllOrderByUpdated_at();
        return response()->view('partner.index',compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('partner.create');
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
        $partner = new Partner();
        //title_contentの
        $partner -> title_partner = request() -> title_partner;
        //description_partnerの
        $partner -> description_partner = request() -> description_partner;
        //nameの
        $partner -> name = request() -> name;
        
        //image_partnerの
        if(request('image_partner')){
                $original = request() -> file("image_partner") -> getClientoriginalName();
                $name = date("Ymd_His")."_".$original; 
                request() -> file("image_partner") -> move("storage/partners", $name);
        $partner -> image_partner =  $name;
            }   
        
        //tweet/description/image/audioをまとめて保存する
        $partner -> save();  
            
        //バリデーション
        $validator = Validator::make($request->all(), 
            [
                'title_partner' => 'required | max:191',
                'description_description' => 'required' ,
                'name' => 'required' ,
                'image_partner' => 'required',
            ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
              ->route('partner.index')
              ->withInput()
              ->withErrors($validator);
            }
          

        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Partner::create($request->all());
        // ルーティング「partner.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route("partner.index", $partner);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
