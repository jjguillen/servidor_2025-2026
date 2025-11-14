<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">

        <h2>Incidencias</h2>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Latitud</th>
                <th scope="col">Longitud</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Estado</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($incidencias as $incidencia)
                <tr>
                    <td>{{$incidencia->id}}</td>
                    <td>{{$incidencia->latitud}}</td>
                    <td>{{$incidencia->longitud}}</td>
                    <td>{{$incidencia->ciudad}}</td>
                    <td>{{$incidencia->direccion}}</td>
                    <td>{{$incidencia->estado}}</td>
                    <td>{{$incidencia->descripcion}}</td>
                    <td>
                        <a href="{{route('incidencias.delete', $incidencia->id)}}" class="btn btn-danger">X</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $incidencias->links() }}
    </div>

</body>
</html>
