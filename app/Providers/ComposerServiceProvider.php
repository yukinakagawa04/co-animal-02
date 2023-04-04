<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function register()
    {
        //　自前で作ったCategoryComposerをシングルトンに登録する
        $this->app->singleton(\App\Http\View\Composers\CategoryComposer::class);
    }
    

    public function boot()
    {
        View::composer(
            '*', 'App\Http\View\Composers\CategoryComposer'
         );
    }
}