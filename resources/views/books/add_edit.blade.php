<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{empty($book) ? 'Add new book' : 'Edit book'}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" dark:bg-gray-800 text-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{empty($book) ? route('books.store') : route('books.update', $book)}}" enctype="multipart/form-data">
                        @csrf
                        @if(empty($book))
                            @method('post')
                        @else
                            @method('put')
                        @endif
                        <x-label for="title" class="block mt-1">Title:</x-label>
                        <x-text-input id="title" class="block mt-1" type="text" name="title" :value="old('title', empty($book) ? '' : $book->title)" placeholder="Title"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        <x-label for="author" class="block mt-1">Author:</x-label>
                        <x-text-input id="author" class="block mt-1" type="text" name="author" :value="old('author', empty($book) ? '' : $book->author)" placeholder="Author"/>
                        <x-input-error :messages="$errors->get('author')" class="mt-2"/>
                        <x-label for="genre" class="block mt-1">Genre:</x-label>
                        <x-select
                            :options="[
                                'realistic'        => 'realistic',
                                'histórical'       => 'histórical',
                                'autobiography'    => 'autobiography',
                                'science fiction'  => 'science fiction',
                                'dystopian'        => 'dystopian',
                                'fantasy'          => 'fantasy',
                                'detective'        => 'detective',
                                'other'            => 'other',
                                'terror'           => 'terror',
                                'mystery'          => 'mystery',
                                'adventures'       => 'adventures',
                                'romántic'         => 'romántic']"
                            name="genre"
                            :value="old('genre', empty($book) ? '' : $book->genre)"
                            selected=''
                            id="genre"
                        />
                        <x-label for="publisher" class="block mt-1">Publisher:</x-label>
                        <x-text-input id="publisher" class="block mt-1" type="text" name="publisher" :value="old('publisher', empty($book) ? '' : $book->publisher)" placeholder="Publisher"/>
                        <x-input-error :messages="$errors->get('publisher')" class="mt-2"/>
                        <x-label for="isbn" class="block mt-1">ISBN 13:</x-label>
                        <x-text-input id="isbn" class="block mt-1" type="text" name="isbn" :value="old('isbn', empty($book) ? '' : $book->isbn)" placeholder="ISBN (13 dígits)"/>
                        <x-input-error :messages="$errors->get('isbn')" class="mt-2"/>
                        <x-label for="publication_year" class="block mt-1">Publication year:</x-label>
                        <x-text-input id="publication_year" class="block mt-1" type="text" name="publication_year" :value="old('publication_year', empty($book) ? '' : $book->publication_year)" placeholder="Publication year"/>
                        <x-input-error :messages="$errors->get('publication_year')" class="mt-2"/>
                        <x-label for="pages" class="block mt-1">Pages:</x-label>
                        <x-text-input id="pages" class="block mt-1" type="text" name="pages" :value="old('pages', empty($book) ? '' : $book->pages)" placeholder="Pages"/>
                        <x-input-error :messages="$errors->get('pages')" class="mt-2"/>
                        <x-label for="finished" class="block mt-1">Finished?:</x-label>
                        <input type="radio" class="radio" id="fin_si" name="finished" value="yes" required {{old('finished', empty($book) ? '' : $book->finished)}}/>
                        <label for="fin_si" class="form-label"> Yes</label>
                        <input type="radio" class="radio" id="fin_no" name="finished" value="no" required/>
                        <label for="fin_no" class="form-label"> No</label>
                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{empty($book) ? 'Save' : 'Update' }}</x-primary-button>
                            <a href="{{route('books.index')}}">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
