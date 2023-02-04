<?php

namespace App\Providers;

use App\Models\Contacts;
use App\Models\Doctors;
use App\Models\Services;
use App\Models\Slider;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('site.includes*', function ($view) {
            $site = Contacts::get()->last();
            $slider = Slider::get();
            $services = Services::get();
            $doctors = Doctors::with('service')->get();
            $view->with([   'site'=> $site,
                            'services'=> $services,
                            'doctors' => $doctors,
                            'slider'=> $slider]);
        });

        view()->composer('admin.includes.navbar',function($view){

            $images = Contacts::select('logo','profile')->get();
            $view->with('images', $images);
        });
    }
}
