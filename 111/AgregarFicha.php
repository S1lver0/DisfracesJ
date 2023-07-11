<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>CRUD PHP odal: Ejemplo Completo | BaulPHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	





</head>
<body>



<style>
	body{
		background-color: white;
	}
	
  .navbar {
    background-color: black;
    border-radius: 0;
    border: none;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .navbar-nav li a {
    color: white;
    transition: color 0.3s;
  }

   a {
    color: aliceblue !important;
	font-size: 15px;
  }

  .navbar::after {
    content: "";
    display: block;
    height: 10px;
    width: 100%;
    background-color: purple;
  }

  

</style>

<nav class="navbar navbar-default" >
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Tienda de Disfraces J' Luis</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./">INICIO </a></li>
        <li><a href="tabla_disfraz.php">DISFRAZ</a></li>
        <li><a href="inde.php">CLIENTES</a></li>
        <li><a href="./">CONTACTO</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php include_once('conec.php'); ?>




    







    <div class="table-container">
    <h1 class="page-header text-center"> Ficha de Alquiler</h1>

           <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group ">
                        <div class="col-sm-3">
                            <label for="fechaInicio">Fecha de inicio</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ">
                        <div class="col-sm-3">
                            <label for="fechaDevolucion">Fecha de devolución</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="fechaDevolucion" name="fechaDevolucion">
                        </div>
                        </div>
                    </div>
           </div>

           <h1 class="page-header text-center"> </h1>







    <style>
          .table-container {
            margin-top: 5x;
            border: 2px solid white;
            background-color: gainsboro;
            border-radius: 40px;
            padding: 100px;
            
          }
        </style>



<?php
// Inicia la sesión
session_start();

// Verificar si se recibió el parámetro 'id' en la URL
if ((isset($_GET['id'])) || (isset($_GET['idd']))) {
    // Obtener el ID del cliente desde la URL
    $clienteId = isset($_GET['id']) ? $_GET['id'] : null;
    $clienteIdd = isset($_GET['idd']) ? $_GET['idd'] : null;

    // Aquí deberías realizar la lógica necesaria para obtener los datos del cliente
    // Puedes hacer una consulta a tu base de datos o utilizar cualquier otro método para obtener los datos

    // Ejemplo: Obtener los datos del cliente desde una base de datos
    // Supongamos que tienes una conexión establecida a la base de datos en este punto

    // Prepara y ejecuta una consulta para obtener los datos del cliente por su ID
    if ($clienteId !== null) {
        $query = "SELECT * FROM Cliente WHERE Id_Cliente = $clienteId";
        $result = mysqli_query($conex, $query);

        // Verificar si se encontraron resultados
        if ($result && mysqli_num_rows($result) > 0) {
            // Obtener los datos del cliente
            $cliente = mysqli_fetch_assoc($result);

            // Guardar los datos del cliente en la variable de sesión
            $_SESSION['cliente'] = $cliente;

            // Mostrar los datos en el formulario
?>
            <div class="row">
                <!-- PRIMERA COLUMNA-->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Nombres:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $cliente['Nombre_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Apellido_Cliente" value="<?php echo $cliente['Apellido_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Dni_Cliente" value="<?php echo $cliente['Dni_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Domicilio_Cliente" value="<?php echo $cliente['Domicilio_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Celular:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Celular_Cliente" value="<?php echo $cliente['Celular_Cliente']; ?>" readonly>
                                                </div>

                                                </div>
                            <!-- Resto de los campos del cliente -->

                                  <a href="tabla_disfraz.php" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Seleccionar Disfraz</a>
                        </form>
                    </div>
                </div>
                <!-- Segunda columna para el segundo cliente -->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                            <!-- Campos del primer cliente -->
                        </form>
                    </div>
                </div>
            </div>

<?php
        } else {
            echo "No se encontraron datos del cliente.";
        }
    }

    // Verificar si se proporcionó un IDd y si existe la variable de sesión para el primer cliente
    if ($clienteIdd !== null && isset($_SESSION['cliente'])) {
        // Obtener los datos del primer cliente desde la variable de sesión
        $cliente = $_SESSION['cliente'];

        // Prepara y ejecuta una consulta para obtener los datos del segundo cliente por su IDd
        $queryd = "SELECT * FROM Disfraz WHERE Id_Disfraz = $clienteIdd";
        $resultd = mysqli_query($conex, $queryd);

        // Verificar si se encontraron resultados
        if ($resultd && mysqli_num_rows($resultd) > 0) {
            // Obtener los datos del segundo cliente
            $cliented = mysqli_fetch_assoc($resultd);

            // Mostrar los datos en el formulario
            ?>
            <div class="row">
                <!-- PRIMERA COLUMNA-->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                            <!-- Campos del primer cliente -->

                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Nombres:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $cliente['Nombre_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Apellido_Cliente" value="<?php echo $cliente['Apellido_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">DNI:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Dni_Cliente" value="<?php echo $cliente['Dni_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Domicilio:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Domicilio_Cliente" value="<?php echo $cliente['Domicilio_Cliente']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sm-2">
                                                    <label class="control-label" style="position:relative; top:7px;">Celular:</label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="Celular_Cliente" value="<?php echo $cliente['Celular_Cliente']; ?>" readonly>
                                                </div>

                                         </div>

                                         <a href="tabla_disfraz.php" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Seleccionar Disfraz</a>

                        </form>
                                            </div>
                                                </div>
                                                <!-- Segunda columna para el segundo cliente -->
                                                <div class="col-sm-6">
                                                    <div class="container-fluid">
                                                   
                                                                    <form id="myForm">
                                                                        <div class="row form-group">
                                                                            <div class="col-sm-2">
                                                                                <label class="control-label" style="position:relative; top:7px;">Nombre Disfraz:</label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                            <input type="text" class="form-control" name="Nombre_Disfraz" value="<?php echo $cliented['Nombre_Disfraz']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-sm-2">
                                                                                <label class="control-label" style="position:relative; top:7px;">Stock:</label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" name="Stock_Disfraz" value="<?php echo $cliented['Stock_Disfraz']; ?>"readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-sm-2">
                                                                                <label class="control-label" style="position:relative; top:7px;">Precio Unitario:</label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" name="Precio_Disfraz" value="<?php echo $cliented['Precio_Disfraz']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-sm-2">
                                                                                <label class="control-label" style="position:relative; top:7px;">Tematica:</label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" name="Tematica_Id" value="<?php echo $cliented['Tematica_Id']; ?>" readonly>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row form-group">
                                                                            <div class="col-sm-2">
                                                                                <label class="control-label" style="position:relative; top:7px;">Cantidad:</label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" name="Cantidad">
                                                                            </div>
                                                                        </div>
                                                                        <input id="add" type="button" name="agregar" value="Agregar" class="btn btn btn-primary">
                                                                    </form>
                                                                
                    </div>
                </div>
            </div>

<?php
        } else {
            echo "No se encontraron datos del cliente.";
        }
    }
} else {
    echo "No se proporcionó un ID de cliente válido.";
}
?>



<br>
<br>














































                    <table class="table table-bordered table-striped">
                        <style>
                            .table-bordered tr,
                            .table-bordered th,
                            .table-bordered td {
                                margin-top: 60px;
                                background-color: lightsteelblue;
                                border: 3px solid black;
                            }
                        </style>
                        <thead>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Tematica ID</th>
                            <th>Cantidad</th>
                            <th>Acción</th>
                        </thead>
                        <tbody id="tableBody"></tbody>
                    </table>




		</div>	



    <script src="js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>




  <script>
    // Obtener el formulario por su ID
    var form = document.getElementById("myForm");

    // Obtener la tabla por su ID
    var tableBody = document.getElementById("tableBody");

    // Manejar el evento de clic en el botón "Agregar"
    document.getElementById("add").addEventListener("click", function() {
        // Crear una nueva fila en la tabla
        var newRow = document.createElement("tr");

        // Obtener los valores de los campos de entrada del formulario
        var nombre = form.elements["Nombre_Disfraz"].value;
        var stock = form.elements["Stock_Disfraz"].value;
        var precio = form.elements["Precio_Disfraz"].value;
        var tematica = form.elements["Tematica_Id"].value;
        var cantidad = form.elements["Cantidad"].value;

        // Agregar celdas a la fila con los valores obtenidos
        newRow.innerHTML = "<td></td><td>" + nombre + "</td><td>" + stock + "</td><td>" + precio + "</td><td>" + tematica + "</td><td>" + cantidad + "</td><td><a href='#'>Editar</a></td>";

        // Agregar la nueva fila al cuerpo de la tabla
        tableBody.appendChild(newRow);

        // Restablecer los valores de los campos de entrada del formulario
        form.reset();
    });
</script>


   

</body>
</html>















