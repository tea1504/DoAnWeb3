<?php

namespace App\Policies;

use App\Nhanvien;
use App\QuaTrinhCongTac;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuaTrinhCongTacPolicy
{
    use HandlesAuthorization;
    public function before($user)
    {
        if ($user->role_ma === 1) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the quaTrinhCongTac.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\QuaTrinhCongTac  $quaTrinhCongTac
     * @return mixed
     */
    public function view(Nhanvien $user, QuaTrinhCongTac $quaTrinhCongTac)
    {
        return $user->nv_ma === $quaTrinhCongTac->nv_ma;
    }

    public function viewAny(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 5)->first() !== null;
    }

    /**
     * Determine whether the user can create quaTrinhCongTacs.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 8)->first() !== null;
    }

    /**
     * Determine whether the user can update the quaTrinhCongTac.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\QuaTrinhCongTac  $quaTrinhCongTac
     * @return mixed
     */
    public function update(Nhanvien $user, QuaTrinhCongTac $quaTrinhCongTac)
    {
        return $user->userRole->roleQuyen->where('q_ma', 6)->first() !== null;
    }

    /**
     * Determine whether the user can delete the quaTrinhCongTac.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\QuaTrinhCongTac  $quaTrinhCongTac
     * @return mixed
     */
    public function delete(Nhanvien $user, QuaTrinhCongTac $quaTrinhCongTac)
    {
        return $user->userRole->roleQuyen->where('q_ma', 7)->first() !== null;
    }
    public function inAn(Nhanvien $user)
    {
        return false;
    }
}
