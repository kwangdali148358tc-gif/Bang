<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Ideas;
use App\Models\Post;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::get('/formtest', function(){
    $posts = Post::all();

    return view('formtest',[
        'posts' => $posts,
    ]);
});

Route::post('/formtest', function(){
    Post::create([
        'description' => request('description'),
    ]);

    return redirect('/formtest');
});

Route::delete('/formtest/{id}', function ($id) {
    Post::findOrFail($id)->delete();

    return redirect('/formtest');
});

Route::get('/delete', function(){
    Post::truncate();  

    return redirect('/formtest');
});


//index
Route::get('/posts', function(){
    $posts = Post::all();

    return view('posts.index', [
        'posts' => $posts,
    ]);
});

//show
Route::get('/posts/{post}', function (Post $post) {
    return view('posts.show', [
        'post' => $post,
    ]);
});

//edit
Route::get('/posts/{post}/edit', function (Post $post) {
    return view('posts.edit', [
        'post' => $post,
    ]);
}
);

//update
Route::patch('/posts/{post}', function (Post $post) {
    $post->update([
        'description' => request('description'),
        'updated_at' => now(),
    ]);

    return redirect('/posts' . '/' . $post->id);
}
);

// User CRUD Routes
use App\Models\User;

// Index
Route::get('/users', function () {
    $users = User::all();

    return view('users.index', [
        'users' => $users,
    ]);
});

// Create form
Route::view('/users/create', 'users.create');

// Store
Route::post('/users', function () {
    request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'nullable|integer|min:0',
        'contact_number' => 'nullable|string|max:15',
    ]);

    User::create(request()->all());

    return redirect('/users');
});

// Edit form
Route::get('/users/{user}/edit', function (User $user) {
    return view('users.edit', [
        'user' => $user,
    ]);
});

// Update
Route::patch('/users/{user}', function (User $user) {
    request()->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'nullable|integer|min:0',
        'contact_number' => 'nullable|string|max:15',
    ]);

    $user->update(request()->all());

    return redirect('/users');
});

// Delete
Route::delete('/users/{user}', function (User $user) {
    $user->delete();

    return redirect('/users');
});

