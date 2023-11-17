@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Iniciar Sesión')
@section('content')

<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Iniciar Sesión</h2>
    </div>
    <form>
        <div class="input-group custom">
            <input
                type="text"
                class="form-control form-control-lg"
                placeholder="Correo"
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="icon-copy dw dw-user1"></i
                ></span>
            </div>
        </div>
        <div class="input-group custom">
            <input
                type="password"
                class="form-control form-control-lg"
                placeholder="**********"
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="dw dw-padlock1"></i
                ></span>
            </div>
        </div>
        <div class="row pb-30">
            <div class="col-5">
                <div class="custom-control custom-checkbox">
                    <input
                        type="checkbox"
                        class="custom-control-input"
                        id="customCheck1"
                    />
                    <label class="custom-control-label" for="customCheck1"
                        >Recordarme</label
                    >
                </div>
            </div>
            <div class="col-7">
                <div class="forgot-password">
                    <a href="{{route('auth.forgot-password')}}">Recuperar Contraseña</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-3">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Iniciar Sesión">
                </div>
                
                <div class="input-group mb-0">
                    <a
                        class="btn btn-outline-primary btn-lg btn-block"
                        href="register.html"
                        >Crear una cuenta nueva</a
                    >
                </div>
            </div>
        </div>
    </form>
</div>
@endsection