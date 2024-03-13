<!DOCTYPE html>
<html lang="en">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <style>
            /* Agrega estilos CSS según sea necesario */
        </style>
    </head>
    <body>
        <style>
              body {
                color: white; /* Cambia el color del texto a blanco */
                font-size: 18px; /* Establece el tamaño de fuente en 18px */
            }
            /* Estilos CSS */
            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Ajusta el tamaño mínimo y máximo de las columnas */
                gap: 20px;
            }
            .image {
                text-align: center;
            }
            .image img {
                max-width: 100%; /* La imagen se ajusta al ancho del contenedor */
                height: auto; /* La altura se ajusta proporcionalmente al ancho */
                max-height: 200px; /* Establece una altura máxima para las imágenes */
                object-fit: cover; /* Ajusta la imagen para que cubra todo el espacio disponible */
            }
        
        </style>
        <h1>Últimas imágenes publicadas por usuarios</h1>
        <br>

        @if($images->isNotEmpty())
            <div class="gallery">

                @foreach($images as $image)
                    <div class="image">
                    
                    <img src="{{ asset($image->filename) }}" alt="">

                        <p>Subido por: {{ $image->user->name }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay imágenes disponibles.</p>
        @endif
    </body>
</x-app-layout>
</html>
