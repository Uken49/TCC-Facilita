<?php
    include_once('global.php');
    $conexao = Conexao::pegarConexao();

    if (isset($_SESSION['idUsuario']) && !empty($_SESSION['idUsuario'])){
        header('Location: area-restrita/index.php');
    }
    if (isset($_SESSION['Adm']) && !empty($_SESSION['Adm'])){
        header('Location: area-adm/index.php');
    }
?>