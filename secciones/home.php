<h1 class="text-center color_cosas "><strong>BIENVENIDOS</strong></h1>
<h2 class="text-center color_cosas ">Seguí leyendo para conocer un poco mas sobre nuestra galería :)</h2>

<div class="card my-5 color_fondo carta_ppal" style="max-width: 900px;">
  <div class="row g-0">
    <div class="col-md-4 contenedor-img_ppal">
      <img src="recursos/img/arte_test2.jpg" class="img-fluid" alt="logo" style="border-radius: 0.875rem;">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h2 class="card-title text-center"><strong>¿QUIÉNES SOMOS?</strong></h2>
        <p class="card-text"> <strong style="font-size: larger;">Somos un grupo de artistas que crearon esta galeria para mostrar nuestros trabajos.</strong><br>
        Creamos esta página para compartir nuestro arte. Tambien podemos crear cuadros para ser utilizados en publicidad. <br>
        ¿Queres conocernos? Apretá el botón y mirá quienes somos.</p>
        <a  class="btn btn-primary dale" data-bs-toggle="collapse" href="#empleados" role="button" aria-expanded="false" aria-controls="empleados" >¡DALE!</a>
      </div>
    </div>
  </div>
</div>

<?php
$consultaEmpleados = "SELECT 
        empleados.NOMBRE, 
        empleados.APELLIDO, 
        empleados.FOTO
    FROM
        _final.empleados"
       ;
$res = mysqli_query($conexion, $consultaEmpleados);
$empleados = [];
while ($fila = mysqli_fetch_assoc($res)) {
    $empleados[] = $fila;
};  ?>

<div class="collapse" id="empleados">
  <div class="card color_fondo_negro carta_ppal">
    <h3 class="text-info text-center" style="color: #E0750C !important; padding: 15px 0; margin: 0 !important;"><strong>ARTISTAS</strong></h3>
    <div class="container color_fondo_negro" style="border-radius: 5rem;">
      <div class="row justify-content-center">
         <?php
          foreach ($empleados as $empleado): 
            echo '<div class="col-lg-4 col-md-6 col-sm-12">';
            echo '<img class="img-fluid" src="recursos/img/empleados/' . $empleado['FOTO'] . '" alt="artista" style="border-radius: 0.875rem;">';
            echo '<h5 class="card-title my-2 text-center" style="text-transform:uppercase;padding: 10px 0; margin: 0 !important;"><span class="nombre">' . $empleado['NOMBRE'] . ' ' . $empleado['APELLIDO'] . '</span></h5>';
            echo '</div>';
          endforeach;
        ?>
      </div>
    </div>
  </div>
</div>


<?php
$consultaServicios = "SELECT 
        servicios.SERVICIO, 
        servicios.DESCRIPCION,
        servicios.ICON
    FROM
    _final.servicios"
       ;
$res = mysqli_query($conexion, $consultaServicios);
$servicios = [];
while ($fila = mysqli_fetch_assoc($res)) {
    $servicios[] = $fila;
};  ?>

<div class="container mt-3">
    <h2 class="text-center color_cosas"style="padding: 20px 0; margin: 0 !important;"><strong>¿QUÉ SERVICIOS OFRECEMOS?</strong></h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
          foreach ($servicios as $servicio): 
            echo '<div class="color_cosas">';
            echo '<div class="card color_fondo color_ cosas carta_ppal h-100">';
            echo '<div class="col d-flex justify-content-center">';
            echo '<img class="img-fluid rounded-start mt-4" src="recursos/img/servicios/' . $servicio['ICON'] . '" alt="servicio" > </div>';
            echo '<div class="card-body">';
            echo '<h4 class="card-title text-center" style="text-transform:uppercase;"><span class="nombre">' . $servicio['SERVICIO'] . '</span></h4>';
            echo '<p class="card-text text-center">' . $servicio['DESCRIPCION'] . '</p>';
            echo '</div> </div> </div>';
          endforeach;
        ?>
    </div>
</div>