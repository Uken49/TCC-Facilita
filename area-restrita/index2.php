<?php
include_once("valida-sentinela.php");
if ($_SESSION['tipoCadastro'] != "Contratante") {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("include/head.php");
include_once('global.php');

$administrador = new Administrador();
$profissional = new Profissional();
$habilidade = new Habilidade();


$listarProfissional = $profissional->listarDadosProfissional();
$listaUserOn = $administrador->listarUsuarioOnline();
$listaUserOff = $administrador->listarUsuarioOffline();

foreach ($listaUserOn as $linha) {
    $pOn = $linha['statusProfissional'];
}
foreach ($listaUserOff as $linha) {
    $pOff = $linha['statusProfissional'];
}
?>

<head>
    <link rel="stylesheet" href="../css/style11.css">
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

    <?php include_once("include/header.php") ?>
    Profissionais online no site (<?php echo $pOn ?> / <?php echo $pOn + $pOff ?>).
    <br>
    <div class="align"></div>
    <?php


    foreach ($listarProfissional as $linha) {
        if ($linha['statusPerfil'] == 1) {
            $BorderChat = "borda-verde";
        } else {
            $BorderChat = "borda-vermelho";
        }
    ?>
        <a href="perfil-visualizar.php?id=<?php echo $linha['idUsuario'] ?>">
            <div class="teste" align="center">
                <br>
                <figure>
                    <img src="<?php echo $linha['fotoPerfil'] ?>" class="<?php echo $BorderChat ?>" style="height: 65px; width: 65px; border-radius: 50px;">
                </figure>
                <strong><?php echo $linha['nomeProfissional'] ?></strong>
                <h1>Habilidades:</h1>

                <?php
                $habilidade->setIdProfissional($idProfissional = $linha['idProfissional']);
                $listarHabilidades = $habilidade->listarHabDoProfissional2($habilidade);

                foreach ($listarHabilidades as $linha) {
                ?>
                    <p>
                        <?php
                            if (isset($linha['descHabilidades']) || !empty($linha['descHabilidades'])) {
                                echo $linha['descHabilidades'];
                            }else{
                                echo 'dsad';
                            }
                        
                        ?>
                    </p>
                <?php } ?>
            </div>
        </a>
        <div class="align"></div>
    <?php }
    include_once("include/footer.php") ?>
</body>

</html>