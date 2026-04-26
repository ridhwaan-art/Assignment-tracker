<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignment;

class AssignmentController extends Controller
{
    public function index(){
        $assignments = auth('web')->user()->assignments()->orderBy('due_date')->get();
        return view('assignments.index', compact('assignments'));
    }

    public function show(Assignment $assignment){
        // Check if the authenticated user is the owner of the assignment
        if ($assignment->user_id !== auth('web')->id()) {
            abort(403, 'Login first! to perform this action.');
        }

        return view('assignments.show', compact('assignment'));
    }

    public function create(){
        // check if the user is authenticated before allowing them to create an assignment
        if (!auth('web')->check()) {
            abort(403, 'Login first! to perform this action.');
        }

        Assignment::factory()->create([
            'user_id' => auth('web')->id(),
        ]);

        
        return view('assignments.create');
    }

    public function store(Request $request){
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Create a new assignment using the validated data
        $assignment = new Assignment();
        $assignment->title = $validatedData['title'];
        $assignment->description = $validatedData['description'] ?? null;
        $assignment->due_date = $validatedData['due_date'] ?? null;
        $assignment->user_id = auth('web')->id(); // Assuming the user is authenticated
        $assignment->save();

        // Redirect to the assignments index page with a success message
        return redirect()->route('assignments.index')->with('success', 'Assignment created successfully!');
    }

    public function destroy(Assignment $assignment){
        // Check if the authenticated user is the owner of the assignment
        if ($assignment->user_id !== auth('web')->id()) {
            abort(403, 'Login first! to perform this action.');
        }

        // Delete the assignment
        $assignment->delete();
        return back();

        // Redirect to the assignments index page with a success message
        //return redirect()->route('assignments.index')->with('success', 'Assignment deleted successfully!');
    }

    public function edit(Assignment $assignment){
        // Check if the authenticated user is the owner of the assignment
        if ($assignment->user_id !== auth('web')->id()) {
            abort(403, 'Login first! to perform this action.');
        }

        return view('assignments.edit', compact('assignment'));
    }

    public function complete(Assignment $assignment){
        // Check if the authenticated user is the owner of the assignment
        if ($assignment->user_id !== auth('web')->id()) {
            abort(403, 'Login first! to perform this action.');
        }

        $assignment->is_completed = true;
        $assignment->save();

        return back();
    }
}
