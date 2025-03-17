<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Restaurante</title>

    <style>
        /* Colores principales */
        :root {
            --teal: #008080;
            --coral: #FF6F61;
            --yellow: #FFEB3B;
        }

        /* Estilo general de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: var(--teal);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: white;
        }

        /* Estilo de la card */
        .card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative;
        }

        /* Botón para cerrar */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: transparent;
            border: none;
            color: var(--teal);
            font-size: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-btn:hover {
            color: var(--coral);
        }

        h2 {
            color: var(--teal);
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        label {
            font-size: 16px;
            color: var(--teal);
            margin-bottom: 8px;
            text-align: left;
            width: 100%;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input:focus {
            border-color: var(--teal);
            outline: none;
        }

        button {
            background-color: var(--coral);
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: var(--yellow);
            color: var(--teal);
        }

        /* Estilos para el formulario */
        .form-footer {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="card">
        <!-- Botón para cerrar -->
        <button class="close-btn" onclick="closeForm()">×</button>
        
        <h2>Añadir un nuevo restaurante</h2>
        <form action="{{ route('restaurants.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del Restaurante</label>
                <input type="text" id="name" name="name" placeholder="Nombre del restaurante" required>
            </div>

            <div class="form-group">
                <label for="link">Direccion</label>
                <input type="text" id="adress" name="adress" placeholder="Direccion" required>
            </div>

            <div class="form-group">
                <label for="open_days">Días Abiertos</label>
                <input type="text" id="open_days" name="open_days" placeholder="Días abiertos (Lunes, Martes, etc.)" required>
            </div>

            <div class="form-footer">
                <button type="submit">Añadir Restaurante</button>
            </div>
        </form>
    </div>

    <script>
        // Función para cerrar el formulario
        function closeForm() {
            const card = document.querySelector('.card');
            card.style.display = 'none'; // Oculta la card
        }
    </script>

</body>
</html>
