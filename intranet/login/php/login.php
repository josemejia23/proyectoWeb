<?php
include '../../services/loginService.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $loginService = new LoginService();
    $row = $loginService->login($_POST['username'], $_POST['password']);
    if (isset($row)) {
        if ($row['NOMBRE_ROL'] == 'ADMINISTRATIVO') {
            session_start();
            $_SESSION["ADM"] = $row;
            header('Location: ');
        } else if ($row['NOMBRE_ROL'] == 'DIRECTIVO') {
            session_start();
            $_SESSION["DIR"] = $row;
            header('Location: ');
        } else if ($row['NOMBRE_ROL'] == 'DOCENTE') {
            session_start();
            $_SESSION["DOC"] = $row;
            header('Location: ../../Docente/index.php');
        } else if ($row['NOMBRE_ROL'] == 'ESTUDIANTE') {
            session_start();
            $_SESSION["EST"] = $row;
            header('Location: ../../Alumno/index.php');
        } else if ($row['NOMBRE_ROL'] == 'REPRESENTANTE') {
            session_start();
            $_SESSION["REP"] = $row;
            header('Location: ../../Representante/index.php');
        } else if ($row['NOMBRE_ROL'] == 'SUPERUSUARIO') {
            session_start();
            $_SESSION["SUP"] = $row;
            header('Location: ');
        }

    }
}
?>