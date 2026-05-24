<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function payNow(Request $request)
    {
        return response()->json(['message' => 'Bill payment module not available'], 404);
    }

    public function history()
    {
        return response()->json(['message' => 'Bill payment module not available'], 404);
    }

    public function getServices($country, $type)
    {
        return response()->json(['message' => 'Bill payment module not available'], 404);
    }
}
