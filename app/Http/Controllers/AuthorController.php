<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Support\Facades\File;


class AuthorController extends Controller
{
          
    public function index (Request $request){
        return view('back.pages.home');
    }

    public function logoutHandler(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function resetPasswordToken(Request $request, $token = null){        
    
        $check_token= DB::table('password_resets')
                        ->where(['token'=>$token])
                        ->first();

        if($check_token){
            // verificar si no esta expirado el token

            $diffMins=Carbon::createFromFormat('Y-m-d H:i:s', $check_token->created_at)->diffInMinutes(Carbon::now());
        
            if ($diffMins > 1500) {
                # si expiró
                session()->flash('fail', 'El tiempo Expiró!, intenta de nuevo');
                return redirect()->route('author.forgot-password', ['token'=>$token]);
        

            } else {
                return view('back.pages.auth.reset-password', ['token'=>$token]);
        
            }
            
        }else{
            session()->flash('fail', 'Token Inválido!, intenta de nuevo');
            return redirect()->route('author.forgot-password', ['token'=>$token]);
        }
        
    }

    public function resetPasswordHandler(Request $request){
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $request->validate([
            'new_password'=>'required|min:5|max:45|required_with:new_password_confirmation|
            same:new_password_confirmation',
            'new_password_confirmation'=>'required'
        ],[
            'new_password.required'=>'Se requiere que escriba una nueva contraseña',
            'new_password.min'=>'La nueva contraseña es demasiado corta',
            'new_password.max'=>'La nueva contraseña es demasiado larga',
            'new_password.same'=>'Las contraseñas no coinciden',
            'new_password_confirmation.required'=>'Se requiere la confirmación de la nueva contraseña'
        ]);

        $token = DB::table('password_resets')
                    ->where(['token'=>$request->token])
                    ->first();
        
        //traer datos del usuario admin
        $user = User::where('email', $token->email)->first();

        //actualizar contraseña del usuario admin
        User::where('email', $user->email)->update([
            'password'=>Hash::make($request->new_password)
        ]);
        // borrar token
        DB::table('password_resets')->where([
            'email'=>$user->email,
            'token'=>$request->token            
        ])->delete();

        //enviar correo de notificacion al usuario
        $data = array(
            'user'=>$user,
            'new_password'=>$request->new_password
        );

        $mail_body = view('email-templates.user-reset-email-template', $data)->render();

        $mailConfig = array(
            'mail_from_email'=>env('EMAIL_FROM_ADDRESS'),
            'mail_from_name'=>env('EMAIL_FROM_NAME'),
            'mail_recipient_email'=>$user->email,
            'mail_recipient_name'=>$user->name,
            'mail_subject'=>'Contraseña Reestablecida',
            'mail_body'=> $mail_body
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
        $mail->send();         
        return redirect()->route('author.login')->with('success','Listo!, Tu contraseña ha sido reestablecida');
    }

    public function profileView(Request $request){
        $user = null;
        if(Auth::guard('web')->check()){
            $user = User::findOrFail(auth()->id());    
        }
        return view('back.pages.profile', compact('user'));
    }

    public function changeProfilePicture(Request $request){
        $user = User::findOrFail(auth('author')->id());
        $path = '/images/users/admins/';
        $file = $request->file('userProfilePictureFile');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $filename = 'USER_IMG_'.rand(2,1000).$user->id.time().uniqid().'.jpg';

        $upload = $file->move(public_path($path), $filename);
        
        if($upload){
            if($old_picture != null && File::exists(public_path($path.$old_picture))){
                File::delete(public_path($path.$old_picture));
            }
            $user->update(['picture'=>$filename]);
            return response()->json(['status'=>1, 'msg'=>'Su foto fué cambiada con exito!.']);
        }else{
            
            return response()->json(['status'=>0,'msg'=>'Algo salió mal!.']);             
                
        }
        
    }

}
