<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $subjects = \App\Models\Subject::all(); 
    return view('dashboard', compact('subjects'));
}
}
