@extends('extranet.plantilla')
<!-- ************************************************************* -->
@section('css_pagina')
<link rel="stylesheet" href="{{ asset('css/extranet/preloader.css') }}">
<link rel="stylesheet" href="{{ asset('css/extranet/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/extranet/style.customer.css') }}">
<link rel="stylesheet" href="{{ asset('css/extranet/style.min.css') }}">

<script src="{{ asset('js/extranet/jquery-2.0.3.min.js.descarga') }}"></script>
<script src="{{ asset('js/extranet/jquery.validate.min.js.descarga') }}"></script>
<script src="{{ asset('js/extranet/bootstrap.min.js.descarga') }}"></script>

<script async="" src="{{ asset('login/js') }}"></script>
<script src="{{ asset('login/ELjwtGhd7DT3C3WQ9X-IuRh2tvc.js.descarga') }}"></script>
<script src="{{ asset('login/G5uXR5872C56479CVNt5wXA9Wzc.js.descarga') }}"></script>
<link rel="stylesheet" href="{{ asset('login/bootstrap.min.css') }}" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<!-- <link href="./libs/architectui-theme/main.css" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('login/style.css') }}">
<link rel="stylesheet" href="{{ asset('login/preloader.css') }}">
<link rel="stylesheet" href="{{ asset('login/style.min.css') }}">
<link rel="stylesheet" href="{{ asset('login/style.customer.css') }}">
<script src="{{ asset('login/jquery-2.0.3.min.js.descarga') }}"></script>
<script src="{{ asset('login/jquery.validate.min.js.descarga') }}"></script>
<script src="{{ asset('login/bootstrap.min.js.descarga') }}"></script>

@endsection
@section('cuerpo_pagina')
    <div id="preloader" class="preloader" style="display: none;">
        <div class="loader-content">
            <img src="{{ asset('imagenes/sistema/logo.svg') }}" alt="">
            <div class="progress">
                <div class="indeterminate"></div>
            </div>
            <h5 class="msg">Cargando</h5>
        </div>
    </div>
    <section>
        <div class="peers ai-s fxw-nw h-100vh" style="background-image: url(&quot;{{ asset('imagenes/sistema/bg.jpg') }}&quot;); background-size: cover;">
            <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv">
                <div class="pos-a positionXY">
                    <img src="{{ asset('imagenes/sistema/logo.svg') }}" class="pos-a positionXY logo-cpe-login" alt="logo-cpe">
                </div>
            </div>
            <div class="col-12 col-md-4 peer h-100 bgc-white scrollable pos-r"
                style="min-width: 320px; border-left: 3px solid #D8D8D8; padding: 0;">
                <!-- <h4 class="fw-300 c-grey-900 mB-40">Login</h4> -->
                <div class="header-login bg-white">
                    <div class="box-img">
                        <img src="{{ asset('imagenes/sistema/logo-cronos.svg') }}" alt="Cronos">
                    </div>
                    <div class="box-img hidden-sm-up">
                        <img src="{{ asset('imagenes/sistema/logo.svg') }}" alt="logo">
                    </div>
                    <div class="box-img">
                        <img src="{{ asset('imagenes/sistema/logo-thanos.svg') }}" alt="Thanos">
                    </div>
                </div>

                <div class="body-login pX-40 pY-40">
                    <h2 class="bigintro">SISTEMA DE <br><span>GESTIÓN ESTRATÉGICA</span></h2>

                    <div id="login" class="session visible">
                        <form method="post" accept-charset="utf-8" class="form-login" role="form" id="frmLogin"
                            action="https://cronoscpeqa.linktic.com/users/login" data-gtm-form-interact-id="0">
                            <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                            <div class="input-group mb-3 input-user">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="icon-head"></i></span>
                                </div>
                                <input name="username" type="text" class="form-control" placeholder="Usuario"
                                    aria-label="Username" aria-describedby="basic-addon1"
                                    data-gtm-form-interact-field-id="0">
                            </div>
                            <div class="input-group mb-3 input-pass">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="icon-key4"></i></span>
                                </div>
                                <input name="password" type="password" class="input-password form-control"
                                    placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1"
                                    data-gtm-form-interact-field-id="1">
                                <span class="btn-show-pass input-group-addon cursor-pointer"><i
                                        class="icon-eye-off"></i></span>
                            </div>

                            <div class="mensaje">
                            </div>

                            <div class="form-group">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer box-btn-login">
                                        <button class="btn btn-primary text-uppercase">Iniciar sesion</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="login-helpers">
                            <a href="https://cronoscpeqa.linktic.com/users/login#"
                                onclick="swapScreen(&#39;forgot&#39;);return false;" style="color:#FFF;">Reset
                                Password?</a> <br>
                        </div>
                    </div>

                    <div id="forgot" class="session invisible">
                        <form class="form-login" role="form" id="frmRestablecer">
                            <h4 class="" style="text-align: center; color: #FFF;">Reset Password</h4>
                            <div class="divide-40"></div>
                            <div class="input-group mb-3 input-user">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="icon-head"></i></span>
                                </div>
                                <input name="username" type="text" class="form-control" placeholder="Usuario"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group">
                                <div class="peers ai-c jc-sb fxw-nw">
                                    <div class="peer box-btn-login">
                                        <button type="submit" class="btn btn-primary text-uppercase">Restablecer</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="mensaje"></div>
                        <div class="login-helpers">
                            <a href="https://cronoscpeqa.linktic.com/users/login#"
                                onclick="swapScreen(&#39;login&#39;);return false;" style="color:#FFF;">Volver para
                                iniciar sesión</a> <br>
                        </div>
                    </div>
                </div>

                <div class="footer-login">
                    <img src="{{ asset('imagenes/sistema/logo-linktic.svg') }}" alt="LinkTic">
                </div>
            </div>
        </div>

    </section>
    <!-- Modal fullscreen -->
    <div class="modal modal-fullscreen fade" id="modal-fullscreen" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close btn btn-circle btn-default" data-dismiss="modal"><span
                            aria-hidden="true">×</span><span class="sr-only">Close</span></button>

                </div>
                <div class="modal-body">
                    <div class="modal-search">
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="text" class="form-control input-lg" placeholder="Buscar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- MODALES -->
    <div id="popup" style="display: none;">
        <div class="content-popup">
            <div class="close"><a href="https://cronoscpeqa.linktic.com/users/login#" id="close"><img
                        src="{{ asset('login/close.png') }}" alt=""></a></div>
            <div>
                <h3>Características de una contraseña segura</h3>
                <ul>
                    <li>Debe incluir números.</li>
                    <li>Utilice una combinación de letras mayúsculas y minúsculas.</li>
                    <li>Incluya caracteres especiales.</li>
                    <li>Cualquiera de los siguientes caracteres: (- * ? ! @ # $ / () {} = . , ; : )</li>
                    <li>Tenga una longitud mayor o igual a 8 caracteres.</li>
                    <li>No debe tener espacios en blanco.</li>
                </ul>
                <span><strong>Ejemplo: </strong>Linktic2017*, Sig*2017, pa$$W0rd*</span>
            </div>
        </div>
    </div>
@endsection
@section('script_pagina')
<script src=""></script>
@endsection
