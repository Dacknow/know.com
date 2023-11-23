<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Env;
use PHPMailer\PHPMailer\Exception;
use constDefaults;

class AuthorForgot extends Component
{
    public $email;

    public function forgotHandler(){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';


        $this->validate([
            'email'=>'required|email|exists:users,email'
        ],[    
            'email.required'=>'Se requiere de un Correo electrónico',
            'email.email'=>'Correo electrónico inválido',
            'email.exists'=>'El correo electrónico no existe en el sistema'
        ]);

        // traer detalles del user

        $user = User::where('email',$this->email)->first();

        // generar token

        $token = base64_encode(Str::random(64));

        // verificar si existe un token 

        $oldToken = DB::table('password_resets')
                        ->where(['email'=>$this->email])
                        -> first();

        if($oldToken){
            //actualizar token
            DB::table('password_resets')
            ->where(['email'=>$this->email])
            -> update([
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
        }else{
            // añadir un nuevo token

            DB::table('password_resets')->insert([
                'email'=>$this->email,
                'token'=>$token,
                'created_at'=>Carbon::now()
            ]);
        }

        $actionLink = route('author.reset-password', ['token'=>$token, 'email'=>$this->email]);

        $data = array(
            'actionLink'=> $actionLink,
            'user'=>$user
        );

        $mail_body = view('email-templates.user-forgot-email-template', $data)->render();

        $mailConfig= array(
            'mail_from_email'=>env('EMAIL_FROM_ADDRESS'),
            'mail_from_name'=>env('EMAIL_FROM_NAME'),
            'mail_recipient_email'=> $user->email,
            'mail_recipient_name'=> $user->name,
            'mail_subject'=>'Reset password',
            'mail_body'=>$mail_body

        );

        
        $mail = new PHPMailer(true);
        $mail-> SMTPDebug = 0;
        $mail-> isSMTP();
        $mail->Host =env('EMAIL_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = env('EMAIL_USERNAME');
        $mail->Password = env('EMAIL_PASSWORD');
        $mail->Port = env('EMAIL_PORT');
        //$mail->SMTPSecure = env('EMAIL_ENCRYPTION');
        $mail->setFrom($mailConfig['mail_from_email'], $mailConfig['mail_from_name']);
        $mail->addAddress($mailConfig['mail_recipient_email'], $mailConfig['mail_recipient_name']);
        $mail->isHTML(true);
        $mail->Subject = $mailConfig['mail_subject'];
        $mail->Body = $mailConfig['mail_body'];
        if($mail->send()){
            session()->flash('success', 'Te enviamos un correo');
            return redirect()->route('author.forgot-password');
        }else{
            session()->flash('fail', 'Algo salió mal!');
            return redirect()->route('author.forgot-password');
        }
    
    }

    public function render()
    {
        return view('livewire.author-forgot');
    }
}
