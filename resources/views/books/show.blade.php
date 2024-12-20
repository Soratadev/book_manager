<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            Datos del libro: {{$book->title}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-xl text-center pb-3">{{$book->title}}</h1>
                    <style>
                        th, td {
                            border: 1px solid whitesmoke;
                            padding: 8px;
                            text-align: center;
                        }
                    </style>
                    <table class="mx-auto" style="border-collapse: collapse; width: 30%">
                        <tr>
                            <td><p>Título: {{$book->title}}</p></td>
                        </tr>
                        <tr>
                            <td><p>Autor: {{$book->author}}</p></td>
                        </tr>
                        <tr>
                            <td><p>Género: {{$book->genre}}</p></td>
                        </tr>
                        <tr>
                            <td><p>Editorial: {{$book->publisher}}</p></td>
                        </tr>
                        <tr>
                            <td><p>ISBN 13: {{$book->isbn}}</p></td>
                        </tr>
                        <tr>
                            <td><p>Año de publicación: {{$book->publication_year}}</p></td>
                        </tr>
                        <tr>
                            <td><p>Nº de páginas: {{$book->pages}}</p></td>
                        </tr>
                        <tr>
                            <td> <p>¿Terminado?: {{$book->finished}}</p></td>
                        </tr>
                    </table>
                    <div class="flex mt-4 space-x-8 justify-center">
                        <x-primary-button>
                            <a href={{route('books.index')}} class="mx-auto">{{ __('Atrás') }}</a>
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
