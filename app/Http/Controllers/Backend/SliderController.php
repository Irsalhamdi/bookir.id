<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SliderController extends Controller
{
    public function index(){

        $data = Slider::latest()->get();
        return view('backend.slider.index', compact('data'));
    }

    public function store(Request $request){

    	$image = $request->file('image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
    	$save_url = 'upload/slider/'.$name_gen;

	    Slider::insert([
		    'title' => $request->title,
		    'description' => $request->description,
		    'image' => $save_url,
        ]);

	    $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->route('all.sliders')->with($notification);
    }

    public function edit($id){

        $data = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->title . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name);
            $url = 'upload/slider/' . $name;

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $url,
                'status' => '1',
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Slider Updated Succesfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('all.sliders')->with($notification);

        }else{

            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'status' => '1',
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Slider Updated Succesfully',
                'alert-type' => 'success'
            ];  

            return redirect()->route('all.sliders')->with($notification);
        }

    }

    public function destroy($id){

        $data = Slider::findOrFail($id);
        unlink($data->image);
        $data->delete();

        $notification = [
            'message' => 'Slider Deleted Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.sliders')->with($notification);
    }

    public function active($id){

        Slider::findOrFail($id)->update([
            'status' => '1'
        ]);

        $notification = [
            'message' => 'Slider Actived Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.sliders')->with($notification);
    }

    public function inactive($id){

        Slider::findOrFail($id)->update([
            'status' => '0'
        ]);

        $notification = [
            'message' => 'Slider Inactived Succesfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.sliders')->with($notification);
    }
}
