<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    public function index(){
        $caregories = Category::get();
        $tags = Tag::get();
        $blogs = Blog::with('oneuser','onecategory')->paginate(5);
        return view('dashboard.blog.index',compact('caregories','tags','blogs'));
    }
    public function create(Request $request){
        $manager = new ImageManager(new Driver());
        $image = auth()->id().'-'.Str::slug($request->title).'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();

        $img = $manager->read($request->file('image'));
        $img->toJpeg()->save(base_path('public/uploads/blog/'.$image));

        if($request->slug){
        $blog = Blog::create([
            'auth_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
            'image' => $image,
            'created_at' => now(),
        ]);
        }else{
        $blog = Blog::create([
            'auth_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'image' => $image,
            'created_at' => now(),
        ]);
        }


        $blog->manytag()->attach($request->tag_id);

        $blog->save();

        return back();
    }
}
