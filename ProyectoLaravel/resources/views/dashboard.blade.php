<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Biblioteca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center py-5">
                            {{ __('Ultimos libros') }}
                        </h2>
                        <a class="font-semibold text-xl text-blue-600 leading-tight text-center py-5" href="{{route('libros.index')}}">ver mas</a>
                    </div>
                    <div class="grid grid-cols-5 gap-4">
                        @foreach ($libros as $libro)
                        <a href="{{route('libros.show',['libro'=>$libro->id])}}"><img class="w-56 h-80" src="{{asset($url.$libro->imagen)}}" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
