<?php
// Declaramos las variables de conexión
$ServerName = "srv1006.hstgr.io";
$Username = "u472469844_grupo2";
$Password = "8BM#rs11";
$NameBD = "u472469844_grupo2";

// Creamos la conexión con MySQL
$conex = new mysqli($ServerName, $Username, $Password, $NameBD);

// Revisamos la Conexión MySQL
if ($conex->connect_error) {
    die("Ha fallado la conexión: " . $conex->connect_error);
}
// Enviamos un mensaje de conexión correcta
echo ".";
?>