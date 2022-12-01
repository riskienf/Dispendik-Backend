<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'User'],
        ['id' => 2, 'name' => 'Admin'],
    ];
}
