<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_name_id',
        'random_words'
    ];
    public function user()
	{
    	return $this->belongsTo('App\Models\UserName', 'user_name_id');
	}
}
