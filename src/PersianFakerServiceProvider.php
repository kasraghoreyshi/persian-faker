<?php

namespace Kasraghoreyshi\PersianFaker;

use Faker\Generator;
use Illuminate\Support\ServiceProvider;
use Kasraghoreyshi\PersianFaker\classes\PersianFakerClass;

class PersianFakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function($app) {

            $faker = \Faker\Factory::create();

            $faker->addProvider((new PersianFakerClass($faker)));
            
            return $faker;
            
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
