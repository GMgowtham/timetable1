<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;
use App\Models\Timetable;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Show login page
    public function showLogin() {
        return view('login');
    }

    public function index()
    {
        // Sample data for demonstration
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $totalPeriods = 6;
        $startTime = strtotime('08:00');  // Starting time for the first period
        $periodDuration = 60;  // Duration of each period in minutes
        $data = [
            'days' => 5,  // Number of days to show in the timetable
            'duration' => $periodDuration,
        ];

        return view('timetable', compact('daysOfWeek', 'totalPeriods', 'startTime', 'periodDuration', 'data'));
    }

    

    // Show register page
    public function showRegister() {
        return view('register');
    }

    // Handle user registration
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful!');
    }

    // Show timetable page
    public function show() {
       
        // $timetableData = [
        //     'class' => 1,
        //     'days' => 5,
        //     'periods' => 6,
        //     'start_time' => '08:00',
        //     'duration' => 45,
        //     'breaks' => [
        //         'break_1' => '10:15',
        //         'break_2' => '12:00',
        //     ]
        // ];
    
        // return view('timetable', ['data' => $timetableData]);

        $data = [
            'days' => 5,           // Number of school days (e.g., 5 for Monday to Friday)
            'periods' => 6,        // Number of periods per day
            'time' => '08:00',     // Start time in 'HH:MM' format
            'duration' => 45,      // Duration of each period in minutes
        ];
    
        return view('timetable', ['data' => $data]);
        // return view('timetable.show');
        //  return view('timetable');
    }

    // Manage timetable creation
    public function manage(Request $request) {
        $request->validate([
            'class' => 'required|string|max:255',
            'days' => 'required|integer',
            'periods' => 'required|integer',
            'time' => 'required',
            'duration' => 'required|integer',
        ]);

        Timetable::create($request->all());
        return view('manage-timetable');

        return redirect()->back()->with('success', 'Timetable created successfully!');
    }

    // Update timetable
    public function update(Request $request, $id) {
        $validated = $request->validate([
            'class' => 'required|string|max:255',
            'days' => 'required|integer',
            'periods' => 'required|integer',
            'time' => 'required',
            'duration' => 'required|integer',
        ]);

        $timetable = Timetable::findOrFail($id);
        $timetable->update($validated);

        return redirect()->back()->with('success', 'Timetable updated successfully.');
    }

    public function view()
    {
        // Fetch data or pass data to the view as needed
        // For example, you could fetch all timetables from the database
        $timetables = Timetable::all(); // Assuming you have a Timetable model

        return view('timetable.view', compact('timetables'));
    }


}
