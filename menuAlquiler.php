<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
              <input type="text" class="form-control" name="buscar_nombre" placeholder="Buscar por DNI" id="buscador" />
              <span class="input-group-btn">
                <button class="btn btn-primary" onclick="filtrarTabla()">
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

            <select id="filtroSelect" class="form-control form-control-lg mb-3 custom-select"
              aria-label="Default select example">
              <option value="todos">Todos</option>
              <option value="Activo">Activo</option>
              <option value="Vencido">Vencido</option>
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
                  <th scope="col">DNI</th>
                  <th scope="col">Fecha_Ini</th>
                  <th scope="col">Fecha_Dev</th>
                  <th scope="col">Monto Total</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody id="tablitaAlquiler">
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
  <!-- El modal -->
  <!-- El modal -->
  <div id="myModal" class="modal">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modal-header">
        <h4 class="modal-title">Detalles de la ficha</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Parte izquierda -->
          <div class="col-md-6">
            <div class="section-title">Datos personales:</div>
            <p><strong>Nombre:</strong> <span id="nombre"></span></p>
            <p><strong>Apellido:</strong> <span id="apellido"></span></p>
            <p><strong>DNI:</strong> <span id="dni"></span></p>
            <p><strong>Teléfono:</strong> <span id="telefono"></span></p>
            <p><strong>Dirección:</strong> <span id="direccion"></span></p>
          </div>

          <!-- Separación entre las partes izquierda y derecha -->
          <div class="col-md-1"></div>

          <!-- Parte derecha -->
          <div class="col-md-5">
            <div class="section-title">Información de entrega:</div>
            <p><strong>Fecha de entrega:</strong> <span id="fechaEntrega"></span></p>
            <p><strong>Fecha de devolución:</strong> <span id="fechaDevolucion"></span></p>
            <p><strong>Estado:</strong> <span id="estado"></span></p>
          </div>
        </div>

        <!-- Tabla con colores personalizados -->
        <table class="tables table-bordered table-striped mt-4" style="background-color: #e75480;">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Cantidad</th>
              <th>Precio Unitario</th>
              <th>Talla</th>
              <th>Precio Total</th>
            </tr>
          </thead>
          <tbody id="tablaDetalle">
            <!-- Aquí se llenará dinámicamente con datos -->
          </tbody>
        </table>
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

  /* Estilos del modal */
  /* Estilos generales del modal */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
  }

  /* Contenido del modal */
  .modal-content {
    display: flex;
    flex-direction: column;
    max-width: 800px;
    margin: 10% auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-size: 16px;
  }

  /* Botón para cerrar el modal */
  .close {
    color: #aaa;
    font-size: 24px;
    font-weight: bold;
    align-self: flex-end;
    cursor: pointer;
  }

  /* Estilos para el título del modal */
  .modal-title {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
  }

  /* Estilos para la sección izquierda del contenido */
  .col-md-6 {
    margin-bottom: 20px;
  }

  /* Estilos para la sección derecha del contenido */
  .col-md-5 {
    margin-bottom: 20px;
  }

  /* Estilos para el título de cada sección */
  .section-title {
    font-size: 20px;
    font-weight: bold;
  }

  /* Estilos para la tabla */
  .tables {
    border-collapse: collapse;
    width: 100%;
  }

  .tables th,
  .tables td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  .tables th {
    background-color: #e75480;
    color: #fff;
  }

  /* Estilo para filas impares de la tabla */
  .tables tr:nth-child(odd) {
    background-color: #f2e1ec;
  }
  .modal-header{
    display: flex;
    justify-content: center;
  }
</style>

<script src="reporteAlquiler/mostrarTabla.js"></script>

</html>