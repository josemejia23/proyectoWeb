<?php
include 'mainService.php';
class LoginService extends MainService
{
    function login($nombreUsuario, $clave)
    {
        $result = $this->conex->query("SELECT * FROM USUARIO U, ROL_USUARIO R, PERSONA P, ROL S WHERE U.COD_USUARIO=R.COD_USUARIO AND S.COD_ROL=R.COD_ROL AND U.COD_PERSONA=P.COD_PERSONA AND U.NOMBRE_USUARIO='$nombreUsuario' ");
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