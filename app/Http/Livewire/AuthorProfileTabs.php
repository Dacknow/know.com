<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorProfileTabs extends Component
{

    public $tab = null;
    public $tabname = 'personal_details';
    protected $queryString = ['tab'];
    public $name, $username, $email, $user_id;
    public $current_password, $new_password, $new_password_confirmation;

    public function selectTab($tab){
        $this->tab = $tab;
    }


    public function mount(){
        $this->tab = request()->tab ? request()->tab : $this->tabname;

        if(Auth::guard('web')->check()){
            $user = User::findOrFail(auth()->id());
            $this->user_id = $user->id;
            $this->name= $user->name;
            $this->email= $user->email;
            $this->username= $user->username;
        }
    }

    public function updateUserPersonalDetails(){
        $this->validate([
            'name'=>'required|min:2',
            'email'=>'required|email|unique:users,email,'.$this->user_id,
            'username'=>'required|min:2|unique:users,username,'.$this->user_id            
        ],[
            'name.required'=>'Se requiere que escriba un nombre',
            'name.min'=>'El nombre es demasiado corto',
            'email.required'=>'Se requiere que escriba un correo electrónico',
            'email.email'=>'Correo electrónico inválido',
            'email.exists'=>'Correo electrónico no existe en el sistema',
            'username.required'=>'Se requiere que escriba un nombre de usuario',
            'username.min'=>'El nombre de usuario es demasiado corto',
        ]);

        User::find($this->user_id)
            ->update([
                'name'=> $this->name,
                'email'=> $this->email,
                'username'=> $this->username
            ]);

            $this->emit('updateUserHeaderInfo');
            //$this->dispatch('updateUserHeaderInfo');
            $this->dispatchBrowserEvent('updateUserInfo',[ 
                'userName'=> $this->name,
                'userEmail'=> $this->email
            ]);

           // $this->showToastr('success', 'Su información ha sido actualiza!.');
            
            session()->flash('success', 'Su información ha sido actualiza!.');
            return view('livewire.author-profile-tabs');
    }

    public function updatePassword(){
        $this->validate([
            'current_password'=>[
                'required', function($atributte, $value, $fail){
                    if(!Hash::check($value, User::find(auth('web')->id())->password)){
                        return $fail(__('La  contraseña antigua es incorrecta'));
                    }
                }
            ],
            'new_password'=>'required|min:5|max:45|required_with:new_password_confirmation|
            same:new_password_confirmation',
            'new_password_confirmation'=>'required'
        ],[
            'current_password.required'=>'Se requiere que escriba su contraseña actual',
            'new_password.required'=>'Se requiere que escriba una nueva contraseña',
            'new_password.min'=>'La nueva contraseña es demasiado corta',
            'new_password.max'=>'La nueva contraseña es demasiado larga',
            'new_password.same'=>'Las contraseñas no coinciden',
            'new_password_confirmation.required'=>'Se requiere la confirmación de la nueva contraseña'

        ]);
        $query= User::findOrFail(auth('web')->id())->update([
            'password'=> Hash::make($this->new_password)
        ]);

        if($query){
            $this->current_password = $this->new_password = $this->new_password_confirmation = null;
            $this->showToastr('success', 'Se cambió la Contraseña correctamente');
            session()->flash('success', 'Se cambió la Contraseña correctamente');
            return view('livewire.user-profile-tabs');
        }else{
            $this->showToastr('error', 'Algo salió mal');
        }
    }

    public function render()
    {
        return view('livewire.author-profile-tabs');
    }
}
