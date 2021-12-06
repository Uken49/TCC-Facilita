<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("include/head.php"); ?>
<!-- Chamando uma parte do head -->

<head>
    <title>Facilita+ - Cadastro</title>
</head>

<body>
    <?php include_once("include/header.php"); ?>
    <!-- Chamando o cabeçalho do site -->
    <div class="geral content">
        <main>
            <div class="mx-5 my-3">
                <span class="color-cinza">
                    Os campos com * são obrigatório<br>
                    Apenas números nos documentos.
                </span>
            </div>

            <form id="formCadastroContratante" action="sql/insert-tbcontratante.php" onsubmit="return validarCadastro()" method="POST" class="mx-5 my-3 ls-form" data-ls-module="form">
                <div class="btn my-4">
                    <!-- Botão voltar para Cadastro -->
                    <a class="btn btn-login" href="cadastro.php">Voltar</a>
                </div>

                <div class="row">
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classNome">
                                <b class="ls-label-text">Nome Completo*</b>
                                <input name="txNome" id="txNome" type="text" class="form-control" onkeyup="validarNome();" minlength="6" maxlength="60">
                                <small class="ls-help-message" id="avisoNome"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classTelefone">
                                <b class="ls-label-text">Telefone*</b>
                                <input name="txTelefone" id="txTelefone" type="tel" maxlength="11" onkeyup="validarTelefone();" class="form-control ls-mask-phone9_with_ddd" onkeyup="validarTelefone(this.value);" placeholder="(99) 99999-9999">
                                <small class="ls-help-message" id="avisoTelefone"></small>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classEmail">
                                <b class="ls-label-text">Email*</b>
                                <input name="txEmail" id="txEmail" type="email" class="form-control" maxlength="60">
                                <small class="ls-help-message" id="avisoEmail"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classDtNascimento">
                                <b class="ls-label-text">Data de Nascimento*</b>
                                <input type="date" name="txDtNascimento" id="txDtNascimento" onkeyup="validarDtNascimento();" class="form-control">
                                <small class="ls-help-message" id="avisoDtNacismento"></small>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classCnpj">
                                <b class="ls-label-text">CNPJ</b>
                                <input name="txCnpj" id="txCnpj" type="tel" class="form-control ls-mask-cnpj" onkeyup="validarCNPJ(this.value);" maxlength="14" placeholder="00.000.000/0000-00">
                                <small class="ls-help-message" id="avisoCnpj"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classCpf">
                                <b class="ls-label-text">CPF*</b>
                                <input name="txCpf" id="txCpf" type="tel" class="form-control ls-mask-cpf" minlength="11" maxlength="11" onkeyup="validarCPF(this.value);" placeholder="000.000.000-00">
                                <small class="ls-help-message" id="avisoCpf"></small>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classCep">
                                <b class="ls-label-text">CEP*</b>
                                <input name="txCep" id="txCep" type="tel" class="form-control ls-mask-cep" maxlength="8" onkeyup="pesquisacep(this.value);" placeholder="00000-000">
                                <small class="ls-help-message" id="avisoCep"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Rua*</b>
                                <input name="txLogradouro" id="txLogradouro" type="text" class="form-control" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Bairro*</b>
                                <input name="txBairro" id="txBairro" type="text" class="form-control" maxlength="100" readonly>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classComplementoEndereco">
                                <b class="ls-label-text">Complemento do Endereço</b>
                                <input name="txComplementoEndereco" id="txComplementoEndereco" type="text" class="form-control" maxlength="100">
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Cidade*</b>
                                <input name="txCidade" id="txCidade" type="text" class="form-control" readonly>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Uf*</b>
                                <input name="txUf" id="txUf" type="text" class="form-control" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classSenha">
                                <b class="ls-label-text">Senha*</b>
                                <div class="ls-prefix-group">
                                    <input type="password" name="txSenha" id="txSenha" class="form-control" onkeyup="validarSenha();" minlength="6" maxlength="25">
                                    <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#txSenha" minlength="6" maxlength="25">
                                    </a>
                                </div>
                                <small class="ls-help-message" id="avisoSenha"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classConfirmarSenha">
                                <b class="ls-label-text">Confirmar Senha*</b>
                                <input type="password" name="txConfirmarSenha" id="txConfirmarSenha" class="form-control" onkeyup="validarSenha();" type="text" minlength="6" maxlength="25">
                                <small class="ls-help-message" id="avisoConfirmarSenha"></small>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="btn my-4">
                    <!--Botão Enviar -->
                    <input class="btn btn-login" type="submit" value="Cadastrar">
                </div>
            </form>
        </main>
        <!-- Chamando o rodapé -->
        <?php include_once("include/footer.php"); ?>
        <script>
            src = "https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"
        </script>
        <script type="text/javascript" src="js/validarCep.js"></script>
        <script type="text/javascript" src="js/validarCnpj.js"></script>
        <script type="text/javascript" src="js/validarCpf.js"></script>
        <script type="text/javascript" src="js/validarDtNascimento.js"></script>
        <script type="text/javascript" src="js/validarEmail.js"></script>
        <script type="text/javascript" src="js/validarSenha.js"></script>
        <script type="text/javascript" src="js/validarTelefone.js"></script>
    </div>
</body>

</html>