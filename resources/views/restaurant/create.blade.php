<x-app-layout>
    <div class="flex justify-center items-center min-h-screen" style="background-color: var(--off-white); mt-5">
        <div class="bg-white rounded-lg shadow-md p-6 w-full max-w-3xl border border-light-gray hover:shadow-xl transition duration-300">
            <!-- Título con color coral y hover más notorio -->
            <h2 class="text-3xl font-semibold text-[var(--coral)] mb-4 text-center hover:text-[var(--coral-hover)] cursor-pointer transition duration-300 ease-in-out">
                Nuevo Restaurante
            </h2>

            <!-- Success Message -->
            @if (session()->has('success'))
                <div class="bg-yellow-100 text-yellow-800 p-3 mb-4 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('restaurants.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <!-- Nombre del Restaurante -->
                    <div class="mb-3">
                        <label for="name" class="block text-sm font-medium" style="color: var(--teal-dark);">Nombre</label>
                        <input type="text" id="name" name="name" placeholder="Nombre del restaurante" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Dirección -->
                    <div class="mb-3">
                        <label for="adress" class="block text-sm font-medium" style="color: var(--teal-dark);">Dirección</label>
                        <input type="text" id="adress" name="adress" placeholder="Dirección" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                    </div>

                    <!-- Puntuación -->
                    <div class="mb-3">
                        <label for="qualification" class="block text-sm font-medium" style="color: var(--teal-dark);">Puntuación</label>
                        <input type="number" id="qualification" name="qualification" placeholder="¿Qué nota le pondrías?" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required min="0" max="10">
                    </div>

                    <!-- Rango de Precio (Desplegable) -->
                    <div class="mb-3">
                        <label for="price_range" class="block text-sm font-medium" style="color: var(--teal-dark);">Rango de Precio</label>
                        <select id="price_range" name="price_range" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="€">€</option>
                            <option value="€€">€€</option>
                            <option value="€€€">€€€</option>
                        </select>
                    </div>

                    <!-- Días Abiertos -->
                    <div class="mb-3">
                        <label for="open_days" class="block text-sm font-medium" style="color: var(--teal-dark);">Días Abiertos</label>
                        <select id="open_days" name="open_days" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                            <option value="laborables">Laborables</option>
                            <option value="martes_a_sabado">De Martes a Sábado</option>
                            <option value="lunes_a_domingo">De Lunes a Domingo</option>
                            <option value="solo_noches">Solo Noches</option>
                            <option value="solo_mediodias">Solo Mediodías</option>
                            <option value="variable">Variable</option>
                        </select>
                    </div>

                    <!-- Tags (Etiquetas) -->
                    <div class="mb-3">
                        <label for="tags" class="block text-sm font-medium" style="color: var(--teal-dark);">Etiquetas</label>
                        <select id="tags" name="tags[]" class="mt-1 block w-full px-3 py-2 border border-light-gray rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" multiple required>
                            <option value="" disabled>Selecciona las etiquetas</option>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <!-- Botón de Enviar con colores personalizados y hover -->
                <div class="mt-4 text-center">
                    <button type="submit" class="text-white py-2 px-6 rounded-lg transition duration-200 ease-in-out"
                            style="background-color: var(--teal);"
                            onmouseover="this.style.backgroundColor='var(--teal-dark)'" 
                            onmouseout="this.style.backgroundColor='var(--teal)'">
                        Añadir Restaurante
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
