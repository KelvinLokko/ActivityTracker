<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    // Function to display today's activities
    public function index()
    {
        $activities = Activity::with('updatedBy')
            ->whereDate('created_at', now()->toDateString())
            ->get();
        return view('activities.index', compact('activities'));
    }
    
    // Function to show the form to add a new activity (optional)
    public function create()
    {
        // This method can be used to show a form if needed
        return view('activities.create');
    }

    // Function to store a new activity
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
        ]);

        Activity::create([
            'description' => $request->input('description'),
            'status' => $request->input('status'),
            'remarks' => $request->input('remarks'),
            'updated_by' => auth()->id(), // Assign the logged-in user
        ]);

        return redirect()->back()->with('success', 'Activity added successfully');
    }

    
    public function reportForm()
    {
        return view('activities.reportForm'); // Ensure you have this view created
    }


    // Function to show edit form for a specific activity
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    // Function to update an activity's status and remarks
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|in:done,pending',
            'remarks' => 'nullable|string',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update([
            'description' => $request->input('description'),
            'status' => $request->status,
            'remarks' => $request->remarks,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Activity updated successfully');
    }

    // Function to display a report of activities in a custom date range
    public function report(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        
        $activities = Activity::with('updatedBy')
            ->whereDate('created_at', '>=', $request->start_date)
            ->whereDate('created_at', '<=', $request->end_date)
            ->get();

        return view('activities.report', compact('activities'));
    }
}
