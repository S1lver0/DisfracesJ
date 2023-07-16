<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>



<body>

<?php
  include("nav.php");
?>


  





 <!-- PARA TODA LA TABLA  BUSCADOR DE LA TABLA DISFRAZ------------------------------------------------>
<div class="table-container">
	<h1 class="page-header text-center"> Lista de Disfraces</h1>

	<div class="row table table-dark ">
        <style>
          .table-container {
            border: 2px solid white;
            background-color: gainsboro;
            border-radius: 30px;
            padding: 90px;
            
          }
        </style>




		<div class="col-sm-10 col-sm-offset">
			<a href="registro_disfraz.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Registro Nuevo Disfraz</a>
			<p></p>
			


    <!-- Formulario de búsqueda -->

<div class="row">

  <div class="col-md-4">
     <!-- Primera Columna -->

    <form method="GET" action="">
      <div class="input-group mb-2 justify-content-start">
        <input type="text" class="form-control" name="buscar_nombre" placeholder="Buscar por nombre">
        <span class="input-group-btn">
          <button class="btn btn-primary" type="submit">Buscar</button>
        </span>
      </div>
    </form>

  </div>
  
    <!-- FIN DE Formulario de búsqueda -->


  <div class="col-md-2">
    <!-- Segunda columna -->
     
    <style>
        .custom-select {
          appearance: auto;
          border: none;
          background-color: white;
          padding: 0;
          cursor: pointer;
        }
        
        .custom-select:focus {
          outline: none;
          box-shadow: inset;
        }
      </style>

      <select id="tematicaSelect" class="form-control form-control-lg mb-3 custom-select" aria-label="Default select example">
        <option selected>Seleccionar Tematica</option>
        <option value="1">Animales</option>
        <option value="2">SuperHeroes</option>
        <option value="3">Disney</option>
        <option value="4">Profesiones y Oficios</option>
        <option value="5">Culturas</option>
      </select>

 

      
 <!-- Segunda FIN -->

  </div>




    <div class="col-md-2">
      <!-- Tercera columna -->
      <style>
          .custom-select {
            appearance: auto;
            border: none;
            background-color: white;
            padding: 0;
            cursor: pointer;
          }
          
          .custom-select:focus {
            outline: none;
            box-shadow: inset;
          }
        </style>

        <select id="estado-select" class="form-control form-control-lg mb-3 custom-select" aria-label="Default select example">
          <option selected>Seleccionar Estado</option>
          <option value="1">Activo</option>
          <option value="2">Agotado</option>
        </select>


      <!--Tercera  FIN -->
    </div>

    <br>
    <br>
    <br>
    <br>

   </div>
  </div> <!--FIN DE nuevo disfraz -->

   <br>
   <br>
   <br>
   
















    <!-- Mostrar la tabla de registros INICIO -->

			
	

  
          <table class="table table-bordered table-striped">
            <style>
              .table-bordered tr,
              .table-bordered th,
              .table-bordered td {
                padding: 50px;
                margin-top: 60px;
                background-color: thistle;
                border: 3px solid black;
                
              }
            </style>
            <thead style="background-color: darken(thistle, 100%);">
              <th>ID</th>
              <th>Nombres</th>
              <th>Precio Unitario</th>
              <th>Tematica</th>
              <th>Estado</th>
              <th>Cantidad Total</th>
              <th>Acción</th>
            </thead>
            <tbody>
              <?php
              include_once('conec.php');

              // Comprobar si se ha enviado una búsqueda
              if (isset($_GET['buscar_nombre'])) {
                $buscar_nombre = $_GET['buscar_nombre'];
                $sql = "SELECT d.*, t.Tema_Nombre, iven.FK_Estado_Inventario , e.Esta_Nombre , SUM(dt.Dtal_Cantidad) AS SumaCantidad
                      FROM Disfraz d
                      INNER JOIN Tematica t ON d.FK_Tematica_Disfraz = t.PK_Tematica
                      INNER JOIN DisfrazTalla dt ON dt.FK_Disfraz_DisfrazTalla = d.PK_Disfraz
                      INNER JOIN Inventario iven ON iven.FK_Disfraz_Inventario = d.PK_Disfraz
                      INNER JOIN Estado e ON e.PK_Estado = iven.FK_Estado_Inventario
                      WHERE d.Disf_Nombre LIKE '%$buscar_nombre%'
                      GROUP BY d.PK_Disfraz";
              } else {
                $sql = "SELECT d.*, t.Tema_Nombre, iven.FK_Estado_Inventario , e.Esta_Nombre , SUM(dt.Dtal_Cantidad) AS SumaCantidad
                        FROM Disfraz d
                        INNER JOIN Tematica t ON d.FK_Tematica_Disfraz = t.PK_Tematica
                        INNER JOIN DisfrazTalla dt ON dt.FK_Disfraz_DisfrazTalla = d.PK_Disfraz
                        INNER JOIN Inventario iven ON iven.FK_Disfraz_Inventario = d.PK_Disfraz
                        INNER JOIN Estado e ON e.PK_Estado = iven.FK_Estado_Inventario
                        GROUP BY d.PK_Disfraz";
              }

              $result = $conex->query($sql);

              $i=1;

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

              

                  $disfrazID = $row['PK_Disfraz'];
                  $sumaCantidad = $row['SumaCantidad'];
              
                  if ($sumaCantidad == 0) {
                      $queryUpdate = "UPDATE Inventario SET FK_Estado_Inventario = 2 WHERE FK_Disfraz_Inventario = '$disfrazID'";
                      
                      $conex->query($queryUpdate);
                  }else {
                      $queryUpdate = "UPDATE Inventario SET FK_Estado_Inventario = 1 WHERE FK_Disfraz_Inventario = '$disfrazID'";
                      
                      $conex->query($queryUpdate);
                  }

                  ?>

              
             
                 <!-- Los elementos filtrados se mostrarán aquí -->

                 <tr class="tematica-row tematica-<?php echo $row['FK_Tematica_Disfraz']; ?> estado-row estado-select<?php echo $row['FK_Estado_Inventario']; ?>">

                    <td><?php echo  $i ; ?></td>
                    <td><?php echo $row['Disf_Nombre']; ?></td>
                    <td><?php echo $row['Disf_Precio']; ?></td>
                    <td><?php echo $row['Tema_Nombre']; ?></td>
                    <?php
                            $estadoNombre = $row['Esta_Nombre'];

                            if ($estadoNombre == 'Activo') {
                              echo '<td style="color: #008000;"><span class= " glyphicon  glyphicon-ok-circle"></span> ' . $estadoNombre . '</td>';
                            } else {
                              echo '<td style="color: #8b0000;"><span class="glyphicon glyphicon-exclamation-sign"></span> ' . $estadoNombre . '</td>';
                            }
                    ?>
                   
                    <td><?php echo $row['SumaCantidad']; ?></td>
                    <td>

                    <?php $i++; ?>

                              <!--  <a href="#delete_<?php echo $row['PK_Disfraz']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>-->
                      <a href="editar_disfraz.php?id=<?php echo $row['PK_Disfraz']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span></a>
                      <a href="talla.php?id=<?php echo $row['PK_Disfraz']; ?>" class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span></a>
                      <a href="talla.php?id=<?php echo $row['PK_Disfraz']; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-usd"></span></a>
                    </td>

                    

                  </tr>

            

                  

                  <?php
                }
              } else {
                echo '<tr><td colspan="6">No se encontraron resultados.</td></tr>';
              }
              // Cerrar la conexión
              $conex->close();
              ?>
            </tbody>
          </table>



    </div>

  </div>
 
          <!-- BNACO TALLAS------------------------------------------------>

		
       <!-- S FIN ------------------------------------------------>


    </div>


       <!-- S FIN -->

	</div>
