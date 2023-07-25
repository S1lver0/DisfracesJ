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
          let botonS = document.getElementById("botonS");
          s.textContent = elementoEncontrado.Dtal_Cantidad;
          idS.textContent = elementoEncontrado.PK_DisfrazTalla;
          botonS.removeAttribute("style");

          //para M
          var elementoEncontrado = data.find(function (objeto) {
            return objeto.FK_Talla_DIsfrazTalla === "2";
          });
          let m = document.getElementById("cantidadM");
          let idM = document.getElementById("idM");
          let botonM = document.getElementById("botonM");
          m.textContent = elementoEncontrado.Dtal_Cantidad;
          idM.textContent = elementoEncontrado.PK_DisfrazTalla;
          botonM.removeAttribute("style");
          //para L
          var elementoEncontrado = data.find(function (objeto) {
            return objeto.FK_Talla_DIsfrazTalla === "3";
          });
          let l = document.getElementById("cantidadL");
          let idL = document.getElementById("idL");
          let botonL = document.getElementById("botonL");
          l.textContent = elementoEncontrado.Dtal_Cantidad;
          idL.textContent = elementoEncontrado.PK_DisfrazTalla;
          botonL.removeAttribute("style");
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
      id: id,
      nombre: nombre,
      talla: talla,
      precio: PrecioD,
      cantidad: 0,
      cantidadTotal: cantidad,
    };

    if (carrito.length != 0) {
      let returnFind = carrito.find(function (objeto) {
        return objeto.nombre === temp.nombre && objeto.talla === temp.talla;
      });
      if (returnFind != undefined) {
        if (returnFind.cantidad + 1 <= returnFind.cantidadTotal) {
          returnFind.cantidad++;
        } else {
          Swal.fire({
            icon: "error",
            title: "Limite de unidades",
            text: "Limite de unidades alcanzado",
          });
        }
      } else {
        carrito.push(temp);
      }
    } else {
      carrito.push(temp);
    }

    var i = 0;
    var carritoCompras = document.getElementById("compras");
    carritoCompras.innerHTML = "";
    carrito.forEach(function (objeto) {
      carritoCompras.innerHTML += ` 
      <div id="contenedor-${i}">
        <li>Nombre : ${objeto.nombre} </li>
        <li>Precio: ${objeto.precio} </li>
        <li>Talla: ${objeto.talla} </li>
        <li>Cantidad :</li>
        <li>
          <div class="quantity">
            <button onclick="decreaseQuantity(${i})" class="btn btn-primary">-</button>
            <input type="text" id="quantity-${i}" value="${objeto.cantidad}" class="form-control">
            <button onclick="increaseQuantity(${i})" class="btn btn-primary">+</button>
          </div>
        </li>
        <br>
        <button onclick="deleteItem(${i})" class="btn btn-danger">Eliminar</button>
        <li>----------------------------</li>
      </div>`;
      i++;
    });

    console.log(carrito);
  });
}

///ultimo update
function increaseQuantity(itemIndex) {
  var quantityInput = document.getElementById(`quantity-${itemIndex}`);
  var currentQuantity = parseInt(quantityInput.value);
  var contenedor = document.getElementById(`contenedor-${itemIndex}`);
  var nombreLi = contenedor.querySelector("li:nth-child(1)").innerText;
  var tallaLi = contenedor.querySelector("li:nth-child(3)").innerText;
  var nombre = nombreLi.split(":")[1].trim();
  var talla = tallaLi.split(":")[1].trim();
  //console.log(nombre);
  //console.log(talla);
  let returnFind = carrito.find(function (objeto) {
    return objeto.nombre === nombre && objeto.talla === talla;
  });
  if (returnFind != undefined) {
    console.log(returnFind.cantidadTotal);
    console.log(parseInt(quantityInput.value) + 1);
    if (parseInt(quantityInput.value) + 1 <= returnFind.cantidadTotal) {
      returnFind.cantidad++;
      quantityInput.value = currentQuantity + 1;
    } else {
      Swal.fire({
        icon: "error",
        title: "Limite de unidades",
        text: "Limite de unidades alcanzado",
      });
    }
  }
}

function decreaseQuantity(itemIndex) {
  var quantityInput = document.getElementById(`quantity-${itemIndex}`);
  var currentQuantity = parseInt(quantityInput.value);
  var contenedor = document.getElementById(`contenedor-${itemIndex}`);
  var nombreLi = contenedor.querySelector("li:nth-child(1)").innerText;
  var tallaLi = contenedor.querySelector("li:nth-child(3)").innerText;
  var nombre = nombreLi.split(":")[1].trim();
  var talla = tallaLi.split(":")[1].trim();
  let returnFind = carrito.find(function (objeto) {
    return objeto.nombre === nombre && objeto.talla === talla;
  });
  if (currentQuantity > 1) {
    quantityInput.value = currentQuantity - 1;
    returnFind.cantidad--;
  }
}

function deleteItem(itemIndex) {
  var contenedor = document.getElementById(`contenedor-${itemIndex}`);
  var nombreLi = contenedor.querySelector("li:nth-child(1)").innerText;
  var tallaLi = contenedor.querySelector("li:nth-child(3)").innerText;
  var nombre = nombreLi.split(":")[1].trim();
  var talla = tallaLi.split(":")[1].trim();
  // Obtener el índice del objeto encontrado utilizando findIndex
  var index = carrito.findIndex(function (objeto) {
    return objeto.nombre === nombre && objeto.talla === talla;
  });
  // Eliminar el objeto del array utilizando splice
  carrito.splice(index, 1);
  console.log(carrito);
  //imprimir
  var i = 0;
  var carritoCompras = document.getElementById("compras");
  carritoCompras.innerHTML = "";
  carrito.forEach(function (objeto) {
    carritoCompras.innerHTML += ` 
    <div id="contenedor-${i}">
      <li>Nombre : ${objeto.nombre} </li>
      <li>Precio: ${objeto.precio} </li>
      <li>Talla: ${objeto.talla} </li>
      <li>Cantidad :</li>
      <li>
        <div class="quantity">
          <button onclick="decreaseQuantity(${i})" class="btn btn-primary">-</button>
          <input type="text" id="quantity-${i}" value="${objeto.cantidad}" class="form-control">
          <button onclick="increaseQuantity(${i})" class="btn btn-primary">+</button>
        </div>
      </li>
      <br>
      <button onclick="deleteItem(${i})" class="btn btn-danger">Eliminar</button>
      <li>----------------------------</li>
    </div>`;
    i++;
  });
}

function vaciarCarro() {
  let borrarTodo = document.getElementById("compras");
  borrarTodo.innerHTML = "";
  carrito = [];
}

function enviarJson() {
  //cuidado
  if (carrito.length != 0) {
    var url = window.location.href;
    // Extraer los números utilizando una expresión regular
    var numerosEncontrados = url.match(/\d+/g);
    // Si solo deseas el primer número encontrado:
    var primerNumero = numerosEncontrados[0];
    console.log(primerNumero);
    var parametro = primerNumero;
    // Codificar el array en Base64
    var jsonArrayEncoded = btoa(JSON.stringify(carrito));
    // Construir la URL con el array codificado y el parámetro
    var url =
      "http://localhost/Cliente/confirmarCompra.php?data=" +
      jsonArrayEncoded +
      "&parametro=" +
      encodeURIComponent(parametro);
    window.location.href = url;
  } else {
    Swal.fire({
      icon: "error",
      title: "No hay disfraces en el carrito",
      text: "Tiene que agregar por lo menos un disfraz en el carrito para poder confirmar",
    });
  }
}
