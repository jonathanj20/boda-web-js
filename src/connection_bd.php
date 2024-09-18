<?php
$DB_HOST = $_ENV['DB_HOST'];
$DB_USER = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_PASSWORD'];
$DB_NAME = $_ENV['DB_NAME'];
$DB_PORT = $_ENV['DB_PORT'];
$connection = mysqli_connect("$DB_HOST", "$DB_HOST", "$PASSWORD", "$DB_NAME", "$DB_PORT");

/*if ($connection) {
    echo "Base de datos conectada";
} else {
    echo "No se pudo conectar la base de datos";
}*/
