<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    
    public function boot(UrlGenerator $url)
    {
        $url->forceScheme('https');
        

        // 管理者に許可
        Gate::define('admin-higher', function ($user) {
            return ($user->role >= 1 && $user->role <= 10);
        });
        
        // 飼育員に許可
        Gate::define('business-higher', function ($user) {
            return ($user->role > 10 && $user->role <= 20);
        });
        
        // 一般ユーザーに許可
        Gate::define('user-higher', function ($user) {
            return ($user->role > 20 && $user->role <= 100);
        });
    }

}
