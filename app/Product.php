<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    // Eloquent Relationships: One to many (nhieu anh thuoc ve 1 san pham)
    public function images() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id' );
    }

    public function productImages(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getProductSearch($request)
    {
        \DB::connection()->enableQueryLog();
        $products = new Product();
        if (!empty($request->product_id)) {
            $products = $products->where('products.id', $request->product_id);
        }
        if (!empty($request->name)) {
            $products = $products->where('products.name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->category_id)) {
            $products = $products->where('products.category_id', $request->category_id);
        }
        if (!empty($request->tags)) {
            $products = $products->join('product_tags', 'products.id', 'product_tags.product_id')
                ->join('tags', 'product_tags.tag_id', 'tags.id')
                ->where('tags.name', 'like', '%' . $request->tags . '%');
        }
        $products = $products
            ->groupBy('products.id')
            ->select('products.*')
            ->latest('products.created_at')
            ->paginate(5);
        $queries = \DB::getQueryLog();
        return $products;

    }

}
