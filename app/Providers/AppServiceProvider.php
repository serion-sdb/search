<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Search\SearchBuilder;
use App\Member;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('instant-search', function($app){
            return new SearchBuilder(Member::query(), $app->request);
        });        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
