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
                }">${estado == "Activo"? "Activo": "Vencido"}</a></td>
                <td><a class="btn btn-success btn-sm boton-comprar glyphicon glyphicon-plus"></a>
                <a class="btn btn-primary btn-sm boton-comprar glyphicon glyphicon-eye-open"></a>
                <a class="btn btn-danger btn-sm boton-comprar glyphicon glyphicon-trash"></a></td>
                <td style="display:none">${data[clave].PK_Ficha}</td>
            </tr>
            `;
          }
        }
      }
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
  



