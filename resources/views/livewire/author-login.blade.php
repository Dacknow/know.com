<div>
    <form wire:submit.prevent="loginHandler()" method="POST">        
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
            <input
                type="text"
                class="form-control form-control-lg"
                placeholder="Correo o Usuario"
                wire:model="login_id"
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="icon-copy dw dw-user1"></i
                ></span>
            </div>
        </div>        
            @error('login_id')
                <span class="text-danger">{{$message}}</span>
            @enderror
        <div class="input-group custom">
            <input
                type="password"
                class="form-control form-control-lg"
                placeholder="**********"
                wire:model="password"
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="dw dw-padlock1"></i
                ></span>
            </div>
        </div>
        @error('password')
            <span class="text-danger">{{$message}}</span>
        @enderror
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
                    <a href="{{route('author.forgot-password')}}">Recuperar Contraseña</a>
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
