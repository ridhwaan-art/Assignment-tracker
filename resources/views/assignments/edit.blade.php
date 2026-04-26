<x-app-layout title="Edit Assignment">

<h2>Edit Assignment</h2>

<form method="POST" action="{{ route('assignments.update', $assignment) }}">
    @csrf
    @method('PUT')

    label>Course Name</label><br>
    <input type="text" name="course_name" value="{{ $assignment->course_name }}"><br><br>
    
    <label>Title</label><br>
    <input type="text" name="title" value="{{ $assignment->title }}"><br><br>

    <label>Description</label><br>
    <textarea name="description">{{ $assignment->description }}</textarea><br><br>

    <label>Due Date</label><br>
    <input type="date" name="due_date" value="{{ $assignment->due_date }}"><br><br>

        <label>Status</label><br>

        <select name="is_completed">
            <option value="0" {{ !$assignment->is_completed ? 'selected' : '' }}>
                Pending
            </option>
            <option value="1" {{ $assignment->is_completed ? 'selected' : '' }}>
                Completed
            </option>
        </select>
        <br><br>
    <button type="submit">Update</button>
</form>

</x-app-layout>