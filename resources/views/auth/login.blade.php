<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <!-- Logo en la esquina izquierda -->
            <div>
                <img src="{{ asset('images/pngwing.com.png') }}" alt="Logo" class="w-16 h-16" />
            </div>

            <!-- Título del Dashboard -->
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Panel de Dashboard con estilo -->
            <div class="bg-gradient-to-r from-cyan-500 via-teal-400 to-teal-200 rounded-lg shadow-xl p-6">
                <div class="text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4 text-white">Bienvenido al Dashboard</h3>
                    <p class="text-lg text-white">{{ __("You're logged in!") }}</p>
                </div>

                <!-- Formulario para crear un CV básico (solo la parte gráfica) -->
                <div class="mt-8 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-semibold text-gray-800">Crear CV</h3>
                    <form method="POST" action="">
                        @csrf

                        <!-- Nombre -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Nombre')" />
                            <x-text-input id="name" class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Correo Electrónico')" />
                            <x-text-input id="email" class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" type="email" name="email" :value="old('email')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Experiencia Profesional -->
                        <div class="mt-4">
                            <x-input-label for="experience" :value="__('Experiencia Profesional')" />
                            <textarea id="experience" name="experience" class="form-input block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" rows="4">{{ old('experience') }}</textarea>
                            <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                        </div>

                        <!-- Educación -->
                        <div class="mt-4">
                            <x-input-label for="education" :value="__('Educación')" />
                            <textarea id="education" name="education" class="form-input block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" rows="4">{{ old('education') }}</textarea>
                            <x-input-error :messages="$errors->get('education')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                                {{ __('Guardar CV') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
