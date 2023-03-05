<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Editar usuario</h2>
                    <!--Formulario con el libro a editar-->
                    <div class="w-3/4 mx-auto">
                        <form action="{{ route('user.update', $user->id) }}" method="post"
                            @csrf
                            @method('PUT')
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="name">Nombre:</label><br>
                                <input type="text" name="name" id="name" class="form-control w-full"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="surname">Apellidos:</label><br>
                                <input type="text" name="surname" id="surname" class="form-control w-full"
                                    value="{{ $user->surname }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="dni">Dni:</label><br>
                                <input type="text" name="dni" id="dni" class="form-control w-full"
                                    value="{{ $user->dni }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="address">Dirección:</label><br>
                                <input type="text" name="address" id="address" class="form-control w-full"
                                    value="{{ $user->address }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="phone">Teléfono:</label><br>
                                <input type="text" name="phone" id="phone" class="form-control w-full"
                                    value="{{ $user->phone }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="age">Edad:</label><br>
                                <input type="text" name="age" id="age" class="form-control w-full"
                                    value="{{ $user->age }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="email">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control w-full"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group my-6">
                                <label class="text-xl font-semibold text-gray-700 inline-block" for="rol">Rol:</label><br>
                                <input type="text" name="rol" id="rol" class="form-control w-full"
                                    value="{{ $user->rol }}">
                            </div>
                            <button type="submit my-6"
                                class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Guardar
                                cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
