<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;
protected $guarded = [];
protected $with = ['author','category'];
//protected $fillable = ['title','excerpt','body'];

public function scopeFilter($query, array $filters) // Post::newQuery()->filter()
{
//query->where
    $query->when($filters['search']?? false, function($query,$search){
        $query->where(fn($query)=>
            $query->where('title','like','%'. $search . '%')
            ->orWhere('body','like','%'. $search . '%'));
    });

    $query->when($filters['category']?? false, fn($query,$category)=>
       $query->whereHas('category', fn($query)=>
       $query->where('slug',$category))
    );

    $query->when($filters['author']?? false, fn($query,$author)=>
    $query->whereHas('author', fn($query)=>
    $query->where('name',$author))
    );
}

    public static function find($id)
    {


        return static::all()->firstWhere('id',$id);


    }
    public static function findOrFiled($id)
    {


        $post = static::find($id);

        if($post != null){
            return $post;
        }else{
            throw new ModelNotFoundException();
        }

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public  function category()
    {
        return $this->belongsTo(Category::class);
    }

    public  function Author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
