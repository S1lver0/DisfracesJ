var prueba = "hola";
fetch("reporteAlquiler/obtenerLista.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json",
  },
  body: JSON.stringify(prueba),
})
  .then((response) => response.text())
  .then((data) => {
    if (data == ".error") {
      Swal.fire({
        icon: "error",
        title: "Error en la consulta",
        text: "Recargue la pagina",
      });
    } else {
      //mostrar json de consulta
      data = data.substring(1);
      console.log(JSON.parse(data));
      data = JSON.parse(data);
      //generar la tabla
      var tablita = document.getElementById("tablitaAlquiler");
      //recorriendo el JSON para generar la tabla insertando codigo html en cada iteracion
      for (const clave in data) {
        if (data.hasOwnProperty(clave)) {
          var fechaActual = new Date();
          var año = fechaActual.getFullYear();
          var mes = String(fechaActual.getMonth() + 1).padStart(2, "0"); // Agregamos un cero al mes si es menor a 10
          var dia = String(fechaActual.getDate()).padStart(2, "0"); // Agregamos
          var fechaFormateada = `${año}-${mes}-${dia}`;
          //definir estado
          var estado = "";
          var fechadevo = new Date(data[clave].Fich_FechaDevolucion);
          var fechaActual = new Date(fechaFormateada);
          if (fechadevo > fechaActual) {
            estado = "Activo";
          } else {
            estado = "Vencido";
          }

          if (data[clave].FK_Estado_Ficha == "1") {
            tablita.innerHTML += `
            <tr>
                <td>${data[clave].FK_Cliente_Ficha}</td>
                <td>${data[clave].Fich_FechaEntrega}</td>
                <td>${data[clave].Fich_FechaDevolucion}</td>
                <td>${data[clave].Fich_PrecioTotal}</td>
                <td><a class="${
                  estado == "Activo"
                    ? "btn btn-success btn-sm glyphicon glyphicon-ok-circle"
                    : "btn btn-danger btn-sm glyphicon glyphicon-remove-circle"
                }">${estado == "Activo" ? "Activo" : "Vencido"}</a></td>
                <td>
                <a class="detalles btn btn-primary btn-sm boton-comprar glyphicon glyphicon-eye-open"></a>
                <a class="eliminar btn btn-danger btn-sm boton-comprar glyphicon glyphicon-trash"></a></td>
                <td style="display:none">${data[clave].PK_Ficha}</td>
            </tr>
            `;
          }
        }
      }

      //////////////// eventos para ver detalles
      const enlacesDetalles = document.querySelectorAll(".detalles");
      console.log(enlacesDetalles);
      // Agrega un evento clic a cada enlace
      enlacesDetalles.forEach((enlace) => {
        enlace.addEventListener("click", mostrarDetalles);
      });
      //evento de añadir dias
      const enlacesDias = document.querySelectorAll(".eliminar");
      // Agrega un evento clic a cada enlace
      enlacesDias.forEach((enlace) => {
        enlace.addEventListener("click", eliminar);
      });
    }
  })
  .catch((error) => {
    console.error("Error:", error);
  });

// Obtener la referencia al input de filtro y a la tabla
function filtrarTabla() {
  const miTabla = document.getElementById("tablitaAlquiler");
  const valorBuscar = document.getElementById("buscador").value.toLowerCase();
  const filas = miTabla.getElementsByTagName("tr");
  console.log(valorBuscar);
  if (valorBuscar == "") {
    for (let i = 0; i < filas.length; i++) {
      const filar = filas[i];
      filar.style.display = "";
    }
  } else {
    // Recorrer todas las filas de la tabla (excepto la primera que es el encabezado)
    for (let i = 0; i < filas.length; i++) {
      const fila = filas[i];
      const celdas = fila.getElementsByTagName("td");
      let mostrarFila = false;

      // Recorrer todas las celdas de la fila y verificar si alguna contiene el texto del filtro
      const celda = celdas[0];
      if (celda) {
        const contenidoCelda = celda.textContent || celda.innerText;
        console.log(contenidoCelda);
        if (contenidoCelda.toLowerCase() == valorBuscar) {
          mostrarFila = true;
        }
      }

      // Mostrar u ocultar la fila según el resultado del filtro
      if (mostrarFila) {
        fila.style.display = "";
      } else {
        fila.style.display = "none";
      }
      console.log(mostrarFila);
    }
  }
}

