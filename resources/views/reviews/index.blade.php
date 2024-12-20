<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session()->has('success'))
                <div class="text-center bg-gray-100 rounded-md p-2" id="flash_message">
                    <span class="text-indigo-600 text-xl font-semibold">{{session('success')}}</span>
                </div>
            @elseif(session()->has('updated'))
                <div class="text-center bg-gray-100 rounded-md p-2" id="flash_message">
                    <span class="text-indigo-600 text-xl font-semibold">{{session('updated')}}</span>
                </div>
            @elseif(session()->has('deleted'))
                <div class="text-center bg-gray-100 rounded-md p-2" id="flash_message">
                    <span class="text-indigo-600 text-xl font-semibold">{{session('deleted')}}</span>
                </div>
            @endif

            <div class="overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 text-gray-900 dark:text-gray-100s space-x-8">
                    <a href="{{route('reviews.create')}}" class="px-4 py-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Agregar review') }}</a>
                    <a href="{{route('reviews.index', ['filter'=>'popular'])}}" class="px-4 py-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Más populares') }}</a>
                    <a href="{{route('reviews.index', ['filter'=>'own'])}}" class="px-4 py-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Mis reviews') }}</a>
                </div>
            </div>
            <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg">
                {{--for--}}
                @forelse($reviews as $review)
                    <div class="p-6 flex space-x-2">
                    {{--<x-lightbulb-svg></x-lightbulb-svg>--}}
                    <div class="flex-1 pl-3">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 dark:text-gray-100">{{$review->user->username}}</span>
                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-100">{{$review->created_at->format('d/m/Y')}}</small>
                                @unless($review->created_at->eq($review->updated_at))
                                <small class="text-sm text-gray-400"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            @auth
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('reviews.show', $review)">
                                            {{ __('Ver') }}
                                        </x-dropdown-link>
                                        @can('update', $review)
                                            <x-dropdown-link :href="route('reviews.edit', $review)">
                                                {{ __('Editar') }}
                                            </x-dropdown-link>
                                        @endcan
                                        @can('delete', $review)
                                            <form method="POST" action="{{route('reviews.destroy', $review)}}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Eliminar') }}
                                                </x-dropdown-link>
                                            </form>
                                        @endcan
                                    </x-slot>
                                </x-dropdown>
                            @endauth
                        </div>
                        <p class="mt-3 text-lg text-gray-900 dark:text-gray-100">{{$review->title}}</p>
                        <small class="text-sm text-gray-400 flex mt-3">
                            <svg width="18px" height="18px" viewBox="0 -0.5 21 21" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ffffff" stroke="#ffffff" transform="rotate(0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>like [#1385]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-259.000000, -760.000000)" fill="#ffffff"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M203,620 L207.200006,620 L207.200006,608 L203,608 L203,620 Z M223.924431,611.355 L222.100579,617.89 C221.799228,619.131 220.638976,620 219.302324,620 L209.300009,620 L209.300009,608.021 L211.104962,601.825 C211.274012,600.775 212.223214,600 213.339366,600 C214.587817,600 215.600019,600.964 215.600019,602.153 L215.600019,608 L221.126177,608 C222.97313,608 224.340232,609.641 223.924431,611.355 L223.924431,611.355 Z" id="like-[#1385]"> </path> </g> </g> </g> </g></svg>
                            <span class="ml-2">{{$review->likes}}</span>
                        </small>
                    </div>
                </div>
                @empty
                    <h2 class="text-xl text-white p-3">Aún no hay reviews, prueba a escribir la primera :)</h2>
                @endforelse
                {{--endfor--}}
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const flashMessage = document.getElementById('flash_message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.style.transition = "opacity 1s ease";
                flashMessage.style.opacity = 0;
                setTimeout(() => flashMessage.remove(), 1000); // Elimina el elemento después de 1 segundo
            }, 1000);
        }
    });
</script>
