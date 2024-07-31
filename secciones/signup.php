<h1 class="text-center ">REGISTRARSE</h1>
 
 <div class="container">
    <div class="row justify-content-center">
        <form action="acciones/signup.php" method="POST" class="formulario_arreglo">
            <div class="form-group m-4 ">
                <label for="nombre" class="form-label">NOMBRE DE USUARIO:</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingresa un nombre de usuario" id="nombre">
            </div> 
            <div class="form-group m-4 ">
                <label for="email" class="form-label">EMAIL:</label>
                <input type="email" class="form-control" name="email" placeholder="Ingrese un mail valido" id="email">
            </div>
            <div class="form-group m-4 ">
                <label for="password" class="form-label">CONTRASEÑA:</label>
                <input type="password" class="form-control" name="password" placeholder="Ingrese una contraseña segura" id="password">
            </div>
            <div class="row justify-content-center">
            <input type="submit" value="REGISTRARSE" class="btn btn-primary col-4 ms-4 dale">
            </div>
        </form>
    </div>
</div> 