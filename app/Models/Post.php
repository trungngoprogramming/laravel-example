<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
      'name',
      'content',
      'user_id',
      'category_id',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
