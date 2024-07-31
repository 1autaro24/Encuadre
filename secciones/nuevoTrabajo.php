<?php
$consultaTrabajos = "SELECT * FROM trabajos";
$res = mysqli_query($conexion, $consultaTrabajos);
$trabajos = [];
while($fila = mysqli_fetch_assoc($res)){
    $trabajos[] = $fila;
};
$listaServicios = 'SELECT * FROM servicios';
$res = mysqli_query($conexion, $listaServicios);
$servicios = [];
while($fila = mysqli_fetch_assoc($res)){
    $servicios[] = $fila;
};
$listaEmpleados = 'SELECT * FROM empleados';
$res = mysqli_query($conexion, $listaEmpleados);
$empleados = [];
while($fila = mysqli_fetch_assoc($res)){
    $empleados[] = $fila;
}
?>
<h1 class="text-center ">CREAR UN NUEVO TRABAJO</h1>

<form action="acciones/nuevoTrabajo.php" method="POST" enctype="multipart/form-data">
    <div class="container mt-3">
        <div class="col justify-contents-center ">
            <div class="row justify-content-center">
                <div  class="col-4 ">
                    <label class="form-label " for="TITULO">TITULO DEL TRABAJO:</label>
                    <input type="text" name="TITULO" id="TITULO"   class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div  class="col-4 ">
                    <label for="FOTO">FOTO DEL TRABAJO:</label>
                    <input type="file" name="FOTO" id="FOTO"   class="form-control">
                </div>
            </div>

            <div class="row justify-content-center">
                <div  class="col-4 ">
                    <label class="form-label " for="DESCRIPCION">DESCRIPCIÓN DEL TRABAJO:</label><input type="text" name="DESCRIPCION" id="DESCRIPCION"   class="form-control">
                </div>
            </div>

            <div class="row justify-content-center"> 
                <div class="col-4">
                    <label class="input-group" for="FK_SERVICIO_UTILIZADO">TAG:</label>
                    <select name="FK_SERVICIO_UTILIZADO" id="FK_SERVICIO_UTILIZADO" class="form-select">
                        <?php 
                    
                        echo '<option selected>Elige una opción...</option>';

                        foreach($servicios as $servicio):
                        echo '<option value="' . $servicio['ID'] .'">'.$servicio['SERVICIO'] . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center">                   
                <div class="col-4">
                    <label class="input-group" for="FK_EMPLEADO">REALIZADO POR:</label>
                    <select name="FK_EMPLEADO" id="FK_EMPLEADO" class="form-select">
                        <?php 
                    
                        echo '<option selected>Elige una opción...</option>';

                        foreach($empleados as $empleado):
                        echo '<option value="'.$empleado['ID'].'">'.$empleado['NOMBRE'] . ' ' . $empleado['APELLIDO'] .'</option>';
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center"> 
            <input type="submit" value="Crear" class="btn btn-primary col-1 my-3">
        </div>
       
    </div>


</form>