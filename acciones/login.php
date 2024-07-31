<?php 
if($_SERVER['REQUEST_METHOD'] === 'POST'):
    session_start();
    require_once '../secciones/conexion.php';
    if(strlen($_POST['usuario'])<2){
        $_SESSION['error'] = '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Ingresa un mail valido
            </div>
        </div>';
        header('location: ../index.php?seccion=login');
    } else {
        $nombreusuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    }
    $contrasenia = $_POST['contrasenia'];
    $consultaUsuario = "SELECT
    usuarios.ID,
	usuarios.NOMBRE_DE_USUARIO, 
	usuarios.EMAIL, 
	usuarios.CONTRASENIA,
    usuarios.FK_ROL AS ROL_ID,
	roles.ROL
FROM
_final.usuarios
    JOIN roles ON roles.ID = usuarios.FK_ROL
WHERE NOMBRE_DE_USUARIO = '$nombreusuario'  LIMIT 1";
   $res = mysqli_query($conexion, $consultaUsuario);
   
 
    if($res == null){
        $_SESSION['error'] = '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Usuario o contraseña incorrecto' . mysqli_error($conexion) . ' 
            </div>
        </div>';
        header('location: ../index.php?seccion=login');
    }
    $usuario = mysqli_fetch_assoc($res);
    
   
    $validarContrasenia = password_verify($contrasenia, $usuario['CONTRASENIA']);
    
    if($validarContrasenia):
        unset($usuario['CONTRASENIA']);
    $_SESSION['usuario'] = $usuario;
    header('location: ../index.php');
    else:
        $_SESSION['error'] = '
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
                Usuario o contraseña incorrecto
            </div>
        </div>';
        header('location: ../index.php?seccion=login');

    endif;
else:
    header('location: ../index.php?seccion=login');
endif;