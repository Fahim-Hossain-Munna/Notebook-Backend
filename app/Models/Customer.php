<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory,HasApiTokens;
    protected $guarded = [''];

    protected $guard = 'customer';
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
