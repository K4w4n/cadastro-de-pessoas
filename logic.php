<?php
function printDado($dataName, $dataContent)
{
?>
    <div class="dado">
        <label class="data-name"><?= htmlentities($dataName) ?>: </label>
        <label class="data-content"><?= htmlentities($dataContent) ?></label>
    </div>
    <?php
}

class Pessoa
{
    public static $list = [];
    public static function printAll()
    {
        foreach (self::$list as $pessoaSelecionada) :
    ?>
            <div class="pessoa-card cartao-flutuante">
                <div class="id-user"><?= htmlentities($pessoaSelecionada->id) ?></div>
                <?php
                printDado("Nome", $pessoaSelecionada->nome);
                printDado("Sobrenome", $pessoaSelecionada->sobrenome);
                printDado("Genero", $pessoaSelecionada->genero);
                printDado("Idade", $pessoaSelecionada->idade);
                printDado('Frase', $pessoaSelecionada->frase);
                ?>
            </div>
<?php
        endforeach;
    }
    function __construct($id, $novoNome, $novoSobrenome, $novoGenero, $novaIdade, $novaFrase)
    {
        $this->nome = $novoNome;
        $this->sobrenome = $novoSobrenome;
        $this->genero = $novoGenero;
        $this->idade = $novaIdade;
        $this->frase = $novaFrase;
        self::$list[] = $this;
        $this->id = $id;
    }
}
function sumarioPaginas($paginaAtual, $quantidadePaginas)
{
    $paginaAtual++;

    $indexInicial = ($paginaAtual <= 5) ? 1 : ($paginaAtual - 4);
    $indexFinal = ($indexInicial + 9) <= $quantidadePaginas ? ($indexInicial + 9) : $quantidadePaginas;

    $href = $paginaAtual == 1 ? '' : ' href = "?pg=' . ($paginaAtual - 1) . '"';
    echo ('<a class = "item-sumario seta"' . $href . '>&lt;</a>');

    for ($i = $indexInicial; $i <= $indexFinal; $i++) {
        $class = 'class = "item-sumario numero' . ($i == ($paginaAtual) ? ' pg-selecionada' : '') . '"';
        $href = 'href = "?pg=' . $i . '"';
        echo "<a $class $href>$i</a>";
    }

    $href = $paginaAtual == $quantidadePaginas ? '' : ' href = "?pg=' . ($paginaAtual + 1) . '"';
    echo ('<a class = "item-sumario seta"' . $href . '>&gt;</a>');
}

$sql = 'SELECT COUNT(*) AS quantidade FROM tb_pessoas';
$stmt = $conection->prepare($sql);
$stmt->execute();
$result = $stmt->get_result()->fetch_object();
$quantidadePaginas = ceil(($result->quantidade) / 10);


$sql = "SELECT * FROM tb_pessoas LIMIT ?, 10;";
$stmt = $conection->prepare($sql);
$paginaAtual = (isset($_GET['pg']) ? intval($_GET['pg']) - 1 : 0) * 10;
$stmt->bind_param('i', $paginaAtual);
$paginaAtual /= 10;
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

foreach ($result as $pessoa) {
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