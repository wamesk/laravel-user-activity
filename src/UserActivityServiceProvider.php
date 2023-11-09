<?php

namespace Wamesk\LaravelUserActivity;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class UserActivityServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(): void
    {
        $this->offerPublishing();
    }

    public function offerPublishing(): void
    {
        if (! function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            return;
        }

        $this->publishes([
            __DIR__.'/../config/laravel-user-activity.php.php' => config_path('laravel-user-activity.php.php'),
        ], 'laravel-user-activity-config');

        $this->publishes([
            __DIR__.'/../database/migrations/create_user_activities_tables.php.stub' => $this->getMigrationFileName('create_user_activities_tables.php'),
        ], 'laravel-user-activity-migrations');
    }

    protected function getMigrationFileName($migrationFileName): string
    {
        $timestamp = date('Y_m_d_His');

        $filesystem = $this->app->make(Filesystem::class);

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(function ($path) use ($filesystem, $migrationFileName) {
                return $filesystem->glob($path.'*_'.$migrationFileName);
            })
            ->push($this->app->databasePath()."/migrations/{$timestamp}_{$migrationFileName}")
            ->first();
    }
}
