<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    // カラム permitを記述
    protected $fillable = ["user_id", "img"];
}
