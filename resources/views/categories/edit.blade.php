<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 mt-4 max-w-6xl mx-auto">
        <div class="px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                <!-- Category Name -->
                <div>
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('categories.index') }}">
                    <x-primary-button type="button" class="ms-4">
                            {{ __('Back') }}
                        </x-primary-button>
                    </a>
                    <x-primary-button class="ms-4">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
            <div class="mt-4">
            </div>
        </div>
    </div>
</x-app-layout>