<?php
include './logic.php';
include './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= TITULO ?></title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
</head>

<body>
    <div id="quantidade-pessoas">
        <div class="texto"><?= count(Pessoa::$list) ?></div>
    </div>
    <h1 id="pg-titulo"><?= TITULO ?></h1>
    <div id="pessoa-card-area">
        <?php Pessoa::printAll(); ?>
    </div>
</body>

</html>