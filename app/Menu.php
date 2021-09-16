<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    // Quy dinh truong nao duoc phep insert
    protected $fillable = ['name', 'parent_id', 'slug'];
    use SoftDeletes;

}
