<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



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
  <div class="row justify-content-center  ">
    <div class="col-md-12">
      <div class="custom-container ">

                <style>
                  .smaller-image {
                    max-width: 80px; /* Adjust the size as desired */
                    margin: 0 auto; /* Center the image horizontally */
                  }
                </style>
                    <div class="text-center">
                    
                        <img src="13.JPG" alt="Description of the image" class="img-fluid smaller-image">
                      
                    </div>



    <h1 class="page-header text-center " style="font-weight: bold; color: purple;">  "  Editar  Datos del  Disfraz "  </h1>

    <?php
// Obtener el ID de la URL
$id = $_GET['id'];

include_once('conec.php');

// Verificar la conexión
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}

// Consultar el Disf_Nombre correspondiente al ID
$sql = "SELECT A.Disf_Nombre,
A.Disf_Precio,
  B.Tema_Nombre,
  C.Dtal_Cantidad,
  D.Tal_Nombre
  FROM Disfraz A 
  INNER JOIN Tematica B ON A.FK_Tematica_Disfraz = B.PK_Tematica 
  INNER JOIN DisfrazTalla C ON A.PK_Disfraz = C.FK_Disfraz_DisfrazTalla 
  INNER JOIN Talla D ON D.PK_Talla = C.FK_Talla_DisfrazTalla
  WHERE A.PK_Disfraz = '$id' AND D.PK_Talla  IN ('1')";


$result = $conex->query($sql);



// Verificar si se encontraron resultados
if ($result && $result->num_rows > 0) {
    // Obtener el primer registro
    $row = $result->fetch_assoc();

    // Obtener el valor de Disf_Nombre
    $Disf_Nombre = $row['Disf_Nombre'];
    $Tema_Nombre = $row['Tema_Nombre'];
    $Disf_Precio=$row['Disf_Precio'];
    $Dtal_Cantidad=$row['Dtal_Cantidad'];
    
} else {
    // No se encontró ningún registro correspondiente al ID
    $Disf_Nombre = "";
}




$sql2 = "SELECT A.Disf_Nombre,
A.Disf_Precio,
  B.Tema_Nombre,
  C.Dtal_Cantidad,
  D.Tal_Nombre
  FROM Disfraz A 
  INNER JOIN Tematica B ON A.FK_Tematica_Disfraz = B.PK_Tematica 
  INNER JOIN DisfrazTalla C ON A.PK_Disfraz = C.FK_Disfraz_DisfrazTalla 
  INNER JOIN Talla D ON D.PK_Talla = C.FK_Talla_DisfrazTalla
  WHERE A.PK_Disfraz = '$id' AND D.PK_Talla  IN ('2')";
$result2 = $conex->query($sql2);

// Verificar si se encontraron resultados
if ($result2 && $result2->num_rows > 0) {
  // Obtener el primer registro
  $row = $result2->fetch_assoc();

  // Obtener el valor de Disf_Nombre
  $Disf_Nombre = $row['Disf_Nombre'];
  $Tema_Nombre = $row['Tema_Nombre'];
  $Disf_Precio=$row['Disf_Precio'];
  $Dtal_Cantidad2=$row['Dtal_Cantidad'];
  
} else {
  // No se encontró ningún registro correspondiente al ID
  $Disf_Nombre = "";
}



$sql3 = "SELECT A.Disf_Nombre,
A.Disf_Precio,
  B.Tema_Nombre,
  C.Dtal_Cantidad,
  D.Tal_Nombre
  FROM Disfraz A 
  INNER JOIN Tematica B ON A.FK_Tematica_Disfraz = B.PK_Tematica 
  INNER JOIN DisfrazTalla C ON A.PK_Disfraz = C.FK_Disfraz_DisfrazTalla 
  INNER JOIN Talla D ON D.PK_Talla = C.FK_Talla_DisfrazTalla
  WHERE A.PK_Disfraz = '$id' AND D.PK_Talla  IN ('3')";

$result3 = $conex->query($sql3);


// Verificar si se encontraron resultados
if ($result3 && $result3->num_rows > 0) {
  // Obtener el primer registro
  $row = $result3->fetch_assoc();

  // Obtener el valor de Disf_Nombre
  $Disf_Nombre = $row['Disf_Nombre'];
  $Tema_Nombre = $row['Tema_Nombre'];
  $Disf_Precio=$row['Disf_Precio'];
  $Dtal_Cantidad3=$row['Dtal_Cantidad'];
  
} else {
  // No se encontró ningún registro correspondiente al ID
  $Disf_Nombre = "";
}






















// Cerrar la conexión
$conex->close();
?> 
   
    



    
<form action="editar_guardar_disfraz.php?id=<?php echo $_GET['id']; ?>" method="POST">

    <div class="form-group">
    <label for="nombreDisfraz">Nombre del Disfraz:</label>
    <input type="text" class="form-control" name="Nombre_Disfraz" value="<?php echo $Disf_Nombre; ?>" readonly>
    <small class="form-text text-muted">Ingrese solo letras (sin espacios ni caracteres especiales)</small>
    </div>


  <div class="form-group">
    <label for="tematicaDisfraz">Temática:</label>
    <input type="text" class="form-control" name="Nombre_Tematica" value="<?php echo $Tema_Nombre; ?>" readonly>
    <small class="form-text text-muted">Seleccione una Tematica (ejemplo:Supeheroes)</small>
  </div>



  <div class="form-group">
    <label for="precioDisfraz">Precio:</label>
    <input type="text" class="form-control" name="Precio_Disfraz" pattern="[0-9]+([.,][0-9]+)?"  value="<?php echo $Disf_Precio; ?>"required >
    <small class="form-text text-muted">Ingrese un número entero o decimal (ejemplo: 10 o 10.99)</small>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Talla</th>
        <th>Cantidad</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>S</td>
        <td>
          <input type="number" class="form-control" name="CS" value="<?php echo $Dtal_Cantidad; ?>">
        </td>
      </tr>
      <tr>
        <td>M</td>
        <td>
          <input type="number" class="form-control" name="CM" value="<?php echo $Dtal_Cantidad2; ?>">
        </td>
      </tr>
      <tr>
        <td>L</td>
        <td>
          <input type="number" class="form-control" name="CL" value="<?php echo $Dtal_Cantidad3 ; ?>">
        </td>
      </tr>
    </tbody>
  </table>

            <div class="text-center">
                <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left "></span> Cancelar</a>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>

     
        </div>
      </div>
    </div>
  </div>


  