<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <!-- Logo en el navbar en la esquina izquierda -->
            <div>
                <img src="{{ asset('images/pngwing.com.png') }}" alt="Logo" class="w-16 h-16" />
            </div>

            <!-- Título sin "Dashboard" -->
            <h2 class="font-semibold text-xl text-black-800 leading-tight">
                {{ __('Crear CV') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-cyan-500 via-teal-400 to-teal-200 rounded-lg shadow-xl p-6">
                <div class="text-gray-900">
                    <h3 class="text-2xl font-semibold mb-4 text-black">Formulario de Creación de CV</h3>
                    <p class="text-lg text-black">Por favor, rellena los campos a continuación con la información necesaria para generar tu CV.</p>
                </div>

                <!-- Formulario para crear un CV básico (con más campos) -->
                <div class="mt-8 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                    <form method="POST" action="{{ route('cv.store') }}">
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

                        <!-- Teléfono -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono')" />
                            <x-text-input id="phone" class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" type="text" name="phone" :value="old('phone')" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Dirección -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Dirección')" />
                            <x-text-input id="address" class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" type="text" name="address" :value="old('address')" required />
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
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

                        <!-- Habilidades -->
                        <div class="mt-4">
                            <x-input-label for="skills" :value="__('Habilidades')" />
                            <textarea id="skills" name="skills" class="form-input block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500" rows="4">{{ old('skills') }}</textarea>
                            <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                        </div>

                        <!-- Enlace de Portafolio -->
                        <div class="mt-4">
                            <x-input-label for="portfolio" :value="__('Enlace de Portafolio')" />
                            <x-text-input id="portfolio" class="block mt-1 w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500" type="url" name="portfolio" :value="old('portfolio')" />
                            <x-input-error :messages="$errors->get('portfolio')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="bg-teal-600 hover:bg-teal-700 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-teal-500">
                                {{ __('Guardar CV') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>

            <!-- Sección para editar y eliminar CV -->
            <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-semibold text-black mb-4">Lista de CV</h3>
                <table class="min-w-full table-auto border-collapse border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-left">Nombre</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Correo Electrónico</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cvs as $cv)
                            <tr class="border-b border-gray-200">
                                <td class="px-4 py-2">{{ $cv->name }}</td>
                                <td class="px-4 py-2">{{ $cv->email }}</td>
                                <td class="px-4 py-2">{{ $cv->phone }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <!-- Mensaje si no hay CV -->
                @if ($cvs->isEmpty())
                    <p class="mt-4 text-gray-500">No hay CV creados.</p>
                @endif
            
                <!-- Botón para gestionar CVs -->
                <div class="mt-6">
                    <a href="/cv" class="bg-red-600 hover:bg-teal-700 text-white px-6 py-2 rounded-md">
                        Gestión de CVs
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
