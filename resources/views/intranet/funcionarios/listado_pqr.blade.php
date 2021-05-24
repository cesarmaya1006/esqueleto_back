@extends("theme.back.plantilla")
<!-- ************************************************************* -->
<!-- Funciones php -->
@section('funciones_php')
    @include('includes.funciones_php')
@endsection
<!-- Pagina CSS -->
@section('estilosHojas')
    <link rel="stylesheet" href="{{ asset('css/intranet/index.css') }}">
@endsection
<!-- ************************************************************* -->
@section('tituloHoja')
    Sistema de informaci&oacute;n
@endsection
<!-- ************************************************************* -->
@section('cuerpo_pagina')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Link</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                                </li>
                            </ul>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <hr><br>
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-8">
                @include('includes.error-form')
                @include('includes.mensaje')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-11 table-responsive">
                <table class="table table-striped table-hover table-sm display">
                    <thead>
                        <tr>
                            <th>Num. Radicado</th>
                            <th>Tipo de PQR</th>
                            <th>Estado</th>
                            <th>Fecha de radicación</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pqr_S as $pqr)
                            <tr>
                                <td>{{ $pqr->radicado }}</td>
                                <td>{{ $pqr->tipoPqr->tipo }}</td>
                                <td>{{ $pqr->estado }}</td>
                                <td>{{ $pqr->fecha_radicado }}</td>
                                <td>
                                    @if ($pqr->tipo_pqr_id == 1)
                                        <a href="{{ route('funcionario-gestionar_pqr_p', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @elseif ($pqr->tipo_pqr_id == 2)
                                        <a href="{{ route('funcionario-gestionar_pqr_q', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @else
                                        <a href="{{ route('funcionario-gestionar_pqr_r', ['id' => $pqr->id]) }}"
                                            class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                                class="fa fa-edit text-info btn-editar" aria-hidden="true"></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        @foreach ($conceptos as $concepto)
                            <tr>
                                <td>{{ $concepto->radicado }}</td>
                                <td>{{ $concepto->tipoPqr->tipo }}</td>
                                <td>{{ $concepto->estado }}</td>
                                <td>{{ $concepto->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarConceptoUOpinion', ['id' => $concepto->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_datos as $solicitud_datos)
                            <tr>
                                <td>{{ $solicitud_datos->radicado }}</td>
                                <td>{{ $solicitud_datos->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_datos->estado }}</td>
                                <td>{{ $solicitud_datos->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDatos', ['id' => $solicitud_datos->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($denuncias as $denuncia)
                            <tr>
                                <td>{{ $denuncia->radicado }}</td>
                                <td>{{ $denuncia->tipoPqr->tipo }}</td>
                                <td>{{ $denuncia->estado }}</td>
                                <td>{{ $denuncia->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarDenuncia', ['id' => $denuncia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($felicitaciones as $felicitacion)
                            <tr>
                                <td>{{ $felicitacion->radicado }}</td>
                                <td>{{ $felicitacion->tipoPqr->tipo }}</td>
                                <td>{{ $felicitacion->estado }}</td>
                                <td>{{ $felicitacion->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarFelicitacion', ['id' => $felicitacion->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($solicitudes_doc as $solicitud_doc)
                            <tr>
                                <td>{{ $solicitud_doc->radicado }}</td>
                                <td>{{ $solicitud_doc->tipoPqr->tipo }}</td>
                                <td>{{ $solicitud_doc->estado }}</td>
                                <td>{{ $solicitud_doc->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSolicitudDocumentos', ['id' => $solicitud_doc->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                        @foreach ($sugerencias as $sugerencia)
                            <tr>
                                <td>{{ $sugerencia->radicado }}</td>
                                <td>{{ $sugerencia->tipoPqr->tipo }}</td>
                                <td>{{ $sugerencia->estado }}</td>
                                <td>{{ $sugerencia->fecha_radicado }}</td>
                                <td><a href="{{ route('funcionario-gestionarSugerencia', ['id' => $sugerencia->id]) }}"
                                        class="btn-accion-tabla eliminar tooltipsC" title="Gestionar"><i
                                            class="fa fa-edit text-info btn-editar" aria-hidden="true"></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<!-- ************************************************************* -->
<!-- script hoja -->
@section('scripts_pagina')
    <script>
        let btnsTabla = document.querySelectorAll('.btn-editar')
        btnsTabla.forEach(btn => {
            if (btn.parentNode.tagName != 'A') {
                btn.remove()
            }
        })

    </script>
@endsection
<!-- ************************************************************* -->
