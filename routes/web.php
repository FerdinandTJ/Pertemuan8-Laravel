<?php


use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/signin', [UserController::class, 'showLogin'])->name('signin');
Route::post('/signin', [UserController::class, 'login']);

Route::get('/signup', [UserController::class, 'showRegister'])->name('signup');
Route::post('/signup', [UserController::class, 'register']);

Route::get('/blog', function () {
    $articles = [
        ['slug' => 'laravel-tutorial', 'title' => 'Belajar Laravel', 'author' => 'JohnDoe'],
        ['slug' => 'php-tips', 'title' => 'Tips PHP', 'author' => 'JaneDoe']
    ];

    return view('blog.index', compact('articles'));
})->name('blog');

Route::get('/blog/{slug}', function ($slug) {

    $article = [
        'slug' => $slug,
        'title' => 'Judul Artikel',
        'content' => 'Isi artikel...',
        'author' => 'JohnDoe'
    ];

    return view('blog.show', compact('article'));
})->name('blog.show');

Route::get('/category/{slug}', function ($slug) {
    $articles = [
        ['slug' => 'laravel-tutorial', 'title' => 'Belajar Laravel', 'category' => $slug],
        ['slug' => 'php-tips', 'title' => 'Tips PHP', 'category' => $slug]
    ];

    return view('category.show', compact('articles', 'slug'));
})->name('category.show');

Route::get('/author/{username}', function ($username) {
    $articles = [
        ['slug' => 'laravel-tutorial', 'title' => 'Belajar Laravel', 'author' => $username],
        ['slug' => 'php-tips', 'title' => 'Tips PHP', 'author' => $username]
    ];

    return view('author.show', compact('articles', 'username'));
})->name('author.show');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/profile', function () {
    $user = [
        'name' => 'Ferdinandtj',
        'email' => 'ferdinandtj4@gmail.com',
        'bio' => 'Sangat suka coding dengan framework laravel.',
    ];
    return view('profile', compact('user'));
})->middleware(Auth::class);
