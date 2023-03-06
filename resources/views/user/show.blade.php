<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="flex items-center text-3xl font-semibold text-gray-700 mb-5">Detalles del Usuario</h2>
                    <!--Detalles del usuario-->
                    <div class="mt-10 flex justify-evenly justify-items-center mx-10">
                        <div class="flex-col w-full px-6">
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Nombre:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $user->name }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Apellidos:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $user->surname }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('DNI:') }}</h3>
                                <h4 class="text-xl inline-block">{{ $user->dni }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Dirección:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $user->address }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Teléfono:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $user->phone }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Edad:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $user->age }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Email:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $user->email }}<h4>
                            </div>
                            <div class="form-group">
                                <h3 class="text-2xl font-semibold text-gray-700 inline-block">{{ __('Rol:') }}</h3>
                                <h4 class="text-lg inline-block text-justify">{{ $user->rol }}<h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
