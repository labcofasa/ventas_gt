@extends('layouts.auth')

@section('title', 'Inicio')

@section('content')
    <h1>Usuario autenticado</h1>
    <a class="btn btn-danger" href="{{ route('logout') }}">
        Cerrar sesion
    </a>
@endsection
