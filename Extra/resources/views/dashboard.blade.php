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
            body {
                color: white; /* Cambia el color del texto a blanco */
                font-size: 18px; /* Establece el tamaño de fuente en 18px */
            }

            .gallery {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Ajusta el tamaño mínimo y máximo de las columnas */
                gap: 20px;
            }

            .image-container {
                position: relative; /* Establece la posición del contenedor */
                width: 200px; /* Tamaño del contenedor */
                height: 200px;
                overflow: hidden; /* Oculta el desbordamiento de la imagen */
            }

            .image {
                display: block;
                width: 100%;
                height: auto;
                max-height: 100%; /* Ajusta la altura de la imagen al contenedor */
                object-fit: cover; /* Ajusta la imagen para que cubra todo el espacio disponible */
            }

            .image-info {
                position: absolute; /* Establece la posición del texto */
                bottom: 0; /* Coloca el texto en la parte inferior */
                left: 0; /* Coloca el texto en la esquina inferior izquierda */
                background-color: rgba(0, 0, 0, 0.5); /* Fondo semi-transparente */
                padding: 8px; /* Espaciado interno del texto */
                width: 100%; /* Ancho del texto igual al contenedor */
                box-sizing: border-box; /* Incluye el padding en el ancho total */
                text-align: center; /* Alinea el texto al centro */
            }

            .image-info p {
                margin: 0; /* Elimina el margen predeterminado del párrafo */
                color: white; /* Color del texto blanco */
            }
        </style>
    </head>
    <body>
        <br>
        <h1 class="text-lg font-semibold mb-4 text-white text-center">Últimas imágenes publicadas por usuarios</h1>
        <br>
        <br>

        @if($images->isNotEmpty())
            <div class="gallery">
                @foreach($images as $image)
                    <div class="image-container">
                        <img class="image" src="{{ asset($image->filename) }}" alt="">
                        <div class="image-info">
                            <p>Subido por: {{ $image->user->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>No hay imágenes disponibles.</p>
        @endif
    </body>
</x-app-layout>
</html>
