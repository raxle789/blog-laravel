<?php

use App\Models\Post;
// use App\Models\User;
// use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['nama' => 'Abdullah Al Fatih', 'title' => 'Home', 'headerTitle' => 'Home Page']);
});

Route::get('/blog', function () {
    return view('blog', ['title' => 'Blog', 'headerTitle' => 'Blog Page', 'posts' => Post::filter(request(['search', 'category', 'author']))->latest()->paginate(10)->withQueryString()]);
});

Route::get('/post/{post:slug}', function (Post $post) {
    return view('post', ['title' => $post['title'], 'headerTitle' => $post['title'], 'post' => $post]);
});

// Route::get('/blog/authors/{user}', function (User $user) {
//     return view('blog', ['title' => "Author: $user->name", 'headerTitle' => count($user->posts)." Articles by $user->name", 'posts' => $user->posts]);
// });

// Route::get('/blog/categories/{category:slug}', function (Category $category) {
//     return view('blog', ['title' => "Author: $category->name", 'headerTitle' => count($category->posts)." Articles in $category->name", 'posts' => $category->posts]);
// });

Route::get('/about', function () {
    return view('about', ['title' => 'About', 'headerTitle' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact', 'headerTitle' => 'Contact Page']);
});
