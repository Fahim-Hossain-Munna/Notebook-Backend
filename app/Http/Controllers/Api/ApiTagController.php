<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Tag;
use Validator;
use Illuminate\Http\Request;
use Throwable;

class ApiTagController extends Controller
{
    public function latest(){
        $tags = Tag::latest()->get()->take(9);

        if($tags->count() < 1){
        return response()->json([
            'status' => 401,
            'message' => 'something is problem',
        ],401);
        }else{

        return response()->json([
            'status' => 200,
            'data' => $tags
        ],200);

        }
    }
    public function tag_blog($slug){
        try{

            $tags = Tag::with('manyblog.oneuser','manyblog.onecategory')->where('slug', $slug)->get();

            $blogs = $tags[0]->manyblog;
            return response()->json([
                'status' => 200,
                'data' => $blogs,
            ],200);
        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'messgae' => $th->getMessage(),
            ],500);
        }

    }
}
