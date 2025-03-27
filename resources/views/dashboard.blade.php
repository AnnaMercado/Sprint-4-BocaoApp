<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-[var(--coral)] leading-tight mt-6 mb-2 text-center">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-4xl font-semibold text-[var(--teal)] mb-1 text-center mt-10 ">
                    {{ __('Buscador de Restaurantes') }}
                </h2>
                <h1 class="text-center text-m font-normal text-gray-700">
                    ¿Ya sabes lo que quieres? 
                    <span class="text-[var(--coral)]">¡Encuéntralo rápidamente!</span>
                </h1>
                <div class="p-6 text-gray-900">

                    <form action="{{ route('restaurants.search') }}" method="GET">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium" style="color: var(--teal-dark);">Nombre del Restaurante</label>
                                <input type="text" id="name" name="name" value="{{ request('name') }}" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                            </div>

                            <div class="mb-4">
                                <label for="qualification" class="block text-sm font-medium" style="color: var(--teal-dark);">Puntuación</label>
                                <input type="number" id="qualification" name="qualification" value="{{ request('qualification') }}" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" min="0" max="10">
                            </div>

                            <div class="mb-4">
                                <label for="open_days" class="block text-sm font-medium" style="color: var(--teal-dark);">Días Abiertos</label>
                                <select id="open_days" name="open_days" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Selecciona un día</option>
                                    <option value="laborables" {{ request('open_days') == 'laborables' ? 'selected' : '' }}>Laborables</option>
                                    <option value="martes_a_sabado" {{ request('open_days') == 'martes_a_sabado' ? 'selected' : '' }}>De Martes a Sábado</option>
                                    <option value="lunes_a_domingo" {{ request('open_days') == 'lunes_a_domingo' ? 'selected' : '' }}>De Lunes a Domingo</option>
                                    <option value="solo_noches" {{ request('open_days') == 'solo_noches' ? 'selected' : '' }}>Solo Noches</option>
                                    <option value="solo_mediodias" {{ request('open_days') == 'solo_mediodias' ? 'selected' : '' }}>Solo Mediodías</option>
                                    <option value="variable" {{ request('open_days') == 'variable' ? 'selected' : '' }}>Variable</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="price_range" class="block text-sm font-medium" style="color: var(--teal-dark);">Rango de Precio</label>
                                <select id="price_range" name="price_range" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                    <option value="">Selecciona un rango</option>
                                    <option value="€" {{ request('price_range') == '€' ? 'selected' : '' }}>€</option>
                                    <option value="€€" {{ request('price_range') == '€€' ? 'selected' : '' }}>€€</option>
                                    <option value="€€€" {{ request('price_range') == '€€€' ? 'selected' : '' }}>€€€</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="tags" class="block text-sm font-medium" style="color: var(--teal-dark);">Etiquetas</label>
                                <select id="tags" name="tags[]" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" multiple>
                                    <option value="">Selecciona las etiquetas</option>
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}" 
                                            @if(in_array($tag->id, request('tags', []))) 
                                                selected 
                                            @endif>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="mt-4 text-center">
                            <button type="submit" class="bg-teal-500 text-white py-2 px-6 rounded-lg hover:bg-teal-600 transition duration-200">
                                Buscar Restaurantes
                            </button>
                        </div>
                    </form>

                    @if(isset($restaurants) && $restaurants->count())
                        <div class="mt-6">
                            <h3 class="text-2xl font-semibold text-[var(--coral)]">Resultados:</h3>                            <ul class="mt-4">
                                @foreach ($restaurants as $restaurant)
                                    <li class="mb-4">
                                        <div class="bg-white p-4 rounded-lg shadow-md border border-light-gray">
                                            <h4 class="text-xl font-semibold text-teal-600">{{ $restaurant->name }}</h4>
                                            <p class="text-sm text-gray-700">Dirección: {{ $restaurant->adress }}</p>
                                            <p class="text-sm text-gray-700">Puntuación: {{ $restaurant->qualification }}</p>
                                            <p class="text-sm text-gray-700">Días Abiertos: {{ $restaurant->open_days }}</p>
                                            <div class="mt-2">
                                                <span class="text-sm text-gray-700">
                                                    @foreach($restaurant->tags as $tag)
                                                        <span class="bg-teal-100 text-teal-800 py-1 px-2 text-xs rounded-full mr-2">{{ $tag->name }}</span>
                                                    @endforeach
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <p class="mt-6 text-center text-gray-700">No se encontraron restaurantes que coincidan con los filtros aplicados.</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
