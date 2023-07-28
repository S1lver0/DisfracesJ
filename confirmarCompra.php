<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>
</head>



<body>

    <?php
    include("nav.php");
    ?>
    <div class="centrar">

        <div class="input-group flex-wrap">
            <span class="input-group-text" id="addon-wrapping">Cantidad de Dias:</span>
            <input id="dias" type="text" class="form-control" placeholder="Dias" aria-label="Username"
                aria-describedby="addon-wrapping">
        </div>


        <table class="table table-centered">

            <thead>
                <tr>
                    <td scope="col">NÂ°</td>
                    <td scope="col">Nombre</td>
                    <td scope="col">Talla</td>
                    <td scope="col">Cantidad</td>
                    <td scope="col">Precio c/u</td>
                    <td scope="col">Precio Total</td>
                </tr>
            </thead>
            <tbody id="products-info">

            </tbody>
            <tbody id="products-precio">
            </tbody>
        </table>
        <span id="Precio" class="d-block p-2 text-bg-dark">
            <h3 class="visually-hidden">Total: </h3>
        </span>
        <div>
            <button id="guardar" type="button" class="btn btn-primary">Calcular Precio</button>
            <button style="margin-left : 30px" type="button" class="btn btn-success" onclick="enviar()">Confirmar
                Compra</button>
        </div>

    </div>

</body>
<script>
    let tabla = document.getElementById("products-info");
    let precio = document.getElementById("products-precio");
    var queryString = window.location.search;
    var params = new URLSearchParams(queryString);
    var jsonArrayEncoded = params.get('data');
    var parametro = params.get('parametro');

    // Decodificar el array
    var jsonArray = JSON.parse(atob(jsonArrayEncoded));

    console.log(jsonArray); // El array de objetos JSON
    console.log(parametro); // "valorParametro"

    let products = jsonArray;





    let acumulador = 0
    for (let i = 0; i < products.length; i++) {
        var pres = products[i].precio.substring(2);
        pres = parseFloat(pres);

        var html = '<tr>';
        html += '<td>' + (i + 1) + '</td>';
        html += '<td>' + products[i].nombre + '</td>';
        html += '<td>' + products[i].talla + '</td>';
        html += '<td>' + products[i].cantidad + '</td>';
        html += '<td>' + pres + '</td>';
        html += '<td>' + products[i].cantidad * pres + '</td>';
        html += '</tr>';
        acumulador += products[i].cantidad * pres;
        tabla.innerHTML += html;
        console.log("hola")
    }

    var precio_final = '<tr>';
    precio_final += '<td style="text-align: right;" colspan="5">Precio Total</td>';
    precio_final += '<td>' + acumulador + '</td>';
    precio_final += '</tr>';
    precio.innerHTML += precio_final;


    const guardar = document.getElementById("guardar")
    const dias = document.getElementById("dias")
    let precio_variable = document.getElementById("Precio")
    guardar.addEventListener("click", () => {
        precio_variable.innerHTML = ""
        if (acumulador == 0 || dias.value == "") {
            let precio_dias = '<h3 class="visually-hidden">Total:' + acumulador + '</h3>';
            precio_variable.innerHTML += precio_dias
        } else {
            let precio_dias = '<h3 class="visually-hidden">Total:' + acumulador * dias.value + '</h3>';
            precio_variable.innerHTML += precio_dias
        }

    })


    function enviar() {
        var dates = document.getElementById("dias").value
        console.log(dates);
        if (dates > 0 && dates != "") {
            var tot = acumulador * dates;
            // Datos que se enviarán en el cuerpo de la solicitud
            const data = {
                json: jsonArray,
                id: parametro,
                dias: dates,
                precio: tot
            };

            // URL del archivo PHP al que quieres enviar los datos
            const url = "Alquiler/updateTable.php";

            // Configuración del objeto fetch
            const options = {
                method: "POST", // Método POST para enviar datos en el cuerpo de la solicitud
                headers: {
                    "Content-Type": "application/json" // Tipo de contenido del cuerpo de la solicitud
                },
                body: JSON.stringify(data) // Convertir el objeto en formato JSON para enviarlo en el cuerpo
            };

            // Realizar la solicitud mediante fetch
            fetch(url, options)
                .then(response => response.text()) // Parsear la respuesta JSON
                .then(data => {
                    // Hacer algo con la respuesta del servidor
                    console.log(data);
                    Swal.fire({
                        icon: "success",
                        title: "Alquiler Generado",
                        text: "Alquiler Generado",
                    });
                    //cuidado
                    setTimeout(function(){
                        window.location.href = "http://localhost/Cliente/menuAlquiler.php";
                    },3500);

                })
                .catch(error => {
                    console.error("Error en la solicitud:", error);
                });

        } else {
            Swal.fire({
                icon: "error",
                title: "Ingrese cantidad valida de dias",
                text: "",
            });

        }

    }








</script>

<style>
    .centrar {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 4%;
    }

    .input-group {
        padding: 10px;
    }

    .table-centered {
        background-color: rgb(235, 194, 253);
        border: 4px solid rgb(60, 60, 60);
        padding: 1px;
    }

    td,
    tbody {
        border: 2px solid rgb(255, 255, 255);
        /* Establece el color del borde */
        color: black;
    }

    tr {
        border: 4px solid rgb(0, 6, 0);
        /* Establece el color del borde */
    }
</style>

</html>