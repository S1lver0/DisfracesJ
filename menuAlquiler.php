<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <title>Document</title>
</head>

<body>

  <?php
  include("nav.php");
  ?>
  <div class="table-container">
    <h1 class="page-header text-center">Lista de Alquiler</h1>

    <div class="row table table-dark">
      <style>
        .table-container {
          border: 2px solid white;
          background-color: gainsboro;
          border-radius: 30px;
          padding: 90px;
        }
      </style>

      <div class="col-sm-10 col-sm-offset">
        <a href="Alquiler/registro_alquiler.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>
          Registrar
          Nuevo
          Alquiler</a>
        <p></p>

        <!-- Formulario de búsqueda -->

        <div class="row">
          <div class="col-md-4">
            <!-- Primera Columna -->
            <div class="input-group mb-2 justify-content-start">
              <input type="text" class="form-control" name="buscar_nombre" placeholder="Buscar por DNI" />
              <span class="input-group-btn">
                <button class="btn btn-primary">
                  Buscar
                </button>
              </span>
            </div>
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

            <select id="tematicaSelect" class="form-control form-control-lg mb-3 custom-select"
              aria-label="Default select example">
              <option selected>Seleccionar Estado</option>
              <option value="1">Activo</option>
              <option value="2">No Activo</option>
            </select>

            <!-- Segunda FIN -->
          </div>
          <br>
          <br>
          <br>
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-hover" style="background-color: thistle; margin-left:25px">
              <thead>
                <tr>
                  <th style="display:none" scope="col" id="idFicha">Id</th>
                  <th scope="col">N°</th>
                  <th scope="col">DNI</th>
                  <th scope="col">Fecha_Ini</th>
                  <th scope="col">Fecha_Dev</th>
                  <th scope="col">Monto Total</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                
              </tbody>
            </table>
          </div>
          <br />
          <br />
          <br />
          <br />
        </div>
      </div>
    </div>
  </div>
</body>

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

  .my-custom-scrollbar {
    position: relative;
    height: 300px;
    overflow-x: hidden;
  }

  .table-wrapper-scroll-y {
    display: block;
  }
</style>

<script src="reporteAlquiler/mostrarTabla.js"></script>

</html>