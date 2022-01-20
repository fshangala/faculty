<?php
namespace Fshangala\Faculty;
use Illuminate\Support\ServiceProvider;

class FacultyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
    }
}