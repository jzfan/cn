<?php

namespace Cn;

use Illuminate\Support\ServiceProvider;

class CnProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
                require 'routes.php';
            }
        \Carbon\Carbon::setlocale('zh');
        $this->app->singleton(\Faker\Generator::class, function () {
            return \Faker\Factory::create('zh_CN');
        });
        \Validator::extend('phone', function($attribute, $value, $parameters, $validator) {
                              return preg_match('/^1[34578][0-9]{9}$/', $value);
                          });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(
        //         __DIR__.'/config.php', 'app'
        //     );

    }
}
