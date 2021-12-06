<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php
include_once("include/head.php");
include_once("../area-adm/include/head.php");
include_once('global.php');
?>

<head>
    <link rel="stylesheet" href="../css/style6.css">
    <title>Facilita+ - Pesquisa</title>
</head>

<body>
    <?php include_once("include/header.php") ?>

    <aside style="background-color:#f5f5f5;">

        <!-- Filtro -->

        <?php
        $conexao = Conexao::pegarConexao();

        if (!isset($_SESSION['idUsuario']) && empty($_SESSION['idUsuario'])) {
            header('Location: cadastro-profissional.php');
            exit;
        }
        $habilidade = new Habilidade();
        $listaHabilidade = $habilidade->listarHabilidade();

            
        ?>

        <div>
            <form action="pesquisa.php" method="GET">
                <label class="ls-label col-md-8 col-sm-8">
                    <h1>Filtros:</h1>
                </label>

                <label class="ls-label col-md-8 col-sm-8">
                    <b class="ls-label-text" style="color:#152b6f;">Pessoa ou Publicação</b>
                    <div class="ls-custom-select">
                        <select name="filtroAvaliação" class="ls-select">
                            <option>Pessoa</option>
                            <option>Publicação</option>
                        </select>
                    </div>
                </label>

                <!--------------Estado--------------->
                <label class="ls-label col-md-8 col-sm-8">
                    <b class="ls-label-text" style="color:#152b6f;">Estado</b>
                    <div class="ls-custom-select">
                        <select name="txFiltroEstado" class="ls-select">
                            <li>
                                <option value=""></option>
                                <option value="AC"> AC </option>
                                <option value="AC"> AC </option>
                                <option value="AL"> AL </option>
                                <option value="AP"> AP </option>
                                <option value="AM"> AM </option>
                                <option value="BA"> BA </option>
                                <option value="CE"> CE </option>
                                <option value="ES"> ES </option>
                                <option value="GO"> GO </option>
                                <option value="MA"> MA </option>
                                <option value="MT"> MT </option>
                                <option value="MS"> MS </option>
                                <option value="PA"> PA </option>
                                <option value="PB"> PB </option>
                                <option value="PR"> PR </option>
                                <option value="PE"> PE </option>
                                <option value="PI"> PI </option>
                                <option value="RJ"> RJ </option>
                                <option value="RN"> RN </option>
                                <option value="RS"> RS </option>
                                <option value="RO"> RO </option>
                                <option value="RR"> RR </option>
                                <option value="SC"> SC </option>
                                <option value="SP"> SP </option>
                                <option value="SE"> SE </option>
                                <option value="TO"> TO </option>
                                <option value="DF"> DF </option>
                            </li>
                        </select>
                    </div>
                </label>

                <!-------------HABILIDADES --------------->
                <label class="ls-label col-md-8 col-sm-8">
                    <b class="ls-label-text" style="color:#152b6f;">Habilidade</b>
                    <div class="ls-custom-select">
                        <select name="txFiltroHabilidade" class="ls-select">
                            <li>
                                <option value=""></option>
                            </li>
                            <?php foreach ($listaHabilidade as $linha) { ?>
                                <li>
                                    <option value="<?php echo $linha['idHabilidades'] ?>" name="<?php echo $linha['idHabilidades'] ?>"> <?php echo $linha['descHabilidades'] ?></option>
                                </li>
                            <?php } ?>
                        </select>
                    </div>
                </label>
                <input type="hidden" name="txPesquisaTexto" value="<?php echo $_GET['txPesquisaTexto'] ?>">
                <button type="submit" class="botao-pesquisa">Pesquisar</button>
                <div class="ls-sidebar-inner">
                    <nav class="ls-menu"></nav>
                </div>
            </form>
        </div>
    </aside>

    <div id="conteiner-a">
        <h1 clas="teste">Resultados da Pesquisa:</h1>
        <main class="main">
            <?php
            try {
                $pesquisa = new Usuario();

                //Pesquisar pelo profissional,contratante ou publicação
                if (isset($_GET['txFiltroHabilidade']) && empty($_GET['txFiltroHabilidade'])) {
                    $_GET['txFiltroHabilidade'] = '%';
                    $pesquisa->setPesquisaHab($_GET['txFiltroHabilidade']);
                }
                if (isset($_GET['txFiltroEstado']) && empty($_GET['txFiltroEstado'])) {
                    $_GET['txFiltroEstado'] = '%';
                    $pesquisa->setPesquisaUf($_GET['txFiltroEstado']);
                }
                if (isset($_GET['txPesquisaTexto']) && empty($_GET['txPesquisaTexto'])) {
                    $_GET['txPesquisaTexto'] = '%';
                }
                $pesquisa->setPesquisa($_GET['txPesquisaTexto'] . '%');

                $listarPesquisa = $pesquisa->pesquisar($pesquisa);

                if (isset($_GET['txPesquisaTexto']) && !empty($_GET['txPesquisaTexto'])) {

                    if (isset($listarPesquisa) && !empty($listarPesquisa)) {
                        foreach ($listarPesquisa as $linha) {
                            if ($linha['idContratante']) {
                                $nome = $linha['nomeContratante'];
                                $foto = $linha['fotoC'];
                                $id = $linha['idUserC'];
                            }
                            if ($linha['idProfissional']) {
                                $nome = $linha['nomeProfissional'];
                                $foto = $linha['fotoP'];
                                $id = $linha['idUserP'];
                            }
            ?>
                            <div class="user">
                                <div class="infoUser">
                                    <a href="perfil-visualizar.php?id=<?php echo $id ?>">
                                        <figure class="imgUser">
                                            <img src="<?php echo $foto ?>" style="height: 40px; width: 40px; border-radius: 20px;" alt="Foto de <?php echo $nome ?>">
                                            <strong>
                                                <?php echo $nome ?>
                                            </strong>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div align="center">
                            <span><i>Nenhum resultado encontrado.</i></span>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div align="center">
                        <span><i>Nenhum resultado encontrado.</i></span>
                    </div>
            <?php }
                include_once('include/footer.php');
            } catch (Exception $e) {
                echo '<pre>';
                print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            } ?>
        </main>
    </div>
    <script>

    </script>
</body>

</html>