<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

        //senga追記した
        'App\Model' => 'App\olicies\ModelPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //ここから下senga追記した
        $this->registerPolicies();

        // 管理者のみ許可 (0=利用者/1=管理者)
        Gate::define('管理者', function (User $user) {
            return ($user->role === 1);
        });

        //利用者以上に許可  ※今回はこのコードはなくて良い
        Gate::define('利用者', function (User $user) {
            return ($user->role >= 0 );
        });

    }
}
