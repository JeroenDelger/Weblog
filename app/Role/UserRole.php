<?php

namespace App\Role;

/***
 * Class UserRole
 * @package App\Role
 */
class UserRole {

    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_WRITER = 'ROLE_WRITER';
    const ROLE_PREMIUM = 'ROLE_PREMIUM';
    const ROLE_USER = 'ROLE_USER';

    /**
     * @var array
     */
    protected static $roleHierarchy = [
        self::ROLE_ADMIN => ['*'],
        self::ROLE_WRITER => [
            self::ROLE_PREMIUM,
            self::ROLE_USER,
        ],
        self::ROLE_PREMIUM => [
            self::ROLE_USER
        ],
        self::ROLE_USER => []
    ];

    /**
     * @param string $role
     * @return array
     */
    public static function getAllowedRoles(string $role)
    {
        if (isset(self::$roleHierarchy[$role])) {
            return self::$roleHierarchy[$role];
        }

        return [];
    }

    /***
     * @return array
     */
    public static function getRoleList()
    {
        return [
            static::ROLE_ADMIN =>'Admin',
            static::ROLE_WRITER => 'Writer',
            static::ROLE_PREMIUM => 'Premium Member',
            static::ROLE_USER => 'User',
        ];
    }

}