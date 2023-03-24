<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {
    public $title;
    public $data;
    public $piece;
    public $body;
    public $slug;
    public function __construct($title, $date, $piece, $body, $slug)
    {
        $this->title = $title;
        $this->date = $date;
        $this->piece = $piece;
        $this->body = $body;
        $this->slug = $slug;
    }

	public static function findAll () {
        return cache()->rememberForever('posts.all', function () {
            return collect(File::files(resource_path("/posts")))
                ->map(function ($file) {
                    $document = YamlFrontMatter::parseFile($file);
                    return new Post($document->title, $document->date, $document->piece, $document->body(), $document->slug);
                })->sortByDesc('date');
        });
	}

    public static function find ($slug) {
        return static::findAll()->firstWhere('slug', $slug);
    }
    public static function findOrFail ($slug) {
        $post = static::find($slug);

        if (! $post) {
            abort(404);
        }

        return $post;
    }
}
