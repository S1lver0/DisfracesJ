<?php
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
                            <!-- Resto de los campos del cliente -->
                        </form>
                    </div>
                </div>
                <!-- Segunda columna para el segundo cliente -->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Nombre Disfraz:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $cliente['Nombre_Cliente']; ?>" readonly>
                                </div>
                            </div>
                            <!-- Resto de los campos del segundo cliente -->
                        </form>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "No se encontraron datos del cliente.";
        }
    }

    // Prepara y ejecuta una consulta para obtener los datos del cliente por su ID
    if ($clienteIdd !== null) {
        $queryd = "SELECT * FROM Cliente WHERE Id_Cliente = $clienteIdd";
        $resultd = mysqli_query($conex, $queryd);

        // Verificar si se encontraron resultados
        if ($resultd && mysqli_num_rows($resultd)> 0) {
            // Obtener los datos del cliente
            $cliented = mysqli_fetch_assoc($resultd);

            // Mostrar los datos en el formulario
            ?>
            <div class="row">
                <!-- PRIMERA COLUMNA-->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                            <!-- Campos del primer cliente -->
                        </form>
                    </div>
                </div>
                <!-- Segunda columna para el segundo cliente -->
                <div class="col-sm-6">
                    <div class="container-fluid">
                        <form>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Nombre Disfraz:</label>
                                </div>
                                <div class="col-sm-8">
                                     <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $cliented['Nombre_Cliente']; ?>" readonly>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-2">
                                    <label class="control-label" style="position:relative; top:7px;">Tematica:</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="Nombre_Cliente" value="<?php echo $cliented['Nombre_Cliente']; ?>" readonly>
                                </div>
                            </div>
                            <!-- Resto de los campos del segundo cliente -->
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





if (isset($_GET['buscar_nombre'])) {
                $buscar_nombre = $_GET['buscar_nombre'];
                $sql = "SELECT d.*, t.Tema_Nombre, SUM(dt.Dtal_Cantidad) AS SumaCantidad
                        FROM disfraz d
                        INNER JOIN tematica t ON d.FK_Tematica_Disfraz = t.PK_Tematica
                        INNER JOIN disfraztalla dt ON dt.FK_Disfraz_DisfrazTalla = d.PK_Disfraz
                        WHERE d.Disf_Nombre LIKE '%$buscar_nombre%'
                        GROUP BY d.PK_Disfraz";
              } else {
                $sql = "SELECT d.*, t.Tema_Nombre, SUM(dt.Dtal_Cantidad) AS SumaCantidad
                        FROM disfraz d
                        INNER JOIN tematica t ON d.FK_Tematica_Disfraz = t.PK_Tematica
                        INNER JOIN disfraztalla dt ON dt.FK_Disfraz_DisfrazTalla = d.PK_Disfraz
                        GROUP BY d.PK_Disfraz";
              }