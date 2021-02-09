<?php

namespace App\Policies;

use App\Nhanvien;
use Illuminate\Auth\Access\HandlesAuthorization;

class NhanVienPolicy
{
    use HandlesAuthorization;
    public function before($user)
    {
        if ($user->role_ma === 1) {
            return true;
        }
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function view(Nhanvien $user)
    {
        
    }

    public function viewAny(Nhanvien $user){
        return $user->userRole->roleQuyen->where('q_ma', 1)->first()!==null;
    }
    public function create(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 2)->first()!==null;
    }
    public function update(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 3)->first()!==null;
    }
    public function delete(Nhanvien $user)
    {
        return $user->userRole->roleQuyen->where('q_ma', 4)->first()!==null;
    }
    public function inAn(Nhanvien $user){
        return false;
    }
}
