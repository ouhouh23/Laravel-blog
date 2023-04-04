<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $fillable = ['title', 'body', 'piece', 'category_id', 'thumbnail', 'user_id'];

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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filters)
    {
//        if ($filters['search'] ?? false ) {
//            $query
//                ->where('title', 'like', '%'.$filters['search'].'%')
//                ->orWhere('title', 'like', '%'.$filters['search'].'%');
//        }
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where(fn ($query) => $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('title', 'like', '%'.$search.'%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }
}
