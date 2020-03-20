<?php

namespace App\Providers;
use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;
use Modules\Referral\Entities\Referral;

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
    public function boot()
    {
        Request::macro('referral', function($token) {
          $referral = Referral::whereToken($token)
                    ->whereNotCompleted()
                    ->whereNotFromUser(request()->user())
                    ->first();
        });
    }
}
