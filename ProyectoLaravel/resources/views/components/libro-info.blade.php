@props(['libro', 'url'])

<div>
    <section class="flex flex-col md:flex-row justify-center items-center md:items-start py-10 gap-12">
        <div>
            <img class=" md:w-96 rounded-lg" src="{{ asset($url . $libro->imagen) }}" />
        </div>
        <div class="w-full md:w-1/2 mt-5 flex flex-col gap-3 px-6">
            <h1 class="text-2xl font-bold">{{ $libro->titulo }}</h1>
            <h1 class="text-2xl font-bold">{{ $libro->anio }}</h1>
            <h1 class="text-2xl font-bold">{{ $libro->autor }}</h1>
            <p>{{ $libro->descripcion }}</p>
            @livewire('favorito-component',['usuario'=>Auth::user()->id,'libro'=>$libro->id])
            @if (Auth::user() && Auth::user()->rol == 'admin')
                <a  href="{{route('libros.edit',['libro'=>$libro->id])}}"
                    class="w-32 text-center focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">EDITAR</a>
                <form class="inline-block " action="{{route('libros.destroy',['libro'=>$libro->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-32 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">ELIMINAR</button>
                </form>
            @endif
        </div>

    </section>
</div>
