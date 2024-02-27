<?php
namespace Pshenichniyinfo\AdminPanel\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Pshenichniyinfo\AdminPanel\commands\InstallCommand;
use Pshenichniyinfo\AdminPanel\Http\Middleware\AuthenticatesAdmin;
use Pshenichniyinfo\AdminPanel\View\Components\Menu;
use App\View\Components\StatisticBlock;
use Spatie\Permission\PermissionServiceProvider;
use Illuminate\Support\Facades\File;

class AdminPanelServiceProvider extends ServiceProvider
{
    public const HOME = '/homesss';

    public function register(): void
    {
    }

    public function boot(Router $router): void
    {
        $this->app->register(PermissionServiceProvider::class);

        $router->aliasMiddleware('auth_admin', AuthenticatesAdmin::class);
        $router->aliasMiddleware('role', \Spatie\Permission\Middlewares\RoleMiddleware::class);

        $this->loadRoutesFrom(__DIR__ . "/../routes/admin.php");
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-panel');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations', 'admin-panel');
        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin-panel');

        $this->loadViewComponentsAs('admin-panel', [
            Menu::class,
            StatisticBlock::class,
        ]);

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__.'/../public' => public_path('admin-panel'),
        ], 'public');

        $sourcePath = __DIR__ . '/../routes/admin-panel-route.php';
        $destinationPath = app()->basePath() . '/routes/admin-panel-route.php';

        if (!File::exists($destinationPath)) {
            $this->publishes([
                $sourcePath => $destinationPath
            ], 'admin-panel-route');
        }

        $sourcePath = __DIR__.'/../config/admin-panel.php';
        $destinationPath = config_path('admin-panel.php');

        if (!File::exists($destinationPath)) {
            $this->publishes([
                $sourcePath => config_path('admin-panel.php'),
            ]);
        }

        $this->publishes([
            __DIR__.'/../View/Components/StatisticBlock.php' => app_path('View/Components/StatisticBlock.php'),
        ]);

//        Blade::componentNamespace('Pshenichniyinfo\\AdminPanel\\View\\Components', 'admin-panel');
    }
}
