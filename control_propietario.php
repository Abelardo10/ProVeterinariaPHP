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
    }else{
        listar();
    }

   
    function guardar(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "INSERT INTO propietario (nombre,documento,telefono,correo) VALUES ('";
        $var_consulta .= $_POST['nombre']."',".$_POST['documento'].",".$_POST['telefono'].",'".$_POST['correo']."');";  
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: registro.php?"); 
    }

    function actualizar(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "UPDATE propietario SET nombre = '".$_POST['nombre']."',documento = ".$_POST['documento'].",telefono=".$_POST['telefono'].",correo='".$_POST['correo']."' WHERE idpropietario = '".$_POST['id']."'";  
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: registro.php?"); 
    }

    function listar(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "SELECT idpropietario,nombre,documento,telefono,correo FROM propietario;";  
        $query = mysqli_query($c, $var_consulta);
        while($result = mysqli_fetch_array($query))
        {
          echo "<tr>
                <td>
                    ".$result["idpropietario"]."
                </td>
                <td>
                    ".$result["nombre"]."
                </td>
                <td>
                    ".$result["documento"]."
                </td>
                <td>
                    ".$result["telefono"]."
                </td>
                <td>
                    ".$result["correo"]."
                </td>";

                if($_SESSION["rol"] === $_SESSION["tipou"]){
                    echo"<td>  <button class='btn btn-primary'  onclick='editar(".json_encode($result).")'>Editar </button> </td>";
                }

                echo "</tr>";
        }
        $con->cerrarConexion();
    }

?>