<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller


{
   
   
    public function dashboard()
    {
        $cvs = Cv::all(); // Obtiene todos los CVs desde la base de datos
        return view('dashboard', compact('cvs')); // Retorna la vista 'dashboard' con los datos
    } // Mostrar la lista de CV

    public function index()
    {
        $cvs = Cv::all();
        return view('cv.index', compact('cvs')); // Asegúrate de tener esta vista creada
    }

    // Almacenar un nuevo CV
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:cvs,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'portfolio' => 'nullable|url',
        ]);

        Cv::create($validatedData);

        return redirect()->back()->with('success', 'CV guardado exitosamente.');
    }

    // Mostrar el formulario para editar un CV
    public function edit($id)
    {
        $cv = Cv::findOrFail($id);
        return view('cv.edit', compact('cv')); // Asegúrate de tener esta vista creada
    }

    

    // Actualizar un CV existente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:cvs,email,' . $id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'experience' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'portfolio' => 'nullable|url',
        ]);

        $cv = Cv::findOrFail($id);
        $cv->update($validatedData);

        return redirect()->route('cv.index')->with('success', 'CV actualizado exitosamente.');
    }

    // Eliminar un CV
    public function destroy($id)
    {
        $cv = Cv::findOrFail($id);
        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'CV eliminado exitosamente.');
    }
}
