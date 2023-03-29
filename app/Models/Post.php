<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['title', 'body', 'piece', 'category_id'];

    protected $with = ['category', 'author'];

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query)
    {
        if (request('search')) {
            $query
                ->where('title', 'like', '%'.request('search').'%')
                ->orWhere('title', 'like', '%'.request('search').'%');
        }
    }
}
