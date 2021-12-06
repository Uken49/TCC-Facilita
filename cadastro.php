<?php include_once("valida-sentinela.php") ?>
<!DOCTYPE html>
<html lang="pt-br">

<?php include_once("include/head.php"); ?>

<head>
    <title>EmpregaKi - Cadastro</title>
</head>

<body>
    <div class="geral content">
        <?php include_once("include/header.php"); ?>
        <main class="principal">
            <article class="flex gap-10 flex-row my-5">
                <section class="flex justify-center">
                    <figure class="decoracao-cadastro">
                        <img src="img/site/slogan.png">
                    </figure>
                </section>
                <!-- lembrete -->
                <aside class="aside form-daora externo-login">
                    <div class="area-cadastro">
                        <a href="cadastro-profissional.php">PROFISSIONAL</a>
                        <a href="cadastro-contratante.php">CONTRATANTE</a>
                    </div>

                    <section class="flex flex-row justify-center my-3">
                        <a href="login.php">
                            <button class="btn btn-login">
                                LOGIN
                            </button>
                        </a>
                    </section>

                </aside>
                <!-- lembrete -->
            </article>
        </main>
        <?php include_once("include/footer.php"); ?>
    </div>
</body>

</html>