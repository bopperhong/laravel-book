<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    @hasrole('seller')
    <div class="flex justify-end mt-4 max-w-6xl mx-auto">
        <a href="{{  route('books.create') }}">
            <x-primary-button>
                {{  __("Add") }}
            </x-primary-button>
        </a>
    </div>
    @endhasrole

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @livewire('list-books')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>