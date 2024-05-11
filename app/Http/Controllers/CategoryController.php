<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('dashboard.category.index',compact('categories'));
    }
    public function create(Request $request){
        $request->validate([
            'title' => ['required'],
            'image' => ['required'],
        ]);
        $manager = new ImageManager(new Driver());
        $image = $request->title.'-'.now()->format('d-m-Y').'.'.$request->file('image')->getClientOriginalExtension();
        $img = $manager->read($request->file('image'));
        $img->save(base_path('public/uploads/category/'.$image));

        if($request->slug){
        Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'image' => $image,
        ]);
        return back();
        }else{
        Category::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => $image,
        ]);
        return back();
        }


    }
}
