<?php
/**
 * Created by PhpStorm.
 * User: macrosys
 * Date: 8/22/2015
 * Time: 8:33 PM
 */

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MavrickInterfaceBindingProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**********************************Repositories Layer ******************************************************************/
        $this->app->bind('App\Contracts\Repositories\PropertyRepositoryInterface', 'App\Repositories\PropertyRepository');

        /**********************************Service Layer ******************************************************************/
        $this->app->bind('App\Contracts\Services\PropertyServiceInterface', 'App\Services\PropertyService');

    }

}