<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Volunteer Profile Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('profile.update', $profile->id) }}">
                            @method('PUT')
                            @csrf

                            <!-- Bio -->
                            <div>
                                <x-input-label for="bio" :value="__('Bio')" />
                                <x-textarea-input id="bio" class="block mt-1 w-full" type="text" name="bio" :value="old('bio', $profile->bio)" required autofocus></x-textarea-input>
                                <x-input-error :messages="$errors->get('bio')" class="mt-2" />
                            </div>
                            <!-- Skils -->
                            <div>
                                <x-input-label for="skills" :value="__('Skills')" />
                                <x-text-input id="skills" class="block mt-1 w-full" type="text" name="skills" :value="old('skills', $profile->skills)" required autofocus />
                                <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                            </div>
                            <!-- Interests -->
                            <div>
                                <x-input-label for="interests" :value="__('Interests')" />
                                <x-text-input id="interests" class="block mt-1 w-full" type="text" name="interests" :value="old('interests', $profile->interests)" required autofocus />
                                <x-input-error :messages="$errors->get('interests')" class="mt-2" />
                            </div>
                            <!-- Availability -->
                            <div>
                                <x-input-label for="availability" :value="__('Availability')" />
                                <div class="flex items-center justify-start ml-4">
                                    <div class="p-1">
                                        <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time:</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <input type="time" id="start-time" name="start_time" value="{{old('start_time', date('H:i', strtotime(explode('-', $profile->availability)[0])))}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                    </div>
                                    <div class="p-1">
                                        <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End time:</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <input type="time" id="end-time" name="end_time" value="{{old('end_time', date('H:i', strtotime(explode('-', $profile->availability)[1])))}}" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                                        </div>
                                    </div>
                                </div>
                                <x-input-error :messages="$errors->get('availability')" class="mt-2" />



                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('profile.show', $profile->id) }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Cancel') }}
                                </a>
                                <x-primary-button class="ms-3">
                                    {{ __('Save') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
