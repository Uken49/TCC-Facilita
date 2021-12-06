<?php
include_once("valida-sentinela.php");
ob_start();
?>

<!-- Validação de session -->
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("include/head.php") ?>

<head>
    <meta charset="utf-8">
    <title>Facilita+ - Chat</title>
    <link rel="stylesheet" href="../css/style7.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once("include/header.php");
    require_once("chat/modals.php");
    ?>

    <div class="result"></div>

    <section class="container">
        <article class="container_top_header">

            <div class="container_top">
                <?php
                if ($_SESSION['statusPerfil'] == 1) {
                    $Status = "ONLINE";
                    $Colors = "green";
                    $BorderChat = "border_green";
                } else {
                    $Status = "OFFLINE";
                    $Colors = "gray";
                    $BorderChat = "border_gray";
                }
                ?>
                <div class="container_top_left">
                    <img src="<?php echo $_SESSION['fotoPerfil'] ?>" alt="Foto do Usuário <?php echo $_SESSION['nome'] ?>" title="Foto do Usuário <?php echo $_SESSION['nome'] ?>" class="<?php echo $BorderChat ?>">
                </div>

                <div class="container_top_center">
                    <p class="container_top_center_firstLine"><?php echo $_SESSION['nome'] ?></p>
                    <p class="container_top_center_secondLine"><span class="<?php echo $Colors ?> fa fa-circle"></span> <?php echo $Status ?></p>
                </div>
                <div class="clear"></div>
            </div>

            <div class="container_top_right">
                <p>
                    <a title="Procurar amigos" class="bg_green btn_search"><span class="fa fa-plus-circle"></span></a>
                    <a title="Sair do Chat" class="bg_red btn_logout"><span class="fa fa-times-circle"></span> </a>
                </p>

            </div>
            <div class="clear"></div>
        </article>

        <div class="separator"></div>

        <article class="container_content">
            <div>
                <div class="loaderHeader">
                    <?php
                    foreach ($listaContatoUsuario as $linha) {
                        if ($linha['idContratante']) {
                            $idUsuarioContato = $linha['contato'];
                            $nome = $linha['nomeContratante'];
                            $foto = $linha['fotoC'];
                            $statusPerfil = $linha['statusC'];
                        }
                        if ($linha['idProfissional']) {
                            $idUsuarioContato = $linha['contato'];
                            $nome = $linha['nomeProfissional'];
                            $foto = $linha['fotoP'];
                            $statusPerfil = $linha['statusP'];
                        }
                        $_SESSION['modalUserId'] = strip_tags($linha['idContato']);

                        if ($statusPerfil == 1) {
                            $Color = "bg_green";
                            $Circle = "green";
                            $Status = "ONLINE";
                            $BorderChat = "border_green";
                        } else {
                            $Color = "bg_gray";
                            $Circle = "gray";
                            $Status = "OFFLINE";
                            $BorderChat = "border_gray";
                        }
                    ?>
                        <div class="container_content_margin">
                            <div class="container_main_left">
                                <img src="<?php echo strip_tags($foto) ?>" alt="Foto do <?php echo strip_tags($nome) ?>" title="Foto do Usuário <?php echo strip_tags($nome) ?>" class="<?php echo strip_tags($BorderChat) ?>">
                            </div>

                            <div class="mobile">
                                <div class="container_main_center">
                                    <p class="container_main_center_firstLine"><?php echo strip_tags($nome) ?></p>
                                    <p class="container_main_center_secondLine"><span class="<?php echo strip_tags($Circle) ?> fa fa-circle"></span> <?php echo ($statusPerfil == 0 ? 'Convite pendente' : $Status) ?> </p>
                                </div>

                                <div class="container_main_right">
                                    <p>
                                        <a title="Chamar este usuário para o Chat" class="<?php echo strip_tags($Color) ?> btn_call" data-id="<?php echo $idUsuarioContato?>"><span class="fa fa-comments"></span> Chamar</a>
                                    </p>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    <?php }
                    if (count($listaContatoUsuario) == 0) {
                        echo "Nenhuma conversa iniciada";
                    }
                    ?>
                </div>
                <div class="space_margin"></div>
            </div>
        </article>
    </section>

    <section class="content">
        <article class="content_top">
            <div class="contentLoader">
                <?php
                foreach ($listaUsuarioChat as $linha) {
                    if ($linha['idContratante']) {
                        $idUsuarioContato = $linha['contato'];
                        $nome = $linha['nomeContratante'];
                        $foto = $linha['fotoC'];
                        $contatoStatus = $linha['contatoStatus'];
                    }
                    if ($linha['idProfissional']) {
                        $idUsuarioContato = $linha['contato'];
                        $nome = $linha['nomeProfissional'];
                        $foto = $linha['fotoP'];
                        $statusPerfil = $linha['statusP'];
                        $contatoStatus = $linha['contatoStatus'];
                    }
                }
                if (count($listaContatoUsuario) == 0) {
                    $contatoStatus = 0;
                }else {
                    $contatoStatus = 1;
                }
                
                if ($_SESSION['statusPerfil'] == 1) {
                    $Status = "ONLINE";
                    $Colors = "green";
                    $BorderChat = "border_green";
                } else {
                    $Status = "OFFLINE";
                    $Colors = "gray";
                    $BorderChat = "border_gray";
                }

                if (count($listaContatoUsuario) == 0) {
                    
                ?>
                    <div class="content_top_left">
                        <img src="<?php echo strip_tags($_SESSION['fotoPerfil']) ?>" alt="Foto do <?php echo strip_tags($_SESSION['nome']) ?>" title="Foto do Usuário <?php echo strip_tags($_SESSION['nome']) ?>" class="<?php echo strip_tags($BorderChat) ?>">
                    </div>

                    <div class="content_top_center">
                        <p class="content_top_center_firstLine"><?php echo strip_tags($_SESSION['nome']) ?></p>
                        <p class="content_top_center_secondLine"><span class="green fa fa-circle"></span> ONLINE </p>
                    </div>
                <?php } else {
                ?>
                    <div class="content_top_left">
                        <img src="<?php echo strip_tags($foto) ?>" alt="Foto do <?php echo strip_tags($nome) ?>" title="Foto do Usuário <?php echo strip_tags($nome) ?>" class="<?php echo strip_tags($BorderChat) ?>">
                    </div>

                    <div class="content_top_center">
                        <p class="content_top_center_firstLine"><?php echo strip_tags($nome) ?></p>
                        <p class="content_top_center_secondLine"><span class="<?php echo strip_tags($Colors) ?> fa fa-circle"></span> <?php echo($linha['contato'] == 0 ? 'Convite Pendente' : $Status) ?> </p>
                    </div>
                <?php } ?>
            </div>

            <div class="content_top_right">
                <div class="topLoader">
                    <?php
                    if ($contatoStatus == 0) {
                    ?>
                        <p>
                            <a title="Banir usuário" class="bg_gray btn_disabled"><span class="fa fa-times-circle"></span> </a>
                        </p>
                    <?php
                    }else{
                        if ($contatoStatus) {
                    ?>

                    <p>
                        <a title="Aceitar pedido de amizade" class="bg_green btn_request_approved" data-id="<?php echo $UsuarioChat ?>"><span class="fa fa-thumbs-up"></span></a>
                        <a title="Rejeitar pedido de amizade" class="bg_red btn_request_remove" data-id="<?php echo $UsuarioChat ?>"><span class="fa fa-thumbs-down"></span> </a>
                    </p>
                    <?php }else{ ?>
                    <p>
                        <a title="Banir usuário" class="bg_red btn_ban" data-id="<?php echo $UsuarioChat ?>"><span class="fa fa-times-circle"></span> </a>
                    </p>
                    <?php }
                    } ?>

                </div>
            </div>

            <div class="clear"></div>
        </article>

        <div class="separator"></div>

        <article class="content_header">

            <div class="loaderChat">

                <div class="content_header_margin">
                    <div class="content_header_margin_img">
                        <img src="../img/site/mestres-do-php.png" alt="Foto do Usuário Mestres do PHP" title="Foto do Usuário Mestres do PHP" class="border_gray">
                    </div>

                    <div class="content_header_margin_text">
                        <p class="content_main_center_chat">
                            <span class="datetime">Mensagem ficará aqui</span>
                        </p>
                    </div>

                    <div class="clear"></div>
                </div>

            </div>
            <div class="text"></div>
            <div class="space_margin"></div>
        </article>

        <article class="content_form">
            <form id="form-chat" method="POST" action="../sql/insert-tbchat.php">
                <div class="content_left">
                    <input type="number" name="idContratante" id="idContratante" value="<?php echo $_SESSION['idUsuario'] ?>" hidden>
                    <input type="number" name="idProfissional" id="idProfissional" value="<?php echo $_SESSION['idUsuario'] ?>" hidden>
                    <input type="text" name="txMensagem" id="txMensagem" placeholder="Digite sua mensagem...">
                </div>

                <div class="content_right">
                    <button class="bg_gray btn_disabled"><i class="fa fa-paper-plane"></i></button>
                </div>
                <div class="clear"></div>
            </form>
        </article>
    </section>

    <script src="script.js"></script>
</body>

</html>
<?php
ob_end_flush();
?>