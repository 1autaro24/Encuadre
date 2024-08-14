<h1 class="text-center color_cosas "><strong>NUESTRO PORTFOLIO</strong></h1>
<h2 class="text-center color_cosas ">Estos son algunos de nuestros mejores trabajos que realizamos en los últimos años.</h2>

<?php
$consultaTrabajos = "SELECT
trabajos.ID, 
trabajos.TITULO,
trabajos.FOTO,
trabajos.DESCRIPCION, 
empleados.NOMBRE, 
empleados.APELLIDO, 
empleados.EMAIL,
servicios.SERVICIO
FROM
_final.trabajos
JOIN empleados ON  trabajos.FK_EMPLEADO = empleados.ID
JOIN servicios ON  trabajos.FK_SERVICIO_UTILIZADO = servicios.ID";
$res = mysqli_query($conexion, $consultaTrabajos);
$trabajos = [];
while ($fila = mysqli_fetch_assoc($res)) {
    $trabajos[] = $fila;
}

if (isset($_SESSION['usuario'])):
    $usuarioId = $_SESSION['usuario']['ID'];
    $dameCalificaciones = "SELECT
	calificaciones.CALIFICACION,
	calificaciones.FK_TRABAJO_CALIFICACION 
FROM
_final.calificaciones
	JOIN usuarios ON calificaciones.FK_USUARIO = usuarios.ID  
WHERE
	calificaciones.FK_USUARIO = $usuarioId"; 
    $res = mysqli_query($conexion, $dameCalificaciones);
    $calificaciones = [];
    while ($fila = mysqli_fetch_assoc($res)): 
        $calificaciones[] = $fila;
    endwhile;
endif; 

?>
<div class="container mt-5">
    <div class="row justify-content-evenly g-5">
    <?php
       /* foreach ($trabajos as $trabajo):
            echo '<div class="col-sm-12 col-md-6 col-lg-4">';
            echo '<div class="card arreglo_card">';
            echo '<img class="card-img-top mt-3 " src="recursos/img/portfolio/' . $trabajo['FOTO'] . '" alt="foto trabajo">';
            echo '<div class="card-body">';
            echo '<h4 class="card-title text-center"><strong>' . $trabajo['TITULO'] .  '</strong></h4>';
            echo '<p class="card-text text-center">' . $trabajo['DESCRIPCION'] . '</p>';
            echo '<p class="card-text text-center"> <strong style="text-decoration: underline solid 2px #E0750C">Realizado por</strong>: ' . $trabajo['NOMBRE'] . ' '. $trabajo['APELLIDO'] . '<br>' . $trabajo['EMAIL'] . '<br> </p>';
            echo '<p class="card-text text-center"> <small><span style="text-decoration: underline solid 2px #E0750C">Tag:</span> ' . $trabajo['SERVICIO'] . '<br> </small> </p>';
                
            echo '<div class="container color_fondo_negro"><div class="row"><div class="col-8">';
            if (isset($_SESSION['usuario'])):
                $tieneCalificacion = false;
                foreach ($calificaciones as $calificacion):
                    if ($calificacion['FK_TRABAJO_CALIFICACION'] === $trabajo['ID']) $tieneCalificacion = true;
                endforeach;
                if ($tieneCalificacion):
                    echo '<p>Ya calificaste este trabajo :)</p>';
                else:
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=1"><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=2"><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=3"><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=4"><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=5"><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i></a>';
                endif;
            else:
                echo '<p class="fst-italic arreglo_calificar">Para calificar, necesitás iniciar sesión</p>';
            endif;
            echo '</div>';
            

            $damePromedios = "SELECT
           
            ROUND( AVG( calificaciones.CALIFICACION ), 1 ) AS PROMEDIO
            FROM
            _final.calificaciones 
            WHERE
            calificaciones.FK_TRABAJO_CALIFICACION = $trabajo[ID]";
                $res = mysqli_query($conexion, $damePromedios);
                $promedio = mysqli_fetch_assoc($res);
                        
                echo '<div class="col-4"><p><i><img  style="width:30px;  height:30px;" src="recursos/img/estrella.png" alt="estrella foto"></i> <span>'.$promedio['PROMEDIO'].'</span></p></div>';
                        
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        endforeach;*/
    
        foreach ($trabajos as $trabajo):
            echo '<div class="col-sm-12 col-md-6 col-lg-4">';
            echo '<div class="card arreglo_card trabajos_arte">';
            echo '<img class="card-img-top mt-3 " src="recursos/img/portfolio/' . $trabajo['FOTO'] . '" alt="foto trabajo">';
            echo '<div class="card-body">';
            echo '<div class="elarreglador">';
            echo '<h4  class="card-title text-center"><strong>' . $trabajo['TITULO'] . '</strong></h4>';
            echo '<a   class="btn mas-info" data-bs-toggle="collapse" href="#extra'.$trabajo['ID'].'" role="button" aria-expanded="false" aria-controls="extra'.$trabajo['ID'].'">MAS INFORMACIÓN </a>';
            echo '</div>';
            echo '<div class="collapse popup" id="extra'.$trabajo['ID'].'"><p class="card-text text-center">' . $trabajo['DESCRIPCION'] . '</p>';
            echo '<p   class="card-text text-center"> <strong style="text-decoration: underline solid 2px #E0750C">Realizado por</strong>: ' . $trabajo['NOMBRE'] . ' '. $trabajo['APELLIDO'] . '<br>' . $trabajo['EMAIL'] . '<br> </p>';
            echo '<p   class="card-text text-center"> <small><span style="text-decoration: underline solid 2px #E0750C">Tag:</span> ' . $trabajo['SERVICIO'] . '<br> </small> </p>';
            echo '<div class="container color_fondo_negro"><div class="row arreglo-calificacion">';
            if (isset($_SESSION['usuario'])):
                $tieneCalificacion = false;
                foreach ($calificaciones as $calificacion):
                    if ($calificacion['FK_TRABAJO_CALIFICACION'] === $trabajo['ID']) $tieneCalificacion = true;
                endforeach;
                if ($tieneCalificacion):
                    echo '<p class="arreglo-calificacion_3">Ya calificaste este trabajo :)</p>';
                else:
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=1"><i"><img  style="width:30px;  height:30px;" src="recursos/img/estrella2.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=2"><i"><img  style="width:30px;  height:30px;" src="recursos/img/estrella2.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=3"><i"><img  style="width:30px;  height:30px;" src="recursos/img/estrella2.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=4"><i"><img  style="width:30px;  height:30px;" src="recursos/img/estrella2.png" alt="estrella foto"></i></a>';
                    echo '<a href="acciones/calificar.php?idTrabajo=' . $trabajo['ID'] . '&calificacion=5"><i"><img  style="width:30px;  height:30px;" src="recursos/img/estrella2.png" alt="estrella foto"></i></a>';
                endif;
            else:
                echo '<div class="arreglo-calificacion_4" ><p class="fst-italic">Para calificar, necesitás iniciar sesión</p></div>';
            endif;
            

            $damePromedios = "SELECT
           
            ROUND( AVG( calificaciones.CALIFICACION ), 1 ) AS PROMEDIO
            FROM
            _final.calificaciones 
            WHERE
            calificaciones.FK_TRABAJO_CALIFICACION = $trabajo[ID]";
                $res = mysqli_query($conexion, $damePromedios);
                $promedio = mysqli_fetch_assoc($res);
                        
                echo '<div ><p class="arreglo-calificacion_atras">Promedio: <span>'.$promedio['PROMEDIO'].'</span></p></div>';
            
            echo '</div>';          
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        endforeach;
        ?> 
        
    </div>
</div>

