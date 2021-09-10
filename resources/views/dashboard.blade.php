<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('message'))
                <div x-data="{ isVisible: true }"
                     x-init="setTimeout(()=> isVisible = false, 5000)"
                     x-show.transition.duration.1000ms="isVisible"
                     class="text-green-500 mb-2"
                >
                    {{ session('message') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 bg-white border-b border-gray-200 flex items-center">
                <img src="{{ auth()->user()->getFirstMediaUrl('avatars') ? auth()->user()->getFirstMediaUrl('avatars') : 'https://www.gravatar.com/avatar/000000000000000000000000000000000?d=mp' }}"
                     alt="avatar"
                     class="w-10 h-10 rounded-full"
                >
                <div class="ml-4">
                    {{ auth()->user()->name }}
                </div>
            </div>
            <x-link href="{{ route('upload.create') }}" class="mt-2">
                @if(!auth()->user()->getFirstMediaUrl('avatars'))
                    Upload your avatar
                @else
                    Update your avatar
                @endif
            </x-link>
        </div>
    </div>
</x-app-layout>
