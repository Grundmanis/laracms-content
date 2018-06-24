<?php

namespace Grundmanis\Laracms\Modules\Content\Providers;

use Grundmanis\Laracms\Facades\MenuFacade;
use Grundmanis\Laracms\Modules\Content\Content;
use Grundmanis\Laracms\Modules\Content\Facades\ContentFacade;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class ContentProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'laracms.content');
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_content_routes.php');
        $this->loadRoutesFrom(__DIR__ . '/../laracms_content_dynamic_routes.php');

        $this->publishes([
            __DIR__.'/../assets/' => public_path('laracms/dynamic-module/'),
        ], 'dynamic-module');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Content', Content::class);

        $loader = AliasLoader::getInstance();
        $loader->alias('Content', ContentFacade::class);

        $this->addMenuRoutes();
    }

    /**
     *
     */
    private function addMenuRoutes()
    {
        $menu = [
            'Content' => [
                'Texts' => 'laracms.content',
                'Dynamic content' => 'laracms.content.dynamic'
            ]
        ];

        MenuFacade::addMenu($menu);
    }

}
