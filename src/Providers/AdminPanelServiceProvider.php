<?php
namespace Pshenichniyinfo\AdminPanel\Providers;

use Illuminate\Support\ServiceProvider;
use Pshenichniyinfo\AdminPanel\commands\InstallCommand;
use Spatie\Permission\PermissionServiceProvider;

class AdminPanelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->register(PermissionServiceProvider::class);

        $this->loadRoutesFrom(__DIR__ . "/../routes/admin.php");
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-panel');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations', 'admin-panel');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin-panel');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../public' => public_path('admin-panel'),
        ], 'public');

        $this->publishes([
            __DIR__.'/../routes/admin-panel-route.php' => app()->basePath() . '/routes/admin-panel-route.php'
        ], 'admin-panel-route');

        $this->publishes([
            __DIR__.'/../routes/admin-panel-route.php' => app()->basePath() . '/routes/admin-panel-route.php'
        ], 'admin-panel-route');
    }
}
