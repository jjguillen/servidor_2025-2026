<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Incidencias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="container">

    <h2>Técnicos</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoTecnicoModal">
        Nuevo
    </button>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Email</th>
            <th scope="col">Especialidades</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnicos as $tecnico)
            <tr>
                <td>{{$tecnico->nombre}}</td>
                <td>{{$tecnico->apellidos}}</td>
                <td>{{$tecnico->telefono}}</td>
                <td>{{$tecnico->email}}</td>
                <td>
                    @foreach($tecnico->especialidades as $especialidad)
                        <span class="me-1">{{$especialidad->nombre}}</span>
                    @endforeach
                </td>
                <td>
                    @if($tecnico->estado == 'libre')
                        <span class="badge bg-success">{{$tecnico->estado}}</span>
                    @else
                        <span class="badge bg-danger">{{$tecnico->estado}}</span>
                    @endif
                </td>
                <td class="d-flex gap-2">
                    <form action="{{route('tecnicos.destroy', $tecnico->id)}}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger m-1"><i class="bi bi-trash"></i></button>
                    </form>
                    <a href="{{route('tecnicos.show', $tecnico->id)}}" class="btn btn-outline-success m-1"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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
