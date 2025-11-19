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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevaIncidenciaModal">
        Nueva
        </button>

        <div class="card text-center mt-3 mb-3">
            <div class="card-header">
                {{$incidencia->estado}}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$incidencia->ciudad}}</h5>
                <h6 class="card-title">{{$incidencia->direccion}}</h6>
                <p class="card-text">{{$incidencia->descripcion}}</p>

            </div>
            <div class="card-footer text-muted">
                {{$incidencia->created_at}}
            </div>
        </div>

        <a href="{{route('incidencias.index')}}" type="button" class="btn btn-secondary">Volver</a>


    </div>


<!------------------   Modal  ------------------->
    <!-- Modal -->
    <div class="modal fade" id="nuevaIncidenciaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Incidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("incidencias.store")}}" method="POST" id="nuevaIncidenciaForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Latitud</label>
                            <input type="text" class="form-control" name="latitud" placeholder="101.256789">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Longitud</label>
                            <input type="text" class="form-control" name="longitud" placeholder="101.256789">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ciudad</label>
                            <input type="text" class="form-control" name="ciudad" placeholder="Mojácar">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dirección</label>
                            <input type="text" class="form-control" name="direccion" placeholder="C/ Luz 13">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea class="form-control" name="descripcion" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="nuevaIncidenciaForm">Guardar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
