<?php

namespace App\Providers;

use App\Facades\Notification\Notify;
use App\Models\Theme;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Remotelywork\Installer\Repository\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application modules.
     *
     * @return void
     */
    public function register()
    {
        Paginator::defaultView('frontend::include.__pagination');
    }

    /**
     * Bootstrap any application modules.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function boot()
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        $this->app->bind('notify', function () {
            return new Notify;
        });

        if (App::dbConnectionCheck() && Schema::hasTable('settings')) {
            $timezone = setting('site_timezone', 'global');
            $stripe_virtual_card = plugin_active('Stripe Virtual Card');
            $api_key = $stripe_virtual_card ? json_decode($stripe_virtual_card->data, true)['secret_key'] : null;

            config()->set([
                'app.timezone'                   => $timezone,
                'app.debug'                      => setting('debug_mode', 'permission'),
                'debugbar.enabled'               => setting('debug_mode', 'permission'),
                'session.lifetime'               => setting('session_lifetime', 'system'),
                'stripe-webhooks.signing_secret' => $api_key,

                'mail.default'                   => setting('mailing_driver', 'global') ?: 'smtp',
                'mail.mailers.smtp.host'         => setting('mail_host', 'global'),
                'mail.mailers.smtp.port'         => (int) setting('mail_port', 'global'),
                'mail.mailers.smtp.encryption'   => setting('mail_secure', 'global'),
                'mail.mailers.smtp.username'     => setting('mail_username', 'global'),
                'mail.mailers.smtp.password'     => setting('mail_password', 'global'),
                'mail.from.address'              => setting('email_from_address', 'global'),
                'mail.from.name'                 => setting('email_from_name', 'global'),
            ]);

            date_default_timezone_set($timezone);
        }

        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        Blade::directive('lasset', function ($expression) {
            $customLandingTheme = Theme::where('type', 'landing')->where('status', true)->first();
            if ($customLandingTheme) {
                return asset("landing_theme/$customLandingTheme->name/$expression");
            }

            return false;
        });

        Blade::directive('removeimg', function ($expression) {
            [$isHidden, $img_field] = explode(',', $expression);
            $isHidden = trim($isHidden);
            $img_field = trim($img_field);

            return "<?php \$isHidden = $isHidden; \$img_field = '$img_field'; ?>
            <div data-des=\"<?php echo \$img_field; ?>\" <?php if(!\$isHidden) echo 'hidden'; ?> class=\"close remove-img <?php echo \$img_field; ?>\"><i data-lucide=\"x\"></i></div>";
        });

        // Set string length to 255
        Schema::defaultStringLength(255);

        $this->configureAssetUrl();
    }

    public function configureAssetUrl()
    {
        $assetUrl = url('assets');
        $this->app->singleton('url', function ($app) use ($assetUrl) {
            $routes = $app['router']->getRoutes();
            $request = $app['request'];
            $url = new UrlGenerator($routes, $request, $assetUrl);

            return $url;
        });
    }
}
