<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Department; // Import the Department model at the top


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

            Department::create($validatedData);
            return redirect()->route('add-department')->with('success', 'Department added successfully');
        }


        public function index()
        {

            $departments = Department::all(); 
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
            //dd($department);
            $department->delete();
            return redirect()->route('view-department')->with('success', 'Department deleted successfully');
        }



}
