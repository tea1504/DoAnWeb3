<?php

namespace App\Policies;

use App\Nhanvien;
use App\LichSuBanThan;
use Illuminate\Auth\Access\HandlesAuthorization;

class LichSuBanThanPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->role_ma === 1)
            return true;
    }

    /**
     * Determine whether the user can view the lichSuBanThan.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\LichSuBanThan  $lichSuBanThan
     * @return mixed
     */
    public function view(Nhanvien $user)
    {
        return true;
        // return $user->userRole->roleQuyen->where('q_ma', 5)->first() !== null;
    }

    /**
     * Determine whether the user can create lichSuBanThans.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 8)->first() !== null;
    }

    /**
     * Determine whether the user can update the lichSuBanThan.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\LichSuBanThan  $lichSuBanThan
     * @return mixed
     */
    public function update(Nhanvien $user, LichSuBanThan $lichSuBanThan)
    {
        return $user->userRole->roleQuyen->where('q_ma', 6)->first() !== null;
    }

    /**
     * Determine whether the user can delete the lichSuBanThan.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\LichSuBanThan  $lichSuBanThan
     * @return mixed
     */
    public function delete(Nhanvien $user, LichSuBanThan $lichSuBanThan)
    {
        return $user->userRole->roleQuyen->where('q_ma', 7)->first() !== null;
    }

    public function inAn(Nhanvien $user)
    {
        return false;
    }
}
