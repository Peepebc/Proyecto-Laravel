<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis libros favoritos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex flex-col">
                        @if (count($libros) > 0)
                            <div class="grid grid-cols-5 gap-4 p-3">
                                @foreach ($libros as $libro)
                                    <a href="{{ route('libros.show', ['libro' => $libro->id]) }}"><img class="w-56 h-80"
                                            src="{{ asset($url . $libro->imagen) }}" alt=""></a>
                                @endforeach
                            </div>
                        @else
                            <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('NO TIENES LIBROS FAVORITOS') }}
                            </h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
