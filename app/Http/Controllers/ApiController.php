<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\theoryresponse;
use App\Models\practicalresponse;


class ApiController extends Controller
{
    public function studentLogin(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'prn' => 'required',
            'dob' => 'required',
        ]);



        $credentials = $request->only('prn', 'dob');
        $student = Students::where('sprn', $credentials['prn'])
            ->where('sdob', $credentials['dob'])
            ->first();

        // Check if student not found or invalid credentials
        if (!$student) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            return response()->json(['authenticated' => $student]);

        }

    }

    public function responseWithAllQuestion(Request $request)
    {
        $request->validate([
            'prn' => 'required',
            'dob' => 'required',
        ]);
    
        $credentials = $request->only('prn', 'dob');
        
        $student = Students::where('sprn', $credentials['prn'])
            ->where('sdob', $credentials['dob'])
            
            ->first();

        if (!$student) {
            return response()->json(['error' => 'not available'], 404);
        } else {
            // Retrieve teachers and subjects related to the student's department, class, and division
            // $teachers = $student->department->teachers;
            // $subjects = $student->class->subjects;
    
            // Fetch practical and theory questions based on their type (0 for theory, 1 for practical)
            $practicalQuestions = Question::where('type', 1)->get();
            $theoryQuestions = Question::where('type', 0)->get();
    
            return response()->json([
                'student' => $student,
                // 'teachers' => $teachers,
                // 'subjects' => $subjects,
                'practical_questions' => $practicalQuestions,
                'theory_questions' => $theoryQuestions,
            ], 200);
        }
    }

public function storeResponse(Request $request)
{
    $data = $request->validate([
        'prn' => 'required',
        'roll' => 'required',
        'name' => 'nullable',
        'sem' => 'nullable',
        'department_name' => 'nullable',
        'class' => 'nullable',
        'div' => 'nullable',
        'subject' => 'nullable',
        'sub_teacher' => 'nullable',
        'Q1' => 'nullable',
        'Q2' => 'nullable',
        'Q3' => 'nullable',
        'Q4' => 'nullable',
        'Q5' => 'nullable',
        'Q6' => 'nullable',
        'Q7' => 'nullable',
        'Q8' => 'nullable',
        'Q9' => 'nullable',
        'Q10' => 'nullable',
        'feedback_count' => 'nullable',
         // Assuming this attribute specifies type (0 for theory, 1 for practical)
    ]);
   $type=$request->input('type');
   
    if ($type == 0) {
        $theoryResponse = new theoryresponse($data);
        $theoryResponse->save();
        return response()->json(['message' => 'Response stored successfully'], 200);
    } elseif ($type == 1) {
        
        $practicalResponse = new practicalresponse($data);
        $practicalResponse->save();
        return response()->json(['message' => 'Response stored successfully'], 200);
    }

    
}

    
    


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 // Token expiry time in seconds
        ]);
    }
}
