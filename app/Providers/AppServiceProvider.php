<?php

namespace App\Providers;

use App\Models\About;
use App\Models\BlogCategory;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(!$this->app->isProduction());

        Gate::define('team-members', [UserPolicy::class, 'teamMembers']);
        Gate::define('blogs', [UserPolicy::class, 'blogs']);
        Gate::define('users', [UserPolicy::class, 'users']);
        Gate::define('testimonials', [UserPolicy::class, 'testimonials']);
        Gate::define('contacts', [UserPolicy::class, 'contacts']);
        Gate::define('banners', [UserPolicy::class, 'banners']);
        Gate::define('about', [UserPolicy::class, 'about']);
        Gate::define('gallery', [UserPolicy::class, 'gallery']);

        View::composer('client.app.footer', function ($view) {
            $categories = BlogCategory::get();
            $view->with('categories', $categories);
        });

        if (Schema::hasTable('abouts')) {
            $about = About::select('phone_number', 'email')->first();
            View::share('about', $about);
        }
    }

}
