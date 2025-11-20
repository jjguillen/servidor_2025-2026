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
