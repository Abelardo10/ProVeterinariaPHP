
<?php
 
if(isset($_GET["error"]) && $_GET["error"] != "login") {
    header("Location: consulta.php");
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

    <title>Servicio</title>
  </head>
  <body>
  <?php include_once ("header.php"); ?>

<div class="row">
    <div class="col-sm-4 container">
      <form action="control_servicio.php?metodo=save" method="post" style="background-color: #f5f5f5;padding: 5px; margin:20px">
          <center><h3>Servicio</h3></center>
          <div class="form-group">
            <label for="fechaconsulta">Fecha de la consulta</label>
            <input type="hidden" class="form-control" id="id" name="id">
            <input type="date" class="form-control" id="fecha" name="fecha">
          </div>
          
          <div class="form-group">
            <label for="nombrep">Nombre del Propietario</label>
            <input type="text
            " class="form-control autocomplete" id="nombrep" name="nombrep"
              onfocus="consultarPropietario()"
              placeholder="Nombre del Propietario">
          </div>
           
          <div class="form-group">
            <label for="nombrem">Nombre de la Mascota</label>
            <input type="text
            " class="form-control" id="nombrem" name="nombrem" onfocus="ConsultarMascota()" placeholder="Nombre de la Mascota">
          </div>

           <div class="form-group">
            <label for="tiposervicio">Tipo de Servisio</label>
              <select name="servicio"  id="servicio" class="form-control">
                <option value="" selected>Select...</option> 
                <option value="Baño">Baño</option>
                <option value="Corte">Corte</option>                
                <option value="Cirugia">Cirugia</option>
                <option value="Vacunas">Vacunas</option>
              </select>
          </div>
           <div class="form-group">
            <label for="costo">Costo del Servicio</label>
            <input type="number" class="form-control" id="costo" name="costo" placeholder="Costo del Servico">
          </div>
                 
          <input type="submit" value="Guardar" class="btn btn-primary btn-block"></input>
     </form>

      <script>
      function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) { return false;}
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
              /*check if the item starts with the same letters as the text field value:*/
              if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                b.innerHTML += arr[i].substr(val.length);
                /*insert a input field that will hold the current array item's value:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*execute a function when someone clicks on the item value (DIV element):*/
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    inp.value = this.getElementsByTagName("input")[0].value;
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/
                    closeAllLists();
                });
                a.appendChild(b);
              }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
              /*If the arrow DOWN key is pressed,
              increase the currentFocus variable:*/
              currentFocus++;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 38) { //up
              /*If the arrow UP key is pressed,
              decrease the currentFocus variable:*/
              currentFocus--;
              /*and and make the current item more visible:*/
              addActive(x);
            } else if (e.keyCode == 13) {
              /*If the ENTER key is pressed, prevent the form from being submitted,*/
              e.preventDefault();
              if (currentFocus > -1) {
                /*and simulate a click on the "active" item:*/
                if (x) x[currentFocus].click();
              }
            }
        });
        function addActive(x) {
          /*a function to classify an item as "active":*/
          if (!x) return false;
          /*start by removing the "active" class on all items:*/
          removeActive(x);
          if (currentFocus >= x.length) currentFocus = 0;
          if (currentFocus < 0) currentFocus = (x.length - 1);
          /*add class "autocomplete-active":*/
          x[currentFocus].classList.add("autocomplete-active");
        }
        function removeActive(x) {
          /*a function to remove the "active" class from all autocomplete items:*/
          for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
          }
        }
        function closeAllLists(elmnt) {
          /*close all autocomplete lists in the document,
          except the one passed as an argument:*/
          var x = document.getElementsByClassName("autocomplete-items");
          for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
              x[i].parentNode.removeChild(x[i]);
            }
          }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
            });
      }

     

      /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
     // autocomplete(document.getElementById("nombrep"), countries);
      </script>


    </div>
    </div>
    <div class="row">
      <div class="col-sm-10 container">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Fecha Consulta</th>
              <th scope="col">Nombre del Propietario</th>
              <th scope="col">Nombre de la Mascota</th>
              <th scope="col">Tipo de Servicio</th>
              <th scope="col">Costo del Servicio</th>              
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody id="t_consultas" >
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
      $("#id").val(dato.idconsulta);
      $("#fecha").val(dato.fecha);
      $("#nombrep").val(dato.nombrep);
      $("#nombrem").val(dato.nombrem);
      $("#servicio").val(dato.servicio);
      $("#costo").val(dato.costo);
      
    }

    function consultar()
    {     
            $.ajax({
              type : "POST",
              url : "control_servicio.php?metodo=listar",
              data : { 
                                                        
              },
              success : function( data ){
              $('#t_consultas').html(data);

              }
            });         
    }

     function consultarPropietario()
    {     
            $.ajax({
              type : "POST",
              url : "control_consulta.php?metodo=consultarPropietario",
              data : { 
                                                        
              },
              success : function( data ){
            //  $('#t_consultas').html(data);
                  //alert(data);
                 //  var js_array = data;
                   console.log(data);
                   var d = JSON.parse(data);
                   console.log(d.datos);
                   autocomplete(document.getElementById("nombrep"), d.datos);
              }
            });         
    }

    function ConsultarMascota()
    {     
            $.ajax({
              type : "POST",
              url : "control_mascota.php?metodo=ConsultarMascota",
              data : { 
                                                        
              },
              success : function( data ){
            //  $('#t_consultas').html(data);
                  //alert(data);
                 //  var js_array = data;
                   console.log(data);
                   var d = JSON.parse(data);
                   console.log(d.datos);
                   autocomplete(document.getElementById("nombrem"), d.datos);
              }
            });         
    }

    </script>
 <?php include_once ("footer.php"); ?>
  </body>
</html>