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
        <a href="Alquiler/registro_alquiler.php" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Registrar
          Nuevo
          Alquiler</a>
        <p></p>

        <!-- Formulario de búsqueda -->

        <div class="row">
          <div class="col-md-4">
            <!-- Primera Columna -->

            <form method="GET" action="">
              <div class="input-group mb-2 justify-content-start">
                <input type="text" class="form-control" name="buscar_nombre" placeholder="Buscar por nombre" />
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">
                    Buscar
                  </button>
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

            <select id="tematicaSelect" class="form-control form-control-lg mb-3 custom-select"
              aria-label="Default select example">
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

            <select id="estado-select" class="form-control form-control-lg mb-3 custom-select"
              aria-label="Default select example">
              <option selected>Seleccionar Estado</option>
              <option value="1">Activo</option>
              <option value="2">Agotado</option>
            </select>

            <!--Tercera  FIN -->
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

</html>