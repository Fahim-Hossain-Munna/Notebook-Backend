<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::paginate(5);
        return view('dashboard.tag.index',compact('tags'));
    }
    public function create(Request $request){
        $request->validate([
            'title' => ['required'],
        ]);

        if($request->slug){
            Tag::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
        ]);
        }else{
            Tag::create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title),
        ]);
        }
        return back();
    }
}
