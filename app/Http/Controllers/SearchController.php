<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\User;
use App\Models\Admin;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $prefecture = $request->input('prefecture');

        if (empty($keyword) && empty($prefecture)) {
            // エラーメッセージを表示する
            return redirect()->back()->with('error', 'キーワードまたは都道府県を入力してください。');
        }

        $contents = Content::query();

        if (!empty($keyword)) {
            $users  = User::where('name', 'like', "%{$keyword}%")->pluck('id')->all();
            $admins = Admin::where('prefecture', 'like', "%{$keyword}%")->pluck('id')->all();
            $contents = $contents->where('title_content', 'like', "%{$keyword}%")
                ->orWhereIn('user_id', $users);
        }

        if (!empty($prefecture)) {
            $admins = Admin::where('prefecture', $prefecture)->pluck('id')->all();
            $contents = $contents->whereIn('admin_id', $admins);
        }

        $contents = $contents->get();
        return response()->view('content.index', compact('contents'));
    }
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('search.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
