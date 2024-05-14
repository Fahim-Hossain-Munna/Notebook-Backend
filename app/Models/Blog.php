<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function manytag(){
        return $this->belongsToMany(Tag::class);
    }
    public function oneuser(){
        return $this->hasOne(User::class,'id','auth_id');
    }
    public function onecategory(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}
