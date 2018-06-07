<?php
 
if(isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: mascota.php");
  }
 
 ?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <title>Registrar Mascota</title>
  </head>
  <body>
  <?php include_once ("header.php"); ?>

  <div class="row">
    <div class="col-sm-4 container">
      <form action="control_mascota.php?metodo=save" method="post" style="background-color: #f5f5f5;padding: 5px; margin:20px">
        <center><h3>Registro de Mascotas</h3></center>
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="hidden" class="form-control" id="id" name="id">
          <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre">
        </div>
        <div class="form-group">
          <label for="nacimiento">Fecha de Nacimiento</label>
          <input type="date" class="form-control" id="nacimiento" name="nacimiento">
        </div>
        <div class="form-group">
          <label for="raza">Raza</label>
          <input type="text
          " class="form-control" id="raza" name="raza" placeholder="Raza">
        </div>
        <div class="form-group">
          <label for="peso">Peso</label>
          <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso">
        </div>
         <div class="form-group">
          <label for="Sexo">Sexo</label>
          <select class="form-control" id="sexo" name="sexo">
            <option value="select">Seleccione...</option>
            <option value="Hembra">Hembra</option>
            <option value="Macho">Macho</option>            
          </select>
        </div>
         <div class="form-group">
          <label for="Talla">Talla</label>
          <select class="form-control" id="talla" name="talla">
            <option value="select">Seleccione...</option>
            <option value="Grande">Grande</option>
            <option value="Mediano">Mediano</option> 
             <option value="Pequeño">Pequeño</option>           
          </select>
        </div>
       
        <div class="form-group">
          <label for="color">Color</label>
          <input type="text" class="form-control" id="color" name="color" placeholder="Color">
        </div>
        <input type="submit" class="btn btn-primary btn-block"></input>
   </form>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-10 container">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha de Nacimiento</th>
              <th scope="col">Raza</th>
              <th scope="col">Peso</th>
              <th scope="col">Sexo</th>
              <th scope="col">Talla</th>
              <th scope="col">Color</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="t_mascota" >
          </tbody>
      </table>
    </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    
    <script language="JavaScript"> 

     $( document ).ready(function() {
            consultar();
        });

    function editar(dato){
      $("#id").val(dato.idmascota);
      $("#nombre").val(dato.nombre);
      $("#nacimiento").val(dato.nacimiento);
      $("#raza").val(dato.raza);
      $("#peso").val(dato.peso);
      $("#sexo").val(dato.sexo);
      $("#talla").val(dato.talla);
      $("#color").val(dato.color);


    }

    function consultar()
    {     
            $.ajax({
              type : "POST",
              url : "control_mascota.php?metodo=listar",
              data : { 
                                                        
              },
              success : function( data ){
              $('#t_mascota').html(data);

              }
            });         
    }
    </script>

  </body>
</html>