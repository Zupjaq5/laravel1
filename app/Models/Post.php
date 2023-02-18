<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;
protected $guarded = [];
//protected $fillable = ['title','excerpt','body'];
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
}
