<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("include/head.php"); ?>
<!-- Chamando uma parte do head -->

<head>
    <title>Facilita+ - Cadastro</title>
</head>
<script>
    <?php
    include_once("js/validarCep.js");
    include_once("js/validarCnpj.js");
    include_once("js/validarCpf.js");
    include_once("js/validarSenha.js");
    include_once("js/validarTelefone.js");
    ?>
</script>

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

            <form id="form-cadastro-profissional" action="sql/insert-tbprofissional.php" method="POST" class="mx-5 my-3 ls-form" data-ls-module="form">
                <div class="btn my-4">
                    <!-- Botão voltar para Cadastro -->
                    <a class="btn btn-login" href="cadastro.php">Voltar</a>
                </div>

                <div class="row">
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Nome Completo*</b>
                                <input type="text" name="txNome" id="txNome" class="form-control" minlength="3" maxlength="60" required>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classTelefone">
                                <b class="ls-label-text">Telefone*</b>
                                <input type="tel" name="txTelefone" id="txTelefone" class="form-control ls-mask-phone9_with_ddd" onkeyup="validarTelefone(this.value);" placeholder="(99) 99999-9999" minlength="8" maxlength="11" required>
                                <small class="ls-help-message" id="avisoTelefone"></small>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Email*</b>
                                <input type="email" name="txEmail" id="txEmail" class="form-control" maxlength="60" required>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Data de Nascimento*</b>
                                <input type="date" name="txDtNascimento" id="txDtNascimento" class="form-control" required>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">RG*</b>
                                <input type="tel" name="txRg" id="txRg" class="form-control" minlength="6" maxlength="14" required>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classCpf">
                                <b class="ls-label-text">CPF*</b>
                                <input type="tel" name="txCpf" id="txCpf" class="form-control ls-mask-cpf" maxlength="11" onkeyup="validarCPF(this.value);" placeholder="000.000.000-00" required>
                                <small class="ls-help-message" id="avisoCpf"></small>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label" id="classCep">
                                <b class="ls-label-text">CEP*</b>
                                <input type="tel" name="txCep" id="txCep" class="form-control ls-mask-cep" maxlength="8" onkeyup="pesquisacep(this.value);" placeholder="00000-000" required>
                                <small class="ls-help-message" id="avisoCep"></small>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Rua*</b>
                                <input type="text" name="txLogradouro" id="txLogradouro" class="form-control" readonly>
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Bairro*</b>
                                <input type="text" name="txBairro" id="txBairro" class="form-control" readonly>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Complemento do Endereço</b>
                                <input type="text" name="txComplementoEndereco" id="txComplementoEndereco" class="form-control" maxlength="100">
                            </label>
                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Cidade*</b>
                                <input type="text" name="txCidade" id="txCidade" class="form-control" readonly>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Uf*</b>
                                <input type="text" name="txUf" id="txUf" class="form-control" readonly>
                            </label>

                        </div>
                    </div>
                    <div class="row input-group mb-3">
                        <div class="col-5">
                            <label class="ls-label">
                                <b class="ls-label-text">Senha*</b>
                                <div class="ls-prefix-group">
                                    <input type="password" name="txSenha" id="txSenha" class="form-control" minlength="6" maxlength="25">
                                    <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#txSenha" minlength="6" maxlength="25" required>
                                    </a>
                                </div>
                            </label>
                        </div>
                        <div class="col-5">
                            <label class="ls-label" id="classConfirmarSenha">
                                <b class="ls-label-text">Confirmar Senha*</b>
                                <input type="password" name="txConfirmarSenha" id="txConfirmarSenha" class="form-control" onkeyup="validarSenha();" type="text" minlength="6" maxlength="25" required>
                                <small class="ls-help-message" id="avisoConfirmarSenha"></small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="btn my-4">
                    <!--Botão Enviar os dados para cadastrar -->
                    <input class="btn btn-login" type="submit" value="Cadastrar">
                </div>
            </form>
        </main>
        <!-- Chamando o rodapé -->
        <?php include_once("include/footer.php"); ?>
    </div>

</body>

</html>