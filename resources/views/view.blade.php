@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">View Timetable</h1>

    @if($timetables->isEmpty())
        <p>No timetables available.</p>
    @else
        <ul>
            @foreach($timetables as $timetable)
                <li>{{ $timetable->name }} - {{ $timetable->description }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
