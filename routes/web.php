<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Ideas;
use App\Models\Post;

Route::get('/', function () {
    $userCount = \App\Models\User::count();
    $postCount = \App\Models\Post::count();
    $ideaCount = \App\Models\Ideas::count();
    $recentUsers = \App\Models\User::latest()->take(5)->get();

    return view('welcome', compact('userCount', 'postCount', 'ideaCount', 'recentUsers'));
});

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

Route::get('/user-registration', function () {
    return view('user_registration');
});

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
        'email' => 'required|email|unique:users',
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'nullable|integer|min:0',
        'contact_number' => 'nullable|string|max:15',
    ]);

$data = request()->only(['email', 'first_name', 'last_name', 'middle_name', 'nickname', 'age', 'address', 'contact_number']);
$data['password'] = bcrypt('password'); // Default password for registration
User::create($data);

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
        'email' => 'required|email|unique:users,email,' . $user->id,
        'first_name' => 'required',
        'last_name' => 'required',
        'age' => 'nullable|integer|min:0',
        'contact_number' => 'nullable|string|max:15',
    ]);

$user->update(request()->only(['email', 'first_name', 'last_name', 'middle_name', 'nickname', 'age', 'address', 'contact_number'])); // Explicit fields, no password change on update

    return redirect('/users');
});

// Show
Route::get('/users/{user}', function (User $user) {
    return view('users.show', ['user' => $user]);
});

// Delete
Route::delete('/users/{user}', function (User $user) {
    $user->delete();

    return redirect('/users');
});

