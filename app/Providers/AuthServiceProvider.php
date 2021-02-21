<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Http\Controllers\Auth\CustomUserProvider;
use App\Luong;
use App\NhanVien;
use App\Policies\LuongPolicy;
use App\VBCC;
use App\Policies\VanBangPolicy;
use App\Policies\NhanVienPolicy;
use App\Policies\QuaTrinhCongTacPolicy;
use App\Policies\ThongTinChungPolicy;
use App\QuaTrinhCongTac;
use App\User;

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
        Luong::class => LuongPolicy::class,
        QuaTrinhCongTac::class => QuaTrinhCongTacPolicy::class,
        User::class => ThongTinChungPolicy::class,
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
        
        Gate::define('xemThongKe', function($user){
            return $user->role_ma === 1;
        });
        $this->app->auth->provider('custom', function ($app, array $config) {
            return new CustomUserProvider($app['hash'], $config['model']);
        });
    }
}
