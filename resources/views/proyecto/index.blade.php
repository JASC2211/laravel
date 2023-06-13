@extends('tema.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Listado de proyectos<h1>
            <br>
        <a href="{{route('proyectos.create')}}" class="btn btn-primary">Crear Proyecto</a>

        @if(Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{Session::get('mensaje')}}
            </div>
        @endif
        <table class="table" style='font-size: 25px'>
            <thead>
                <th>Nombre del Proyecto</th>
                <th>Fuente Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse($proyectos as $detail)
                    <tr>
                        <td>{{$detail->nombreProyecto}}</td>
                        <td>{{$detail->fuenteFondos}}</td>
                        <td>{{$detail->montoPlanificado}}</td>
                        <td>{{$detail->montoPatrocinado}}</td>
                        <td>{{$detail->montoFondosPropios}}</td>
                        <td>
                            <a href="{{route('proyectos.edit',$detail)}}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('proyectos.destroy', $detail) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No hay registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div style='font-size: 15px'>
            @if($proyectos->count())
            {{$proyectos->links()}}
        @endif
        </div>
    </div>
@endsection
