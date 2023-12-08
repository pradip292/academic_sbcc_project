<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\Auth;

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
        }
        else
        {
            return response()->json(['authenticated' => $student]);

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
