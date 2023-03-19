@extends("extranet.plantilla")
<!-- ************************************************************* -->
@section('css_pagina')
    <link rel="stylesheet" href="{{ asset('css/extranet/login.css') }}">
@endsection
@section('cuerpo_pagina')
    <div class="container index">
        <div class="container mt-3">
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-11 col-md-6">
                    @include('includes.error-form')
                    @include('includes.mensaje')
                </div>
            </div>
            <div class="row justify-content-center" style="font-size: 0.8em;">
                <div class="col-10 col-sm-8 col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('imagenes/sistema/logofull.png') }}" class="rounded mx-auto d-block" alt="...">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <div class="h1">CRONOS</div>
                                </div>
                            </div>
                            <div class="card-text mt-3">
                                <form action="{{ route('login') }}" method="post" autocomplete="off">
                                    @method('post')
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <input type="text" class="form-control form-control-sm" id="usuario"
                                                name="usuario" placeholder="Usuario*" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <input type="password" class="form-control form-control-sm" id="password"
                                                name="password" placeholder="Contraseña*" required>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around">
                                        <div class="centrar-items">
                                            <button class="mt-2 btn btn-primary" type="submit">Iniciar sesiónes</button>
                                        </div>
                                        <div class="centrar-items">
                                            <a href="{{ route('registro_ini') }}" class="mt-2 btn btn-primary">Registrarse</a>
                                        </div>
                                    </div>
                                    <div class="centrar-items mt-4">
                                        <p><a class="card-text h6" href="{{ route('solicitar_password') }}">Olvidé mi nombre
                                                de usuario o contraseña bromelias</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')

@endsection
