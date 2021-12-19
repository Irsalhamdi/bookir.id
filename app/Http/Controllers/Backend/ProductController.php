<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSUbCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function index(){

        $data = Product::latest()->get();
        return view('backend.product.index', compact('data'));
    }

    public function create(){

        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('backend.product.add', compact('brands', 'categories'));
    }

    public function store(Request $request){

        $image = $request->file('thumbnail');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('upload/products/thumbnail/' . $name);
        $url = 'upload/products/thumbnail/' . $name;
        
        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'code' => $request->code,
            'price' => $request->price,
            'discount' => $request->discount,
            'color' => $request->color,
            'qty' => $request->qty,            
            'size' => $request->size,
            'tags' => $request->tags,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'thumbnail' => $url,
            'hot_deals' => $request->hot_deals,
            'features' => $request->features,
            'special_offer' => $request->special_offers,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now()
        ]);

        $images = $request->file('image');

        foreach($images  as $image){

            $name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(917, 1000)->save('upload/products/image/' . $name);
            $url = 'upload/products/image/' . $name;

            MultiImage::insert([
                'product_id' => $product_id,
                'name' => $url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = [
            'message' => 'Product Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.products')->with($notification);
    }

    public function edit($id){
        
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSUbCategory::latest()->get();
        $data = Product::findOrFail($id);

        return view('backend.product.edit', compact('brands', 'categories', 'subcategories', 'subsubcategories', 'data'));
    }

    public function update(Request $request){

        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'code' => $request->code,
            'price' => $request->price,
            'discount' => $request->discount,
            'color' => $request->color,
            'qty' => $request->qty,            
            'size' => $request->size,
            'tags' => $request->tags,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'hot_deals' => $request->hot_deals,
            'features' => $request->features,
            'special_offer' => $request->special_offers,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Product Updated Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.products')->with($notification);
    }

    public function updateImages(Request $request){

        $images = $request->name;

		foreach ($images as $id => $img) {
            $imgDel = MultiImage::findOrFail($id);
            unlink($imgDel->name);

            $name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/image/'.$name);
            $url = 'upload/products/image/'.$name;

            MultiImage::where('id',$id)->update([
                'name' => $url,
                'updated_at' => Carbon::now(),
            ]);
        }
    }

    public function stock(){

        $data = Product::latest()->get();
        return view('backend.product.stock', compact('data'));
    }

}
