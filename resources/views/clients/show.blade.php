<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div>
            <img src="{{ $client->getFirstMediaUrl('thumbnails') ? $client->getFirstMediaUrl('thumbnails') : 'https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp' }}" alt="avatar" class="w-10 h-10 rounded-full mb-2">
            <div class="font-semibold text-xl">{{ $client->name }}</div>
            <div class="font-semibold text-lg">Address: {{ $client->address }}</div>
            <div>Phone Num: {{ $client->phone_number }}</div>
            <div>Currently working project:</div>
            @if(count($client->projects))
                @foreach($client->projects as $project)
                    <div>
                        <span>&hybull;</span><span> {{ $project->title }}</span>
                    </div>
                @endforeach
            @else
                <div>Not working any project</div>
            @endif

        </div>
        <div class="flex items-center justify-between mt-2">
            @can('manage client')
                <div x-data="{ open: false }" class="relative flex items-center">
                    <x-link href="{{ route('clients.edit', [ 'client' => $client ]) }}">
                        Edit
                    </x-link>
                    <x-button @click="open = ! open" class="ml-2">
                        Delete
                    </x-button>
                    <div x-show="open"
                         class="absolute bg-white border border-indigo-500 rounded-lg px-4 py-2 text-sm
                                    flex flex-col items-start bottom-8 left-14 z-10">
                        <span class="mb-2">You sure?</span>
                        <form method="POST" action="{{ route('clients.destroy', [ 'client' => $client ]) }}">
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
            <x-link href="{{ route('clients.index') }}" class="ml-2">
                Go back
            </x-link>
        </div>
    </div>
</x-app-layout>
