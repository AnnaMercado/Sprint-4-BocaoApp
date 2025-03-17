<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Restaurantes</h2>
    <div>
        @if (session()->has('success'))
            <div>
               {{session('success')}}
            </div>
            
        @endif
        <div>
            <a href="{{route('restaurants.create')}}">Nuevo restaurante</a>
        </div>
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Días abierto</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->name}} </td>
                    <td>{{$restaurant->adress}} </td>
                    <td>{{$restaurant->open_days}} </td>
                    <td>
                        <a href="{{route('restaurants.edit', ['restaurant'=>$restaurant-> id] )}}">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('restaurants.delete', ['restaurant'=>$restaurant-> id] )}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>

                </tr>
                
            @endforeach

        </table>
    </div>
</body>
</html>