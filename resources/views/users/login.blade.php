@extends('layouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <form action="/login" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Email</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            
            <input type="submit" class="btn btn-primary" name="submit">
        
        </form>
    </div>
@endsection