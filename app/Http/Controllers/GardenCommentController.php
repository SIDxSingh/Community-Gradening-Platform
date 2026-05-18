<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use App\Models\GardenComment;

class GardenCommentController extends Controller
{
    public function store(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'author_name' => 'required|string|max:100',
            'body'        => 'required|string|max:1000',
        ]);

        $validated['garden_id'] = $garden->id;

        GardenComment::create($validated);

        return back()->with('success', 'Comment posted!');
    }
}
