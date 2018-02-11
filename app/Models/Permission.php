<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    //
    private static $ignore = [];

    private static $must = [
        'bindUserAndRole',
        'bindRoleAndPermission',
    ];

    public static function must($permission)
    {
        return in_array($permission, self::$must);
    }

}
