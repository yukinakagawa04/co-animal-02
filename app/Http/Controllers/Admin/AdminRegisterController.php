<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str; //remember_tokenに必要

class AdminRegisterController extends Controller
{
    // 登録画面呼び出し
    public function create(): View
    {
        return view('admin.auth.register');
    }

    // 登録実行
    public function store(Request $request): RedirectResponse
    {
        $adminData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => null,
            'password' => Hash::make($request->input('password')),
            'remember_token' => null,
            'image' => $request->input('image'),
            'prefecture' => $request->input('prefecture'),
            'description' => $request->input('description'),
        ];
        
        $admin = Admin::create($adminData);
        
        // email_verified_atを更新する
        $admin->email_verified_at = date("Y-m-d H:i:s");
        $admin->remember_token = Str::random(10); // ランダムな文字列を生成する
        $admin->save();
        
        event(new Registered($admin));
        Auth::guard('admin')->login($admin);
        return redirect()->route("admin.login");

    }
}
