<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use Laravel\Dusk\DuskServiceProvider;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
if ($this->app->environment('local', 'testing')) {
    $this->app->register(DuskServiceProvider::class);
}
    }

    /**
     * Bootstrap any application services.
     */
   public function boot()
{
    View::composer('*', function ($view) {
        $categoriespro = Category::all(); // অথবা আপনার প্রয়োজন অনুযায়ী ডেটা ফেচ করুন
        $view->with('categoriespro', $categoriespro);
    });
}
}
