<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PositionApplicationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create(Position $position)
    {
        Gate::authorize("apply", $position);
        return view('position_application.create', ["position" => $position]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Position $position)
    {
        $validateData = $request->validate([
            'expected_salary' => 'required|min:1|max:350000',
            'cv'=> 'required|file|mimes:pdf|max:2048',
        ]);

        $file = $request->file('cv');
        $path =$file->store('cvs', 'private');

        $position->positionApplications()->create([
            'user_id' => auth()->user()->id,
            'expected_salary' => $validateData['expected_salary'],
            'cv_path' => $path
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
