<x-app-layout>
    <div class="w-full sm:max-w-md mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST"
              action="{{ route('upload.store') }}"
              enctype="multipart/form-data"
        >
        @csrf

            <!-- Avatar -->
            <div class="mt-4">
                <x-label for="avatar" :value="__('Avatar')" />

                <x-input id="avatar" class="block mt-1 w-full" type="file" name="avatar" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Upload') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
