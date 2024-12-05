<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timetable;

class TimetableController extends Controller
{
    // Method to display the manage timetable view
    public function show()
{
    $data = [
        'class' => 'Class 1',
        'days' => 5,
        'periods' => 6,
        'time' => '09:00',
        'duration' => 45,
        'breaks' => 2,
        'break_1' => '10:30',
        'break_2' => '12:30',
    ];
    return view('timetable', ['data' => $data]);
    $timetables = Timetable::all(); 
    return view('timetable', compact('timetables'));
   

}





    // Method to handle timetable creation
    public function create(Request $request)
    {
        $this->validateTimetable($request);

        // Create timetable in the database
        Timetable::create($request->all());
        
        return back()->with('success', 'Timetable created successfully');
    }

    // Method to manage timetable (form submission handling)
    public function manage(Request $request)
    {
        $request->validate([
            'class' => 'required|integer|between:1,7',
        ]);

        // Handle the logic for managing the timetable (e.g., updating or processing data)
        return back()->with('success', 'Timetable managed successfully.');
    }

    // Method to update an existing timetable entry
    public function update(Request $request, $id)
    {
        $request->validate([
            'class' => 'required|integer|between:1,7',
            'days' => 'required|integer',
            'periods' => 'required|integer',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer',
            'breaks' => 'required|integer|between:1,3',
        ]);
        // {{ $data['class'] ?? 'Not Available' }}

        $timetable = Timetable::findOrFail($id);
        $timetable->update($request->all());

        return back()->with('success', 'Timetable updated successfully');
    }

    // Method to handle form submission for creating or updating timetables
    public function store(Request $request)
    {
        $request->validate([
            'class' => 'required|integer|between:1,7',
            'days' => 'required|integer|min:1',
            'periods' => 'required|integer|min:1',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'breaks' => 'required|integer|between:1,3', // Validation for 'breaks'
        ]);
    
        // Create or update timetable logic
        $timetable = new Timetable();
        $timetable->class = $request->input('class');
        $timetable->days = $request->input('days');
        $timetable->periods = $request->input('periods');
        $timetable->time = $request->input('time');
        $timetable->duration = $request->input('duration');
        $timetable->breaks = $request->input('breaks');
        $timetable->save();
    
        return redirect()->route('manage-timetable')->with('success', 'Timetable created successfully.');

       
        dd($request->all());
    }

   
    private function validateTimetable(Request $request)
    {
        $request->validate([
            'class' => 'required|integer|between:1,7',
            'days' => 'required|integer|min:1',
            'periods' => 'required|integer|min:1',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'breaks' => 'required|integer|between:1,3', // Ensure breaks validation
        ]);
    }

    public function showTimetable(Request $request)
{
    $data = $request->all(); // Get form data, including break times
    return view('timetable', compact('data'));
    // return view('timetable', compact('data'));
}

public function view()
    {
        // Fetch data or pass data to the view as needed
        // For example, you could fetch all timetables from the database
        $timetables = Timetable::all(); // Assuming you have a Timetable model

        return view('timetable.view', compact('timetables'));
    }

    public function index()
    {
        // Sample data for demonstration
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $totalPeriods = 6;
        $startTime = strtotime('08:00');  
        $periodDuration = 60;  
        $data = [
            'days' => 5,  
            'duration' => $periodDuration,
        ];

        return view('timetable', compact('daysOfWeek', 'totalPeriods', 'startTime', 'periodDuration', 'data'));
    }
}
