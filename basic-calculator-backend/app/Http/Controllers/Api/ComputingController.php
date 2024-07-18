<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Controller that gets data from request and returns the results
class ComputingController extends Controller
{
    public function calculate(Request $request) {
        return response()->json([
            'success' => true
        ]);
    }
}
