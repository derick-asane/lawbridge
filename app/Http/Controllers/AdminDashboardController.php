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
        return view('admin.case', compact('cases'));
    }


    public function showCase(Mycase $mycase)
    {
        
        $files = file::where('mycase_id', $mycase->id)->get();
        
        return view('admin.casedetail', compact('mycase', 'files'));
    }
}
