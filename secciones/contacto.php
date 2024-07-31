<?php

$consultaContactoform = "SELECT * FROM contacto_form";
$res = mysqli_query($conexion, $consultaContactoform);
$contactoDatos = [];
while($fila = mysqli_fetch_assoc($res)){
    $contactoDatos[] = $fila;
};

$consultaContacto = "SELECT * FROM contacto_agencia";
$res = mysqli_query($conexion, $consultaContacto);
$contactoAgencias = [];
while($fila = mysqli_fetch_assoc($res)){
    $contactoAgencias[] = $fila;
};

$listaMailempleados = 'SELECT * FROM empleados';
$res = mysqli_query($conexion, $listaMailempleados);
$mailEmpleados = [];
while($fila = mysqli_fetch_assoc($res)){
    $mailEmpleados[] = $fila;
}

$listaRedes = 'SELECT * FROM redes_sociales';
$res = mysqli_query($conexion, $listaRedes);
$redesSociales = [];
while($fila = mysqli_fetch_assoc($res)){
    $redesSociales[] = $fila;
}
?>

<h1 class="text-center color_cosas"><strong>CONTACTANOS</strong></h1>
<h2 class="text-center color_cosas">Seguinos en nuestras redes o dejanos un mensaje a traves del formulario.</h2>

<div class="container mt-3">
  <div class="row justify-content-evenly">

    <div class="col-sm-12 col-md-12 col-lg-6 d-flex align-items-center">
        <?php   
         foreach ($contactoAgencias as $contactoAgencia): 
            echo '<div class="col text-center text-primary">';
            echo '<p class="py-2 arreglo_lista_contactos"><strong class="contactanos_color">Encontranos en </strong><span class="span_contactos fst-italic">' . $contactoAgencia['UBICACION'] . '</span></p>';
            echo '<p class="py-2 arreglo_lista_contactos"><strong class="contactanos_color">Llamanos al </strong><span class="span_contactos fst-italic">' . $contactoAgencia['TELEFONO'] . '</span></p>';
            echo '<p class="py-2 arreglo_lista_contactos"><strong class="contactanos_color">Mandanos un mail al </strong><span class="span_contactos fst-italic">' . $contactoAgencia['MAIL'] . '</span></p>';
            foreach ($redesSociales as $redSocial): 
                echo '<p class="py-2 arreglo_lista_contactos"><strong class="contactanos_color">' . $redSocial['REDES_SOCIALES'] . ':</strong><span class="span_contactos fst-italic"> ' . $redSocial['USERNAME'] . '</span></p>';
            endforeach;
            echo '</div>';
         endforeach;
        ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-6">
        <form action="acciones/formcontacto.php" method="POST"      enctype="multipart/form-data">
            <div>   
                <div >
                    <label class="form-label  mt-2 mb-0 color_cosas" for="NOMBRE_FORM">NOMBRE:</label>
                    <input type="text" name="NOMBRE_FORM" id="NOMBRE_FORM"   class="form-control" required>
                </div>

                <div >
                    <label class="form-label  mt-2 mb-0 color_cosas" for="EMAIL_FORM">EMAIL:</label>
                    <input type="email" name="EMAIL_FORM" id="EMAIL_FORM"   class="form-control" required>
                </div>

                <div >                            
                    <label class="form-label  mt-2 mb-0 color_cosas" for="ASUNTO_FORM">ASUNTO:</label>
                    <input type="text" name="ASUNTO_FORM" id="ASUNTO_FORM"   class="form-control">     
                </div>

                <div>
                    <label class="form-label  mt-2 mb-0 color_cosas" for="MENSAJE_FORM">MENSAJE:</label>
                    <input type="text" name="MENSAJE_FORM" id="MENSAJE_FORM"   class="form-control">
                </div>

                <div>
                    <label class="input-group mt-2 color_cosas" for="FK_EMPLEADO_MAIL">¿QUERES MANDARLE TU CONSULTA A UN EMPLEADO ESPECÍFICO?</label>
                    <select name="FK_EMPLEADO_MAIL" id="FK_EMPLEADO_MAIL" class="select">
                        <?php 
                            
                        echo '<option selected>Elige una opción...</option>';

                        foreach($mailEmpleados as $mailEmpleado):
                        echo '<option value="' . $mailEmpleado['ID'] .'">'.$mailEmpleado['EMAIL'] . '</option>';
                        endforeach;
                        ?>
                    </select>
                </div>

            
                    <input type="submit" value="ENVIAR" class="btn btn-primary dale my-3">
                
            </div>
        </form>
    </div>
  </div>
</div>
