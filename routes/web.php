<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home'); 
})->name('home');

// Signin & Signup Routes
Route::get('/signin', function () {
    return view('signin'); 
})->name('signin');

Route::post('/signin', function (Request $request) {
    $credentials = $request->only('email', 'password');
    
    if ($credentials['email'] == 'user@example.com' && $credentials['password'] == 'password') {
        return redirect()->route('home')->with('success', 'Login berhasil');
    } else {
        return redirect()->route('signin')->with('error', 'Email atau password salah');
    }
});

Route::get('/signup', function () {
    return view('signup'); 
})->name('signup');

Route::post('/signup', function (Request $request) {
    $data = $request->only('name', 'email', 'password', 'password_confirmation');
    
    if ($data['password'] === $data['password_confirmation']) {

        return redirect()->route('signin')->with('success', 'Registrasi berhasil, silakan login');
    } else {
        return redirect()->route('signup')->with('error', 'Password dan konfirmasi tidak cocok');
    }
});

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
    // Daftar artikel berdasarkan penulis (dummy data)
    $articles = [
        ['slug' => 'laravel-tutorial', 'title' => 'Belajar Laravel', 'author' => $username],
        ['slug' => 'php-tips', 'title' => 'Tips PHP', 'author' => $username]
    ];
    
    return view('author.show', compact('articles', 'username')); 
})->name('author.show');

Route::get('/privacy-policy', function () {
    return view('privacy-policy'); // Menampilkan halaman kebijakan privasi
})->name('privacy-policy');
