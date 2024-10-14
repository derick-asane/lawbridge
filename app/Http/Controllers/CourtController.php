<?php

namespace App\Http\Controllers;

use App\Models\court;
use Illuminate\Http\Request;

class CourtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courts = court::all();
        return view('admin.court', compact('courts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courtform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =  $request->validate([
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'location' => 'required|string'
        ]);
        $court = court::create([
            'name' => $request->input('name'),
            'phone' =>  $request->input('phone'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('admin.court')->with('court created successfully');      

    }

    /**
     * Display the specified resource.
     */
    public function show(court $court)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(court $court)
    {
        return view('admin.courteditform', compact('court'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, court $court)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(court $court)
    {
        //
    }
}
