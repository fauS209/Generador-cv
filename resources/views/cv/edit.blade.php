<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar CV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4">Editar Información del CV</h3>
                <form method="POST" action="{{ route('cv.update', $cv->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Nombre -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $cv->name }}" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Correo Electrónico -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Correo Electrónico')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $cv->email }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Teléfono -->
                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $cv->phone }}" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Dirección -->
                    <div class="mt-4">
                        <x-input-label for="address" :value="__('Dirección')" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $cv->address }}" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <!-- Experiencia Profesional -->
                    <div class="mt-4">
                        <x-input-label for="experience" :value="__('Experiencia Profesional')" />
                        <textarea id="experience" name="experience" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ $cv->experience }}</textarea>
                        <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                    </div>

                    <!-- Educación -->
                    <div class="mt-4">
                        <x-input-label for="education" :value="__('Educación')" />
                        <textarea id="education" name="education" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ $cv->education }}</textarea>
                        <x-input-error :messages="$errors->get('education')" class="mt-2" />
                    </div>

                    <!-- Habilidades -->
                    <div class="mt-4">
                        <x-input-label for="skills" :value="__('Habilidades')" />
                        <textarea id="skills" name="skills" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ $cv->skills }}</textarea>
                        <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                    </div>

                    <!-- Enlace de Portafolio -->
                    <div class="mt-4">
                        <x-input-label for="portfolio" :value="__('Enlace de Portafolio')" />
                        <x-text-input id="portfolio" class="block mt-1 w-full" type="url" name="portfolio" value="{{ $cv->portfolio }}" />
                        <x-input-error :messages="$errors->get('portfolio')" class="mt-2" />
                    </div>

                    <!-- Botón para guardar -->
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Actualizar CV') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
