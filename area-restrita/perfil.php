<?php include_once("valida-sentinela.php") ?>
<!-- Validação de session -->
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("include/head.php") ?>

<head>
    <title>Facilita+ - Meu Perfil</title>
</head>

<body>
    <?php include_once("include/header.php") ?>
    <main class="secao-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-porta">
                <div class="perfil-usuario-avatar">
                    <img src="<?php echo $_SESSION['fotoPerfil'] ?>" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                        <form method="POST" enctype="multipart/form-data" action="update-tb<?php echo $_SESSION['tipoCadastro'] ?>.php">
                            <label for="SelecaoImagem" class="far fa-image"></label>
                            <input type="file" name="imagem" id="SelecaoImagem" accept="image/*" onchange="getFileData(this)">
                            <input type="submit" id="confirmar" value="Confirmar alteração" hidden>
                        </form>
                    </button>
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">
                    <?php echo $_SESSION['nome'] ?>
                </h3>
                <p class="texto"> <?php echo $_SESSION['biografia'] ?></p>
            </div>
            <h1 class="letra">Contatos</h1>
            <div class="perfil-usuario-info">
                <ul class="lista-dados">
                    <li><i class="icono fas fa-map-signs"></i>
                        <?php echo $_SESSION['cidade'] ?>
                    </li>
                </ul>
                <ul class="lista-dados">
                    <li><i class="icono fas fa-phone-alt"></i>
                        <?php echo $_SESSION['telefone'] ?>
                    </li>
                </ul>
                <ul class="lista-dados">
                    <li><img class="mail" src="../assets/mail.svg" alt="mail"></a></i>
                        <?php echo $_SESSION['email'] ?>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <main class="main">
        <div class="newPost">
            <div class="infoUser">
                <figure class="imgUser">
                    <img style="height: 40px; width: 40px; border-radius: 20px;" src="<?php echo $_SESSION['fotoPerfil'] ?>" alt="img-avatar">
                </figure>
                <strong>
                    <?php echo $_SESSION['nome'] ?>
                </strong>
            </div>

            <form method="POST" enctype="multipart/form-data" action="../sql/insert-tbpublicacao.php" id="FazerPublicacao" class="formPost">
                <textarea name="txPublicacao" id="txPublicacao" placeholder="Faça uma publicação!"></textarea>
                <div class="iconsAndButton">
                    <div class="icons">
                        <label class="label-file" for="publiSelecaoImagem" alt="Adicione uma IMG">
                        
                        <input type="file" accept="image/*" id="publiSelecaoImagem" name="imagem">
                        <input type="text" name="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>" hidden>
                        <input type="text" name="url" value="perfil.php" hidden>
                        </label>
                    </div>
                    <button type="submit" class="btnSubmitForm">Publicar</button>
                </div>
            </form>
        </div>
        <?php
        $publicacao = new Usuario();
        $publicacao->setIdUsuario($idUsuario = $_SESSION['idUsuario']);
        $listarPublicacao = $publicacao->listarPublicacao($publicacao);

        foreach ($listarPublicacao as $linha) {
            if ($linha['idContratante']) {
                $nome = $linha['nomeContratante'];
                $foto = $linha['fotoC'];
            }
            if ($linha['idProfissional']) {
                $nome = $linha['nomeProfissional'];
                $foto = $linha['fotoP'];
            }
        ?>
            <ul class="posts">
                <li class="post">
                    <div class="infoUserPost">
                        <figure class="imgUser">
                            <img style="height: 40px; width: 40px; border-radius: 60px;" src="<?php echo $_SESSION['fotoPerfil'] ?>" alt="img-avatar">

                        </figure>
                        <div class="nameAndHour"></div>
                        <strong>
                            <?php echo $nome ?>
                        </strong>
                        <p><?php echo strtolower($linha['dataPublicacao']) ?></p>
                    </div>
                    <p>
                        <?php echo $linha['textoPublicacao'];
                        if ($linha['imagemPublicacao'] != "../img/postagem/") { ?>
                            <br>
                            <img src="<?php echo $linha['imagemPublicacao'] ?>">
                        <?php } ?>
                    </p>
                    <br>
                    <br>


                    <div class="actionBtnPost">
                        <button type="button" id="like">
                            <img src="../assets/heart.svg" alt="Gostei">
                            Curtir
                        </button>

                        <button type="button" id="share">
                            <img src="../assets/share.svg" alt="Compartilhar">
                            Compartilhar
                        </button>
                    </div>
                </li>
            </ul>
        <?php } ?>
    </main>
    <br>
    <script>
        function getFileData(myFile) {
            var file = myFile.files[0];
            var filename = file.name;
            document.getElementById("confirmar").click();
        }
    </script>
    <?php include_once("include/footer.php") ?>
</body>

</html>