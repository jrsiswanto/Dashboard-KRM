<?php

namespace App\Http\Controllers;

use App\Models\ProgramContent;
use Illuminate\Http\Request;

class ProgramContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programscontents = ProgramContent::with('program')->whereHas('program', function ($query) {
            $query->where('status', true);
        })->get();

        return view('program.index', compact('programscontents'));
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
    public function show(ProgramContent $programContent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramContent $programContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProgramContent $programContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramContent $programContent)
    {
        //
    }
}
