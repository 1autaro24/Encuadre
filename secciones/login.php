<h1 class="text-center ">INGRESAR</h1>

<div class="container">
    <div class="row justify-content-center ">
        <form action="acciones/login.php" method="POST"  class="formulario_arreglo">
            <div class="form-group m-4">
                <label for="usuario" class="label">NOMBRE DE USUARIO:</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ingresa tu nombre de usuario" id="usuario">
            </div>
            <div class="form-group m-4">
                <label for="contrasenia" class="label">CONTRASEÑA:</label>
                <input type="password" class="form-control" name="contrasenia" placeholder="Ingresa tu contraseña" id="contrasenia">
            </div>
            <div class="row justify-content-center">
            <input type="submit" value="INGRESAR" class="btn btn-primary col-4 arreglo_input dale">
            </div>
        </form>
    </div>
</div>