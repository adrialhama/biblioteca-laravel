<div>
    <input type="text" class="rounded-lg" wire:model="buscar" placeholder="Buscar libros..." />
    <!--Muestro los todos los libros-->
    <div class="flex flex-row justify-center items-center flex-wrap mt-5">
        @if ($libros->count())
            @foreach ($libros as $libro)
            <div class="max-w-xs bg-white border border-gray-200 rounded-lg shadow flex-col flex-shrink m-5">
                <a href="{{route('libro.show', ['libro'=>$libro->id])}}">
                    <img class="rounded-t-lg w-full" src="{{asset($url.$libro->foto)}}" alt="{{$libro->titulo}}" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                            {{ $libro->titulo }}
                        </h2>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">
                        Autor:  {{ $libro->autor }}
                    </p>
                    <p class="mb-3 font-normal text-gray-700">
                        Editorial:  {{ $libro->editorial }}
                    </p>
                    <!--Para mostrar la ruta libro.show hay que pasar un array con el id del libro. Igual para edit-->
                    <a href="{{route('libro.show', ['libro'=>$libro->id])}}"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                        Ver
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <!--Aplico la politica de autorización para que los usuarios cuyo rol sea admin o bibliotecario puedan editar o borrar un libro-->
                    @can('update', $libro)
                        <a href="{{route('libro.edit', ['libro'=>$libro->id])}}">
                            <button type="button" class="text-gray-800 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                Editar
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                        </a>
                    @endcan
                    @can('delete', $libro)
                        <!--Para el botón de borrar que va por post en la ruta. Hay que incluirle el method delete. Lleva a al LibrosController al método de destroy -->
                        <form class="inline-block" action="{{route('libro.destroy', ['libro'=>$libro->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" value="Eliminar">
                        </form>
                    @endcan
                </div>
            </div>
            @endforeach
        @else
            <h2 class="text-2xl text-red-400">No se ha encontrado ningún libro</h2>
        @endif
    </div>
</div>

