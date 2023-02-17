<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;
    public $slug;


    public function __construct($title, $excerpt, $date, $body,$slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {


        return static::all()->firstWhere('slug',$slug);


    }

    public static function findOrFiled($slug)
    {


        $post = static::find($slug);

        if($post != null){
            return $post;
        }else{
            throw new ModelNotFoundException();
        }

    }

    public static function all(){

    return cache()->rememberForever('post.all',function (){
        return collect(File::files(resource_path("posts")))
            ->map((fn($file)=>YamlFrontMatter::parseFile($file)))
            ->map(fn($document)=> new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            ))
            ->sortbyDesc('date');
    });


    }
}

// $document = YamlFrontMatter::parseFile( resource_path('posts/my-fourth-post.html'));
