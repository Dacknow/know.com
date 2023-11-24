<div>
    <div class="profile-tab height-100-p">
        <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a wire:Click.prevent='selectTab("personal_details")' class="nav-link {{ $tab == 'personal_details' ? 'active' : ''}}" data-toggle="tab" href="#personal_details" role="tab">Información Personal</a>
                </li>
                <li class="nav-item">
                    <a wire:Click.prevent='selectTab("update_password")' class="nav-link {{ $tab == 'update_password' ? 'active' : ''}}" data-toggle="tab" href="#update_password" role="tab">Actualizar Contraseña</a>
                </li>
            </ul>
            <div class="tab-content">
                <!-- Timeline Tab start -->
                <div class="tab-pane fade {{ $tab == 'personal_details' ? 'active show' : ''}}" id="personal_details" role="tabpanel">
                    <div class="pd-20">
                        <form wire:submit.prevent= 'updateUserPersonalDetails()'>
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success')}} 
    
                                            <button type="button" class="close" data-dismiss="alert" aria-label= "close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" class="form-control" wire:model='name' placeholder="Ingrese su nombre completo">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo Electrónico</label>
                                        <input type="text" class="form-control" wire:model='email' placeholder="Ingrese su correo electrónico">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Usuario</label>
                                        <input type="text" class="form-control" wire:model='username' placeholder="Ingrese su usuario">
                                        @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
                <!-- Timeline Tab End -->
                <!-- Tasks Tab start -->
                <div class="tab-pane fade {{ $tab == 'update_password' ? 'active show' : ''}}" id="update_password" role="tabpanel">
                    <div class="pd-20 profile-task-wrap">
                        <form wire:submit.prevent='updatePassword()'>
                            <div class="row">
                                <div class="col-12">
                                    @if (Session::get('success'))
                                        <div class="alert alert-success">
                                            {{ Session::get('success')}} 
    
                                            <button type="button" class="close" data-dismiss="alert" aria-label= "close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Contraseña Actual</label>
                                        <input type="password" class="form-control" placeholder="Ingrese su contraseña" wire:model.defer='current_password'>
                                        @error('current_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Contraseña Nueva</label>
                                        <input type="password" class="form-control" placeholder="Ingrese contraseña nueva" wire:model.defer='new_password'>
                                        @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Confirmar Contraseña Nueva</label>
                                        <input type="password" class="form-control" placeholder="Confirmar contraseña nueva" wire:model.defer='new_password_confirmation'>
                                        @error('new_password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
