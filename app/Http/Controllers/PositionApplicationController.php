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
    public function store(Request $request)
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
