<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('chirps.store') }}">
                        @csrf
                        <textarea name="message"
                                  class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                                  placeholder="{{ __('What\'s on your mind?') }}"
                        >{{ old('message') }}</textarea>
                        <x-input-error :messages="$errors->get('message')"
                            class="mt-2"
                        />
                        <x-primary-button class="mt-4">
                            {{ __('Chirp') }}
                        </x-primary-button>
                    </form>
                </div>
            </div>

            <div class="mt-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y dark:divide-gray-900">
                @foreach($chirps as $chirp)
                    <div class="p-6 flex flex-col space-y-2 border border-gray-700 rounded-lg mb-4">
                        <div class="flex justify-between">
                            <div>{{ $chirp->user->name }}</div> <!-- Nombre del usuario -->
                            <div class="flex space-x-2">
                                <a href="{{ route('chirps.edit', $chirp) }}" class="text-gray-500 dark:text-gray-300">
                                    Editar <!-- Texto descriptivo -->
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <!-- Icono de editar -->
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div>{{ $chirp->message }}</div> <!-- Muestra el contenido del mensaje -->

                        <div class="flex justify-end space-x-2">
                            <div class="flex space-x-2">
                                <form method="POST" action="{{ route('like', ['chirp' => $chirp->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-success">
                                        ❤️ <!-- Icono de Me gusta -->
                                        <span>{{ $chirp->likes }}</span>
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('dislike', ['chirp' => $chirp->id]) }}">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-secondary">
                                        👎 <!-- Icono de No me gusta -->
                                        <span>{{ $chirp->dislikes }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
