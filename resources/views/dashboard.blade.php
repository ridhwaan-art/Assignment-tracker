<x-app-layout title="Dashboard">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <a href="{{ route('assignments.create') }}" class="text-blue-500">Create New Assignment</a>

                    @forelse ($assignments as $assignment)
                        <div class="mb-4">
                            <h2 class="text-xl font-bold">{{ $assignment->course_name }}</h2>
                            <h3 class="text-lg font-semibold">{{ $assignment->title }}</h3>
                            <p>{{ $assignment->description }}</p>
                            <p>Due: {{ $assignment->due_date }}</p>
                            @if ($assignment->is_completed == false)
                                <form method="POST" action="{{ route('assignments.complete', $assignment) }}">
                                @csrf
                                <button type="submit" class="text-green-500">Mark as Complete</button>
                            </form>
                            @else
                                <span class="text-gray-500">Completed</span>
                            @endif

                            <a href="{{ route('assignments.edit', $assignment) }}" style="color: blue;">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('assignments.destroy', $assignment) }}" onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" style="color: red;">
                                    Delete
                                </button>
                            </form>
                            
                            <hr>
                        </div>
                        
                    @empty
                        <p>
                            No assignments for now! Creates One! it will be here below.
                            {{-- <a href="{{ route('assignments.create') }}" class="text-blue-500">Create Assignment</a> --}}
                        </p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
