<?php
include_once('global.php');
$conexao = Conexao::pegarConexao();

if (!isset($_SESSION['idUsuario']) && empty($_SESSION['idUsuario'])) {
    header('Location: cadastro-profissional.php');
    exit;
}
$habilidade = new Habilidade();
$listaHabilidade = $habilidade->listarHabilidade();
$_SESSION['primeiroAcesso'] = 1;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style4.css">
    <title>Facilita+ - Cadastro</title>
</head>

<body>
    <main>
        <form name="form-habilidade" action="sql/insert-tbhabilidadeProfissional.php" method="POST">
            <div class="box">
                <h2>QUAIS SÃO SUAS HABILIDADES?</h2>
                <div id="listaHabilidades" style="overflow-y: auto; overflow-x: hidden; height: 25em;">
                    <ul>
                        <?php foreach ($listaHabilidade as $linha) { ?>
                            <li>
                                <span>
                                    <?php echo $linha['idHabilidades'] ?>
                                </span>
                                <label>
                                    <?php echo $linha['descHabilidades'] ?>
                                </label>
                                <input type="checkbox" name="habilidade[]" value="<?php echo $linha['idHabilidades'] ?> ">
                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <br>
                <h2>OUTRAS?</h2>
                <div align="center">
                    <input class="teste" type="text" id="txHabilidade" placeholder="Cadastrar nova habilidade">
                    <br>
                    <button class="botao" id="addHabilidade" type="submit">Cadastrar habilidade</button>
                </div>
                <br><br>
                <div align="center">
                    <a href="area-restrita/index.php#primeiroAcesso">
                        <button class="botao" type="submit">
                            Enviar
                        </button>
                        <button class="botao" type="button">
                            Não informar
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </main>
    <script type="text/javascript" src="http://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        jQuery('#addHabilidade').click(function() {

            var dadosajax = {
                'txHabilidade': jQuery('#txHabilidade').val()
            }
            pageurl = 'sql/cadastrar-NovaHabilidade.php';

            jQuery.ajax({
                url: pageurl,
                data: dadosajax,
                type: 'POST',
                success: function(html) {
                    setTimeout(function() {
                        location.href = "cadastro-profissional-2.php";
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