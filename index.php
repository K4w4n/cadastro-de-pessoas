<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de pessoas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
</head>

<body>
    <?php
    include './conexao.php';
    include './logic.php';
    ?>
    <div id="quantidade-pessoas">
        <div class="texto"><?= count(Pessoa::$list) ?></div>
    </div>
    <h1 id="pg-titulo">Pessoas</h1>
    <div id="pessoa-card-area">
        <?php Pessoa::printAll(); ?>
    </div>
</body>

</html>