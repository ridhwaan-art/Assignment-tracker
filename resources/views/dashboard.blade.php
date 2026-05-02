<x-app-layout title="Dashboard">
    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    My Assignments
                </h1>

                <a href="{{ route('assignments.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Create New Assignment
                </a>
            </div>

            @forelse ($assignments as $assignment)
                <div class="bg-white shadow-sm rounded-xl p-6 mb-4 border border-gray-100">

                    <div class="flex justify-between items-start">
                        <div>
                            <h2 class="text-xl font-bold text-gray-800">
                                {{ $assignment->course_name }}
                            </h2>

                            <h3 class="text-lg font-semibold text-gray-700 mt-1">
                                {{ $assignment->title }}
                            </h3>

                            <p class="text-gray-600 mt-2">
                                {{ $assignment->description }}
                            </p>

                            <p class="text-sm text-gray-400 mt-3">
                                Due Date: {{ $assignment->due_date }}
                            </p>
                        </div>

                        <div>
                            @if ($assignment->is_completed)
                                <span class="px-3 py-1 text-sm rounded-full bg-green-100 text-green-700">
                                    Completed
                                </span>
                            @else
                                <span class="px-3 py-1 text-sm rounded-full bg-yellow-100 text-yellow-700">
                                    Pending
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 flex items-center gap-4">

                        @if (!$assignment->is_completed)
                            <form method="POST" action="{{ route('assignments.complete', $assignment) }}">
                                @csrf
                                <button type="submit" class="text-green-600 hover:underline">
                                    Mark as Complete
                                </button>
                            </form>
                        @endif

                        <a href="{{ route('assignments.edit', $assignment) }}"
                           class="text-blue-600 hover:underline">
                            Edit
                        </a>

                        <form method="POST"
                              action="{{ route('assignments.destroy', $assignment) }}"
                              onsubmit="return confirm('Are you sure you want to delete this assignment?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>

            @empty
                <div class="bg-white rounded-xl shadow-sm p-6 text-gray-500">
                    No assignments yet. Create one and it will appear here.
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>