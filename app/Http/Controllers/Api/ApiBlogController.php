<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class ApiBlogController extends Controller
{
    public function show(){
        $blogs = Blog::with('oneuser','onecategory')->latest()->get();

        if($blogs->count() < 0){
            return response()->json([
                'status' => 401,
                'message' => 'something is problem',
            ],401);
        }else{
            return response()->json([
                'status' => 200,
                'data' => $blogs,
            ],200);
        }
    }
    public function feature(){
        $blogs = Blog::with('oneuser','onecategory')->latest()->get()->take(2);

        if($blogs->count() < 0){
            return response()->json([
                'status' => 401,
                'message' => 'something is problem',
            ],401);
        }else{
            return response()->json([
                'status' => 200,
                'img_path_blog' => env('APP_URL').'/uploads/blog/',
                'img_path_user' => env('APP_URL').'/uploads/profile_image/',
                'data' => $blogs,
            ],200);
        }
    }
}
