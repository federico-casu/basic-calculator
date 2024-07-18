<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Controller that gets data from request and returns the results
class ComputingController extends Controller
{
    /* 
        @input: operations
        @output: results
        @description: function that gets operations and returns their results
    */
    public function calculate(Request $request) {

        $results = [
            "sum" => $request->sum["n1"] + $request->sum["n2"], 
            "sub" => $request->sub["n1"] - $request->sub["n2"], 
            "multiply" => $request->multiply["n1"] * $request->multiply["n2"], 
            "divide" => validateDivision($request->divide["n1"], $request->divide["n2"])
        ];

        return response()->json([
            'success' => true,
            'results' => $results
        ]);
    }
}

function validateDivision($n1, $n2) {
    if ($n1 == 0 && $n2 == 0) {
        return 'imp';
    } elseif ($n2 == 0) {
        return 'inf';
    } else {
        return $n1 / $n2;
    }
}
