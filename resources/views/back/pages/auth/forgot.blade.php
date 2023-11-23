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
    @livewire('author-forgot')
</div>

@endsection