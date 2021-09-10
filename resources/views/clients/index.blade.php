<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        @if(session('message'))
            <div x-data="{ isVisible: true }"
                 x-init="setTimeout(()=> isVisible = false, 5000)"
                 x-show.transition.duration.1000ms="isVisible"
                 class="text-green-500 mb-2"
            >
                {{ session('message') }}
            </div>
        @endif
        <div class="p-2 border-t border-b sm:border border-indigo-500 sm:rounded-lg">
            <div x-data="{ open: false }" class="relative p-2 pt-0 border-b border-indigo-500 flex items-center justify-between">
                <div>
                    List of all clients
                </div>
                <x-button @click="open = ! open">
                    Options
                </x-button>
                <div x-show="open" class="absolute z-10 right-0 top-10 flex flex-col p-2 bg-white border border-indigo-500 rounded-lg">
                    <x-link href="{{ route('clients.index') }}" active="{{ request()->routeIs('clients.index') }}">
                        All clients
                    </x-link>
                    <x-link class="mt-2" href="{{ route('clients.active') }}" active="{{ request()->routeIs('clients.active') }}">
                        Active clients
                    </x-link>
                    <x-link class="mt-2" href="{{ route('clients.nonactive') }}" active="{{ request()->routeIs('clients.nonactive') }}">
                        Nonactive clients
                    </x-link>
                </div>
            </div>
            @forelse($clients as $client)
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg md:flex justify-between items-center">
                    <div>
                        <a href="{{ route('clients.show', [ 'client' => $client ]) }}"
                           class="font-semibold text-xl"
                        >
                            {{ $client->name }}
                        </a>
                    </div>
                    @can('manage client')
                        <div x-data="{ open: false }" class="relative flex items-center mt-2 md:mt-0">
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
                </div>
            @empty
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg">
                    No client
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
