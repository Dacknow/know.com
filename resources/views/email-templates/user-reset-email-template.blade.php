<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    
<p>Querido {{$user->name}}</p>
<p>
    Tu contraseniaa ha sido reestablecida satisfactoriamente.
    Tus nuevas credenciales son:
    <br>
    <b>Usuario/Correo eletronico: </b>{{ $user->username}} / {{$user->email}}
    <br>
    <b>Contraseña: </b>{{$new_password}}
</p>
<br>
Por favor mantenga sus credenciales seguras. Tu usuario y contraseña son personales en intrasferible
<p>
    Know.com no se hara responsable del mal uso de tu usuario y contrasenia.
</p>
<br>
-----------------------------------------------------------------------------
</body>
</html>