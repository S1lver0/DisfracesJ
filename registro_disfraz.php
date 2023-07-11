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



                       <h1 class="page-header text-center " style="font-weight: bold; color: purple;">Registrar Nuevo Disfraz</h1>
                       
          <form  action="guardar_disfraz.php" method="POST">
              <div class="form-group">
              <label for="nombreDisfraz">Nombre del Disfraz:</label>
              <input type="text" class="form-control" name="Nombre_Disfraz"  placeholder="Ingrese el nombre del disfraz" required>
              <small class="form-text text-muted">Ingrese solo letras (sin espacios ni caracteres especiales)</small>
            </div>
            <div class="form-group">
            <label for="tematicaDisfraz">Temática:</label>
            <select class="form-control" name="Tematica_Disfraz">
            
            <option selected>Seleccionar Tematica</option>
                  <option value="1">Animales</option>
                  <option value="2">SuperHeroes</option>
                  <option value="3">Disney</option>
                  <option value="4">Profesiones y Oficios</option>
                  <option value="5">Culturas</option>
              <!-- Agrega más opciones de temáticas según tus necesidades -->
            </select>
            <small class="form-text text-muted">Seleccione una Tematica (ejemplo:Supeheroes)</small>
          </div>
                <div class="form-group">
                  <label for="precioDisfraz">Precio:</label>
                  <input type="text" class="form-control" name="Precio_Disfraz" pattern="[0-9]+([.,][0-9]+)?" placeholder="Ingrese el precio del disfraz" required>
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
                    <input type="number" class="form-control" name="CS" value="0">
                  </td>
                </tr>
                <tr>
                  <td>M</td>
                  <td>
                    <input type="number" class="form-control" name="CM" value="0">
                  </td>
                </tr>
                <tr>
                  <td>L</td>
                  <td>
                    <input type="number" class="form-control" name="CL" value="0">
                  </td>
                </tr>
              </tbody>
            </table>

            <div class="text-center">
              <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-chevron-left"></span> Cancelar</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>


  