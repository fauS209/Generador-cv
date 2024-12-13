<x-app-layout>
    <x-slot name="header">
       

        
        <div class="flex justify-center items-center ">
            <img src="{{ asset('images/pngwing.com.png') }}" alt="Logo" class="w-16 h-16" />
        </div>

  

    <div class="flex justify-center items-center mt-12">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <h2 class="font-semibold text-xl text-black-800 leading-tight">
                {{ __('Lista de CVs') }}
            </h2>
            <table class="min-w-full table-auto border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left">Nombre</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Correo Electrónico</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Teléfono</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cvs as $cv)
                        <tr class="border-b border-gray-200">
                            <td class="px-4 py-2">{{ $cv->name }}</td>
                            <td class="px-4 py-2">{{ $cv->email }}</td>
                            <td class="px-4 py-2">{{ $cv->phone }}</td>
                            <td class="px-4 py-2 flex items-center gap-2">
                                <!-- Botón para editar -->
                                <a href="{{ route('cv.edit', $cv->id) }}" class="bg-red-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                                    Editar
                                </a>
                                
                                <!-- Botón para eliminar -->
                                <form method="POST" action="{{ route('cv.destroy', $cv->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md"
                                        onclick="return confirm('¿Estás seguro de que deseas eliminar este CV?')">
                                        Eliminar
                                    </button>
                                </form>
                    
                                <!-- Botón para generar PDF -->
                                <a href="{{ route('cv.pdf', $cv->id) }}" class="bg-red-600 hover:bg-yellow-600 text-white px-4 py-2 rounded-md">
                                    PDF
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
    
            <!-- Mensaje si no hay CV -->
            @if ($cvs->isEmpty())
                <p class="mt-4 text-gray-500">No hay CV creados.</p>
            @endif
        </div>
    </div>
</x-slot>
</x-app-layout>
