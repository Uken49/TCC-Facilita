<?php
    include_once('global.php');
    $conexao = Conexao::pegarConexao();

    if (!isset($_SESSION['Adm']) && empty($_SESSION['Adm'])){
        header('Location: ../index.php');
    }
?>