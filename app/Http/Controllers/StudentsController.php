<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\StudentsImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\ExcelFile;
use App\Models\Students;


class StudentsController extends Controller
{
    public function AddStudents()
    {
        return view('Students.add_students');
    }
    public function UploadStudents(Request $request)
    {
        $file = $request->file('file');

        $extension = $file->getClientOriginalExtension();
        $validatedData = $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);
        if ($extension === '55') {

            $data = array_map('str_getcsv', file($file));

            foreach ($data as $index => $row) {

                if ($index === 0) {
                    continue;
                }
                Students::create([
                    'sname' => $row[0],
                    'sprn' => $row[1],
                    'sdepart' => $row[2],
                    'sclass' => $row[3],
                    'sdiv' => $row[4],
                    'semail' => $row[5],
                    'type' => 1,
                ]);
        
            }
        }
        if (in_array($extension, ['xls', 'xlsx', 'csv'])) {

            Excel::import(new StudentsImport, $file);
            //Default Excel Class 
        }
        return redirect()->back()->with('success', 'File uploaded and data inserted.');
    }


    public function ViewStudents()
    {
        $students = Students::where('type',1)->get();

        return view('Students.view_students', compact('students'));
    }

}