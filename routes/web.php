<?php
use App\Post;
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

// Route::get('/', function () {
//     //$tasks=DB::table('tasks')->get();
//    //return $tasks; 
//    $tasks = App\Task::all();
//     return view('tasks.index',compact('tasks'));
// });

// Route::get('/tasks/{id}', function ($id) {
//    // $tasks=DB::table('tasks')->find($id);
//    // dd($tasks);
//    //return $tasks;
   
//    $tasks = App\Task::find($id);
//     return view('tasks.show',compact('tasks'));
// });

// Route::get('/tasks','TasksController@index');
// Route::get('/tasks/{task}','TasksController@show');
// Route::get('/', function(){
//     return view('layouts.master');
// });
Route::get('/','PostsController@index');
Route::get('/posts/create','PostsController@create');
Route::get('/posts/{post}','PostsController@show');
Route::post('/posts','PostsController@store');
Route::post('/posts/{post}/comments','CommentsController@store');
Route::get('/register','RegisterationsController@register');
Route::post('/register','RegisterationsController@store');
Route::post('/login','SessionsController@login');

View::composer(['layouts.sidebar'],function($view){
         $archives = Post::selectRaw('year(created_at) year,monthname(created_at) month,COUNT(*) published')
        ->groupBy('year','month')->orderByRaw('min(created_at) desc')->get()->toArray();
        $view->with('archives',$archives);
});

// View::composer(['layouts.app'],function($view){
//  $cat = Category::all();
//  $view->with('cat',$cat);
// });

