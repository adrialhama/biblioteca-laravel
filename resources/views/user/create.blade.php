<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200 w-3/4 mx-auto">
                    <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nombre</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,255}$">
                        </div>
                        <div class="mb-6">
                            <label for="surname" class="block mb-2 text-sm font-medium text-gray-900">Apellidos</label>
                            <input type="text" id="surname" name="surname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]{1,255}$">
                        </div>
                        <div class="mb-6">
                            <label for="dni" class="block mb-2 text-sm font-medium text-gray-900">DNI</label>
                            <input type="text" id="dni" name="dni"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[0-9]{8}[A-Za-z]{1}$">
                        </div>
                        <div class="mb-6">
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Dirección</label>
                            <input type="text" id="address" name="address"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s\/\.\º]{1,255}">>
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900">Teléfono</label>
                            <input type="text" id="phone" name="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[0-9]{9}$">
                        </div>
                        <div class="mb-6">
                            <label for="age" class="block mb-2 text-sm font-medium text-gray-900">Edad</label>
                            <input type="text" id="age" name="age"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[0-9]{2,3}$">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                            <input type="text" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$">
                        </div>
                        <div class="mb-6">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Contraseña</label>
                            <input type="password" id="password" name="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required pattern="^.{8,}$">
                        </div>
                        <div class="mb-6">
                            <label for="rol" class="block mb-2 text-sm font-medium text-gray-900">Rol</label>
                            <select id="rol" name="rol" class="form-select text-sm font-medium text-gray-900">
                                <option value="usuario">Usuario</option>
                                <option value="bibliotecario">Bibliotecario</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                            Añadir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
