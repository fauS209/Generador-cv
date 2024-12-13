<x-app-layout>
    <x-slot name="header">
       
        <div class="flex justify-center py-4">
            <img src="{{ asset('images/pngwing.com.png') }}" alt="Logo" class="w-20 h-20" />
        </div>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Editar CV') }}
        </h2>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                

                <form method="POST" action="{{ route('cv.update', $cv->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mt-6">
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="name" value="{{ $cv->name }}" required />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    
                    <div class="mt-6">
                        <x-input-label for="email" :value="__('Correo Electrónico')" />
                        <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="email" name="email" value="{{ $cv->email }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                
                    <div class="mt-6">
                        <x-input-label for="phone" :value="__('Teléfono')" />
                        <x-text-input id="phone" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="phone" value="{{ $cv->phone }}" required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                   
                    <div class="mt-6">
                        <x-input-label for="address" :value="__('Dirección')" />
                        <x-text-input id="address" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="text" name="address" value="{{ $cv->address }}" required />
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                  
                    <div class="mt-6">
                        <x-input-label for="experience" :value="__('Experiencia Profesional')" />
                        <textarea id="experience" name="experience" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $cv->experience }}</textarea>
                        <x-input-error :messages="$errors->get('experience')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <x-input-label for="education" :value="__('Educación')" />
                        <textarea id="education" name="education" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $cv->education }}</textarea>
                        <x-input-error :messages="$errors->get('education')" class="mt-2" />
                    </div>

                  
                    <div class="mt-6">
                        <x-input-label for="skills" :value="__('Habilidades')" />
                        <textarea id="skills" name="skills" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ $cv->skills }}</textarea>
                        <x-input-error :messages="$errors->get('skills')" class="mt-2" />
                    </div>

                
                    <div class="mt-6">
                        <x-input-label for="portfolio" :value="__('Enlace de Portafolio')" />
                        <x-text-input id="portfolio" class="block mt-1 w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" type="url" name="portfolio" value="{{ $cv->portfolio }}" />
                        <x-input-error :messages="$errors->get('portfolio')" class="mt-2" />
                    </div>

                   
                    <div class="flex items-center justify-center mt-8">
                        <x-primary-button class="bg-green-500 hover:bg-green-700">
                            {{ __('Actualizar CV') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-slot>
</x-app-layout>
