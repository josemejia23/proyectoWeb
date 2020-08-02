<?php
include 'mainService.php';
class LoginService extends MainService
{
    function login($nombreUsuario, $clave)
    {
        $result = $this->conex->query("SELECT * FROM USUARIO WHERE NOMBRE_USUARIO='$nombreUsuario'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['CLAVE'] == $clave) {
                return $row;
            }
        } else {
            return NULL;
        }
    }
}