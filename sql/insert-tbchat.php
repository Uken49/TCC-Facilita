<?php
include_once('global.php');

if (!empty($_POST['txMensagem']) && !empty($_POST['idUsuario'])){

    $usuario = new Usuario();
    
    header('Location: ../area-restrita/chat.php');
}else{
    header('Location: ../area-restrita/chat.php');
}

?>