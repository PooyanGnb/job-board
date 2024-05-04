<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Position $position)
    {
        return view('position_application.create', ["position" => $position]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Position $position)
    {
        $position->positionApplications()->create([
            'user_id' => auth()->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:350000',
            ])
        ]);

        return redirect()->route('positions.show', $position)->with('success', 'Position application submitted successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
