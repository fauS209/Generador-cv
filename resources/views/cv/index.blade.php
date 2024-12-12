<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            {{ __('Lista de CVs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h3 class="text-2xl font-semibold mb-4 text-black">Lista de CVs</h3>

                @if ($cvs->isEmpty())
                    <p>No hay CVs disponibles.</p>
                @else
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">Nombre</th>
                                <th class="py-2 px-4 border-b">Correo Electrónico</th>
                                <th class="py-2 px-4 border-b">Teléfono</th>
                                <th class="py-2 px-4 border-b">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cvs as $cv)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $cv->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $cv->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $cv->phone }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('cv.edit', $cv->id) }}" class="text-teal-600 hover:text-teal-800">Editar</a>
                                        <form method="POST" action="{{ route('cv.destroy', $cv->id) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 ml-4">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
