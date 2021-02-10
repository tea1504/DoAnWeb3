<?php

namespace App\Policies;

use App\Nhanvien;
use App\Luong;
use Illuminate\Auth\Access\HandlesAuthorization;

class LuongPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->role_ma === 1)
            return true;
    }

    /**
     * Determine whether the user can view the luong.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Luong  $luong
     * @return mixed
     */
    public function view(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 5)->first() !== null;
    }

    /**
     * Determine whether the user can create luongs.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 8)->first() !== null;
    }

    /**
     * Determine whether the user can update the luong.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Luong  $luong
     * @return mixed
     */
    public function update(Nhanvien $user, Luong $luong)
    {
        return $user->userRole->roleQuyen->where('q_ma', 6)->first() !== null;
    }

    /**
     * Determine whether the user can delete the luong.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Luong  $luong
     * @return mixed
     */
    public function delete(Nhanvien $user, Luong $luong)
    {
        return $user->userRole->roleQuyen->where('q_ma', 7)->first() !== null;
    }

    public function inAn(Nhanvien $user)
    {
        return false;
    }
}
