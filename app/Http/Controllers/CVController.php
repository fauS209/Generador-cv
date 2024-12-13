<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Cv;

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
    
    public function generatePdf($id)
{
    $cv = Cv::findOrFail($id); // Obtener el CV por su ID

    // Crear una nueva instancia de Dompdf
    $dompdf = new Dompdf();

    // Configurar opciones para Dompdf (si es necesario)
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf->setOptions($options);

    // Generar el HTML para el PDF
    $html = view('cv.pdf', compact('cv'))->render(); // Usamos la vista Blade para el contenido

    // Cargar el HTML en Dompdf
    $dompdf->loadHtml($html);

    // (Opcional) Configurar el tamaño del papel y orientación
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar el PDF (esto convierte el HTML a PDF)
    $dompdf->render();

    // Descargar el PDF con el nombre basado en el CV
    return $dompdf->stream('cv-' . $cv->name . '.pdf', ['Attachment' => 0]);
}

}
