<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DpsController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function store(Request $request)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function destroy($id)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function increment(Request $request)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function decrement(Request $request)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function history()
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function details($dps_id)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }

    public function installments($dps_id)
    {
        return response()->json(['message' => 'DPS module not available'], 404);
    }
}
