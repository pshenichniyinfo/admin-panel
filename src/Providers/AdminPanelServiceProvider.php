<?php
namespace Pshenichniyinfo\AdminPanel\Providers;

use Illuminate\Support\ServiceProvider;
use Pshenichniyinfo\AdminPanel\commands\InstallCommand;
use Pshenichniyinfo\AdminPanel\View\Components\Menu;
use Spatie\Permission\PermissionServiceProvider;
use Illuminate\Support\Facades\Blade;

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

        $this->loadViewComponentsAs('admin-panel', [
            Menu::class,
        ]);

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
            __DIR__.'/../config/admin-panel.php' => config_path('admin-panel.php'),
        ]);

        Blade::componentNamespace('Pshenichniyinfo\\AdminPanel\\View\\Components', 'admin-panel');

//        Blade::component('menu', Menu::class);
    }
}
