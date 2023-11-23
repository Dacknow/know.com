<div>
    <form wire:submit.prevent="forgotHandler()" method="POST">
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
            <input type="text" class="form-control form-control-lg" placeholder="Correo" wire:model='email'>
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            </div>
        </div>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-3">
                    <input class="btn btn-primary btn-lg btn-block " type="submit" value="Enviar">
                </div>
                
                <div class="input-group mb-0">
                    <a
                        class="btn btn-outline-primary btn-lg btn-block"
                        href="{{route('author.login')}}"
                        >Iniciar Sesión</a
                    >
                </div>
            </div>
        </div>
    </form>
</div>
