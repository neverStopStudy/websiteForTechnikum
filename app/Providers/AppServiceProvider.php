<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;

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
        Schema::defaultStringLength(191);

        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->hasRole('admin');
        });
        Blade::if('teacher', function () {
            return auth()->check() && auth()->user()->hasRole('teacher');
        });
        Blade::if('student', function () {
            return auth()->check() && auth()->user()->hasRole('student');
        });
        Blade::directive('linkactive', function ($route) {
            return "<?php echo Request::is($route) ? 'active' : null; ?>";
        });
    }
}
