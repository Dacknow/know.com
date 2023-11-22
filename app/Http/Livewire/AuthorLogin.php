<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLogin extends Component
{
    public $email, $password;
    public function loginHandler(){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'password'=> 'required|min:5'
        ],[
            'email.required'=>'Ingrese un correo.',
            'email.email'=>'Ingrese un correo válido.',
            'email.exists'=>'Su correo no existe en el sistema',
            'password.required'=>'Ingrese la contraseña'
        ]);

        $creds= array('email'=>$this->email, 'password'=>$this->password);

        if(Auth::guard('web')->attempt($creds)){

            $user= User::where('email', $this->email)->first();

            if($user->blocked == 1){
                Auth::guard('web')->logout();
                return redirect()->route('author.login')->with('fail','Su cuenta ha sido bloqueada.');
            }else{
                redirect()->route('author.home');
            }
        }
        else{
            session()->flash('fail','Contraseña incorrecta.');
            return view('author.login');
        }
    }
    public function render()
    {
        return view('livewire.author-login');
    }
}
