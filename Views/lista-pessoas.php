<?php
global $peopleList;
global $summaryInfo;
global $currentPage;

$indexInicial = $summaryInfo['indexInicial'];
$indexFinal = $summaryInfo['indexFinal'];
$quantidadePaginas = $summaryInfo['quantidadePaginas'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de pessoas</title>
    <link rel="stylesheet" href="http://localhost/cadastro-de-pessoas/css/style.css">
    <link rel="shortcut icon" href="http://localhost/cadastro-de-pessoas/img/estudando.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0">
    <script src="http://localhost/cadastro-de-pessoas/javascript/script.js" defer></script>
</head>

<body>
    <?php include 'menu.php'; ?>
    <div id="add-pessoas" class="btn-flutuante"></div>
    <h1 id="pg-titulo">Pessoas</h1>
    <div id="pessoa-card-area">
        <?php
        /* Gerando pessoas */
        foreach ($peopleList as $people) :
        ?>
            <div class="pessoa-card cartao-flutuante">
                <div class="id-user"><?= htmlentities($people['user_id']) ?></div>

                <div class="dado">
                    <label class="data-name">Nome</label>
                    <label class="data-content"><?= htmlentities($people['user_nome']) ?></label>
                </div>

                <div class="dado">
                    <label class="data-name">Sobrenome</label>
                    <label class="data-content"><?= htmlentities($people['user_sobrenome']) ?></label>
                </div>

                <div class="dado">
                    <label class="data-name">Genero</label>
                    <label class="data-content"><?= htmlentities($people['user_genero']) ?></label>
                </div>

                <div class="dado">
                    <label class="data-name">Idade</label>
                    <label class="data-content"><?= htmlentities($people['user_idade']) ?></label>
                </div>

                <div class="dado">
                    <label class="data-name">Frase</label>
                    <label class="data-content"><?= htmlentities($people['user_frase']) ?></label>
                </div>

            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div id="lista-paginas">
        <?php
        $href = $currentPage == 1 ? '' : ' href = "/cadastro-de-pessoas/pessoa/pagina/' . ($currentPage - 1) . '"';
        echo ('<a class = "item-sumario seta"' . $href . '>&lt;</a>');

        for ($i = $indexInicial; $i <= $indexFinal; $i++) {
            $class = 'class = "item-sumario numero' . ($i == ($currentPage) ? ' pg-selecionada' : '') . '"';
            $href = 'href = "/cadastro-de-pessoas/pessoa/pagina/' . $i . '"';
            echo "<a $class $href>$i</a>";
        }

        $href = $currentPage == $quantidadePaginas ? '' : ' href = "/cadastro-de-pessoas/pessoa/pagina/' . ($currentPage + 1) . '"';
        echo ('<a class = "item-sumario seta"' . $href . '>&gt;</a>');
        ?>
    </div>
</body>

</html>