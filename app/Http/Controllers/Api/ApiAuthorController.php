<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiAuthorController extends Controller
{
    public function top_author(){
        $users = User::latest()->get()->take(3);

        if($users->count() < 1){
        return response()->json([
            'status' => 401,
            'message' => 'something is problem',
        ],401);
        }else{

        return response()->json([
            'status' => 200,
            'img_path' => env('APP_URL').'/uploads/profile_image/',
            'data' => $users
        ],200);
        }
    }
}
