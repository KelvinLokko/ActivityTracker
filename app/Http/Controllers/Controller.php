<?php

namespace App\Http\Controllers;

use App\Models\Activity;

abstract class Controller
{
    public function index()
{
    $activities = Activity::with('updatedBy')
        ->whereDate('created_at', now()->toDateString())
        ->get();

    return view('dashboard', compact('activities'));
}
}
