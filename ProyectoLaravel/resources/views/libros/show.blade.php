<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Libros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <x-libro-info :$libro :$url/>
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                <section class="flex flex-col justify-center items-center py-10 gap-12 w-full">
                    @auth

                    <div class="w-10/12">
                        <form method="POST" action="{{ route('comentarios.store') }}" class="w-full mb-5" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idLibro" value="{{$libro->id}}">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="comentario" id="comentario" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required ngModel />
                                <label for="comentario" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comentario...</label>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Comentar</button>

                        </form>
                    @else
                    <a class="text-blue-600 hover:underline ">INICIE SESION PARA PODER COMENTAR</a>
                    @endauth
                    @if (count($comentarios) > 0)
                                <div class="w-10/12 divide-y" >
                                    @foreach ($comentarios as $comentario)
                                    <div class="flex w-full p-5 " >
                                        <div class="flex flex-row justify-center gap-5">
                                            <div >
                                                <img class="rounded-full w-16 h-16 object-cover" src={{asset('storage/users_pfp/'.Auth::user()->pfp)}} alt="">
                                            </div>
                                            <div >
                                                <h1 class="font-extrabold">{{$comentario->nombre}}</h1>
                                                <h1 class="font-thin">{{$comentario->comentario}}</h1>
                                            </div>
                                    </div>
                                  </div>
                                    @endforeach
                              </div>
                        @else
                            <h2 class="text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('NO HAY COMENTARIOS') }}
                            </h2>
                        @endif

                    </div>
                </section>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
