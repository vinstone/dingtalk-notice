<?php

namespace DingTalkNotice\Providers;

use DingTalkNotice\DingTalk;
use Illuminate\Support\ServiceProvider;

class DingTalkNoticeProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/dingtalk.php' => config_path('dingtalk.php'),
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerLaravelBindings();
    }

    /**
     * Register Laravel bindings.
     *
     * @return void
     */
    protected function registerLaravelBindings()
    {
        $this->app->singleton(DingTalk::class, function ($app) {
            return new DingTalk($app['config']['dingtalk']);
        });
    }

}
