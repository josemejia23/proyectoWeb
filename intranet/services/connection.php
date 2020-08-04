<?php
class Connection{
    function getConnection(){
        $enlace = mysqli_connect("127.0.0.1", "root", "admin123", "proyecto");   
        if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        echo "<p/>";
        exit;
    }
    return $enlace;
    }
}
?>