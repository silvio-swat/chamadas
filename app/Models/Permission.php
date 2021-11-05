<?php

namespace App\Models;

use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    public $guarded = [];

    public static function search($query = null)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%' . $query . '%')
                 ->orWhere('display_name', 'like', '%' . $query . '%');
    }        
}
