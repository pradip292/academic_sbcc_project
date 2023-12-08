<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Department; // Import the Department model at the top
use App\Models\classes; // Import the Class model
use App\Models\Teachers;

class DepartmentController extends Controller
{
    //
      
        public function create()
        {
            return view('departments.create');
        }
        

        public function store(Request $request)
            {
                $validatedData = $request->validate([
                    'dept_name' => 'required|max:255',
                ]);

                $existingDepartment = Department::where('dept_name', $validatedData['dept_name'])->first();

                if ($existingDepartment) {
                    // If the department already exists and is deactivated, set "deactivated" to 1.
                    if ($existingDepartment->deactivated == 0) {
                        $existingDepartment->deactivated = 1;
                        $existingDepartment->save();
                    }
                } else {
                    // Create a new department if it doesn't exist.
                    Department::create($validatedData);
                }

                return redirect()->route('add-department')->with('success', 'Department added successfully');
            }



        public function index()
        {
            $departments = Department::where('deactivated', 1)->get(); // Only retrieve active departments
            return view('departments.index', ['departments' => $departments]);
        }
        


        public function edit(Department $department)
        {
           // dd($department);
            return view('departments.edit', ['department' => $department]);
        }

        
        public function update(Request $request, Department $department)
            {
                
                $department->update([
                    'dept_name' => $request->input('dept_name'),
                ]);
                return redirect()->route('view-department')->with('success', 'Department updated successfully');
            }

                
        public function destroy(Department $department)
                {
                    
                    $department->deactivated = 0; // Set "deactivated" to 0
                    classes::where('dept_name', $department->dept_name)->update(['deactivated' => 0]);

                    // Find and update related records in the Teacher table
                    Teachers::where('dept_name', $department->dept_name)->update(['deactivated' => 0]);
                
                    // Deactivate the department
                    $department->save(); // Save the changes to the database
                
                    return redirect()->route('view-department')->with('success', 'Department deactivated successfully');
                }


                public function getData()
                {
                     $departments = Department::with('years.divisions')->get();

                    return view('your.view', compact('departments'));
                }
              
                


            }
            
            



