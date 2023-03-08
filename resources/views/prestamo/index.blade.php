<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            @if (session('status'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
                    role="alert">
                    <span class="font-medium"></span> {{ session('status') }}
                </div>
            @endif
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Préstamos Libros</h2>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Título del libro
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha de préstamo
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fecha de vencimiento
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($prestamos as $prestamo)
                                    @if ($prestamo->fecha_devolucion == null && $prestamo->id_user == Auth::user()->id)
                                        <tr class="bg-white border-b">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $prestamo->libro->titulo }}
                                            </th>
                                            <td class="px-6 py-4">{{ $prestamo->fecha_prestamo }}</td>
                                            <td class="px-6 py-4">{{ $prestamo->fecha_vencimiento }}</td>
                                            <td class="px-6 py-4">{{ $prestamo->fecha_devolucion }}</td>
                                            <td class="px-6 py-4">
                                                <form action="{{ route('prestamo.update', $prestamo->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Devolver</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
