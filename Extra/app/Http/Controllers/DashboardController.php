<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class DashboardController extends Controller
{
    public function image()
    {
        // Obtener las 10 imágenes más recientes con sus usuarios relacionados
        $images = Image::with('user')
            ->latest() // Ordenar por fecha de creación, de más reciente a más antigua
            ->limit(20) // Limitar los resultados a 10
            ->get();

        // Retornar la vista 'dashboard' y pasar las imágenes como una variable
        return view('dashboard', compact('images'));
    }

    public function images()
    {
        $images = Image::with('user')->get();
        return view('dashboard', compact('images'));
    }
}