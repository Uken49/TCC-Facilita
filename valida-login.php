<?php
    include_once('global.php');
    
    if (empty($_POST['email']) || empty($_POST['senha'])) {
        header('Location: login.php');
        exit();
    }

    $usuario = new Usuario();
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if($email == "adm@adm.com" && $senha == "123"){
        session_start();
        $_SESSION['Adm'] = "Adm";
        header('Location: area-adm/index.php');
    }else{
        if($usuario->logar($email, $senha)){
            if(isset($_SESSION['idUsuario'])){
                $_SESSION['idUsuario'];
                session_start();
                header('Location: area-restrita/index.php');
            }else{
                session_start();
                unset($_SESSION['idUsuario']);
                session_destroy();
                header('Location: login.php');
                exit;
            }
        }else{
            session_start();
            unset($_SESSION['idUsuario']);
            session_destroy();
            header("Location: login.php");
        }
    }
?>