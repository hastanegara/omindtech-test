<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OmindServiceProvider extends ServiceProvider
{
    protected $repositories = ['Client', 'Project'];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        array_walk($this->repositories, function($repository) {
            $this->app->bind('App\Repositories\Contracts\\' . $repository . 'Interface', 'App\Repositories\Eloquent\\' . $repository . 'Repository');
        });
    }
}