</div>



<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>






<script>
  document.addEventListener('DOMContentLoaded', function() {
    var select = document.getElementById('estado-select');
    var rows = document.getElementsByClassName('tematica-row');

    select.addEventListener('change', function() {
      var selectedValue = select.value;

      // Mostrar todas las filas si se selecciona "Seleccionar Estado"
      if (selectedValue === '') {
        for (var i = 0; i < rows.length; i++) {
          rows[i].style.display = '';
        }
      } else {
        // Ocultar todas las filas y mostrar solo las que coincidan con el estado seleccionado
        for (var i = 0; i < rows.length; i++) {
          rows[i].style.display = 'none';
        }

        var filteredRows = document.getElementsByClassName('estado-select' + selectedValue);
        for (var i = 0; i < filteredRows.length; i++) {
          filteredRows[i].style.display = '';
        }
      }
    });
  });
</script>


<script>
              document.addEventListener('DOMContentLoaded', function() {
                var select = document.getElementById('tematicaSelect');
                var rows = document.getElementsByClassName('tematica-row');

                select.addEventListener('change', function() {
                  var selectedValue = select.value;

                  // Mostrar todas las filas si se selecciona "Seleccionar Tematica"
                  if (selectedValue === '') {
                    for (var i = 0; i < rows.length; i++) {
                      rows[i].style.display = '';
                    }
                  } else {
                    // Ocultar todas las filas y mostrar solo las que coincidan con la temática seleccionada
                    for (var i = 0; i < rows.length; i++) {
                      rows[i].style.display = 'none';
                    }

                    var filteredRows = document.getElementsByClassName('tematica-' + selectedValue);
                    for (var i = 0; i < filteredRows.length; i++) {
                      filteredRows[i].style.display = '';
                    }
                  }
                });
              });

  </script>








</body>
</html>