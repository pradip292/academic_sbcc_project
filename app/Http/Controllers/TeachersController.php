<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Year;                    // Import the Year model
use App\Models\Department;              // Import the Department model
use App\Models\classes;          // import classes (div)
use App\Models\Teachers; 

class TeachersController extends Controller
{
    // 
    public function create(Teachers $teacher)
    {
    $years = Year::pluck('year', 'year');
    $departments = Department::where('deactivated', 1)->pluck('dept_name', 'dept_name');
    $classes = Classes::pluck('division','division');

    return view('teachers.create-teacher', compact( 'departments','years','classes'));
    }

    public function store(Request $request)
    {
    // Validate the form data
    $validatedData = $request->validate([
        
        'teacher' => 'required|string|max:255',
        'division' => 'required|exists:classes,division',
        'year' => 'required|exists:years,year', // Check if the selected year exists in the "years" table.
        'dept_name' => 'required|exists:departments,dept_name', // Check if the selected department exists in the "departments" table.
    ]);
    $existingTeacher = Teachers::where([
    'teacher' => $validatedData['teacher'],
    'division'=> $validatedData['division'],
    'year' => $validatedData['year'],
    'dept_name' => $validatedData['dept_name']

    ])->first();
    

    if ($existingTeacher) {
        if ($existingTeacher->deactivated === 0)
        {
        $existingTeacher->deactivated = 1;
        $existingTeacher->save();
    } 
    }
    else {
        // If the teacher doesn't exist, create a new record
        Teachers::create($validatedData);
    }

    return redirect()->route('add-teacher')->with('success', 'Teacher inserted successfully');
}


    public function index()
    {
        $teachers = Teachers::where('deactivated', 1)->get();

        return view('teachers.view-teacher', compact('teachers'));
    }


    public function destroy(Teachers $teacher)
    {
       // $teacher->update(['deactivated' => 0]);
        $teacher->deactivated = 0;
        $teacher->save();
        return redirect()->route('view-teacher')->with('success', 'Teacher deactivated successfully');
    }
    



   


//
}
