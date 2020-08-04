<?php
include '../../services/loginService.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $loginService = new LoginService();
    $row = $loginService->login($_POST['username'], $_POST['password']);
    if (isset($row)) {
       
            session_start();
            $_SESSION["USER"] = $row;
            header('Location: ../../home_intranet.php');
       
        
    }
}
?>