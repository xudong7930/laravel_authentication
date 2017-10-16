<?php

namespace App\Providers;

use App\Providers\RiakServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 自定义auth.php guard驱动
        Auth::extend('ergou', function ($app, $name, array $config) {
            return new ErgouGuard(Auth::createUserProvider($config['provider']));
        });

        // 自定义auth.php provider驱动
        Auth::provider('riak', function ($app, array $config) {
            return RiakServiceProvider($app->make('riak.connection'));
        });
    }
}
