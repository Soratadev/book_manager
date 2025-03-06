<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Create review') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{empty($review) ? route('reviews.store') : route('reviews.update', $review)}}">
                        @csrf
                        @if(empty($review))
                            @method('post')
                        @else
                            @method('put')
                        @endif
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', empty($review) ? '' : $review->title)" placeholder="Title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        <textarea
                            name="body"
                            class="mt-2 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-500 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        >{{old('body', empty($review) ? '' : $review->body)}}
                        </textarea>
                        <x-input-error :messages="$errors->get('body')" class="mt-2" />
                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{empty($review) ? 'Save' : 'Update' }}</x-primary-button>
                            <a href="{{route('reviews.index')}}" class="dark:text-gray-100">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
