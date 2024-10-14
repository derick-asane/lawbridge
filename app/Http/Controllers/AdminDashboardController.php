<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function getUsers()
    {
        $users = User::where('role', 'client')->get();

        return view('admin.users', compact('users'));
    }
}
