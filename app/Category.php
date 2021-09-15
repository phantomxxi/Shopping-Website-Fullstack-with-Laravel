<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    // Quy dinh truong nao duoc phep insert
    protected $fillable = ['name', 'parent_id', 'slug'];
}
