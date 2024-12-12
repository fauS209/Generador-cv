<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class CvController extends Controller
{
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
}
