<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FdrController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function destroy($id)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function increment(Request $request)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function decrement(Request $request)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function history()
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function details($fdr_id)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }

    public function installments($fdr_id)
    {
        return response()->json(['message' => 'FDR module not available'], 404);
    }
}
