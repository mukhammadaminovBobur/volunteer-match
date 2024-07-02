<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Nonprofit Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form method="POST" action="{{ route('nonprofit.update', $nonprofit->id) }}">
                            @method('PUT')
                            @csrf
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $nonprofit->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $nonprofit->description)" required autofocus></x-textarea-input>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <!-- Website -->
                            <div>
                                <x-input-label for="website" :value="__('Website')" />
                                <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="old('website', $nonprofit->website)" required autofocus />
                                <x-input-error :messages="$errors->get('website')" class="mt-2" />
                            </div>
                            <!-- Phone -->
                            <div>
                                <x-input-label for="phone" :value="__('Phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone', $nonprofit->phone)" required autofocus />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>


                            <!-- Address -->
                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $nonprofit->address)" required autofocus />
                                <x-input-error :messages="$errors->get('address')" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <a href="{{ route('nonprofit.show', $nonprofit->id) }}" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
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
