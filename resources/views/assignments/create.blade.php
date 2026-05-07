<x-app-layout title="Create Assignment">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="form_container bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    <h2 class="text-2xl font-bold mb-4">Create New Assignment</h2>
                    <form class="form_data" method="POST" action="/assignments">
                        @csrf

                        {{-- <label>Course Name:</label><br> --}}
                        <input class="input_name" type="text" name="course_name" placeholder="Course Name"><br><br>
                        
                        {{-- <label>Title:</label><br> --}}
                        <input class="input_name" type="text" name="title" placeholder="Assignment Title"><br><br>

                        <textarea name="description">Describe a simple context of an Assignment</textarea><br><br>

                        <label>Due Date:</label><br>
                        <input class="input_name" type="date" name="due_date" placeholder="Due Date"><br><br>

                        <button type="submit" class="save-button" required>Save</button>
                    </form>

                </div>
            </div>
    </div>

</x-app-layout>