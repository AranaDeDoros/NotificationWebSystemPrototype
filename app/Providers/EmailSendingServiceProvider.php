<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EmailSendingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(EmailSendingServiceProviderInterface::class, EmailSendingService::class);
    }
}
