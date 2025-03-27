<x-app-layout>
    <div class="container px-20 py-38 mt-28 w-full max-w-full">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-4xl font-semibold text-[var(--teal)] mb-1 text-center mt-4 ">
                {{ __('Tus Restaurantes') }}
            </h2>
            @if (session()->has('success'))
                <div class="bg-green-100 text-green-800 p-4 mb-3 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="text-right mb-6">
                <a href="{{ route('restaurants.create') }}" class="bg-teal-500 text-white py-2 px-6 rounded-lg hover:bg-teal-600 transition duration-200">
                    Nuevo Restaurante
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-[#FF5F51] text-white"> 
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium">Nombre</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Puntuación</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Rango de precio</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Dirección</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Días Abierto</th>
                            <th class="px-6 py-3 text-left text-sm font-medium">Tags</th>
                            <th class="px-6 py-3 text-center text-sm font-medium">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($restaurants as $restaurant)
                            <tr class="hover:bg-teal-100"> <!-- Efecto hover en las filas-->
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $restaurant->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $restaurant->qualification }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $restaurant->price_range }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $restaurant->adress }}</td>

                                <td class="px-6 py-4 text-sm text-gray-800">{{ $restaurant->open_days }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    @foreach ($restaurant->tags as $tag)
                                        <span class="text-xs text-gray-600">{{ $tag->name }}</span><br>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-sm text-center">

                                    <a href="{{ route('restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="text-yellow-500 hover:text-yellow-600 transition duration-200">
                                        <i class="fas fa-pencil-alt mr-2"></i> Editar
                                    </a>

                                    <form method="post" action="{{ route('restaurants.delete', ['restaurant' => $restaurant->id]) }}" class="inline-block ml-4">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-500 hover:text-red-600 transition duration-200">
                                            <i class="fas fa-trash-alt mr-2"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $restaurants->links('pagination::tailwind') }} 
            </div>
        </div> 
    </div>
</x-app-layout>
