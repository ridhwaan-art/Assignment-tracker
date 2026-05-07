<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form_container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    <h2 class="text-2xl font-bold mb-4">Edit Assignment</h2>
                    <form method="POST" action="{{ route('assignments.update', $assignment) }}">
                        @csrf
                        @method('PUT')

                        <label>Course Name</label><br>
                        <input class="input_name" type="text" name="course_name" value="{{ $assignment->course_name }}"><br><br>
                        
                        <label>Title</label><br>
                        <input class="input_name" type="text" name="title" value="{{ $assignment->title }}"><br><br>

                        <label>Description</label><br>
                        <textarea name="description">{{ $assignment->description }}</textarea><br><br>

                        <label>Due Date</label><br>
                        <input class="input_name" type="date" name="due_date" value="{{ $assignment->due_date }}"><br><br>

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
                        <button class="save-button" type="submit">Update</button>
                    </form>

                </div>
            </div>
    </div>

</x-app-layout>