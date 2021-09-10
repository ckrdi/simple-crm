<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST"
              action="{{ route('clients.update', [ 'client' => $client ]) }}"
              enctype="multipart/form-data"
        >
        @csrf
        @method('PUT')

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full"
                         type="text"
                         name="name"
                         value="{{ $client->name }}" required autofocus />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="address" :value="__('Address')" />

                <x-input id="address" class="block mt-1 w-full"
                         type="text"
                         name="address"
                         value="{{ $client->address }}" required />
            </div>

            <!-- Phone Number -->
            <div class="mt-4">
                <x-label for="phone_number" :value="__('Phone Number')" />

                <x-input id="phone_number" class="block mt-1 w-full"
                         type="text"
                         name="phone_number"
                         value="{{ $client->phone_number }}"
                         required />
            </div>

            <!-- Thumbnail -->
            <div class="mt-4">
                <x-label for="thumbnail" :value="__('Thumbnail')" />

                <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
