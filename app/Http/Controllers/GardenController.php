<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use Illuminate\Support\Facades\Auth;

class GardenController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            $gardens = Garden::with('user')->where('status', 'approved')
                             ->orWhere('user_id', Auth::id())
                             ->get();
        } else {
            $gardens = Garden::with('user')->where('status', 'approved')->get();
        }
        return view('gardens.index', compact('gardens'));
    }

    
    public function create()
    {
        return view('gardens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'size'        => 'nullable|string',
            'location'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gardens', 'public');
        }

        // Set status based on role
        $validated['status'] = Auth::check() && Auth::user()->is_admin ? 'approved' : 'pending';
        $validated['user_id'] = Auth::id();

        Garden::create($validated);

        $msg = $validated['status'] === 'approved' 
            ? 'Garden created successfully.' 
            : 'Garden submitted for approval!';

        return redirect()->route('gardens.index')->with('success', $msg);
    }

    /**
     * Display the specified garden.
     */
    public function show(Garden $garden) // Demonstrating Unit X: Implicit Route Model Binding
    {
        $garden->load(['comments', 'likes', 'user']);
        return view('gardens.show', compact('garden'));
    }

    /**
     * Show the form for editing the specified garden.
     */
    public function edit(Garden $garden)
    {
        return view('gardens.edit', compact('garden'));
    }

    /**
     * Update the specified garden in storage.
     */
    public function update(Request $request, Garden $garden)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'size'        => 'nullable|string',
            'location'    => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('gardens', 'public');
        }

        $garden->update($validated); // Demonstrating Unit X: Eloquent ORM (Updating)

        return redirect()->route('gardens.index')->with('success', 'Garden updated successfully.');
    }

    /**
     * Remove the specified garden from storage.
     */
    public function destroy(Garden $garden)
    {
        $garden->delete(); // Demonstrating Unit X: Eloquent ORM (Deleting)

        return redirect()->route('gardens.index')->with('success', 'Garden deleted successfully.');
    }
}
