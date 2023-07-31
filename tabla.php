
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


<style>
  .container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
</style>
<style>
  .custom-container {
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    margin:  50px;
    padding: 40px;
  }
</style>



<div class="container">
  <div class="custom-container">
  <?php
  include_once('conec.php');

  if (isset($_GET['id'])) {
    $pkDisfraz = $_GET['id'];
   

    // Obtener el nombre del disfraz
    $sqlNombreDisfraz = "SELECT Disf_Nombre FROM Disfraz WHERE PK_Disfraz = '$pkDisfraz'";
    $resultNombreDisfraz = $conex->query($sqlNombreDisfraz);
    $nombreDisfraz = "";

    if ($resultNombreDisfraz && $resultNombreDisfraz->num_rows > 0) {
      $rowNombreDisfraz = $resultNombreDisfraz->fetch_assoc();
      $nombreDisfraz = $rowNombreDisfraz['Disf_Nombre'];
    }

    // Consultar 
    
    $sqlP = "SELECT * FROM Disfraz INNER JOIN  DisfrazPrecios on  
            FK_Disfraz_DisfrazPrecios = PK_Disfraz 
            WHERE PK_Disfraz = '$pkDisfraz'";





 


    $resultPrecio = $conex->query($sqlP);

    if ($resultPrecio) {
      ?>

      <style>
        .smaller-image {
          max-width: 80px; /* Adjust the size as desired */
          margin: 0 auto; /* Center the image horizontally */
        }
      </style>

       
          <div class="text-center">
           
              <img src="13.JPG" alt="Description of the image" class="img-fluid smaller-image">
            
          </div>




      <h1 style="font-weight: bold; color: purple;text-align:center;">Tabla de Temporal de Precios</h1>
      
      <p></p>
      <p style="font-weight: bold;color: black; font-size: 30px;text-align:center;"><?php echo $nombreDisfraz; ?></p>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Precio Temporal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($rowPrecios = $resultPrecio->fetch_assoc()) {
            ?>
            <tr>
            
              <td><?php echo $rowPrecios['Dpre_FechaInicio']; ?></td>
              <td><?php echo $rowPrecios['Dpre_FechaFinal']; ?></td>
              <td><?php echo $rowPrecios['Dpre_Precio']; ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
      <?php
    } else {
      // Error en la consulta
      echo "Error: " . $conex->error;
    }
  } else {
    // No se proporcionó el parámetro PK_Disfraz en la URL
    echo "Error: No se proporcionó el ID del disfraz.";
  }

  // Cerrar la conexión
  $conex->close();
  ?>
  
    <div class="text-center">
      <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Volver</a>
    </div>

  </div>
</div>