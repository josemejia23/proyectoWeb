<?php
include 'mainService.php';

class LoginService extends MainService
{
    public function login($userName, $password)
    {
        $result = $this->conex->query("SELECT * FROM USUARIO U, ROL_USUARIO R, PERSONA P, ROL S WHERE U.COD_USUARIO=R.COD_USUARIO AND S.COD_ROL=R.COD_ROL AND U.COD_PERSONA=P.COD_PERSONA AND U.NOMBRE_USUARIO='$userName' ");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (($row['CLAVE'] == $password)) {
                return $row;
            }else{
                /*$this->intentos=$this->intentos+1;
                $stmt = $this->conex->prepare("UPDATE USUARIO set INTENTOS_FALLIDOS=?
                WHERE COD_USUARIO= ?");
                $stmt->bind_param("ii", $this->intentos,$row['COD_USUARIO']);
                $stmt->execute();
                $stmt->close();*/
                header('Location: ../login.php?fallo=true');
            }
        }else{
            header('Location: ../login.php?row=true');
        }
        return null;
    }
    function updatePassword($password, $codUsuario){
        $stmt = $this->conex->prepare("UPDATE USUARIO set CLAVE=?
        WHERE COD_USUARIO= ?");
        $stmt->bind_param("si", $password,$codUsuario);
        $stmt->execute();
        $stmt->close();
    }
    function updateDate($date, $codUsuario){
        $stmt = $this->conex->prepare("UPDATE USUARIO set ULT_FECHA_INGRESO=?
        WHERE COD_USUARIO= ?");
        $stmt->bind_param("si", $date,$codUsuario);
        $stmt->execute();
        $stmt->close();
    }
}