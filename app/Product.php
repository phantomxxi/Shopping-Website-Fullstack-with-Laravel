<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    // Eloquent Relationships: One to many (nhieu anh thuoc ve 1 san pham)
    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', tag_id)->withTimestamps();
    }

}
