<?php

namespace App\Http\Controllers;

use App\Models\Mycase;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\file;


class MycaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user_id = Auth::user()->id;
        $mycases= Mycase::where('user_id', $user_id)->get();
        return view('client.mycase', compact('mycases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.mycaseform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 

        ]);

        $user_id = Auth::user()->id;
        $mycase= Mycase::create([
            'user_id' =>  $user_id,
            'subject' => $request->input('subject'),
            'type' => $request->input('type'),
            'description' => $request->input('description'),
        ]);

        return view('client.mycase');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mycase $mycase)
    {
        // Get the authenticated user
        
        $case = $mycase::findOrFail($mycase->id);
        $files = file::where('mycase_id', $case->id)->get();
        
        return view('client.mycasedetail', compact('mycase', 'files'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mycase $mycase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mycase $mycase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mycase $mycase)
    {
        //
    }
}
