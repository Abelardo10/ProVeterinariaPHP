



<script>


    function historia(){
        location.href = "historia.php";
    }

    function registrar(){
        location.href = "registro.php";
    }
     function salir(){

        location.href = "login.php";

    }

  

</script>




<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="rooms.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Registrar</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                  <a class="dropdown-item" href="mascota.php">Mascotas</a>
                  <a class="dropdown-item" href="registro.php">Propietarios</a>              
                </div>
            </li>
        
            <a class="nav-item nav-link" id="historia" href="#" onclick="historia();">Historia</a>
            <a class="nav-item nav-link" href="#">Inventario</a>
            <a class="nav-item nav-link" href="consulta.php">Servicio</a>
            <a class="nav-item nav-link" href="#">Send</a>
            <div>
                <a class="nav-item nav-link" onclick="salir();">Cerrar Sesion</a>
            </div>

        </div>


    </div>
</nav>