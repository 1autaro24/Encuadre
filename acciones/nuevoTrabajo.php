<?php
session_start();
require_once '../secciones/conexion.php';

if($_POST['TITULO'] == ''):
    $_SESSION['error'] = 'El título no puede estar vacío';
    header('location: ../index.php?seccion=adminTrabajos');
else:
    $titulo =  mysqli_real_escape_string($conexion, $_POST['TITULO']);
endif;

$foto = mysqli_real_escape_string($conexion, $_POST['FOTO']);
if(!empty($_FILES['FOTO']['tmp_name'])){
    $res = move_uploaded_file($_FILES['FOTO']['tmp_name'], "../recursos/img/portfolio/".$_FILES['FOTO']['name']);
    $foto = $_FILES['FOTO']['name'];
};
$descripcion = mysqli_real_escape_string($conexion, $_POST['DESCRIPCION']);
$fkServicio = mysqli_real_escape_string($conexion, $_POST['FK_SERVICIO_UTILIZADO']);
$fkEmpleado = mysqli_real_escape_string($conexion, $_POST['FK_EMPLEADO']);

$insertar = "INSERT INTO id22111537_abstract_less.trabajos 
(TITULO, FOTO, DESCRIPCION, FK_SERVICIO_UTILIZADO, FK_EMPLEADO)
VALUES
('$titulo', '$foto', '$descripcion', '$fkServicio', '$fkEmpleado');";
$res = mysqli_query($conexion, $insertar);

if ($res):
    $_SESSION['exito'] = '
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
    </svg>
    
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            Se creó el nuevo trabajo con exito :)
        </div>
    </div>';
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
            No se pudo crear un nuevo trabajo :( Intenta nuevamente
        </div>
    </div>';
endif;
header('location: ../index.php?seccion=adminTrabajos');
