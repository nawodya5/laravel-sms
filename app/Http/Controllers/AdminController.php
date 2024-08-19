<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('admin.dashboard');
    }

    public function edit()
    {
        return view('admin.add');
    }

    public function getInstructors()
    {
        // Fetch data from the database
        $instructors = User::where('role', 'instructor')->get();

        // Return the data as JSON
        return response()->json($instructors);
    }
}
