<?php
    include_once ('global.php');
    
    if (!empty($_POST['shareTexto']) || !empty($_FILES['shareImagem'])) {
        
        //-----------------Compartilhando publicacao-----------------//
        $publicacao = new Usuario();
        if (!empty($_FILES['shareImagem'])) {
            $publicacao->nomeimagem = $_FILES['shareImagem']['name'];
            $arquivo = $_FILES['shareImagem']['tmp_name'];
            $publicacao->caminhoimagem = "../img/postagem/";

            move_uploaded_file($arquivo, 
                        $publicacao->caminhoimagem . $publicacao->nomeimagem);

            $publicacao->caminhoimagem = $publicacao->caminhoimagem . $publicacao->nomeimagem;
        }
        //Cadastrar a publicacao
        $publicacao->setTextoPublicacao($_POST['shareTexto']);
        $publicacao->setIdUsuario($_POST['idUsuario']);
        $publicacao->cadastrarPublicacao($publicacao);
    }
?>