<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Validator;
use Illuminate\Http\Request;

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
}
