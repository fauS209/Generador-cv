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
        $cvs = Cv::all();
        return view('dashboard', compact('cvs'));
    }

    public function index()
    {
        $cvs = Cv::all();
        return view('cv.index', compact('cvs'));
    }

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

    public function edit($id)
    {
        $cv = Cv::findOrFail($id);
        return view('cv.edit', compact('cv'));
    }

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

    public function destroy($id)
    {
        $cv = Cv::findOrFail($id);
        $cv->delete();

        return redirect()->route('cv.index')->with('success', 'CV eliminado exitosamente.');
    }
    
    public function generatePdf($id)
    {
        $cv = Cv::findOrFail($id);

        $dompdf = new Dompdf();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);

        $html = view('cv.pdf', compact('cv'))->render();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return $dompdf->stream('cv-' . $cv->name . '.pdf', ['Attachment' => 0]);
    }
}
