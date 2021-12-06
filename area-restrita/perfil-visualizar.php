<?php include_once("valida-sentinela.php") ?>
<!-- Validação de session -->
<!DOCTYPE html>
<html lang="pt-br">

<?php
include_once("include/head.php");
$profissional = new Profissional();
$contratante = new Contratante();

$profissional->setIdUsuario($_GET['id']);
$contratante->setIdUsuario($_GET['id']);
$listarDadosProf = $profissional->listarDadosProfissional2($profissional);
$listarDadosCont = $contratante->listarDadosContratante2($contratante);
$i = 0;

foreach ($listarDadosProf as $linha) {
    if ($linha['idUsuario'] == $_GET['id']) {
        $foto = $linha['fotoPerfil'];
        $bio = $linha['biografia'];
        $nome = $linha['nomeProfissional'];
        $cidade = $linha['cidadeProfissional'];
        $telefone = $linha['descTelProfissional'];
        // $habilidade[$i] = $linha['descHabilidades'];
    }
}

foreach ($listarDadosCont as $linha) {
    if ($linha['idUsuario'] == $_GET['id']) {
        $foto = $linha['fotoPerfil'];
        $bio = $linha['biografia'];
        $nome = $linha['nomeContratante'];
        $cidade = $linha['cidadeContratante'];
        $telefone = $linha['descTelContratante'];
    }
}
?>

<head>
    <title>Facilita+ - Meu Perfil</title>
</head>

<body>
    <?php include_once("include/header.php") ?>
    <main class="secao-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-porta">
                <div class="perfil-usuario-avatar">
                    <img src="<?php echo $linha['fotoPerfil'] ?>" alt="img-avatar">
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">
                    <?php echo $nome ?>
                </h3>
                <p class="texto"> <?php echo $bio ?></p>
            </div>
            <div class="perfil-usuario-info">
                <ul class="lista-dados">
                    <li><i class="icono fas fa-map-signs"></i>
                        <?php echo $cidade ?>
                    </li>
                </ul>
                <ul class="lista-dados">
                    <li><i class="icono fas fa-phone-alt"></i>
                        <?php echo $telefone ?>
                    </li>
                </ul>
            </div>

            <?php
            $publicacao = new Usuario();
            $publicacao->setIdUsuario($idUsuario = $_GET['id']);
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
        </div>
    </main>


    <?php include_once("include/footer.php") ?>
</body>

</html>