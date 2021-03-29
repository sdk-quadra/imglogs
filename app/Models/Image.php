<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // カラム permitを記述
    protected $fillable = ["user_id", "img"];
}
