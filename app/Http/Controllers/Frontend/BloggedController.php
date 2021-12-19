<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogCategory;
use App\Http\Controllers\Controller;

class BloggedController extends Controller
{
    public function index(){

        $blogs = BlogPost::latest()->get();
        return view('frontend.blog.index', compact('blogs'));
    }

    public function detail($slug){

        $blog = BlogPost::where('slug', $slug)->first();
        return view('frontend.blog.detail', compact('blog'));
    }

    public function category($slug, $id){
        
    	$blogs = BlogPost::where('category_id', $id)->orderBy('id', 'ASC')->get();
        return view('frontend.blog.category', compact('blogs'));
    }
}
