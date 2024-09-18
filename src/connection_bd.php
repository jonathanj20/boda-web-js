<?php
$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_PORT = $_ENV['DB_PORT'];

$connection = mysqli_connect("$DB_HOST", "$DB_USER", "$DB_PASSWORD", "$DB_NAME", "$DB_PORT");

// Verificar si la conexión fue exitosa
// if ($connection) {
//     echo "Base de datos conectada";
// } else {
//     die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
// }