function filtrarTablaEstado() {
  const miTabla = document.getElementById("tablitaAlquiler");
  const filtroSelect = document.getElementById("filtroSelect");
  const valorSeleccionado = filtroSelect.value;
  const filas = miTabla.getElementsByTagName("tr");

  // Recorrer todas las filas de la tabla (excepto la primera que es el encabezado)
  for (let i = 0; i < filas.length; i++) {
    const fila = filas[i];
    const celdas = fila.getElementsByTagName("td");
    let mostrarFila = true;

    // Obtener el valor de la celda que contiene el estado
    const celda = celdas[4];
    const enlace = celda.querySelector("a");
    console.log(enlace.textContent);
    if (enlace) {
      const valorCelda = enlace.textContent || celda.innerText;
      if (valorSeleccionado !== "todos" && valorCelda !== valorSeleccionado) {
        mostrarFila = false;
      }
    }

    if (mostrarFila) {
      fila.style.display = "";
    } else {
      fila.style.display = "none";
    }
  }
}

// Agregar un evento 'change' al select para detectar cambios en la selección
const filtroSelect = document.getElementById("filtroSelect");
filtroSelect.addEventListener("change", filtrarTablaEstado);

function mostrarDetalles(event) {
  event.preventDefault(); // Evita que el enlace se comporte como un hipervínculo

  // Obtiene la fila (tr) padre del enlace clicado
  const fila = event.target.closest("tr");

  // Obtén los datos relevantes que deseas mostrar (por ejemplo, el ID y el Nombre)
  const id = fila.querySelector("td:nth-child(7)").textContent;
  const fechaIni = fila.querySelector("td:nth-child(2)").textContent;
  const fechaDev = fila.querySelector("td:nth-child(3)").textContent;
  const estate = fila.querySelector("td:nth-child(5)").textContent;
  const cliente = fila.querySelector("td:nth-child(1)").textContent;
  const precioTotal = fila.querySelector("td:nth-child(4)").textContent;
  var idFicha = { ficha: id, cliente: cliente };
  console.log(idFicha);

  fetch("reporteAlquiler/FichaDisfraces.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(idFicha),
  })
    .then((response) => response.text())
    .then((data) => {
      data = data.substring(1);
      // Imprimir la respuesta del servidor(servidor retorna ID UNICO )
      if (data == "error") {
        Swal.fire({
          icon: "error",
          title: "hubo un error en la consulta",
          text: "intente nuevamente",
        });
      } else {
        data = JSON.parse(data);
        // Rellenar los datos en el modal
        document.getElementById("nombre").textContent =
          data.cliente.Clie_Nombre;
        document.getElementById("apellido").textContent =
          data.cliente.Clie_Apellido;
        document.getElementById("dni").textContent = data.cliente.PK_Cliente;
        document.getElementById("telefono").textContent =
          data.cliente.Clie_Celular;
        document.getElementById("direccion").textContent =
          data.cliente.Clie_Domicilio;
        document.getElementById("fechaEntrega").textContent = fechaIni;
        document.getElementById("fechaDevolucion").textContent = fechaDev;
        document.getElementById("estado").textContent = estate;
        document.getElementById("precioTotal").textContent = precioTotal;

        // Generar la tabla dinámicamente (puedes ajustar los datos según tus necesidades)
        const tablaDetalle = document.getElementById("tablaDetalle");
        tablaDetalle.innerHTML = "";

        const datosTabla = data.disfraces;

        datosTabla.forEach((producto) => {
          tablaDetalle.innerHTML += `
    <tr>
      <td>${producto.Disf_Nombre}</td>
      <td>${producto.Fdet_CantidadCompra}</td>
      <td>${producto.Disf_Precio}</td>
      <td>${
        producto.FK_Talla_DIsfrazTalla == "1"
          ? "S"
          : producto.FK_Talla_DIsfrazTalla == "2"
          ? "M"
          : producto.FK_Talla_DIsfrazTalla == "3"
          ? "L"
          : " "
      }</td>
    </tr>
  `;
        });
        document.getElementById("myModal").style.display = "block";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

//EVENTOS PARA EL MODAL
document.getElementsByClassName("close")[0].addEventListener("click", () => {
  document.getElementById("myModal").style.display = "none";
});

//EVENTOS PARA EL MODAL
document.getElementsByClassName("closee")[0].addEventListener("click", () => {
  document.getElementById("myModale").style.display = "none";
});

//variable global
var CantidadUnitaria = 0;

function eliminar(event) {
  const fila = event.target.closest("tr");
  const id = fila.querySelector("td:nth-child(7)").textContent;
  var idFicha = { ficha: id };
  fetch("reporteAlquiler/updatearFicha.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(idFicha),
  })
    .then((response) => response.text())
    .then((data) => {
      console.log(data);
      alert("Se borro correctamente");
      location.reload();
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
