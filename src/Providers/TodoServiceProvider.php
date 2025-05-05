<?php

namespace Sait\Todo\Providers;

use Illuminate\Support\ServiceProvider;

class TodoServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
       // Add DIRECTORY_SEPARATOR between __DIR__ and the path
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');          // ← Add slash here
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations'); // ← And here
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'todo');  // ← And here
    }
}