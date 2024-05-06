<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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
    public function store(PositionRequest $request)
    {

        auth()->user()->employer->positions()->create($request->validated());

        return redirect()->route('my-positions.index')->with('success','Position created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $myPosition)
    {
        return view('my_position.edit', ['position' => $myPosition]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionRequest $request, Position $myPosition)
    {
        $myPosition->update($request->validated());

        return redirect()->route('my-positions.index')->with('success', 'Position updated successfuly.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
