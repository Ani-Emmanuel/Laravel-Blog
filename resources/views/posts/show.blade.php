@extends('layouts.master')
@section('content')
 <div class="col-sm-8 blog-main">
       <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a href="#">Mark</a></p>
                {{$post->body}}

                <hr>
                
                <ul class="list-group">
               @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                        {{ $comment->created_at->diffForHumans()}}: &nbsp; 
                        </strong>
                        {{$comment->body}}
                    </li>
               @endforeach
           </ul>
           
           <hr>

<div class="card">
     <div class="card-block">
         <form method="post" action="/posts/{{ $post->id }}/comments" >
            {{ csrf_field() }}
                <label for="body">Comments</label>
                <textarea name="body" id="body" class="form-control" placeholder="write Comments here"></textarea>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
        </form>
     </div>
 </div>

 @include('layouts.errors');
            
           </div><!-- /.blog-post -->  
          
           

 </div> 
 
 
@endsection