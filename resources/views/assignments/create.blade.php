<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    <h2 class="text-2xl font-bold mb-4">Create New Assignment</h2>
                    <form method="POST" action="/assignments">
                        @csrf

                        <label>Course Name:</label><br>
                        <input type="text" name="course_name"><br><br>
                        
                        <label>Title:</label><br>
                        <input type="text" name="title"><br><br>

                        <label>Description:</label><br>
                        <textarea name="description"></textarea><br><br>

                        <label>Due Date:</label><br>
                        <input type="date" name="due_date"><br><br>

                        <button type="submit">Save</button>
                    </form>

                </div>
            </div>
    </div>

</x-app-layout>