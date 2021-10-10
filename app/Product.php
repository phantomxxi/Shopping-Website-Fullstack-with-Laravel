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
<<<<<<< HEAD
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', tag_id)->withTimestamps();
    }

=======
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id' );
    }
>>>>>>> 9ba3ad0 (Hiển Thị danh sách sản phẩm)
}
