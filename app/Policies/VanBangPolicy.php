<?php

namespace App\Policies;

use App\Nhanvien;
use App\VBCC;
use Illuminate\Auth\Access\HandlesAuthorization;

class VanBangPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->role_ma === 1 || $user->role_ma === 3) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the vBCC.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\VBCC  $vBCC
     * @return mixed
     */
    public function view(Nhanvien $user, VBCC $vBCC)
    {
        
    }

    public function viewAny(Nhanvien $user){
        return $user->userRole->roleQuyen->where('q_ma', 5)->first()!==null;
    }

    /**
     * Determine whether the user can create vBCCs.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 8)->first()!==null;
    }

    /**
     * Determine whether the user can update the vBCC.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\VBCC  $vBCC
     * @return mixed
     */
    public function update(Nhanvien $user, VBCC $vBCC)
    {
        return $user->userRole->roleQuyen->where('q_ma', 6)->first()!==null;
    }

    /**
     * Determine whether the user can delete the vBCC.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\VBCC  $vBCC
     * @return mixed
     */
    public function delete(Nhanvien $user, VBCC $vBCC)
    {
        return $user->userRole->roleQuyen->where('q_ma', 7)->first()!==null;
    }
    public function inAn(Nhanvien $user){
        return false;
    }
}
