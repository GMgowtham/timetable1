@extends('Layouts.app')
@section('content')
<!-- resources/views/edit-timetable.blade.php -->
<form method="POST" action="/create-timetable" class>
    @method('PATCH')
    @csrf
    <label>Class: <input type="text" name="class" required></label>
    <label>Days: <input type="number" name="days" required></label>
    <label>Periods: <input type="number" name="periods" required></label>
    <label>Time (HH:MM): <input type="time" name="time" required></label>
    <label>Duration: <input type="number" name="duration" required></label>
    <label>Breaks: <input type="number" name="breaks" required></label>
    <button type="submit">Update</button>
</form>

@endsection