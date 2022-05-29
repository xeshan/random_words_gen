<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserName extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
    ];

    public function profile()
    {
        return $this->hasMany('App\Models\UserDetail' , 'user_name_id'); 
    }


}
