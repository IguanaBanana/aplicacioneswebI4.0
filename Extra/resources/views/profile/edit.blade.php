<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
    <br>
    <form action="{{ route('upload.image') }}" method="POST" enctype="multipart/form-data" class="mb-4"> <!-- Cambia my-4 por mb-4 -->
        @csrf
        <div class="flex items-center justify-center w-full">
            <label for="image" class="cursor-pointer bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                Seleccionar imagen
            </label>
            <input id="image" type="file" name="image" class="hidden" onchange="showFileName(this)">
            <span id="file-name" class="ml-4 text-white"></span>
            <button type="submit" class="ml-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                Subir Imagen
            </button>
        </div>
    </form>

    <!-- Mensajes de éxito o error al subir la imagen -->
    @if(session('success'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-white">
                <div class="max-w-xl mx-auto"> <!-- Ajusta la clase max-w-xl -->
                     {{ session('success') }}
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-white">
                <div class="max-w-xl mx-auto"> <!-- Ajusta la clase max-w-xl -->
                 {{ session('error') }}
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <!-- Mostrar imágenes del usuario con opción para eliminar -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <h2 class="text-lg font-semibold mb-4 text-white text-center">Imágenes del usuario</h2> <!-- Ajusta el texto -->
                    @if($user->images->isNotEmpty())
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 justify-center"> <!-- Cambia grid por justify-center -->
                            @foreach($user->images as $image)
                                <div class="relative">
                                    <img src="{{ asset($image->filename) }}" alt="" class="rounded-lg max-w-full h-auto">
                                    <form action="{{ route('delete.image', $image->id) }}" method="POST" class="absolute top-2 right-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded-lg">Eliminar</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-white text-center">No hay imágenes disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function showFileName(input) {
        const fileName = input.files[0].name;
        document.getElementById('file-name').innerText = fileName;
    }
</script>
