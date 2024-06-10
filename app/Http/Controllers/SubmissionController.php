<?php

namespace App\Http\Controllers;

use App\Jobs\SaveSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubmissionController extends Controller
{
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        SaveSubmission::dispatch($request->only('name', 'email', 'message'));

        return response()->json(['message' => 'Submission received. It will be processed shortly.'], 200);
    }
}

