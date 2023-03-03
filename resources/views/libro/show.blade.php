<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Detalles del Libro</h2>
                    <!--Detalles del libro donde voy a incluir los botones de préstamo y devolución-->
                    <div class="mt-10 flex justify-evenly justify-items-center mx-10">
                        <div class="flex-col w-full px-8">
                            <img src="{{ asset($url . $libro->foto) }}" alt="{{ $libro->titulo }}">
                        </div>
                        <div class="flex-col w-full px-6">
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Título:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $libro->titulo }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Autor:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $libro->autor }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Editorial:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $libro->editorial }}<h4>
                            </div>

                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Descripción:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $libro->descripcion }}<h4>
                            </div>

                            @php
                                $prestamo = App\Models\Prestamos::where('id_libro', $libro->id)
                                    ->whereNull('fecha_devolucion')
                                    ->first();
                            @endphp

                            @if ($prestamo)
                                <button type="button"
                                    class="text-white mt-6 bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    disabled>
                                    Libro prestado
                                </button>
                            @else
                                <form action="{{ route('prestamo.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value='{{ $libro->id }}'>
                                    <button type="submit"
                                        class="text-white mt-6 bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                        Solicitar Préstamo
                                    </button>
                                </form>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
