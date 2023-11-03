<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\FacultyImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\ExcelFile;
use App\Models\Faculty;


class FacultyController extends Controller
{
    public function AddFaculty()
    {
        return view('faculty.add_faculty');
    }
    public function UploadFaculty(Request $request)
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
                Faculty::create([
                    'fname' => $row[0],
                    'fdepart' => $row[1],
                    'fmail' => $row[2],

                ]);
        
            }
        }
        if (in_array($extension, ['xls', 'xlsx', 'csv'])) {

            Excel::import(new FacultyImport, $file);
            //Default Excel Class 
        }
        return redirect()->back()->with('Success', 'File uploaded and data inserted.');
    }


    public function ViewFaculty()
    {
        $faculty = Faculty::where('type',1)->get();

        return view('faculty.view_faculty', compact('faculty'));
    }

}