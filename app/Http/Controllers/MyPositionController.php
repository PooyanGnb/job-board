<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class MyPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = auth()->user()->employer->positions()->latest()
            ->with(['employer', 'positionApplications', 'positionApplications.user'])
            ->get();
        return view('my_position.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_position.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:5000',
            'description' => 'required|string',
            'experience' => 'required|in:'.implode(',' , Position::$experience),
            'category' => 'required|in:'.implode(',' , Position::$category),
        ]);

        auth()->user()->employer->positions()->create($validated);

        return redirect()->route('my-positions.index')->with('success','Position created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
