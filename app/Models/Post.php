<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;


    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }

    public static function find($slug)
    {


        if (!file_exists($path =resource_path("posts/{$slug}.html"))) {
           abort(404);
        }

        return cache()->remember("posts.{$slug}", 30 , fn() => file_get_contents($path));


    }

    public static function all(){


        //  return array_map(fn($file) => $file->getContents(),$files);

    }
}

// $document = YamlFrontMatter::parseFile( resource_path('posts/my-fourth-post.html'));
