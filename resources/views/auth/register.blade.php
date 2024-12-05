@extends('Layouts.app')
@section('content')
<!-- resources/views/register.blade.php -->
<div class="form-group" class="a" style="background-color: gray;
        color: white;
        text-align: center;
        padding: 20px;
        border-radius: 10px;">
<form method="POST" action="/register" style="margin-top: 50px;">
    @csrf
    <label>Name
        <br> <input type="text" name="name" required></label><br>
    <label>Email <br> <input type="email" name="email" required></label><br>
    <label>Phone<br> <input type="text" name="phone" required></label><br>
    <label>Password<br> <input type="password" name="password" required></label><br>
    <label>Confirm Password<br> <input type="password" name="password_confirmation" required></label><br>
    <button type="submit" class="btn btn-primary btn-lg ">Submit</button>
</form>
<br>
<br>
<a href="/login" class="btn btn-primary btn-lg ">Login Here</a>

@endsection