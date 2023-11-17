@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Recuperar contraseña')
@section('content')

<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Recuperar Contraseña</h2>
    </div>
    <h6 class="mb-20">
        Ingrese su correo electrónico para recuperar su contraseña.
    </h6>
    <form>
        <div class="input-group custom">
            <input type="text" class="form-control form-control-lg" placeholder="Correo">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-6">
                <div class="input-group mb-0">
                    <!--
                    use code for form submit
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                -->
                    <a class="btn btn-primary btn-lg btn-block" href="index.html">Enviar</a>
                </div>
            </div>
            
            <div class="col-6">
                <div class="input-group mb-0">
                    <a class="btn btn-outline-primary btn-lg btn-block" href="{{route('auth.login')}}">Iniciar Sesión</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection