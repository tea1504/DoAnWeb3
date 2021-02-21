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
use App\Policies\TuyenDungPolicy;
use App\QuaTrinhCongTac;
use App\TuyenDung;
use App\Policies\QueQuanPolicy;
use App\Policies\ThongTinChungPolicy;
use App\QuaTrinhCongTac;
use App\QueQuan;
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
<<<<<<< HEAD
        TuyenDung::class => TuyenDungPolicy::class,
=======
        User::class => ThongTinChungPolicy::class,
        QueQuan::class => QueQuanPolicy::class,
>>>>>>> bbdd34e3e151088a7692ed00d5d85bf398f16ad3
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
