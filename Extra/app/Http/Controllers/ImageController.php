<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta los requisitos según sea necesario
        ]);

        // Guardar la imagen en el directorio de almacenamiento
        $imageName = time() . '.' . $request->image->extension();  

        // Guardar la imagen en storage/app/public/images
        $request->image->storeAs('public/images', $imageName);
        
        // Obtener la ruta completa de la imagen almacenada
        $imagePath = 'storage/images/' . $imageName;
        
        // Crear una nueva instancia de Image y asignar los datos
        $image = new Image;
        $image->filename = $imagePath; // Asignar la ruta de la imagen en el almacenamiento
        $image->user_id = auth()->id(); // Asignar el ID del usuario actual
        $image->save();

        // Devolver una respuesta
        return back()->with('success', 'La imagen se ha subido correctamente.');
    }
}
