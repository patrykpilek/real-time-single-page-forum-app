<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['reply_id', 'user_id'];
}
