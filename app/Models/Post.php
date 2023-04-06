<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Post extends Model implements Feedable
{
    protected $table = 'post';

    protected $fillable = ['title', 'body', 'piece', 'category_id', 'thumbnail', 'user_id', 'status', 'views'];

    protected $with = ['category', 'author', 'comments'];

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
        $query->when($filters['search'] ?? false, fn ($query, $search) => $query->where(fn ($query) => $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('title', 'like', '%'.$search.'%')
            )
        );

        $query->when($filters['category'] ?? false, fn ($query, $category) => $query->whereHas('category', fn ($query) => $query->where('slug', $category)));

        $query->when($filters['author'] ?? false, fn ($query, $author) => $query->whereHas('author', fn ($query) => $query->where('username', $author)));
    }

    public static function filtered() {
        return Post::latest()->where('status', 'published')->filter(request(['search', 'category', 'author']));
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->piece,
            'updated' => $this->updated_at,
            'link' => "posts/$this->id",
            'authorName' => $this->author->username
        ]);
    }

    public static function getFeedItems()
    {
        return Post::oldest()->where('status', 'published')->get();
    }
}
