<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\PositionApplication;
use Illuminate\Http\Request;

class MyPositionApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->positionApplications()->with(['position'=> fn($query)=> $query->withCount('positionApplications')
            ->withAvg('positionApplications', 'expected_salary'),
        'position.employer'])->latest()->get();
        return view('my_position_application.index', compact('applications'));
    }

    public function destroy(PositionApplication $myPositionApplication)
    {
        $myPositionApplication->delete();

        return redirect()->back()->with(
            'success', 'Position application removed.'
        );
    }
}
