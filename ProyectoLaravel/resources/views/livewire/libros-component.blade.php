<div>
    <div class="relative z-0 w-full mb-6 group">
        <input wire:model='buscador' type="text" name="buscador" id="buscador"
            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
            placeholder=" " required />
        <label for="buscador"
            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
        Introduzca el titulo de un libro</label>

    </div>
    <div class="flex flex-col">
        <div class="grid grid-cols-5 gap-4 p-3">
            @foreach ($libros as $libro)
                <a href="{{ route('libros.show', ['libro' => $libro->id]) }}"><img class="w-56 h-80"
                        src="{{ asset($url . $libro->imagen) }}" alt=""></a>
            @endforeach
        </div>
        <div class="justify-center">

            {{$libros->links()}}
        </div>
    </div>
</div>
