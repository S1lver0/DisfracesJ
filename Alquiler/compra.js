// Obtener referencia a la tabla
var carrito = [];
var nombreDisfraz = "";
var PrecioD = "S/";
var table = document.getElementById("tablita");
var tablax = document.getElementById("tablax");
var filaActual;
// Agregar evento click a los botones de borrado
var botonesComprar = table.getElementsByClassName("boton-comprar");
for (var i = 0; i < botonesComprar.length; i++) {
  botonesComprar[i].addEventListener("click", function () {
    // Obtener la fila que contiene el botón de borrado
    var fila = this.parentNode.parentNode;
    filaActual = fila.cells[1].innerHTML.trim();
    console.log(filaActual);
    PrecioD = "S/";
    PrecioD += fila.cells[2].innerHTML.trim();
    console.log(PrecioD);

    var disfraz = { disfraz: filaActual };

    fetch("Alquiler/consulta.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(disfraz),
    })
      .then((response) => response.text())
      .then((data) => {
        data = data.substring(1);
        // Imprimir la respuesta del servidor(servidor retorna ID UNICO )
        if (data == "error") {
          Swal.fire({
            icon: "error",
            title: "Cliente No reconocido",
            text: "Ingrese los datos del cliente",
          });
        } else {
          console.log(JSON.parse(data));
          data = JSON.parse(data);
          nombre = document.getElementById("nombreD");
          var precio = document.getElementById("precioD");
          precio.textContent = PrecioD;
          nombre.textContent = filaActual;
          nombreDisfraz = filaActual;
          //para S
          var elementoEncontrado = data.find(function (objeto) {
            return objeto.FK_Talla_DIsfrazTalla === "1";
          });
          let s = document.getElementById("cantidadS");
          let idS = document.getElementById("idS");
          s.textContent = elementoEncontrado.Dtal_Cantidad;
          idS.textContent = elementoEncontrado.PK_DisfrazTalla;
          //para M
          var elementoEncontrado = data.find(function (objeto) {
            return objeto.FK_Talla_DIsfrazTalla === "2";
          });
          let m = document.getElementById("cantidadM");
          let idM = document.getElementById("idM");
          m.textContent = elementoEncontrado.Dtal_Cantidad;
          idM.textContent = elementoEncontrado.PK_DisfrazTalla;
          //para L
          var elementoEncontrado = data.find(function (objeto) {
            return objeto.FK_Talla_DIsfrazTalla === "3";
          });
          let l = document.getElementById("cantidadL");
          let idL = document.getElementById("idL");
          l.textContent = elementoEncontrado.Dtal_Cantidad;
          idL.textContent = elementoEncontrado.PK_DisfrazTalla;
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
}

var botonesElegir = tablax.getElementsByClassName("ele");
for (var i = 0; i < botonesElegir.length; i++) {
  botonesElegir[i].addEventListener("click", function () {
    var fila = this.parentNode.parentNode;
    //
    let nombre = nombreDisfraz;
    let talla = fila.cells[0].textContent.trim();
    let cantidad = fila.cells[1].textContent.trim();
    let id = fila.cells[3].textContent.trim();

    var temp = {
      id:id,
      nombre: nombre,
      talla: talla,
      precio: PrecioD,
      cantidad: 0,
      cantidadTotal:cantidad
    };
    carrito.push(temp);










    console.log(carrito);
  });
}

///ultimo update
function increaseQuantity(itemIndex) {
  var quantityInput = document.getElementById(`quantity-${itemIndex}`);
  var currentQuantity = parseInt(quantityInput.value);
  quantityInput.value = currentQuantity + 1;
}

function decreaseQuantity(itemIndex) {
  var quantityInput = document.getElementById(`quantity-${itemIndex}`);
  var currentQuantity = parseInt(quantityInput.value);
  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
  }
}
