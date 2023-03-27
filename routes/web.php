<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']); // Post::Where('slug'->$post)->first();

Route::post('posts/{post:slug}/comments', [CommentController::class, 'addComment']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::POST('newsletter', NewsletterController::class);

Route::middleware('can:admin')->group(function (){
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts/{post:id}/edit', [AdminPostController::class, 'edit']);
    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy']);


});


/*
  Route::get('categories/{category:slug}', function (Category $category) {

    return view('posts', ['posts' => $category->posts,
        'currentCategory'=>$category,
        'categories'=>Category::all()]);
})->name('category'); // Post::Where('slug'->$post)->first();
*/
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
/*
Route::get('authors/{author:name}', function (\App\Models\User $author) {

    return view('posts.index', ['posts' => $author->posts ]);
});
*/
/*Route::get('authors/{author:name}', function (\App\Models\User $author) {

    return view('posts', ['posts' => $author->posts->load(['category','author'])]);
}); */
