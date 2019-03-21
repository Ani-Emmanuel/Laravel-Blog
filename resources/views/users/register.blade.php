@extends('../layouts.master')
@section('content')

<div class="col-sm-8 blog-main">
<form method="post" action="/register">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="fullname">Fullname</label>
        <input type="text" name="name" id="fullname" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" name="password_confirmation" id="confirm_ password" class="form-control" required>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" class="btn btn-primary">
    </div>
</form>

@include('layouts.errors')
</div>

    
@endsection