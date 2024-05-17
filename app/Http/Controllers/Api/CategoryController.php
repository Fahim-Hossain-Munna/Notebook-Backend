<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    public function latest(){
        try{
        $categories = Category::with('oneblog')->withCount('oneblog')->latest()->get()->take(5);

        return response()->json([
            'status' => 200,
            'data' => $categories
        ],200);

        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'messgae' => $th->getMessage(),
            ],500);
        }
    }
    public function category_blog($slug){
        try{
            $categories = Category::where('slug',$slug)->first();

            $blogs = Blog::with('onecategory','oneuser')->where('category_id', $categories->id)->get();
            return response()->json([
                'status' => 200,
                'data' => $blogs
            ],200);
        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'messgae' => $th->getMessage(),
            ],500);
        }

    }
}
