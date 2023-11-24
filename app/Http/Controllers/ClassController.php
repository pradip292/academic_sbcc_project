<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Year;                    // Import the Year model
use App\Models\Department;              // Import the Department model
use App\Models\classes; 
use App\Models\Teachers; 
class ClassController extends Controller
{
    //
    public function create()
    {
        $years = Year::pluck('year', 'year');
        $departments = Department::where('deactivated', 1)->pluck('dept_name', 'dept_name');
        
        return view('class.create-class', compact('years', 'departments'));
    }
    
    
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'division' => 'required|string|max:255',
            'year' => 'required|exists:years,year',
            'dept_name' => 'required|exists:departments,dept_name',
           
        ]);

        // Check if the record with the same attributes was previously deleted
        $existingRecord = classes::where([
            'division' => $validatedData['division'],
            'year' => $validatedData['year'],
            'dept_name' => $validatedData['dept_name'],
           // 'deactivated' => 0, // Assuming 1 represents a deactivated record
        ])->first();

        if ($existingRecord){
        if ($existingRecord->deactivated === 0) {
            // If a deactivated record exists, and 'deactivated' is not NULL, update it by setting 'deactivated' to 1
            $existingRecord->deactivated = 1;
            $existingRecord->save();
        }
        }
        
        else {
            // If no deactivated record exists, create a new one
            classes::create($validatedData);
        }
       

        return redirect()->route('add-class')->with('success', 'Class created or reactivated successfully');
    }



    public function index()
   {
    $classes = classes::all(); // Fetch all classes from the "classes" table.

    return view('class.view-classes', compact('classes'));
    }

    public function deactivate(classes $class)
    {
        //$class->update(['deactivated' => 0]);
        $class->deactivated = 0;
        Teachers::where('dept_name', $class->division)->update(['deactivated' => 0]);

        $class->save();

        return redirect()->route('view-classes')->with('success', 'Class deactivated successfully');
    }




}
