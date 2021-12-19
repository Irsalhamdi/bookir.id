<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function index(){

        $data = Brand::latest()->get();
        return view('backend.brand.index', compact('data'));
    }

    public function store(Request $request){

        $image = $request->file('image');
        $name = $request->name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name);
        $url = 'upload/brand/' . $name;

        Brand::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'image' => $url,
        ]);

        $notification = [
            'message' => 'Brand Created Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $data = Brand::find($id);
        return view('backend.brand.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->name . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name);
            $url = 'upload/brand/' . $name;

            Brand::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'image' => $url,
            ]);

            return redirect()->route('all.brand');            

        }else{

            Brand::findOrFail($id)->update([
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ', '-', $request->name))
            ]);
            
            $notification = [
                'message' => 'Brand Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function delete($id){
        
        $data = Brand::findOrFail($id);
        $image = $data->image;
        unlink($image);
        
        Brand::findOrFail($id)->delete();

        $notification = [
            'message' => 'Brand Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
