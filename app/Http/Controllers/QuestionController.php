<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\QuestionImport;
use App\Imports\QuestionImportStudentPractical;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Facades\ExcelFile;
use App\Models\Question;


class QuestionController extends Controller
{
    public function AddQuestion()
    {
        return view('Question.add_question');
    }
    public function UploadQuestionStudentTheory(Request $request)
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
                Question::create([
                    'qname' => $row[0],

                    'qoption1' => $row[1],
                    'qoption2' => $row[2],
                    'qoption3' => $row[3],
                    'qoption4' => $row[4],
                    'type' => 1,
                ]);
            }
        }
        if (in_array($extension, ['xls', 'xlsx', 'csv'])) {

            Excel::import(new QuestionImport, $file);
            //Default Excel Class 
        }
        return redirect()->back()->with('success', 'File uploaded and data inserted.');
    }

    public function UploadQuestionStudentPractical(Request $request)
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
                Question::create([

                    'qname' => $row[0],
                    'qoption1' => $row[1],
                    'qoption2' => $row[2],
                    'qoption3' => $row[3],
                    'qoption4' => $row[4],
                    'type' => 2,
                ]);
            }
        }
        if (in_array($extension, ['xls', 'xlsx', 'csv'])) {

            Excel::import(new QuestionImportStudentPractical, $file);
            //Default Excel Class 
        }
        return redirect()->back()->with('success', 'File uploaded and data inserted.');

    }

    public function ViewQuestionTheory()
    {
        $question = Question::where('type',1)->get();

        return view('question.view_question_theory', compact('question'));
    }

    public function ViewQuestionPractical()
    {
        $question = Question::where('type',2)->get();

        return view('question.view_question_practical', compact('question'));
    }
}