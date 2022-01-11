<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de pessoas</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
    <script src="javascript/script.js" defer></script>
</head>

<body>
    <?php
    include './conexao.php';
    include './logic.php';
    ?>
    <div id="add-pessoas">
        <div class="texto">+</div>
    </div>
    <h1 id="pg-titulo">Pessoas</h1>
    <div id="pessoa-card-area">
        <?php Pessoa::printAll(); ?>
    </div>
    <div id="lista-paginas">
        <?php sumarioPaginas($paginaAtual/10, $quantidadePaginas) ?>
    </div>
</body>

</html>