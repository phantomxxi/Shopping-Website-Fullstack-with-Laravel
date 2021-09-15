<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Quy dinh truong nao duoc phep insert
    protected $fillable = ['name', 'parent_id'];

}
