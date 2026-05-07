<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;  

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * This function is absolete as all resources are being listed on Dashboard for convenience
     */
    public function index()
    {
        $assignments = Assignment::where('user_id', auth('web')->id())->latest()->take(30)->get();
        return view('assignments.index', compact('assignments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assignments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Assignment::create([
            'course_name' => $request->course_name,
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => auth('web')->id(),
        ]);

        return redirect()->route('dashboard')->with('success', 'Assignment created successfully!');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assignment $assignment)
    {
        return view('assignments.edit', compact('assignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assignment $assignment)
    {
            $request->validate([
                'course_name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'due_date' => 'nullable|date',
                'is_completed' => 'nullable|boolean',
            ]);
            // Check if the authenticated user is the owner of the assignment
            if ($assignment->user_id !== auth('web')->id()) {
                abort(403, 'Login first! to perform this action.');
            }
    
            $assignment->update([
                'course_name' => $request->course_name,
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
                'is_completed' => $request->is_completed ?? false,
            ]);
    
            return redirect()->route('dashboard')->with('success', 'Assignment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $assignment = Assignment::findOrFail($id);

        // Check if the authenticated user is the owner of the assignment
        if ($assignment->user_id !== auth('web')->id()) {
            abort(403, 'Login first! to perform this action.');
        }

        $assignment->delete();

        return back();
    }

    // Mark assignment as completed
    public function complete($id)
    {
        $assignment = Assignment::findOrFail($id);
        $assignment->update([
        'is_completed' => true]);

       return back()->with('success', 'Assignment completed!');
    }
}
