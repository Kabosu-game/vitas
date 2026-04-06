<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Remotelywork\Installer\Repository\App;
use Schema;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register modules.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap modules.
     *
     * @return void
     */
    public function boot()
    {
        if (App::dbConnectionCheck() && Schema::hasTable('settings')) {

            $mailHost     = setting('mail_host', 'mail');
            $mailPort     = setting('mail_port', 'mail');
            $mailUsername = setting('mail_username', 'mail');
            $mailPassword = setting('mail_password', 'mail');
            $mailSecure   = setting('mail_secure', 'mail');
            $fromName     = setting('email_from_name', 'mail');
            $fromAddress  = setting('email_from_address', 'mail');

            if (!empty($mailHost))     config()->set('mail.mailers.smtp.host',       $mailHost);
            if (!empty($mailPort))     config()->set('mail.mailers.smtp.port',       $mailPort);
            if (!empty($mailUsername)) config()->set('mail.mailers.smtp.username',   $mailUsername);
            if (!empty($mailPassword)) config()->set('mail.mailers.smtp.password',   $mailPassword);
            if (!empty($mailSecure))   config()->set('mail.mailers.smtp.encryption', $mailSecure);
            if (!empty($fromName))     config()->set('mail.from.name',               $fromName);
            if (!empty($fromAddress))  config()->set('mail.from.address',            $fromAddress);

        }
    }
}
