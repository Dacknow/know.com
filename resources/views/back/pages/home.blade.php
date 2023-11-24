@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Inicio')
@section('pageHeader')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="title">
                <h4>Inicio</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('author.home')}}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Blog
                    </li>
                </ol>
            </nav>
        </div>                        
    </div>
</div>

CONTENT
@endsection