<?php
$connection = mysqli_connect("localhost", "root", "", "wedding");

if ($connection) {
    echo "Base de datos conectada";
} else {
    echo "No se pudo conectar la base de datos";
}
