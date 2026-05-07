<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class DashboardController extends Controller
{
     public function index()
    {
        $assignments = Assignment::where('user_id', auth('web')->id())->latest()->take(50)->get();
        return view('dashboard', compact('assignments'));
    }
}
