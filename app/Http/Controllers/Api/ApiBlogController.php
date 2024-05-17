<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Throwable;

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
                'img_path_blog' => env('APP_URL').'/uploads/blog/',
                'img_path_user' => env('APP_URL').'/uploads/profile_image/',
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
    public function popular(){
        $blogs = Blog::with('oneuser','onecategory')->orderBy('views','desc')->latest()->get()->take(2);

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

    public function single($id){

        try{
        $blog = Blog::with('oneuser','onecategory')->where('id',$id)->first();

        if($blog->count() < 0){
            return response()->json([
                'status' => 401,
                'message' => 'something is problem',
            ],401);
        }else{
        Blog::find($id)->update([
            'views' => $blog->views + 1,
        ]);
            return response()->json([
                'status' => 200,
                'img_path_blog' => env('APP_URL').'/uploads/blog/',
                'img_path_user' => env('APP_URL').'/uploads/profile_image/',
                'data' => $blog,
            ],200);
        }

        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ],500);
        }


    }

    public function search(Request $request){
        try{
            $data = $request->all();

            $blog = Blog::with('oneuser','onecategory')->where('title','LIKE',"%".$data['search']."%")->get();

            return response()->json([
                'status' => 200,
                'img_path_blog' => env('APP_URL').'/uploads/blog/',
                'img_path_user' => env('APP_URL').'/uploads/profile_image/',
                'data' => $blog,
            ],200);
        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ],500);
        }
    }
}
