@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Cambiar contraseña')
@section('content')
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Cambiar Contraseña</h2>
    </div>
    <h6 class="mb-20">Ingrese su nueva contraseña y confirmación de nueva contraseña</h6>
    <form action="{{ route('author.reset-password-handler', ['token'=>request()->token]) }}" method="POST">
        @csrf

        @if (Session::get('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail')}} 

                <button type="button" class="close" data-dismiss="alert" aria-label= "close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success')}} 

                <button type="button" class="close" data-dismiss="alert" aria-label= "close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="input-group custom">
            <input type="password" class="form-control form-control-lg" placeholder="Nueva Contraseña"
            name="new_password" value="{{ old('new_password')}}">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        @error('new_password')
            <div class="d-block text-danger" styles="margin-top:-25px; margin-boton:25px">{{$message}}</div>            
        @enderror
        <div class="input-group custom">
            <input type="password" class="form-control form-control-lg" placeholder="Confirmar Nueva Contraseña"
            name="new_password_confirmation" value="{{ old('new_password_confirmation')}}">
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        @error('new_password_confirmation')
            <div class="d-block text-danger" styles="margin-top:-25px; margin-boton:25px">{{$message}}</div>            
        @enderror
        <div class="row align-items-center">
            <div class="col-5">
                <div class="input-group mb-0">
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Enviar">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection