<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title', 'body', 'piece', 'category_id', 'piece'];

    use HasFactory;

    public function category () {
        return $this->belongsTo(Category::class);
    }
}
