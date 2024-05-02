<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $positions = Position::query();

        $positions->when(request('search'), function($query) {
            $query->where(function($query) {
                $query->where('title', 'like', '%'. request('search') . '%')
                ->orWhere('description', 'LIKE', '%'. request('search') . '%');
            });
        })->when(request('min_salary'), function($query) {
            $query->where('salary', '>=', request('min_salary'));
        })->when(request('max_salary'), function($query) {
            $query->where('salary', '<=', request('max_salary'));
        })->when(request('experience'), function($query) {
            $query->where('experience', request('experience'));
        });


        return view("position.index", ['positions' => $positions->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        return view("position.show", compact("position"));
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
