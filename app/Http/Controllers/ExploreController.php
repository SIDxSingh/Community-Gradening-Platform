<?php

namespace App\Http\Controllers;

use App\Models\Garden;

class ExploreController extends Controller
{
    public function index()
    {
        // Only show gardens that have an uploaded image and are approved — the "feed"
        $gardens = Garden::whereNotNull('image')
                         ->where('status', 'approved')
                         ->with(['comments', 'likes', 'user'])
                         ->latest()
                         ->get();

        return view('explore', compact('gardens'));
    }
}
