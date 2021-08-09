<?php

namespace App\Providers;

use App\Models\Tag;
use App\Services\TagsSynchronizer;
use App\Services\TagsView;
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

        $this->app->singleton(TagsView::class, function(){
            return new TagsView(new Tag);
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
            $view->with('tagsCloud', app(TagsView::class)->tagsCloud());
        });
    }
}
