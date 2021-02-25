<?php

namespace App\Policies;

use App\Nhanvien;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;
    public function before($user)
    {
        if ($user->role_ma === 1) {
            return true;
        }
    }
    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(Nhanvien $user)
    {
        return $user->role_ma === 1;
    }
    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\Nhanvien  $user
     * @return mixed
     */
    public function create(Nhanvien $user)
    {
        return $user->role_ma === 1;
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function update(Nhanvien $user, Role $role)
    {
        return $user->role_ma === 1;
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  \App\Nhanvien  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function delete(Nhanvien $user, Role $role)
    {
        return $user->role_ma === 1;
    }
    public function inAn(Nhanvien $user)
    {
        return false;
    }
}
