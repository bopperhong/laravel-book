<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Users') }}
        </h2>
    </x-slot>
    
    <div class="bg-gray-100 dark:bg-gray-900 mt-4 max-w-6xl mx-auto">
        <div class="px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <form method="POST" action="{{ route('users.edit', $user->id) }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />

                    @foreach ($roles as $role)
                        <div class="flex items-center mt-2">
                            <input type="checkbox" id="role_{{ $role->id }}" name="role_ids[]" value="{{ $role->id }}" 
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }} class="mr-2">
                            <label for="role_{{ $role->id }}" class="text-gray-800 dark:text-gray-300">
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
            </div>

            <!-- Verified -->
            <div class="mt-4">
                <x-input-label for="verified" :value="__('Verified')" />
                <input type="checkbox" id="verified" name="verified" value="1" {{ $user->verified ? 'checked' : '' }} class="mr-2">
                <label for="verified" class="text-gray-800 dark:text-gray-300">
                    {{ __("Verified") }}
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
        </div>
    </div>
</x-app-layout>