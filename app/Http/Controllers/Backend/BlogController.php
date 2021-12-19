<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogPost;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function category(){

        $data = BlogCategory::latest()->get();
        return view('backend.blog.index', compact('data'));
    }

    public function store(Request $request){

        BlogCategory::insert([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'created_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Blog Category Created Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function edit($id){

        $data = BlogCategory::findOrFail($id);
        return view('backend.blog.edit', compact('data'));
    }

    public function update(Request $request){

        $id = $request->id;
        BlogCategory::findOrFail($id)->update([
            'name' => $request->name,
            'slug' => strtolower(str_replace(' ', '-', $request->name)),
            'updated_at' => Carbon::now()
        ]);

        $notification = [
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.category')->with($notification);
    }

    public function destroy($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }

    public function post(){
        $categories = BlogCategory::latest()->get();
        $data = BlogPost::latest()->get();
        
        return view('backend.post.index', compact('categories', 'data'));
    }

    public function AddPost(){

        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        return view('backend.post.add', compact('categories'));
    }

    public function StorePost(Request $request){

        $image = $request->file('image');
        $name = hexdec(uniqid()). '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('upload/blog/' . $name);
        $url = 'upload/blog/' . $name;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => strtolower(str_replace(' ', '', $request->title)),
            'description' => $request->description,
            'image' => $url,
            'created_at' => Carbon::now() 
        ]);

        $notification = [
            'message' => 'Blog Post Created Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('blog.post')->with($notification);
    }

    public function EditPost($id){

        $categories = BlogCategory::orderBy('name', 'ASC')->get();
        $data = BlogPost::findOrFail($id);
        return view('backend.post.edit', compact('categories', 'data'));
    }

    public function UpdatePost(Request $request){

        $id = $request->id;
        $old_image = $request->old_image;

        if($request->file('image')){

            unlink($old_image);
            $image = $request->file('image');
            $name = $request->title . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/blog/' . $name);
            $url = 'upload/blog/' . $name;

            BlogPost::findOrFail($id)->update([
                'title' => $request->title,
                'slug' => strtolower(str_replace(' ', '-', $request->title)),
                'description' => $request->description,
                'image' => $url,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('blog.post')->with($notification);            

        }else{

            BlogPost::findOrFail($id)->update([
                'title' => $request->title,
                'slug' => strtolower(str_replace(' ', '-', $request->name)),
                'description' => $request->description,
                'updated_at' => Carbon::now()
            ]);

            $notification = [
                'message' => 'Blog Post Updated Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('blog.post')->with($notification);
        }
    }

    public function DeletePost($id){

        $data = BlogPost::findOrFail($id);

        if($data->image){
            unlink($data->image);

            $data->delete();

            $notification = [
                'message' => 'Blog Post Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('blog.post')->with($notification);
        }else{

            $data->delete();

            $notification = [
                'message' => 'Blog Post Deleted Successfully',
                'alert-type' => 'success'
            ];

            return redirect()->route('blog.post')->with($notification);
        }
    }
}
