<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br">
<?php include_once("include/head.php"); ?>

<head>
    <title>Facilita+ - Login</title>
</head>

<body>
    <div class="geral content">
        <?php include_once("include/header.php"); ?>
        <main class="principal">
            <article class="flex flex-row gap-5 my-5">
                <section class="my-5">
                </section>
                <figure class="decoracao-login">
                    <img align="center" class="slogan" src="img/site/login.png">
                </figure>
                <aside class="aside form-daora externo-login">
                    <section class="login-form">
                        <form name="login" id="login" action="valida-login.php" method="POST">
                            <div class="row input-group">
                                <div class="row-5">
                                    <label class="ls-label">
                                        <b class="ls-label-text">Email</b>
                                        <input type="text" name="email" id="email">
                                    </label>
                                </div>
                                <div class="row-5">
                                    <label class="ls-label">
                                        <b class="ls-label-text">Senha</b>
                                        <div class="ls-prefix-group">
                                            <input type="password" name="senha" id="senha">
                                            <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#senha">
                                            </a>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <input type="submit" value="ENVIAR" class="btn btn-login">
                            </div>
                        </form>
                    </section>
                    
                    <section class="flex justify-center my-3">
                        <a href="cadastro.php">
                            <button class="btn btn-login">
                                CADASTRAR
                            </button>
                        </a>
                    </section>
                </aside>
            </article>
        </main>
        <?php include_once("include/footer.php"); ?>
    </div>
</body>

</html>