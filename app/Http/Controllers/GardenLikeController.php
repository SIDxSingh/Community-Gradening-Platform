<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use App\Models\GardenLike;

class GardenLikeController extends Controller
{
    public function toggle(Request $request, Garden $garden)
    {
        $sessionId = $request->session()->getId();

        $existing = GardenLike::where('garden_id', $garden->id)
                               ->where('session_id', $sessionId)
                               ->first();

        if ($existing) {
            $existing->delete();
            $liked = false;
        } else {
            GardenLike::create([
                'garden_id'  => $garden->id,
                'session_id' => $sessionId,
            ]);
            $liked = true;
        }

        return response()->json([
            'liked' => $liked,
            'count' => $garden->likes()->count(),
        ]);
    }
}
