<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Remotelywork\Installer\Repository\App;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load frontend views namespace regardless of DB connection
        $theme = 'default'; // fallback theme
        if (App::dbConnectionCheck()) {
            $theme = site_theme() ?: 'default';
        }

        $themeViews = resource_path('views/frontend/'.$theme);
        $defaultViews = resource_path('views/frontend/default');

        if (! is_dir($themeViews)) {
            $themeViews = $defaultViews;
        }

        // First load active theme views, then fall back to default template set.
        $this->loadViewsFrom($themeViews, 'frontend');

        if ($themeViews !== $defaultViews) {
            $this->loadViewsFrom($defaultViews, 'frontend');
        }
    }
}
