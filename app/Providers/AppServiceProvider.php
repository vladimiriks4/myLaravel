<?php

namespace App\Providers;

use App\Models\Article;
use App\Services\TagsSynchronizer;
use App\Services\TagsView;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
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
            return new TagsView();
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

        Blade::aliasComponent('components.alert', 'alert');

        Blade::directive('datetime', function($value) {
            return "<?php echo ($value)->toFormattedDateString() ?>";
        });

        Blade::if('admin', function () {
            if (Auth::user()) {
                return Auth::user()->role->name == 'adm';
            }
            return false;
        });

        Blade::if('owner', function (Article $article) {
            if (Auth::user()) {
                return $article->owner_id == Auth::user()->id;
            }
            return false;
        });
    }
}
