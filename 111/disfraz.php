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
        <li><a href="disfraz.php">DISFRAZ</a></li>
        <li><a href="inde.php">CLIENTES</a></li>
        <li><a href="./">CONTACTO</a></li>
      </ul>
    </div>
  </div>
</nav>





<div class="table-container">
	<h1 class="page-header text-center"> Lista de Disfraces</h1>
	<div class="row table table-dark ">
        <style>
          .table-container {
            border: 2px solid white;
            background-color: gainsboro;
            border-radius: 40px;
            padding: 5px;
            
          }
        </style>
		<div class="col-sm-8 col-sm-offset-2">
			<a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span> Registro Nuevo Cliente</a>
			
			<p></p>
			


    <!-- Formulario de búsqueda -->
    <div class="row">
	  <div class="col-md-6">
      <form method="GET" action="">
        <div class="input-group mb-2 justify-content-start">
          <input type="text" class="form-control" name="buscar_nombre" placeholder="Buscar por nombre">
          <span class="input-group-btn">
            <button class="btn btn-primary" type="submit">Buscar</button>
          </span>
        </div>
      </form>
	</div>
</div>
    <!-- Mostrar la tabla de registros -->

			
			<p></p>



<?php 
	session_start();
	if(isset($_SESSION['message'])){
		?>
		<div class="alert alert-info text-center" style="margin-top:20px;">
			<?php echo $_SESSION['message']; ?>
		</div>
		<?php

		unset($_SESSION['message']);
	}
?>


	<table class="table table-bordered table-striped  "  >
	<style>
		.table-bordered tr,
		.table-bordered th,
		.table-bordered td {
		margin-top:60px;
		background-color: lightsteelblue; 
		border: 3px solid black;

		}
  </style>
	<thead>
		<th>ID</th>
		<th>Nombres</th>
		<th>Tematica</th>
		<th>Precio</th>
		<th>Talla</th>
		<th>Celular</th>
		<th>Acción</th>
	</thead>
	<tbody>
	<?php
                    include_once('conec.php');

                    // Comprobar si se ha enviado una búsqueda
                    if(isset($_GET['buscar_nombre'])){
                        $buscar_nombre = $_GET['buscar_nombre'];
                        $sql = "SELECT * FROM Cliente WHERE Nombre_Cliente LIKE '%$buscar_nombre%'";
                    } else {
                        $sql = "SELECT * FROM Cliente";
                    }

                    $result = $conex->query($sql);

                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                ?>
             <tr>
                                <td><?php echo $row['Id_Cliente']; ?></td>
                                <td><?php echo $row['Nombre_Cliente']; ?></td>
                                <td><?php echo $row['Apellido_Cliente']; ?></td>
                                <td><?php echo $row['Dni_Cliente']; ?></td>
                                <td><?php echo $row['Domicilio_Cliente']; ?></td>
                                <td><?php echo $row['Celular_Cliente']; ?></td>
                                <td>
            
      <a href="#delete_<?php echo $row['Id_Cliente']; ?>" class="btn btn-danger btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span> </a>
			<a href="#edit_<?php echo $row['Id_Cliente']; ?>" class="btn btn-success btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> </a>
			<a href="#detalles_<?php echo $row['Id_Cliente']; ?>" class="btn btn-primary btn-sm" data-toggle="modal"><span class="glyphicon glyphicon-eye-open"></span></a>
      <a href="AgregarFicha.php?idd=<?php echo $row['Id_Cliente']; ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-usd"></span></a>
            </td>
                   <?php include('BorrarEditarModal.php'); ?>
                   
                   
            </tr>

						<?php
				}
							} else {
								echo '<tr><td colspan="8">No se encontraron resultados.</td></tr>';
							}
							// Cerrar la conexión
							$conex->close();
						?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php include('AgregarModal.php'); ?>


<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>




