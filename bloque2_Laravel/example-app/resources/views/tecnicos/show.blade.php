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

    <h2>Técnicos</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoTecnicoModal">
        Nuevo
    </button>

    <div class="card text-center mt-3 mb-3">
        @if ($tecnico->estado == 'libre')
            <div class="card-header">
                {{$tecnico->estado}}
            </div>
        @else
            <div class="card-header text-danger">
                {{$tecnico->estado}}
            </div>
        @endif
        <div class="card-body">
            <h5 class="card-title">{{$tecnico->nombre}} {{$tecnico->apellidos}}</h5>
            <h6 class="card-title">{{$tecnico->telefono}}</h6>
            <p class="card-text">{{$tecnico->email}}</p>
        </div>
    </div>

    <h5>Incidencias totales asignadas: {{$numeroInc->incidencias_count}}</h5>

    <h5 class="mt-4">Incidencias pendientes o en proceso:</h5>
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
                    <a href="{{route('incidencias.delete', $incidencia->id)}}" class="btn btn-danger m-1">Eliminar</a>
                    <a href="{{route('incidencias.show', $incidencia->id)}}" class="btn btn-success m-1">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{route('tecnicos.index')}}" type="button" class="btn btn-secondary">Volver</a>

</div>


<!------------------   Modal  ------------------->
<!-- Modal -->
<div class="modal fade" id="nuevoTecnicoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Técnico</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route("tecnicos.store")}}" method="POST" id="nuevoTecnicoForm">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Pepe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="García Pérez">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" name="telefono" placeholder="621458823">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="pepegar@ayto.com">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" form="nuevoTecnicoForm">Guardar</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
