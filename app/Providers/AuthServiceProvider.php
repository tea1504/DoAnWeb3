<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Http\Controllers\Auth\CustomUserProvider;
use App\Luong;
use App\LichSuBanThan;
use App\NhanVien;
use App\NoiSinh;
use App\Policies\LichSuBanThanPolicy;
use App\Policies\LuongPolicy;
use App\VBCC;
use App\Policies\VanBangPolicy;
use App\Policies\NhanVienPolicy;
use App\Policies\NoiSinhPolicy;
use App\Policies\QuaTrinhCongTacPolicy;
use App\Policies\TuyenDungPolicy;
use App\QuaTrinhCongTac;
use App\TuyenDung;
use App\Policies\QueQuanPolicy;
use App\Policies\ThongTinChungPolicy;
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
        TuyenDung::class => TuyenDungPolicy::class,
        User::class => ThongTinChungPolicy::class,
        QueQuan::class => QueQuanPolicy::class,
        NoiSinh::class => NoiSinhPolicy::class,
        LichSuBanThan::class => LichSuBanThanPolicy::class,
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
