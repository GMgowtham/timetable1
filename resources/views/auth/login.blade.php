@extends('Layouts.app')
@section('content')

<form method="POST" style="background-color: gray;
        color: white;
        text-align: center;
        padding: 20px;
        border-radius: 10px;"class="form-group">
    @csrf
    <label>Email<br>
         <input type="email" name="email" required></label><br>
    <label>Password <br> <input type="password" name="password" required></label><br>
    <button type="submit" class="btn btn-primary btn-lg ">Login</button>
</form>
<br>
<a href="/register"class="btn btn-primary btn-lg ">Register Here</a>


@endsection