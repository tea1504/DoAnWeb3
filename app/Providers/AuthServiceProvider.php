<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Http\Controllers\Auth\CustomUserProvider;
use App\NhanVien;
use App\VBCC;
use App\Policies\VanBangPolicy;
use App\Policies\NhanVienPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        VBCC::class => VanBangPolicy::class,
        NhanVien::class => NhanVienPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        
        Gate::define('xemDSNV', function($user){
            return $user->userRole->roleQuyen->where('q_ma', 1)->first()!==null;
        });
        $this->app->auth->provider('custom', function ($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });
    }
}
