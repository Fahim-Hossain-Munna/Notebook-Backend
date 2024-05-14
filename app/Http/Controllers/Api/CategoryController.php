<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function latest(){
        $categories = Category::latest()->get()->take(5);

        return response()->json([
            'status' => 200,
            'data' => $categories
        ],200);
    }
}
