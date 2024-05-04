<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class MyPositionApplicationController extends Controller
{
    public function index()
    {
        $applications = auth()->user()->positionApplications()->with('position.employer')->latest()->get();
        return view('my_position_application.index', compact('applications'));
    }

    public function destroy(string $id)
    {
        //
    }
}
