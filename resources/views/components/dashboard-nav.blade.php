<div class="p-4 text-white">
    <h2 class="font-semibold text-xl leading-tight mb-3">
        Dashboard
    </h2>

    <!-- Users -->
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('users.index') }}">Users</a>
            @can('manage user')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage user')
            <a href="{{ route('users.create') }}" x-show="open">Register new user</a>
        @endcan
    </div>

    <!-- Clients -->
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('clients.index') }}">Clients</a>
            @can('manage client')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage client')
            <a href="{{ route('clients.create') }}" x-show="open">Register new client</a>
        @endcan
    </div>

    <!-- Projects -->
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('projects.index') }}">Projects</a>
            @can('manage project')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage project')
            <a href="{{ route('projects.create') }}" x-show="open">Create new project</a>
        @endcan
    </div>

    <!-- Tasks -->
    <div x-data="{ open: false }" class="mt-3">
        <div class="flex justify-between items-center">
            <a href="{{ route('tasks.index') }}">Tasks</a>
            @can('manage task')
                <button @click="open = ! open">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            @endcan
        </div>
        @can('manage task')
            <a href="{{ route('tasks.create') }}" x-show="open">Create new task</a>
        @endcan
    </div>

</div>
