<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function index(){

        $data = Category::latest()->get();
        return view('backend.category.index', compact('data'));
    }

    public function store(Request $request){

        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/category/' . $name);
        $url = 'upload/category/' . $name;

        Category::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $url,
        ]);

        $notification = [
            'message' => 'Category Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $data = Category::findOrFail($id);
        return view('backend.category.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/category/' . $name);
            $url = 'upload/category/' . $name;

            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $url,
            ]);

             $notification = [
                'message' => 'Category Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.category')->with($notification);            

        }else{

            Category::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name))
            ]);

            $notification = [
                'message' => 'Category Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.category')->with($notification);
        }
    }
    
    public function delete($id){

        $data = Category::findOrFail($id);
        if($data->image){
            unlink($data->image);
        }else{
            Category::findOrFail($id)->delete();

            $notification = [
                'message' => 'Category Deleted Succesfully',
                'alert-type' => 'success'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
