<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Year;                    // Import the Year model
use App\Models\Department;              // Import the Department model
use App\Models\classes; 

class ClassController extends Controller
{
    //
    public function create()
    {
    $years = Year::pluck('year', 'year');
    $departments = Department::pluck('dept_name', 'dept_name');

    return view('class.create-class', compact('years', 'departments'));
    }
    public function store(Request $request)
    {
    // Validate the form data
    $validatedData = $request->validate([
        'division' => 'required|string|max:255',
        'year' => 'required|exists:years,year', // Check if the selected year exists in the "years" table.
        'dept_name' => 'required|exists:departments,dept_name', // Check if the selected department exists in the "departments" table.
    ]);
    classes::create($validatedData);
    return redirect()->route('add-class')->with('success', 'Class created successfully');
   // return redirect('/create-class')->with('success', 'Class created successfully.');
    }


    public function index()
   {
    $classes = classes::all(); // Fetch all classes from the "classes" table.

    return view('class.view-classes', compact('classes'));
    }




}
