<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Psy\Util\Str;

class PostController extends Controller
{
    public function index()
    {

//dd(\Illuminate\Support\Facades\Gate::allows('admin'));
       return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search','category','author']))
                ->paginate(6)->withQueryString()

            ]);

    }

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }


}
