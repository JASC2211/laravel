@extends('tema.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Hello!<h1>
        <a href="{{route('proyectos.index')}}" class="btn btn-primary">Ejemplos Proyectos</a>
    </div>
@endsection
