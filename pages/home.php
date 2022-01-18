<?php
$paginaAtual = (isset($_GET['pg']) ? intval($_GET['pg']) - 1 : 0) * 10;
if ($paginaAtual < 0) : include '404.php';
else :
    include 'model\conexao.php';
    include 'model\Pessoa.php';

    $conexaoDb = conectarBd();
    /* Obtendo quantidade de paginas */
    $sql = 'SELECT COUNT(*) AS quantidade FROM tb_pessoas';
    $stmt = $conexaoDb->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_object();
    $quantidadePaginas = ceil(($result->quantidade) / 10);

    if ($quantidadePaginas < ($paginaAtual / 10 + 1)) : include '404.php';
    else :
        /* Obtendo uma pagina de dados */
        $sql = "SELECT * FROM tb_pessoas LIMIT ?, 10;";
        $stmt = $conexaoDb->prepare($sql);
        $stmt->bind_param('i', $paginaAtual);
        $stmt->execute();
        $listaPessoas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $paginaAtual /= 10;

        /* Gerando pessoas */
        foreach ($listaPessoas as $pessoa) {
            new Pessoa(
                $pessoa['user_id'],
                $pessoa['user_nome'],
                $pessoa['user_sobrenome'],
                $pessoa['user_genero'],
                $pessoa['user_idade'],
                $pessoa['user_frase']
            );
        }
?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <title>Lista de pessoas</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="shortcut icon" href="img/estudando.png" type="image/x-icon">
            <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0">
            <script src="javascript/script.js" defer></script>
        </head>

        <body>
            <?php include 'componentes/menu.php'; ?>
            <div id="add-pessoas" class="btn-flutuante"></div>
            <h1 id="pg-titulo">Pessoas</h1>
            <div id="pessoa-card-area">
                <?php Pessoa::printAll(); ?>
            </div>
            <div id="lista-paginas">
                <?php sumarioPaginas($paginaAtual, $quantidadePaginas) ?>
            </div>
        </body>

        </html>
    <?php endif ?>
<?php endif ?>