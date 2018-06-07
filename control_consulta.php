<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 session_start();
 
   include_once('conexion.php');

    if($_REQUEST['metodo'] == "save"){

        if($_REQUEST['id'] != ""){
            actualizar();
        }else{
            guardar();
        }
    }if($_REQUEST['metodo'] == "consultarPropietario"){

          consultarPropietario();

    }else{
        listar();
    }

   
    function guardar(){
        $con = new MySQL();
        $c = $con->abrirConexion();        
        $var_consulta  = "INSERT INTO mascota (nombre,nacimiento,raza,peso,sexo,talla,color) VALUES ('";
        $var_consulta .= $_POST['nombre']."',".$_POST['nacimiento'].",'".$_POST['raza']."',".$_POST['peso'].",'".$_POST['sexo']."','".$_POST['talla']."','".$_POST['color']."');";
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: mascota.php?"); 
    }

    function actualizar(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "UPDATE mascota SET nombre = '".$_POST['nombre']."',nacimiento = ".$_POST['nacimiento'].",raza='".$_POST['raza']."',peso='".$_POST['peso']."'
        ,sexo='".$_POST['sexo']."',talla='".$_POST['talla']."',color='".$_POST['color']."' WHERE idmascota = '".$_POST['id']."'";  
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: mascota.php?"); 
    }

    function listar(){

        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "SELECT idmascota,nombre,nacimiento,raza,peso,sexo,talla,color FROM mascota;";  
       
        $query = mysqli_query($c, $var_consulta);
        while($result = mysqli_fetch_array($query))
        {
          echo "<tr>
                <td>
                    ".$result["idmascota"]."
                </td>
                <td>
                    ".$result["nombre"]."
                </td>
                <td>
                    ".$result["nacimiento"]."
                </td>
                <td>
                    ".$result["raza"]."
                </td>
                <td>
                    ".$result["peso"]."
                </td>
                 <td>
                    ".$result["sexo"]."
                </td>
                 <td>
                    ".$result["talla"]."
                </td>
                 <td>
                    ".$result["color"]."
                </td>";

                if($_SESSION["rol"] === $_SESSION["tipou"]){
                    echo"<td>  <button class='btn btn-primary'  onclick='editar(".json_encode($result).")'>Editar </button> </td>";
                }

                echo "</tr>";
        }
      //  $con->cerrarConexion();
    }

    function consultarPropietario(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "SELECT nombre FROM propietario;";  
       
        $query = mysqli_query($c, $var_consulta);
        $rows = array();

        while($result = mysqli_fetch_array($query))
        {
            $rows[] = $result['nombre'];
        }

        $jarray = ["datos"=>$rows];


        print json_encode($jarray);
    }

?>
