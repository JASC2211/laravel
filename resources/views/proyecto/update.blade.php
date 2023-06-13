@extends('tema.base')

@section('content')
    <div class="container py-5 text-center">
            <h1>Editar Proyecto</h1>
            <form action="{{route('proyectos.update',$Proyectos)}}" method="post">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Proyecto</label>
                    <input type="text" name="nombreProyecto" class="form-control" placeholder="Nombre del proyecto" value="{{old('nombreProyecto') ?? @$proyectos->nombreProyecto}}">
                    @error('nombreProyecto')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="fuente" class="form-label">Fuente Fondos</label>
                    <input type="text" name="fuenteFondos" class="form-control" placeholder="Fuente fondos" step="0.01" value="{{old('fuenteFondos') ?? @$proyectos->fuenteFondos}}">
                    @error('fuenteFondos')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="planificado" class="form-label">Monto planificado</label>
                    <input type="text" name="montoPlanificado" class="form-control" placeholder="Monto planificado" step="0.01" value="{{old('montoPlanificado') ?? @$proyectos->montoPlanificado}}">
                    @error('montoPlanificado')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="patrocinado" class="form-label">Monto patrocinado</label>
                    <input type="text" name="montoPatrocinado" class="form-control" placeholder="Monto patrocinado" step="0.01" value="{{old('montoPatrocinado') ?? @$proyectos->montoPatrocinado}}">
                    @error('montoPatrocinado')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="propios" class="form-label">Monto fondo propios</label>
                    <input type="text" name="montoFondosPropios" class="form-control" placeholder="Monto fondo propios" step="0.01" value="{{old('montoFondosPropios') ?? @$proyectos->montoFondosPropios}}">
                    @error('montoFondosPropios')
                        <p class="form-text text-danger">{{$message}}</p>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-primary">Editar Proyecto</button>
           </form>
    </div>
@endsection
