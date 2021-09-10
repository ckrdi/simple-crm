<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="p-2 border-t border-b sm:border border-indigo-500 sm:rounded-lg">
            <div x-data="{ open: false }" class="relative p-2 pt-0 border-b border-indigo-500 flex items-center justify-between">
                <div>
                    List of all users
                </div>
                <x-button @click="open = ! open">
                    Options
                </x-button>
                <div x-show="open" class="absolute z-10 right-0 top-10 flex flex-col p-2 bg-white border border-indigo-500 rounded-lg">
                    <x-link href="{{ route('users.index') }}" active="{{ request()->routeIs('users.index') }}">
                        All users
                    </x-link>
                    <x-link class="mt-2" href="{{ route('users.active') }}" active="{{ request()->routeIs('users.active') }}">
                        Active users
                    </x-link>
                    <x-link class="mt-2" href="{{ route('users.nonactive') }}" active="{{ request()->routeIs('users.nonactive') }}">
                        Nonactive users
                    </x-link>
                </div>
            </div>
            @foreach($users as $user)
                <div class="mt-2 p-2 bg-white shadow-sm rounded-lg md:flex justify-between items-center">
                    <div>
                        <a href="{{ route('users.show', [ 'user' => $user ]) }}"
                           class="font-semibold text-xl"
                        >
                            {{ $user->name }}
                        </a>
                    </div>
                    @can('manage user')
                    <div x-data="{ open: false }" class="relative flex items-center mt-2 md:mt-0">
                        <x-link href="{{ route('users.edit', [ 'user' => $user ]) }}">
                            Edit
                        </x-link>
                        <x-button @click="open = ! open" class="ml-2">
                            Delete
                        </x-button>
                        <div x-show="open"
                             class="absolute bg-white border border-indigo-500 rounded-lg px-4 py-2 text-sm
                                    flex flex-col items-start bottom-8 left-14 z-10">
                            <span class="mb-2">You sure?</span>
                            <form method="POST" action="{{ route('users.destroy', [ 'user' => $user ]) }}">
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
            @endforeach
        </div>
    </div>
</x-app-layout>
