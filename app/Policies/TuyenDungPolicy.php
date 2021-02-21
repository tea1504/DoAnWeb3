<?php

namespace App\Policies;

use App\Nhanvien;
use App\TuyenDung;
use Illuminate\Auth\Access\HandlesAuthorization;

class TuyenDungPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->role_ma === 1) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the tuyenDung.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\TuyenDung  $tuyenDung
     * @return mixed
     */
    public function view(Nhanvien $user, TuyenDung $tuyenDung)
    {
        return $user->nv_ma ===  $tuyenDung->nv_ma;
    }
    public function viewAny(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 5)->first() !== null;
    }

    /**
     * Determine whether the user can create tuyenDungs.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 8)->first() !== null;
    }

    /**
     * Determine whether the user can update the tuyenDung.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\TuyenDung  $tuyenDung
     * @return mixed
     */
    public function update(Nhanvien $user, TuyenDung $tuyenDung)
    {
        return $user->userRole->roleQuyen->where('q_ma', 6)->first() !== null;
    }

    /**
     * Determine whether the user can delete the tuyenDung.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\TuyenDung  $tuyenDung
     * @return mixed
     */
    public function delete(Nhanvien $user, TuyenDung $tuyenDung)
    {
        return $user->userRole->roleQuyen->where('q_ma', 7)->first() !== null;
    }
    public function inAn(Nhanvien $user)
    {
        return false;
    }
}
