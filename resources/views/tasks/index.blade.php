<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="p-2 border-t border-b sm:border border-indigo-500 sm:rounded-lg">
            <div class="p-2 pt-0 border-b border-indigo-500">
                List of all tasks
            </div>
            @forelse($tasks as $task)
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg md:flex justify-between items-center">
                    <div>
                        <a href="{{ route('tasks.show', [ 'task' => $task ]) }}"
                           class="font-semibold text-xl"
                        >
                            {{ $task->name }}
                        </a>
                    </div>
                    @can('manage task')
                        <div x-data="{ open: false }" class="relative flex items-center mt-2 md:mt-0">
                            <x-link href="{{ route('tasks.edit', [ 'task' => $task ]) }}">
                                Edit
                            </x-link>
                            <x-button @click="open = ! open" class="ml-2">
                                Delete
                            </x-button>
                            <div x-show="open"
                                 class="absolute bg-white border border-indigo-500 rounded-lg px-4 py-2 text-sm
                                    flex flex-col items-start bottom-8 left-14 z-10">
                                <span class="mb-2">You sure?</span>
                                <form method="POST" action="{{ route('tasks.destroy', [ 'task' => $task ]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <x-button onclick="event.preventDefault();
                                                   this.closest('form').submit();"
                                    >
                                        Delete
                                    </x-button>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            @empty
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg">
                    No task
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
