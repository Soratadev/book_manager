<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 dark:text-gray-200 leading-tight">
            Bienvenid@, {{ Auth::user()->username }}!
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-xl p-6 text-gray-900 dark:text-gray-100">
                    <p>Bienvenid@ a tu "Book Manager". Aquí podrás gestionar tus libros y crear reviews sobre ellos,
                        o bien leer las reviews de otros usuarios para saber si te gustará ese libro que dudas en leer.</p>
                    <p class="mt-4">¡Disfruta de la lectura!</p>
                    <div class="flex justify-center text-l mt-1 text-gray-900 dark:text-gray-100">
                        <div class="flex space-x-4 mt-4">
                            <a href="{{route('books.index')}}" class="px-2 py-2 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Gestionar libros') }}</a>
                            <a href="{{route('reviews.index')}}" class="px-2 py-2 mx-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Gestionar reviews') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="text-xl p-3 text-gray-900 dark:text-gray-100 text-center">
                    <p class="mb-2">El creador de la app recomienda:</p>
                    <x-carousel :images="[
                            ['url' => 'images/camino_reyes.jpeg', 'alt' => 'Imagen 1'],
                            ['url' => 'images/palabras_radiantes.jpg', 'alt' => 'Imagen 2'],
                            ['url' => 'images/juramentada.jpg', 'alt' => 'Imagen 3'],
                            ['url' => 'images/esquirla_amanecer.jpg', 'alt' => 'Imagen 4'],
                            ['url' => 'images/ritmo_guerra.jpg', 'alt' => 'Imagen 5'],
                            ['url' => 'images/viento_verdad.jpg', 'alt' => 'Imagen 6']]">
                    </x-carousel>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
