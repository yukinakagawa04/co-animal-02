<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Tweet;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tweets = Tweet::getAllOrderByUpdated_at();
        return response()->view('tweet.index',compact('tweets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return response()->view('tweet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    //送る内容を再度定義する
        $tweet = new Tweet();
        //tweetの
        $tweet -> tweet = request() -> tweet;
        //descriptionの
        $tweet -> description = request() -> description;
        //imageの
        if(request('image')){
                $original = request() -> file("image") -> getClientoriginalName();
                $name = date("Ymd_His")."_".$original; 
                request() -> file("image") -> move("storage/images", $name);
                $tweet -> image = $name;
            }   
        //audioの
        if(request('audio')){
                $original = request() -> file("audio") -> getClientoriginalName();
                $name = date("Ymd_His")."_".$original; 
                request() -> file("audio") -> move("storage/audios", $name);
                $tweet -> audio = $name;
            }   
        //tweet/description/image/audioをまとめて保存する
        $tweet -> save();  
            
        //バリデーション
        $validator = Validator::make($request->all(), 
            [
                'tweet' => 'required | max:191',
                'description' => 'required' ,
                'image' => 'required',
            ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
              ->route('tweet.index')
              ->withInput()
              ->withErrors($validator);
            }
          

        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Tweet::create($request->all());
        // ルーティング「tweet.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route("tweet.index", $tweet);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tweet $tweet)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
