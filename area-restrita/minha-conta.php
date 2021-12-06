<?php
include_once("valida-sentinela.php");
if ($_SESSION['tipoCadastro'] == 'Profissional') {

    // Colocar habilidade só no Profissional!!!

    $tipo = "Rg";
    $id = "";
    $placeholder = "";
    $classe = "";
    $value = $_SESSION['rg'];
    $validacao = '';
    $idClass = 'id="classRg"';
} else {
    $tipo = "Cnpj";
    $id = "avisoCnpj";
    $placeholder = "000.000.000-00";
    $classe = "ls-mask-cnpj";
    $value = $_SESSION['cnpj'];
    $validacao = 'onkeyup="validarCNPJ(this.value);"';
    $idClass = 'id="classCnpj"';
}
?>
<!-- Validação de session -->
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("include/head.php") ?>

<head>
    <link rel="stylesheet" href="../css/style5.css?90">
    <link href="http://assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="//assets.locaweb.com.br/locastyle/3.10.1/stylesheets/locastyle.css">
    <title>Facilita+ - Minha Conta</title>
</head>
<?php include_once("include/header.php"); ?>

<body>


    <h1>CONFIGURAÇÕES DE CONTA</h1>

    <main>
        <form action="update-tb<?php echo $_SESSION['tipoCadastro'] ?>.php" method="POST" class="ls-form ls-form-horizontal" data-ls-module="form">
            <fieldset id="fields-disabled" class="row ls-form-disable ls-form-text">
                <div class="row input-group mb-3">
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Tipo de cadastro</b>
                        <label class="ls-field"> <?php echo $_SESSION['tipoCadastro'] ?> </label>
                    </label>

                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Email</b>
                        <label class="ls-field"> <?php echo $_SESSION['email'] ?> </label>
                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Nome Completo</b>
                        <input type="text" name="txNome" value="<?php echo $_SESSION['nome'] ?>" placeholder="Nome e sobrenome" class="ls-field" minlength="3" maxlength="60">
                    </label>
                </div>
                <div class="row input-group mb-3">
                    <label class="ls-label col-md-2" id="classTelefone">
                        <b class="ls-label-text">Telefone</b>
                        <input type="tel" name="txTelefone" id="txTelefone" value="<?php echo $_SESSION['telefone'] ?>" placeholder="(99) 99999-9999" onkeyup="validarTelefone(this.value);" class="ls-field ls-mask-phone9_with_ddd" minlength="8" maxlength="11">
                        <small class="ls-help-message" id="avisoTelefone"></small>
                    </label>
                    <label class="ls-label col-md-2" id="classCpf">
                        <b class="ls-label-text">CPF</b>
                        <input type="text" name="txCpf" id="txCpf" value="<?php echo $_SESSION['cpf'] ?>" placeholder="000.000.000-00" class="ls-field ls-mask-cpf" onkeyup="validarCPF(this.value);" maxlength="8">
                        <small class="ls-help-message" id="avisoCpf"></small>
                    </label>
                    <label class="ls-label col-md-2" id="classCep">
                        <b class="ls-label-text">CEP</b>
                        <input type="text" name="txCep" id="txCep" value="<?php echo $_SESSION['cep'] ?>" placeholder="00000-000" class="ls-field ls-mask-cep" onkeyup="pesquisacep(this.value);" maxlength="8">
                        <small class="ls-help-message" id="avisoCep"></small>
                    </label>
                </div>
                <div class="row input-group mb-3">
                    <label class="ls-label col-md-2" <?php echo $idClass ?>>
                        <b class="ls-label-text"><?php echo strtoupper($tipo) ?></b>
                        <input type="text" name="tx<?php echo $tipo ?>" id="tx<?php echo $tipo ?>" value="<?php echo $value ?>" placeholder="<?php echo $placeholder ?>" class="ls-field  <?php echo $classe ?> " <?php echo $validacao ?> maxlength="14">
                        <small class="ls-help-message" id="<?php echo $id ?>"></small>
                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Rua</b>
                        <input type="text" name="txLogradouro" id="txLogradouro" value="<?php echo $_SESSION['logradouro'] ?>" class="form-control" readonly>
                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Bairro</b>
                        <input type="text" name="txBairro" id="txBairro" value="<?php echo $_SESSION['bairro'] ?>" class="form-control" readonly>
                    </label>
                </div>

                <div class="row input-group mb-3">
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">UF</b>
                        <input type="text" name="txUf" id="txUf" value="<?php echo $_SESSION['uf'] ?>" class="form-control" readonly>
                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Cidade</b>
                        <input type="text" name="txCidade" id="txCidade" value="<?php echo $_SESSION['cidade'] ?>" class="form-control" readonly>
                    </label>
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Complemento do Endereço</b>
                        <input type="text" name="txComplemento" value="<?php echo $_SESSION['endComplemento'] ?>" placeholder="Complemento do Endereço" class="ls-field" maxlength="100">
                    </label>
                </div>
                <div class="row input-group mb-3">
                    <label class="ls-label col-md-2">
                        <b class="ls-label-text">Data de Nascimento</b>
                        <input type="text" name="txDtNascimento" onfocus="(this.type = 'date')" value="<?php echo $_SESSION['dataNascimento'] ?>" placeholder="<?php echo $_SESSION['dataNascimento'] ?>" class="ls-field">
                    </label>
                    <label class="ls-label col-md-2 ls-display-none hidden-elements">
                        <b class="ls-label-text">Senha</b>
                        <div class="ls-prefix-group">
                            <input type="password" name="txSenha" id="txSenha" placeholder="Insira a senha" class="ls-field" minlength="6" maxlength="25" required>
                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#txSenha" required>
                            </a>
                        </div>
                    </label>
                    <label class="ls-label col-md-2 ls-display-none hidden-elements" id="classConfirmarSenha">
                        <b class="ls-label-text">Confirmar Senha</b>
                        <div class="ls-prefix">
                            <input type="password" name="txConfirmarSenha" id="txConfirmarSenha" placeholder="Confirme sua Senha" class="ls-field" onkeyup="validarSenha();" minlength="6" maxlength="25" required>
                            <small class="ls-help-message" id="avisoConfirmarSenha"></small>
                        </div>
                    </label>
                </div>
            </fieldset>
            <div class="ls-actions-btn b-5">
                <button class="ls-btn-primary ls-display-none hidden-elements" type="submit">Salvar</button>
                <button class="btn btn-secondary btn-sm hidden-elements" data-toggle-class="ls-display-none" data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled">Editar Dados</button>
                <button data-toggle-class="ls-display-none" data-target=".hidden-elements" data-ls-fields-enable="#fields-disabled" class="ls-btn-danger ls-display-none hidden-elements" type="submit">Cancelar</button>
                <button class="btn btn-danger btn-sm hidden-elements" data-ls-module="modal" data-target="#myAwesomeModal">Excluir Conta</button>
                <button class="habilidade hidden-elements" data-ls-module="modal" data-target="#myAwesomeModal2">Add habilidade</button>
            </div>
        </form>



        <!-- Nova Habilidade -->
        <div class="ls-modal" id="myAwesomeModal2">
            <div class="ls-modal-box">
                <div class="ls-modal-header">
                    <button data-dismiss="modal">&times;</button>
                    <h4 class="ls-modal-title">Qual Nova Habilidade?</h4>
                </div>
                <div class="ls-modal-body" id="myModalBody">
                    <center>
                        <input type="text" name="habilidade" id="" placeholder="Nova habilidade">
                    </center>
                </div>
                <div class="ls-modal-footer">
                    <a href="../sql/delete-tb<?php echo $_SESSION['tipoCadastro'] ?>.php">
                        <center>
                            <button type="submit" class="habilidade">
                                Enviar
                            </button>
                        </center>
                    </a>
                </div>

            </div>

        </div><!-- /.modal -->

        <div class="ls-modal" id="myAwesomeModal">
            <div class="ls-modal-box">
                <div class="ls-modal-header">
                    <button data-dismiss="modal">&times;</button>
                    <h4 class="ls-modal-title">Deseja realmente exluir a conta?</h4>
                </div>
                <div class="ls-modal-body" id="myModalBody">
                    <p>
                        Após fazer esta ação, sua conta será excluida permanentemente e seus dados serão apagados sem chance de recuperação. Deseja realmente excluir esta conta?
                    </p>
                </div>
                <div class="ls-modal-footer">
                    <button class="btn btn-danger btn-sm ls-float-right" data-dismiss="modal">Cancelar</button>
                    <a href="../sql/delete-tb<?php echo $_SESSION['tipoCadastro'] ?>.php">
                        <button type="submit" class="ls-btn-danger">
                            Excluir Conta
                        </button>
                    </a>
                </div>

            </div>

        </div><!-- /.modal -->

    </main>
    <?php include_once("include/footer.php") ?>


    <script>
        src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"
        <?php
        include_once("../js/validarCep.js");
        include_once("../js/validarCnpj.js");
        include_once("../js/validarCpf.js");
        include_once("../js/validarSenha.js");
        include_once("../js/validarTelefone.js");
        ?>
    </script>
</body>

</html>