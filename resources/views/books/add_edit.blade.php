<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{empty($book) ? 'Añadir nuevo libro' : 'Editar libro'}}
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
                        <x-label for="title" class="block mt-1">Título:</x-label>
                        <x-text-input id="title" class="block mt-1" type="text" name="title" :value="old('title', empty($book) ? '' : $book->title)" placeholder="título del libro"/>
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                        <x-label for="author" class="block mt-1">Autor:</x-label>
                        <x-text-input id="author" class="block mt-1" type="text" name="author" :value="old('author', empty($book) ? '' : $book->author)" placeholder="nombre del autor"/>
                        <x-input-error :messages="$errors->get('author')" class="mt-2"/>
                        <x-label for="genre" class="block mt-1">Género:</x-label>
                        <x-select
                            :options="[
                                'realista'        => 'realista',
                                'histórica'       => 'histórica',
                                'autobiografía'   => 'autobiografía',
                                'ciencia-ficción' => 'ciencia-ficción',
                                'distópica'       => 'distópica',
                                'fantasía'        => 'fantasía',
                                'detectivesca'    => 'detectivesca',
                                'otro'            => 'otro',
                                'terror'          => 'terror',
                                'misterio'        => 'misterio',
                                'aventuras'       => 'aventuras',
                                'romántica'       => 'romántica']"
                            name="genre"
                            :value="old('genre', empty($book) ? '' : $book->genre)"
                            selected=''
                            id="genre"
                        />
                        <x-label for="publisher" class="block mt-1">Editorial:</x-label>
                        <x-text-input id="publisher" class="block mt-1" type="text" name="publisher" :value="old('publisher', empty($book) ? '' : $book->publisher)" placeholder="nombre de la editorial"/>
                        <x-input-error :messages="$errors->get('publisher')" class="mt-2"/>
                        <x-label for="isbn" class="block mt-1">ISBN 13:</x-label>
                        <x-text-input id="isbn" class="block mt-1" type="text" name="isbn" :value="old('isbn', empty($book) ? '' : $book->isbn)" placeholder="ISBN (13 dígitos)"/>
                        <x-input-error :messages="$errors->get('isbn')" class="mt-2"/>
                        <x-label for="publication_year" class="block mt-1">Año de publicación:</x-label>
                        <x-text-input id="publication_year" class="block mt-1" type="text" name="publication_year" :value="old('publication_year', empty($book) ? '' : $book->publication_year)" placeholder="año de publicación"/>
                        <x-input-error :messages="$errors->get('publication_year')" class="mt-2"/>
                        <x-label for="pages" class="block mt-1">Páginas:</x-label>
                        <x-text-input id="pages" class="block mt-1" type="text" name="pages" :value="old('pages', empty($book) ? '' : $book->pages)" placeholder="nº de páginas"/>
                        <x-input-error :messages="$errors->get('pages')" class="mt-2"/>
                        <x-label for="finished" class="block mt-1">¿Lo has terminado?:</x-label>
                        <input type="radio" class="radio" id="fin_si" name="finished" value="sí" required {{old('finished', empty($book) ? '' : $book->finished)}}/>
                        <label for="fin_si" class="form-label"> Sí</label>
                        <input type="radio" class="radio" id="fin_no" name="finished" value="no" required/>
                        <label for="fin_no" class="form-label"> No</label>
{{--                        <div class="col form-check mb-3 mt-4">--}}
{{--                            <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>--}}
{{--                            <label class="form-check-label" for="myCheck">¿Estás de acuerdo con que vendamos tus datos, a tu primogénito y a tu mascota?.</label>--}}
{{--                        </div>--}}
                        <div class="mt-4 space-x-8">
                            <x-primary-button>{{empty($book) ? 'Guardar' : 'Actualizar' }}</x-primary-button>
                            <a href="{{route('books.index')}}">{{ __('Cancelar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
