<x-app-layout>
    <div class="bg-gray-100 dark:bg-gray-900 mt-4 max-w-6xl mx-auto">
        <div class="px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <!-- Categories -->
                <div class="mt-4">
                    <x-input-label for="categories" :value="__('Categories')" />

                    <select id="categories" name="category_id" class="block mt-1 w-full" required>
                        <option value =""> {{ __('Select a category') }} </option>
                        @foreach($categories as $category)
                            <option value="{{  $category->id }}">{{  $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />

                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"  />
                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Cover Image -->
                <div class="mt-4">
                    <x-input-label for="cover_image" :value="__('Cover Image')" />

                    <input id="cover_image" type="file" name="cover_image" class="block mt-1 w-full" required />

                    <x-input-error :messages="$errors->get('cover_image')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ms-4">
                        {{ __('Add') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>