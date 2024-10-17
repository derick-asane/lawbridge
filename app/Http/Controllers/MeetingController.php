<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\User;

use Auth;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth()->user()->role == 'client'){
            $meetings = Meeting::where('client_id', Auth()->user()->id)->get();
            return view('client.mymeeting', compact('meetings') );

        }else{
            // Fetch all meetings with client information only
        $meetings = Meeting::with('client')->get();

        return view('admin.meeting', compact('meetings') );
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role',  'client')->get();
        return view('admin.meetingform', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Validate request
        $request->validate([
            'client_id' => 'required|exists:users,id',
            'subject' => 'required',
            'scheduled_at' => 'required|date',
        ]);

        // Generate a unique meeting ID
        $meetingId = 'meeting_' . uniqid();

        // Store meeting details in the database
        $meeting = Meeting::create([
            'client_id' => $request->client_id,
            'meeting_id' => $meetingId,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return view('admin.meeting')->with('success', 'Consultation scheduled successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        //
    }

    public function joinMeeting($meetingId)
    {
        // Find the meeting by its ID
        $meeting = Meeting::where('meeting_id', $meetingId)->firstOrFail();

        // Jitsi meeting URL
        $jitsiUrl = "https://meet.jit.si/$meetingId";

        if(Auth()->user()  && Auth()->user()->role == 'client'){
            return view('client.joinmeeting', ['jitsiUrl' => $jitsiUrl]);
        }else{
            return view('admin.joinmeeting', ['jitsiUrl' => $jitsiUrl]);
        }   

        
    }
}
