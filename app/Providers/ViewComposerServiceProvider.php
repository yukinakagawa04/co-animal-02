<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // ここに追加
        View::composers([
        \App\Http\ViewComposers\UserComposer::class => '*', // 全てのviewに共通データを返す
        \App\Http\ViewComposers\UserComposer::class => 'dashboard', // resources\views\user\index.blade.phpに返したい場合の例
       ]);
    }
}
