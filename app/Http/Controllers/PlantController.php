<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;

// Demonstrating Unit X: Controllers & Eloquent CRUD (MongoDB)
class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::all(); 
        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'sunlight_requirement' => 'required|string',
            'water_frequency' => 'required|string',
        ]);

        Plant::create($validated);

        return redirect()->route('plants.index')->with('success', 'Plant created successfully.');
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:255',
            'sunlight_requirement' => 'required|string',
            'water_frequency' => 'required|string',
        ]);

        $plant->update($validated);

        return redirect()->route('plants.index')->with('success', 'Plant updated successfully.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect()->route('plants.index')->with('success', 'Plant deleted successfully.');
    }
}
