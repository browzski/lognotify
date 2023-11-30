<?php

namespace LogNotify;

use Illuminate\Support\ServiceProvider;

class LogNotifyServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services
     */
    public function boot(): void
    {
        
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $token = [
            "discord_token" => $this->app->make('config')->get('services.log_notifier.discord_token'),
            "telegram_token" => $this->app->make('config')->get('services.log_notifier.telegram_token'),
        ];

        $this->app->when(LogNotify::class)
        ->needs($token)
        ->give($token);
    }

}
