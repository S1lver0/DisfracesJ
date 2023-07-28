function ValidarDni() {
  var dni = document.getElementById("validar").value;
  var dniJson = { dni: dni };
  fetch("validarDni.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(dniJson),
  })
    .then((response) => response.text())
    .then((data) => {
      // Imprimir la respuesta del servidor(servidor retorna ID UNICO )
      if (data == ".true") {
        Swal.fire({
          icon: "success",
          title: "Cliente Reconocido",
          text: "Se procedera a hacer el alquiler",
        });
        //cuidado
        window.location.href = "http://localhost/Cliente/alquiler.php?"+dni;
      } else {
        if (data == ".false") {
          Swal.fire({
            icon: "error",
            title: "Cliente No reconocido",
            text: "Ingrese los datos del cliente",
          });
          var temporal = document.getElementById("name");
          temporal.removeAttribute("readonly");
          temporal = document.getElementById("ape");
          temporal.removeAttribute("readonly");
          temporal = document.getElementById("celu");
          temporal.removeAttribute("readonly");
          temporal = document.getElementById("dire");
          temporal.removeAttribute("readonly");
          temporal = document.getElementById("validar");
          temporal.setAttribute("readonly", "readonly");
          temporal = document.getElementById("buttonDni");
          temporal.setAttribute("disabled", "disabled");
        } else {
          Swal.fire({
            icon: "error",
            title: "ERROR AL HACER LA CONSULTA",
            text: "intente nuevamente",
          });
        }
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function guardarCliente() {
  let nombre = document.getElementById("name").value;
  let ape = document.getElementById("ape").value;
  let celu = document.getElementById("celu").value;
  let dire = document.getElementById("dire").value;
  let dni = document.getElementById("validar").value;

  if (nombre != "" && ape != "" && celu != "" && dire != "") {
    var cliente = {
      dni: dni,
      nombre: nombre,
      apellido: ape,
      celular: celu,
      direccion: dire,
    };
    fetch("registrarCliente.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(cliente),
    })
      .then((response) => response.text())
      .then((data) => {
        console.log(data);
        if(data==".true"){
          Swal.fire({
            icon: "success",
            title: "Se registro correctamente el cliente",
            text: "Se procedera a elegir los disfraces a alquilar",
          });
          //cuidado
          window.location.href = "http://localhost/Cliente/alquiler.php?"+cliente.dni;
          //

        }else{
          Swal.fire({
            icon: "error",
            title: "Error en el registro",
            text: "Posiblemente la base de datos este experimentando unos problemas",
          });
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });

  } else {
    Swal.fire({
      icon: "error",
      title: "Todos los campos tienen que estar llenados",
      text: "intente nuevamente",
    });
  }
}
