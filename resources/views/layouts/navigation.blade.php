<nav x-data="{ open: false }" class="navbar">
    @vite(['resources/css/app.css', 'resources/css/home.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <!-- Primary Navigation Menu -->
    <div class="flex justify-between w-full items-center">
        <!-- Logo -->
        <div class="logo">Bocao</div>

        <!-- Navigation Links (Center aligned) -->
        <div class="flex space-x-12 w-full justify-center">
            <x-nav-link :href="route('restaurants.index')" :active="request()->routeIs('restaurants.index')" class="text-white text-3xl font-semibold hover:text-[#FF7F50] transition duration-300">
                {{ __('Tus Restaurantes') }}
            </x-nav-link>
            
            <x-nav-link :href="route('restaurants.search')" :active="request()->routeIs('restaurants.search')" class="text-white text-3xl font-semibold hover:text-[#FF7F50] transition duration-300">
                {{ __('Buscador') }}
            </x-nav-link>

            <x-nav-link :href="route('restaurants.discover')" :active="request()->routeIs('restaurants.discover')" class="text-white text-3xl font-semibold hover:text-[#FF7F50] transition duration-300">
                {{ __('Descubre') }}
            </x-nav-link>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:space-x-4">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md text-white bg-transparent hover:text-white focus:outline-none">
                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Configuración') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>
