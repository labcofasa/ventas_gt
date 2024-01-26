@extends('layouts.guest')

@section('title', 'Inicio de sesión')

@section('content')
    <div class="container px-3">
        <x-auth.animated-background />
        <div class="login">
            <div class="row form">
                <div class="col d-none d-lg-block px-0">
                    <x-auth.carousel :publicidades="$publicidades" />
                </div>
                <div class="col form-group">
                    <div class="input-box">
                        <div class="logo">
                            <img src="{{ asset('images/cofasa.svg') }}" alt="logo">
                        </div>
                        <h5 class="titulo-aut">Sistema de Ventas</h5>
                        <header>Inicio de sesión</header>
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="input-field">
                                <input type="text" id="username" name="username"
                                    class="input @error('username') is-invalid @enderror" required autocomplete="off"
                                    autofocus value="{{ old('username') }}" />
                                <label for="username">Correo electrónico</label>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="input-field">
                                <input type="password" name="password"
                                    class="input input-password @error('password') is-invalid @enderror" id="pass"
                                    required autocomplete="off" />
                                <label for="pass">Contraseña</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                                @if (session('success'))
                                    <span class="success-feedback" role="alert">
                                        {{ session('success') }}
                                    </span>
                                @endif
                                @if (session('error'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ session('error') }}
                                    </span>
                                @endif
                                <span class="icono-container" onclick="togglePasswordVisibility()">
                                    <img class="icono" id="eye-icon" src="{{ asset('images/cerrado.svg') }}" />
                                </span>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Ingresar al sistema" />
                            </div>
                            <div class="recuperar">
                                <span>¿Olvidó su contraseña? <a href="http://admin.labcofasa.net/restablecer">Recuperar</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
