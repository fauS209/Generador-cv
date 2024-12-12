<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF; // Importar Dompdf

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Datos que quieres pasar al PDF
        $data = [
            'name' => 'Juan Pérez',
            'email' => 'juan@correo.com',
            'phone' => '123456789',
            // Otros datos
        ];

        // Cargar la vista con los datos
        #$pdf = PDF::loadView('cv.pdf_template', $data);

        // Descargar el PDF generado
       # return $pdf->download('cv_juan_perez.pdf');
    }
}
