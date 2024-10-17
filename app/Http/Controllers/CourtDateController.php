<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\CourtDate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CourtDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $courtdates = CourtDate::with('court', 'user')->get();
        return view('admin.courtdate', compact('courtdates'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role',  'client')->get();
        $courts = Court::all();
        return view('admin.courtedateform', compact(['users', 'courts']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate =  $request->validate([
            'userId' => 'required',
            'courtId' => 'required',
            'description' => 'required',
            'datetime' => 'required'
        ]);

        $courtdate = CourtDate::create([
            'user_id' => $request->input('userId'),
            'court_id' => $request->input('courtId'),
            'description' => $request->input('description'),
            'datetime' => $request->input('datetime'),

        ]);

        return redirect()->route('admin.courtdate')->with('create-success', 'courtdate created successfully');      

    }

    /**
     * Display the specified resource.
     */
    public function show(CourtDate $courtDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $courtdate = CourtDate::findOrFail($id);
        $users = User::where('role',  'client')->get();
        $courts = Court::all();
        return view("admin.courtedateeditform", compact('courtdate', 'users', 'courts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'userId' => 'required',
            'courtId' => 'required',
            'description' => 'required',
            'datetime' => 'required'
        ]);
        
        $courtdate = CourtDate::findOrFail($id);
        $courtdate->user_id = $validatedData['userId'];
        $courtdate->court_id = $validatedData['courtId']; // Corrected assignment to 'courtId'
        $courtdate->description = $validatedData['description'];
        $courtdate->datetime = $validatedData['datetime'];
    
        // Save the updated CourtDate instance
        $courtdate->save();
    
        return redirect()->route('admin.courtdate')->with('edit-success', 'Courtdate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourtDate $courtDate)
    {
        //
    }

    public function getUserCourtDate()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Retrieve only the CourtDate records associated with the logged-in user
        $courtdates = CourtDate::with('court', 'user')
            ->where('user_id', $user->id) // Assuming 'user_id' is the foreign key in the CourtDate model
            ->get();

        // Pass the filtered courtdates to the view
        return view('client.courtdate', compact('courtdates'));
    }
}
