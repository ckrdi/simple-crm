<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('projects.update', [ 'project' => $project ]) }}">
        @csrf
        @method('PUT')

            <!-- Title -->
            <div>
                <x-label for="title" :value="__('Title')" />

                <x-input id="title" class="block mt-1 w-full"
                         type="text"
                         name="title"
                         value="{{ $project->title }}" required autofocus />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-label for="description" :value="__('Description')" />

                <x-input id="description" class="block mt-1 w-full"
                         type="text"
                         name="description"
                         value="{{ $project->description }}" required />
            </div>

            <!-- Deadline -->
            <div class="mt-4">
                <x-label for="deadline" :value="__('Deadline')" />

                <x-input id="deadline" class="block mt-1 w-full"
                         type="date"
                         name="deadline"
                         value="{{ date('Y-m-d', strtotime($project->deadline)) }}"
                         required />
            </div>

            <!-- Assigned Client -->
            <div class="mt-4">
                <x-label for="client" :value="__('Assigned Client')" />

                <select name="client" id="client" class="mt-1 w-full rounded-md shadow-sm border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($clients as $client)
                        <option {{ $project->client_id == $client->id ? "selected=selected" : "" }} value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Assigned User -->
            <div class="mt-4">
                <x-label for="user" :value="__('Assigned User')" />

                <select name="user" id="user" class="mt-1 w-full rounded-md shadow-sm border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @foreach ($users as $user)
                        <option {{ $project->user_id == $user->id ? "selected=selected" : "" }} value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
