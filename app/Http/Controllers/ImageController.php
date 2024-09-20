<?php

namespace App\Http\Controllers;

// Dans le fichier app/Http/Controllers/ImageController.php
use Illuminate\Http\Request;
use App\Models\Image; // Si vous avez un modèle pour les images

class ImageController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        // Optionnel: Sauvegarder dans la base de données
        // Image::create(['name' => $imageName]);

        return back()->with('success', 'Image uploadée avec succès.')->with('image', $imageName);
    }
}
