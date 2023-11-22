<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLogin extends Component
{
    public $login_id, $password;
    public function loginHandler(){
        //$this->validate([
        //     'email'=>'required|email|exists:users,email',
        //     'password'=> 'required|min:5'
        // ],[
        //     'email.required'=>'Ingrese un correo.',
        //     'email.email'=>'Ingrese un correo válido.',
        //     'email.exists'=>'Su correo no existe en el sistema',
        //     'password.required'=>'Ingrese la contraseña'
        // ]);

        // $creds= array('email'=>$this->email, 'password'=>$this->password);

        $fieldType = filter_var($this->login_id, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if($fieldType == 'email'){
            $this->validate([
                'login_id'=>'required|email|exists:users,email',
                'password'=>'required|min:5|max:45'
            ],[
                'login_id.required'=>'Ingrese el Correo electrónico o Usuario',
                'login_id.email'=>'Correo electrónico inválido',
                'login_id.exists'=>'Correo electrónico no existe en el sistema',
                'password.required'=>'Ingrese la contraseña',
                'password.min'=>'La contraseña debe de tener al menos 5 caracteres.'
            ]);         
        }else{
            $this->validate([
                'login_id'=>'required|exists:users,username',
                'password'=>'required|min:5|max:45'
            
            ],[
                'login_id.required'=>'Ingrese el Correo electrónico o Usuario',
                'login_id.exists'=>'Usuario no existe en el sistema',
                'password.required'=>'Ingrese la contraseña',
                'password.min'=>'La contraseña debe de tener al menos 5 caracteres.'
            ]);            
        }

        $creds = array(
            $fieldType => $this->login_id,
            'password'=>$this->password
        );

        if(Auth::guard('web')->attempt($creds)){
            $user= User::where($fieldType, $this->login_id)->first();
            if($user->blocked == 1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail','Su cuenta ha sido bloqueada.');
            }else{
                redirect()->route('author.home');
            }
        }
        else{
            session()->flash('fail','Contraseña incorrecta.');
            return route('author.login');
        }
    }
    public function render()
    {
        return view('livewire.author-login');
    }
}
