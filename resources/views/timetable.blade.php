@extends('Layouts.app')
@section('content')


<!-- <div class="container mt-5">
    <h1 class="mb-4">Timetable Overview</h1>
    <table class="table table-bordered">
        <thead>
        
                <th>Class</th>
                <th>Number of Days</th>
                <th>Number of Periods</th>
                <th>Start Time</th>
                <th>Duration (minutes)</th>
                <th>Breaks</th>
            
        </thead>
        <tbody>
            <tr>
                <td>{{ $data['class'] }}</td>
                <td>{{ $data['days'] }}</td>
                <td>{{ $data['periods'] }}</td>
                <td>{{ $data['time'] }}</td>
                <td>{{ $data['duration'] }}</td>
                <td>
                    @for ($i = 1; $i <= $data['breaks']; $i++)
                        Break {{ $i }}: {{ $data["break_$i"] ?? 'Not set' }} <br>
                    @endfor
                </td>
            </tr>
        </tbody>
    </table>
</div> -->

<!-- <div class="container mt-5">
    <h1 class="mb-4">School Timetable Overview</h1>
    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-warning">Logout</button>
</form>

<a href="javascript:history.back()" class="btn btn-warning" style="margin-left: 94.5%;">Back</a>



    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Period</th>
                    <th>Time</th>
                    <th>Duration (minutes)</th>
                </tr>
            </thead> -->
            <!-- <tbody>
                @php
                    
                    $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                    
                   
                    $startTime = strtotime($data['time']);
                    
                  
                    $periodDuration = $data['duration'] * 60;
                    
                    
                    $totalPeriods = $data['periods'];
                @endphp

               
                @foreach ($daysOfWeek as $dayIndex => $day)
                    @if ($dayIndex < $data['days']) 
                      
                        @for ($period = 1; $period <= $totalPeriods; $period++)
                            @php
                               
                                $currentPeriodStartTime = date('H:i', $startTime + ($period - 1) * $periodDuration);
                                $currentPeriodEndTime = date('H:i', $startTime + $period * $periodDuration);
                            @endphp
                            <tr>
                                <td>{{ $day }}</td>
                                <td>Period {{ $period }}</td>
                                <td>{{ $currentPeriodStartTime }} - {{ $currentPeriodEndTime }}</td>
                                <td>{{ $data['duration'] }} minutes</td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
            </tbody> -->
            <!-- <tbody>
    @foreach ($daysOfWeek as $dayIndex => $day)
        @if ($dayIndex < $data['days'])
            <tr class="day-row">
                <td colspan="4" class="day-header">{{ $day }}</td>
            </tr>
            @for ($period = 1; $period <= $totalPeriods; $period++)
                @php
                    $currentStart = date('H:i', $startTime + ($period - 1) * $periodDuration);
                    $currentEnd = date('H:i', $startTime + $period * $periodDuration);
                @endphp
                <tr>
                    <td>{{ $day }}</td>
                    <td>Period {{ $period }}</td>
                    <td>{{ $currentStart }} - {{ $currentEnd }}</td>
                    <td>{{ $data['duration'] }} minutes</td>
                </tr>
                @if ($period == 2 && $dayIndex == 0)
                    <tr>
                        <td colspan="4" class="break-row">Break</td>
                    </tr>
                @endif
            @endfor
        @endif
    @endforeach
</tbody> -->

<!-- <tbody>
    @foreach ($daysOfWeek as $dayIndex => $day)
        @if ($dayIndex < $data['days'])
           
            <tr>
                <td colspan="4" class="day-header">{{ $day }}</td>
            </tr>
            @for ($period = 1; $period <= $totalPeriods; $period++)
                @php
                    $currentStart = date('H:i', $startTime + ($period - 1) * $periodDuration);
                    $currentEnd = date('H:i', $startTime + $period * $periodDuration);
                @endphp
               
                <tr>
                    <td>{{ $day }}</td>
                    <td>Period {{ $period }}</td>
                    <td>{{ $currentStart }} - {{ $currentEnd }}</td>
                    <td>{{ $data['duration'] }} minutes</td>
                </tr>
            @endfor
        @endif
    @endforeach
</tbody>


        </table>
    </div>
</div> -->
<div class="container mt-5">
    <h1 class="mb-4">School Timetable Overview</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-warning">Logout</button>
    </form>

    <!-- <button onclick="window.history.back();" class="btn btn-secondary mt-3">Back</button> -->
    <a href="{{ route('timetable') }}" class="btn btn-primary mb-4">Back to Manage Timetable</a>


    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Period</th>
                    <th>Time</th>
                    <th>Duration (minutes)</th>
                </tr>
            </thead>

            <tbody>
    @foreach ($daysOfWeek as $dayIndex => $day)
        @if ($dayIndex < $data['days'])
           
            <tr>
                <td colspan="4" class="day-header">{{ $day }}</td>
            </tr>
            @for ($period = 1; $period <= $totalPeriods; $period++)
                @php
                    $currentStart = date('H:i', $startTime + ($period - 1) * $periodDuration);
                    $currentEnd = date('H:i', $startTime + $period * $periodDuration);
                @endphp
               
                <tr>
                    <td>{{ $day }}</td>
                    <td>Period {{ $period }}</td>
                    <td>{{ $currentStart }} - {{ $currentEnd }}</td>
                    <td>{{ $data['duration'] }} minutes</td>
                </tr>
            @endfor
        @endif
    @endforeach
</tbody>
            
            <!-- <tbody>
                @foreach ($daysOfWeek as $dayIndex => $day)
                    @if ($dayIndex < $data['days'])
                        <tr>
                            <td colspan="4" class="day-header">{{ $day }}</td>
                        </tr>
                        @for ($period = 1; $period <= $totalPeriods; $period++)
                            @php
                                $currentStart = date('H:i', $startTime + ($period - 1) * $periodDuration);
                                $currentEnd = date('H:i', $startTime + $period * $periodDuration);
                            @endphp
                            <tr>
                                <td>{{ $day }}</td>
                                <td>Period {{ $period }}</td>
                                <td>{{ $currentStart }} - {{ $currentEnd }}</td>
                                <td>{{ $data['duration'] }} minutes</td>
                            </tr>
                        @endfor
                    @endif
                @endforeach
            </tbody> -->
        </table>
    </div>
</div>


@endsection


