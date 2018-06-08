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
        $var_consulta  = "INSERT INTO consulta (fecha,nombrep,nombrem,servicio,costo) VALUES ('";
        $var_consulta .= $_POST['fecha']."','".$_POST['nombrep']."','".$_POST['nombrem']."','".$_POST['servicio']."',".$_POST['costo'].");";
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: consulta.php?"); 
    }

    function actualizar(){
        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "UPDATE consulta SET fecha = '".$_POST['fecha']."',nombrep = '".$_POST['nombrep']."',nombrem='".$_POST['nombrem']."',servicio='".$_POST['servicio']."',costo=".$_POST['costo']." WHERE idconsulta = '".$_POST['id']."'";  
        $c->query($var_consulta);
        $con->cerrarConexion();
        header("Location: consulta.php?"); 
    }

    function listar(){

        $con = new MySQL();
        $c = $con->abrirConexion();
        $var_consulta  = "SELECT idconsulta,fecha,nombrep,nombrem,servicio,costo FROM consulta;";      
        $query = mysqli_query($c, $var_consulta);
        while($result = mysqli_fetch_array($query))
        {
          echo "<tr>
                <td>
                    ".$result["idconsulta"]."
                </td>
                <td>
                    ".$result["fecha"]."
                </td>
                <td>
                    ".$result["nombrep"]."
                </td>
                <td>
                    ".$result["nombrem"]."
                </td>
                <td>
                    ".$result["servicio"]."
                </td>
                 <td>
                    ".$result["costo"]."
                </td>";

                if($_SESSION["rol"] === $_SESSION["tipou"]){
                    echo"<td>  <button class='btn btn-primary'  onclick='editar(".json_encode($result).")'>Editar </button> </td>";
                }

                echo "</tr>";
        }
      //  $con->cerrarConexion();
    }

    
?>
