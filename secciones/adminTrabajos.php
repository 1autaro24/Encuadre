<?php
if (isset($_SESSION['usuario']) and $_SESSION['usuario']['ROL_ID'] != 1):
    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    </svg> 
    <div class="alert alert-success d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
    <div>
        No tenes permiso para acceder a esta seccion, volve para atras
    </div>
    </div>';
else:
    ?>
    
<h1 class="text-center ">ADMINISTRAR DE TRABAJOS</h1>
<h2 class="text-center text-secondary">Listado de Trabajos y los empleados que los realizaron</h2>

<?php
    $consultaTrabajos = "SELECT
    trabajos.ID, 
    trabajos.TITULO,
    trabajos.FOTO,
    trabajos.DESCRIPCION, 
    empleados.NOMBRE, 
    empleados.APELLIDO, 
    servicios.SERVICIO
FROM
    id22111537_abstract_less.trabajos
    JOIN empleados ON  trabajos.FK_EMPLEADO = empleados.ID
    JOIN servicios ON  trabajos.FK_SERVICIO_UTILIZADO = servicios.ID";
    $res = mysqli_query($conexion, $consultaTrabajos);
    $trabajos = [];
    while ($fila = mysqli_fetch_assoc($res)) {
        $trabajos[] = $fila;
    }
?>

<div class="container" >
        
        <div class="row justify-content-center ">
            <div class="">
            <table class="table table-info table-stripped align-middle col-12 my-3">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nombre del Trabajo</th>
                    <th>Descripción</th>
                    <th>Realizado por:</th>
                    <th>Tag:</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($trabajos as $trabajo):
                    echo '<tr class="table-light">'; 
                    echo '<td class="col-1"><img class="card-img-top" src="recursos/img/portfolio/' . $trabajo['FOTO'] . '" alt="foto trabajo"></td>';
                    echo '<td>' . $trabajo['TITULO'] . '</td>';
                    echo '<td>' . $trabajo['DESCRIPCION'] . '</td>';
                    echo '<td>' . $trabajo['NOMBRE'] . ' ' . $trabajo['APELLIDO'] . '</td>';
                    echo '<td>' . $trabajo['SERVICIO'] . '</td>';
                    echo '<td class="d-flex justify-content-center align-items-center "><a href="index.php?seccion=editarTrabajo&id=' . $trabajo['ID'] . '" class="btn btn-warning mx-2 arreglo_a_edit">Editar</a>
                    <a href="acciones/eliminarTrabajo.php?id=' . $trabajo['ID'] . '" class="btn btn-outline-danger mx-2 arreglo_a_elim">ELIMINAR</a></td>';
                    echo '</tr>';
                endforeach;
                ?>
                </tbody>
            </table>
            <div class="row  justify-content-end">
                <a href="index.php?seccion=nuevoTrabajo" class="btn btn-info text-light  arreglo_a_agg">+ agregar nuevo</a>
            </div>

            </div>
        </div>
    </div>
    

<?php
endif;
?>