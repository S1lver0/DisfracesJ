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

    // Obtener las tallas y la cantidad de cada talla del disfraz correspondiente
    $sqlTallas = "SELECT tot.Dtal_Cantidad, tn.Tal_Nombre 
    FROM DisfrazTalla AS tot 
    INNER JOIN Talla AS tn ON tot.FK_Talla_DIsfrazTalla = tn.PK_Talla 
    WHERE tot.FK_Disfraz_DisfrazTalla = '$pkDisfraz'";

    $resultTallas = $conex->query($sqlTallas);

    if ($resultTallas) {
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




      <h1 style="font-weight: bold; color: purple;">Detalles del Disfraz</h1>
      
      <p></p>
      <p style="font-weight: bold;color: black; font-size: 30px;text-align:center;"><?php echo $nombreDisfraz; ?></p>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Talla</th>
            <th>Cantidad</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($rowTallas = $resultTallas->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $rowTallas['Tal_Nombre']; ?></td>
              <td><?php echo $rowTallas['Dtal_Cantidad']; ?></td>
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