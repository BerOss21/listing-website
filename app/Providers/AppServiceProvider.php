<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Services\Exchangerate\Exchangerate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Exchangerate::class,function(){
            $token=Config::get('services.exchangerate.token');

            return new Exchangerate($token);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        Paginator::useBootstrap();

        Config::set('settings',Cache::remember('settings',60*60*60*24, function () {
            return Setting::pluck('value','key')->toArray();
        }));

        Config::set('app.timezone',Config::get('settings.site_default_timezone'));

        // dd(config('app.timezone'));
    }
}
