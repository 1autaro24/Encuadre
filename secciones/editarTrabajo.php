<?php
if (!isset($_GET['id'])):
    header('location: index.php?seccion=adminTrabajos&error=el id del trabajo es incorrecto');
endif;

$id = mysqli_real_escape_string($conexion, $_GET['id']);

$dameTrabajo = "SELECT
trabajos.ID, 
trabajos.TITULO, 
trabajos.FOTO, 
trabajos.DESCRIPCION
FROM
id22111537_abstract_less.trabajos
 WHERE trabajos.ID = $id";
 
$res = mysqli_query($conexion, $dameTrabajo);
$trabajo = mysqli_fetch_assoc($res);

$listaEmpleados = "SELECT * FROM empleados ";
$res = mysqli_query($conexion, $listaEmpleados);
$empleados = [];
while ($fila = mysqli_fetch_assoc($res)) {
    $empleados[] = $fila;
}

$listaServicios = "SELECT * FROM servicios";
$res = mysqli_query($conexion, $listaServicios);
$servicios = [];
while ($fila = mysqli_fetch_assoc($res)):
    $servicios[] = $fila;
endwhile;

?>

<h1 class="text-center ">EDITAR TRABAJOS</h1>
<form action="acciones/editarTrabajo.php" method="POST">
    <input type="hidden" name="ID" value="<?= $trabajo['ID']?>">
    <div class="container mt-3">
    <div class="col justify-content-center">
        <div class="row  justify-content-center">
            <div class="col-4">
                <label class="form-label" for="TITULO">TÍTULO DEL TRABAJO:</label>
                <input type="text" name="TITULO" id="TITULO" class="form-control" value="<?= $trabajo['TITULO']?>">
            </div> 
        </div>
        <div class="row  justify-content-center">    
            <div class="col-4">
                <label class="form-label" for="FOTO">FOTO DEL TRABAJO:</label>
                <input type="file" name="FOTO" id="FOTO" class="form-control" value="<?= $trabajo['FOTO']?>">
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-4">
                <label class="form-label" for="DESCRIPCION">DESCRIPCION DEL TRABAJO:</label>
                <input type="text" name="DESCRIPCION" id="DESCRIPCION" class="form-control" value="<?= $trabajo['DESCRIPCION']?>">
            </div>
        </div>
        <div class="row  justify-content-center">   
            <div class="col-4">
                <label class="input-group" for="FK_SERVICIO_UTILIZADO">TAG:</label>
                <select name="FK_SERVICIO_UTILIZADO" id="FK_SERVICIO_UTILIZADO" class="form-select">
                    <?php
                    foreach ($servicios as $servicio):
                        $selected = '';
                        if($servicio['ID'] == $trabajo['FK_SERVICIO_UTILIZADO']) $selected = 'selected';
                        echo '<option value="' . $servicio['ID'] . '" '. $selected.'>' . $servicio['SERVICIO'] . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>   
        </div>
        <div class="row  justify-content-center">   
            <div class="col-4">
                <label class="form-label" for="FK_EMPLEADO">REALIZADO POR:</label>
                <select name="FK_EMPLEADO" id="FK_EMPLEADO" class="form-control">
                    <?php
                    foreach ($empleados as $empleado):
                        $selected = '';
                        if($empleado['ID'] == $trabajo['ID']) $selected = 'selected';
                        echo '<option value="' . $empleado['ID'] . '" '. $selected.'>' . $empleado['NOMBRE'] . ' ' . $empleado['APELLIDO'] . '</option>';
                    endforeach;
                    ?>
                </select>
            </div>   
        </div>
        
        <div class="row justify-content-center">
            <input type="submit" value="Editar" class="btn btn-primary col-1 my-3">
        </div>
    </div>
    </div>
</form>