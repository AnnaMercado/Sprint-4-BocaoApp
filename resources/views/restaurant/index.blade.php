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
        <table border="1">
            <tr>
                <th>Nombre</th>
                <th>Link</th>
                <th>Días abierto</th>
                <th>Editar</th>
            </tr>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{$restaurant->name}} </td>
                    <td>{{$restaurant->link}} </td>
                    <td>{{$restaurant->open_days}} </td>
                    <td>
                        <a href="{{route('restaurants.edit', ['restaurant'=>$restaurant-> id_restaurant] )}}">Edit</a>
                    </td>

                </tr>
                
            @endforeach

        </table>
    </div>
</body>
</html>