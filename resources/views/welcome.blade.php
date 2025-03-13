<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bocao - Encuentra y Organiza Restaurantes</title>
    @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">Bocao</div>
        <div class="buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Iniciar sesión</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Registrarse</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <div class="stars">
                <svg viewBox="0 0 24 24"><polygon points="12,2 15,10 23,10 17,15 19,23 12,18 5,23 7,15 1,10 9,10"></polygon></svg>
                <svg viewBox="0 0 24 24"><polygon points="12,2 15,10 23,10 17,15 19,23 12,18 5,23 7,15 1,10 9,10"></polygon></svg>
                <svg viewBox="0 0 24 24"><polygon points="12,2 15,10 23,10 17,15 19,23 12,18 5,23 7,15 1,10 9,10"></polygon></svg>
                <svg viewBox="0 0 24 24"><polygon points="12,2 15,10 23,10 17,15 19,23 12,18 5,23 7,15 1,10 9,10"></polygon></svg>
                <svg viewBox="0 0 24 24"><polygon points="12,2 15,10 23,10 17,15 19,23 12,18 5,23 7,15 1,10 9,10"></polygon></svg>
            </div>
            <p>Guarda tus restaurantes favoritos, encuentra el que necesites, organiza los que aún no has probado. <br>
                <em>¡Y no te comas la cabeza!</em>
            </p>
            <a href="#features" class="cta">Descubre Bocao</a>
        </div>
    </section>

    <!-- Introduction Section -->
    <section id="features" class="features-section">
        <h2 class="section-title">¿Qué es Bocao?</h2>
        <p class="section-description">
            Bocao es tu mejor amigo para organizar y encontrar los restaurantes que has probado. No importa si estás buscando algo específico o si solo quieres recordar el sitio que te encantó, ¡todo estará al alcance de tu mano!
        </p>
    </section>
    <!-- Feature Cards -->
    <section class="feature-cards-container">
        <!-- Cards will be dynamically generated here by JS -->
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section">
        <p class="cta-text">Es hora de organizar tu aventura gastronómica. ¡Y lo mejor, sin complicaciones!</p>
        <a href="#" class="cta">Comienza ahora</a>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2025 Bocao - Comer bien nunca fue tan fácil.</p>
    </footer>
</body>

</html>