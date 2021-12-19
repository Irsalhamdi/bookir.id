<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubCategoryController extends Controller
{
    public function index(){

        $data = SubCategory::with('category')->latest()->get();
        $categories = Category::all();
        return view('backend/subcategory/index', compact('data', 'categories'));
    }

    public function store(Request $request){

        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/subcategory/' . $name);
        $url = 'upload/subcategory/' . $name;

        SubCategory::insert([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $url,
        ]);

        $notification = [
            'message' => 'SubCategory Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }

    public function edit($id){

        $categories = Category::orderBy('name', 'ASC')->get();
        $data = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit', compact('data', 'categories'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/subcategory/' . $name);
            $url = 'upload/subcategory/' . $name;

            SubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $url,
            ]);

            $notification = [
                'message' => 'SubCategory Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sub.category')->with($notification);            

        }else{

            SubCategory::findOrFail($id)->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name))
            ]);

            $notification = [
                'message' => 'SubCategory Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sub.category')->with($notification);
        }
    }

    public function destroy($id){
        
        $data = SubCategory::findOrfail($id);
        if($data->image){
            unlink($data->image);
        }else{
            Category::findOrFail($id)->delete();

            $notification = [
                'message' => 'SubCategory Deleted Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sub.category')->with($notification);
        }
    }
}
