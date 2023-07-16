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
        margin: 50px;
        padding: 40px;
    }
</style>

<div class="container">
    <div class="row justify-content-center  ">
        <div class="col-md-12">
            <div class="custom-container ">

                <style>
                    .smaller-image {
                        max-width: 80px;
                        /* Adjust the size as desired */
                        margin: 0 auto;
                        /* Center the image horizontally */
                    }
                </style>
                <div class="text-center">

                    <img src="../13.JPG" alt="Description of the image" class="img-fluid smaller-image">

                </div>



                <h1 class="page-header text-center " style="font-weight: bold; color: purple;">Registrar Nuevo Alquiler
                </h1>
                <label for="nombreCliente">DNI : </label>
                <input class="form-control" id="validar" type="text" placeholder="Ingrese el Dni del cliente">
                <br>
                <div class="text-center">
                    <button class="btn btn-primary">Verificar DNI</button>
                </div>


                <form action="guardar_cliente.php" method="POST">
                    <div class="form-group">
                        <label for="nombreCliente">Nombre:</label>
                        <input type="text" class="form-control" name="Nombre_Cliente"
                            placeholder="Ingrese el nombre del Cliente" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="apellidoCliente">Apellido:</label>
                        <input type="text" class="form-control" name="Apellido_Cliente"
                            placeholder="Ingrese el apellido del Cliente" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="telefonoCliente">Telefono:</label>
                        <input type="text" class="form-control" name="Telefono_Cliente"
                            placeholder="Ingrese el telefono del Cliente" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccionCliente">Direccion:</label>
                        <input type="text" class="form-control" name="Direccion_Cliente"
                            placeholder="Ingrese la direccion del Cliente" required readonly>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="Dni_Cliente" required readonly >
                    </div>

                    <div class="text-center">
                        <a href="../alquiler.php" class="btn btn-danger"><span
                                class="glyphicon glyphicon-chevron-left"></span> Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>