<?php
    include_once ('global.php');
    
    if (!empty($_POST['txPublicacao']) || !empty($_FILES['imagem'])) {
        header('Location: ../area-restrita/'. $_POST['url']);
        
        //-----------------Cadastrando a publicacao-----------------//
        $publicacao = new Usuario();
        if (!empty($_FILES['imagem'])) {
            $publicacao->nomeimagem = $_FILES['imagem']['name'];
            $arquivo = $_FILES['imagem']['tmp_name'];
            $publicacao->caminhoimagem = "../img/postagem/";

            move_uploaded_file($arquivo, 
                        $publicacao->caminhoimagem . $publicacao->nomeimagem);

            $publicacao->caminhoimagem = $publicacao->caminhoimagem . $publicacao->nomeimagem;
        }
        //Cadastrar a publicacao
        $publicacao->setTextoPublicacao($_POST['txPublicacao']);
        $publicacao->setIdUsuario($_POST['idUsuario']);
        echo $publicacao->cadastrarPublicacao($publicacao);
    }else{
        header('Location: ../area-restrita/'. $_POST['url']);
    }
?>