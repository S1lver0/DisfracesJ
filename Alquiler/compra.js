// Obtener referencia a la tabla
var table = document.getElementById("tablita");
var filaActual;
// Agregar evento click a los botones de borrado
var botonesComprar = table.getElementsByClassName("boton-comprar");
for (var i = 0; i < botonesComprar.length; i++) {
  botonesComprar[i].addEventListener("click", function() {
    // Obtener la fila que contiene el botón de borrado
    var fila = this.parentNode.parentNode;
    filaActual = fila.cells[1].innerHTML.trim();
    console.log(filaActual);
  });
}














