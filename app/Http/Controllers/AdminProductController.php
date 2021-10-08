<?php

namespace App\Http\Controllers;

use App\Category;
use App\Components\Recusive;
use App\Product;
use App\ProductImage;
use App\ProductTag;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;

    private $category;
    private $product;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;

    }

    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(Request $request)
    {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id,
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);

//        Insert data to product_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItem, 'product');
                // Dung Eloquent Relationships create method
                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name'],
                ]);
            }
        }

        // Insert tags for product
        foreach ($request->tags as $tagItems) {
            // Insert to tags
            $tagInstance = $this->tag->firstOrCreate(['name' => $tagItems]); // Eloquent firstOrCreate dung de tranh duplicate du lieu da co
            $tagIds[] = $tagInstance->id;
        }
        $product->tags()->attach($tagIds);

    }
}
