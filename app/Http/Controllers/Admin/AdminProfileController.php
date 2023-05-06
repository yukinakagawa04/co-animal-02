<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //編集画面を返す
        // 編集対象の管理者情報を取得
        $admin = Admin::findOrFail($id);
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        //編集対象の管理者情報を取得
        $admin = Admin::findOrFail($id);
    
        // プロフィール情報を更新
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
    
        return redirect()->route('admin.dashboard')->with('status', 'プロフィールを更新しました。');
    }

    public function destroy($id)
    {
        //
    }
}
