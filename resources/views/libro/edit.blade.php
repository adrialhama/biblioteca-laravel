<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Editar Libro</h2>
                    <!--Formulario con el libro a editar-->
                    <form action="{{ route('libro.update', $libro->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $libro->titulo }}">
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor:</label>
                            <input type="text" name="autor" id="autor" class="form-control" value="{{ $libro->autor }}">
                        </div>
                        <div class="form-group">
                            <label for="editorial">Editorial:</label>
                            <input type="text" name="editorial" id="editorial" class="form-control" value="{{ $libro->editorial }}">
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto:</label>
                            <input type="file" name="foto" id="foto" class="form-control-file">
                            <img src="{{ asset($url . $libro->foto) }}" alt="{{ $libro->titulo }}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control">{{ $libro->descripcion }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
