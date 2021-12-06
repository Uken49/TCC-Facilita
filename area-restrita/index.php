<?php
include_once("valida-sentinela.php");

if ($_SESSION['tipoCadastro'] != "Profissional") {
    header('Location: index2.php');
    exit;
}
?>
<!-- Validação de session -->
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("include/head.php") ?>

<head>
    <title>Facilita+</title>
</head>

<body>
    <?php
    include_once("include/header.php");
    if (isset($_SESSION['primeiroAcesso']) && $_SESSION['primeiroAcesso'] = 1) { ?>
        <button data-ls-module="modal" data-target="#primeiroAcesso" class="ls-btn-primary" hidden></button>

        <div class="ls-modal" id="primeiroAcesso">
            <div class="ls-modal-box">
                <div class="ls-modal-header">
                    <button data-dismiss="modal">&times;</button>
                    <h4 class="ls-modal-title">Bem vindo!!</h4>
                </div>
                <div class="ls-modal-body" id="myModalBody">
                    <p>Bem vindo ao Facilita+, deseja fazer um rápido tour pelo site para aprender as funcionalidades que o site proporciona?</p>
                </div>
                <div class="ls-modal-footer">
                    <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="ls-btn-primary">Fazer tour guiado</button>
                </div>
            </div>
        </div>
    <?php unset($_SESSION['primeiroAcesso']);
    } ?>
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
                        <label class="label-file" for="SelecaoImagem" alt="Adicione uma IMG">
                            <img src="../assets/img.svg" alt="Adicione uma IMG">
                        </label>
                        <input type="file" accept="image/*" id="SelecaoImagem" name="imagem">
                        <input type="text" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>" hidden>
                        <input type="text" name="url" value="index.php" hidden>
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
                        <span id="shareTexto">
                            <?php echo $linha['textoPublicacao'] ?>
                        </span>
                        <?php if ($linha['imagemPublicacao'] != "../img/postagem/") { ?>
                            <br>
                            <img id="shareImagem" src="<?php echo $linha['imagemPublicacao'] ?>">
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
    <?php include_once("include/footer.php") ?>

    <script>
        //Compartilhar publicação
        jQuery('#share').click(function() {
            var dadosajax = {
                'shareTexto': jQuery('#shareTexto').val(),
                'shareImagem': jQuery('#shareImagem').val(),
                'idUsuario': jQuery('#idUsuario').val()
            }
            pageurl = '../sql/compartilhar-publicacao.php';

            jQuery.ajax({
                url: pageurl,
                data: dadosajax,
                type: 'POST',
                success: function(html) {
                    setTimeout(function() {
                        location.href = "index.php";
                    }, 1);
                }

            });
            jQuery('form').on('submit', function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>

</html>