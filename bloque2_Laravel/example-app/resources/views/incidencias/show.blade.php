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

        <div class="card text-center mt-3 mb-3">
            <div class="card-header
                @if($incidencia->estado === 'pendiente') bg-warning text-dark
                @elseif($incidencia->estado === 'en proceso') bg-info text-white
                @elseif($incidencia->estado === 'resuelta') bg-success text-white
                @endif">
                {{ ucfirst($incidencia->estado) }}
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$incidencia->ciudad}}</h5>
                <h6 class="card-title">{{$incidencia->direccion}}</h6>
                <p class="card-text">{{$incidencia->descripcion}}</p>
                @if(isset($incidencia->imagen))
                    <img src="{{asset("storage/".$incidencia->imagen)}}">
                @endif
            </div>
            <div class="card-footer text-muted">
                <p><strong>Técnico asignado:</strong>
                    @if($incidencia->tecnico)
                        {{ $incidencia->tecnico->nombre }}
                    @else
                        <span class="text-muted">No asignado</span>
                    @endif
                </p>
                {{$incidencia->created_at}}
            </div>
        </div>

        <a href="{{route('incidencias.index')}}" type="button" class="btn btn-secondary">Volver</a>


    </div>


</body>
</html>
