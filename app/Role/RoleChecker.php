<?php

namespace App\Role;

use App\Models\User;

/**
 * Class RoleChecker
 * @package App\Role
 */
class RoleChecker
{
    /**
     * @param User $user
     * @param string $role
     * @return bool
     */
    public function check(User $user, string $role)
    {
        // Admin has everything
        if ($user->hasRole(UserRole::ROLE_ADMIN)) {
            
            return true;
        }
        else if($user->hasRole(UserRole::ROLE_WRITER)) {
            $managementRoles = UserRole::getAllowedRoles(UserRole::ROLE_WRITER);

            if (in_array($role, $managementRoles)) {
                return true;
            }
        }
       // dd('test');

        return $user->hasRole($role);
    }
}