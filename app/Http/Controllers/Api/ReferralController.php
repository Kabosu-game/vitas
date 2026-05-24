<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        return response()->json(['message' => 'Referral module not available'], 404);
    }

    public function directReferrals()
    {
        return response()->json(['message' => 'Referral module not available'], 404);
    }

    public function referralTree()
    {
        return response()->json(['message' => 'Referral module not available'], 404);
    }
}
