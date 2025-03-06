<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Books') }}
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
                    <a href="{{route('books.create')}}" class="px-4 py-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Add new book') }}</a>
                    {{--<a href="#" class="px-4 py-4 dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-sm text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700">{{ __('Las mejores reviews') }}</a>--}}
                </div>
            </div>
            <div class="dark:bg-gray-800 shadow-sm sm:rounded-lg">
                {{--for--}}
                @forelse($books as $book)
                    <div class="p-6 flex space-x-2">
                        <x-book-svg></x-book-svg>
                        <div class="flex-1 pl-3">
                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-gray-800 dark:text-gray-100">{{$book->user->username}}</span>
                                    <small class="ml-2 text-sm text-gray-600 dark:text-gray-100">{{$book->created_at->format('d/m/Y')}}</small>
                                    @unless($book->created_at->eq($book->updated_at))
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
                                            <x-dropdown-link :href="route('books.show', $book)">
                                                {{ __('View') }}
                                            </x-dropdown-link>
                                            <x-dropdown-link :href="route('books.edit', $book)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST" action="{{route('books.destroy', $book)}}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                @endauth
                            </div>
                            <p class="mt-3 text-lg text-gray-900 dark:text-gray-100">{{$book->title}}, {{$book->author}}</p>
                        </div>
                    </div>
                @empty
                    <h2 class="text-xl text-white p-3">No books yet, try adding the first one :)</h2>
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
