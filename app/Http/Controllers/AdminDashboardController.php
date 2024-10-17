<?php

namespace App\Http\Controllers;

use App\Models\mycase;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\file;


class AdminDashboardController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role', 'client')->get();

        return view('admin.users', compact('users'));
    }

    public function getCases()
    {
        $cases = mycase::all();
        return view('admin.case', compact(var_name: 'cases'));
    }


    public function showCase(Mycase $mycase)
    {
        
        $files = file::where('mycase_id', $mycase->id)->get();
        
        return view('admin.casedetail', compact('mycase', 'files'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        // Update the status
        $case  = mycase::find($id); 

        if (!$case) {
            // Return a 404 error if the order is not found
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update the order status
        $case->status = $request->input('status');
        $case->save();


        // Redirect back to the same page
        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
