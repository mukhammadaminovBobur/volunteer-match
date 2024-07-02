<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Volunteer Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('profile.store') }}">
                        @csrf

                        <!-- Bio -->
                        <div>
                            <x-input-label for="bio" :value="__('Bio')" />
                            <x-textarea-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio')" required autofocus />
                            <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                        </div>
                        <!-- Skils -->
                        <div>
                            <x-input-label for="Skils" :value="__('Skils')" />
                            <x-text-input id="Skils" class="block mt-1 w-full" type="text" name="Skils" :value="old('Skils')" required autofocus />
                            <x-input-error :messages="$errors->get('Skils')" class="mt-2" />
                        </div>
                        <!-- Interests -->
                        <div>
                            <x-input-label for="Interests" :value="__('Interests')" />
                            <x-text-input id="Interests" class="block mt-1 w-full" type="text" name="Interests" :value="old('Interests')" required autofocus />
                            <x-input-error :messages="$errors->get('Interests')" class="mt-2" />
                        </div>
                        <!-- Availability -->
                        <div>
                            <x-input-label for="Availability" :value="__('Availability')" />
                            <x-text-input id="Availability" class="block mt-1 w-full" type="text" name="Availability" :value="old('Availability')" required autofocus />
                            <x-input-error :messages="$errors->get('Availability')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


