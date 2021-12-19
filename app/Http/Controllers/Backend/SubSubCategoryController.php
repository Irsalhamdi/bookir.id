<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSUbCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubSubCategoryController extends Controller
{
    public function index(){

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $data = SubSUbCategory::with('category', 'subcategory')->latest()->get();
        return view('backend.subsubcategory.index', compact('data', 'categories', 'subcategories'));
    }

    public function store(Request $request){
        
        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/subsubcategory/' . $name);
        $url = 'upload/subsubcategory/' . $name;

        SubSUbCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $url,
        ]);

        $notification = [
            'message' => 'Sub-sub-Category Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);        
    }

    public function edit($id){

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $data = SubSUbCategory::findOrFail($id);
        return view('backend.subsubcategory.edit', compact('data', 'categories', 'subcategories'));
    }

    public function update(Request $request){
        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subsubcategory/' . $name);
            $url = 'upload/subsubcategory/' . $name;

            SubSubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $url,
            ]);

            $notification = [
                'message' => 'Sub-sub-Category Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sub.sub.category')->with($notification);            

        }else{

            SubSubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name))
            ]);

            $notification = [
                'message' => 'Sub-sub-Category Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sub.sub.category')->with($notification);
        }
    }   
    
    public function destroy($id){

        $data = SubSUbCategory::findOrFail($id);

        if(file_exists($data->image)){
            unlink($data->image);
        }else{
            $data->delete();

            $notification = [
                'message' => 'Sub-sub-Category Deleted Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->back()->with($notification);
        }
    }

    public function subcategory($category_id){

        $subcategory = SubCategory::where('category_id', $category_id)->orderBy('name', 'ASC')->get();
        return json_encode($subcategory);
    }

    public function subsubcategory($category_id){

        $subsubcategory = SubSubCategory::where('subcategory_id', $category_id)->orderBy('name', 'ASC')->get();
        return json_encode($subsubcategory);
    }

}
