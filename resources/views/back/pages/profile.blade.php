@extends('back.layouts.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Perfil')
@section('pageHeader')
@section('content')

<div class="page-header">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="title">
                <h4>Perfil</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('author.home')}}">Inicio</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Perfil
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
        <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
                <a href="javascript:;" onclick="event.preventDefault();document.getElementById('userProfilePictureFile').click();" class="edit-avatar"><i class="fa fa-pencil" style="margin-top:7px;"></i></a>
                <img src="{{$user->picture}}" alt="" class="avatar-photo" id="userProfilePicture">
                <input type="file" name="userProfilePictureFile" id="userProfilePictureFile" class="d-none"
                style="opacity:0">
            </div>
            <h5 class="text-center h5 mb-0" id="userProfileName">{{ $user->name}}</h5>
            <p class="text-center text-muted font-14" id="userProfileEmail">
                {{$user->email}}
            </p>
        </div>
    </div>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
        <div class="card-box height-100-p overflow-hidden">
           @livewire('author-profile-tabs') 
        </div>
    </div>
</div>

@endsection
@push('scripts')
<script>
window.addEventListener('updateUserInfo', function (event) {
    $('#userProfileName').html(event.detail.userName);
    $('#userProfileEmail').html(event.detail.userEmail);
    });
</script>
<script>
   $('input[type="file"][name="userProfilePictureFile"][id="userProfilePictureFile"]').ijaboCropTool({
      preview : '#userProfilePicture',
      setRatio:1,
      allowedExtensions: ['jpg', 'jpeg','png'],
      buttonsText:['DEFINIR','QUITAR'],
      buttonsColor:['#30bf7d','#ee5155', -15],
      processUrl:'{{ route('author.change-profile-picture')}}',
      withCSRF:['_token','{{ csrf_token() }}'],
      onSuccess:function(message, element, status){
        Livewire.emit('updateUserHeaderInfo');
         alert(message);
      },
      onError:function(message, element, status){
        alert(message);
      }
   });
</script>
@endpush
@endsection