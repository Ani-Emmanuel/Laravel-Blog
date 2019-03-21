<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Carbon\Carbon;

class PostsController extends Controller
{
    //

    public function __construct(){
        return $this->middleware('auth')->except(['index','show']);
    }

    public function index(){

        $posts = Post::latest()->filter(request(['month','year']))->get();
          
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
      //  $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        //dd(request()->all());
        // $posts = new Post;

        // $posts->title = request('title');
        // $posts->body = request('body');

        // $posts->save();

        $this->validate(request(),[
            'title' => 'required',
            'body' => 'required'
        ]);

        Post::create(request(['title','body']));
        return redirect('/');
    }
}
