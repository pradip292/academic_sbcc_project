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
    public function create()
    {
    $years = Year::pluck('year', 'year');
    $departments = Department::pluck('dept_name', 'dept_name');
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
    Teachers::create($validatedData);
    return redirect()->route('add-teacher')->with('success', 'Teacher inserted successfully');
   // return redirect('/create-class')->with('success', 'Class created successfully.');
    }


    public function index()
   {
    $teachers = teachers::all(); // Fetch all classes from the "teachers" table.

    return view('teachers.view-teacher', compact('teachers'));
    }

    public function destroy(Teachers $teacher)
        {
            //dd($department);
            $teacher->delete();
            return redirect()->route('view-teacher')->with('success', 'Teacher deleted successfully');
        }
//
}
