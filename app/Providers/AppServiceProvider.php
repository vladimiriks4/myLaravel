<?php

namespace App\Providers;

use App\Services\TagsSynchronizer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagsSynchronizer::class, function(){
            return new TagsSynchronizer();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.sidebar', function($view){
            $view->with('tagsCloud', \App\Models\Tag::tagsCloud());
        });
    }
}
