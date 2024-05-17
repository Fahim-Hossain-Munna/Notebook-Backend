<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Throwable;

class ApiUpdateController extends Controller
{
    public function update(){
        try{

            $total_blogs = Blog::get()->count();
            $total_user = User::get()->count();
            $total_category = Category::get()->count();
            // $today_update_blogs = Blog::where('created_at' , Carbon::now()->subDays(7))->get()->count();
            // this is for last 7 days result
            $today_update_blogs = Blog::whereDate('created_at',Carbon::now())->get()->count();

            return response()->json([
                'status' => 200,
                'count_blog' => $total_blogs,
                'count_user' => $total_user,
                'count_category' => $total_category,
                'today_blog' => $today_update_blogs,
            ],200);

        }catch(Throwable $th){
            return response()->json([
                'status' => 500,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
