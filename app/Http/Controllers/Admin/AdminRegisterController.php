<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


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
        
        
        try {
            $request->validate([
                'name' => 'required | max:191',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Admin::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'perfecture' => ['required', 'in:北海道,青森県,岩手県,宮城県,秋田県,山形県,福島県,茨城県,栃木県,群馬県,埼玉県,千葉県,東京都,神奈川県,新潟県,富山県,石川県,福井県,山梨県,長野県,岐阜県,静岡県,愛知県,三重県,滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県,鳥取県,島根県,岡山県,広島県,山口県,徳島県,香川県,愛媛県,高知県,福岡県,佐賀県,長崎県,熊本県,大分県,宮崎県,鹿児島県,沖縄県'],
                'image' => 'required',
                'description' => 'required',
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        }
       
        
        if(request('image')){
            $original=request()->file("image")->getClientOriginalName();
            $name=date("Ymd_His")."_".$original;
            request()->file("image")->move("storage/images/",$name);
            $imagePath = 'storage/images/' . $name;
        }
        
        
        $admin = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => null,
            'password' => Hash::make($request->input('password')),
            'remember_token' => null,
            'perfecture' => $request->input('perfecture'),
            'image' => isset($imagePath) ? $imagePath : '',
            'description' => $request->input('description'),
        ]);

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect('/admin/dashboard');
        
        
        
    }
}
