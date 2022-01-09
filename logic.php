<?php
function printDado($dataName, $dataContent)
{
?>
    <div class="dado">
        <label class="data-name"><?= $dataName ?>: </label>
        <label class="data-content"><?= $dataContent ?></label>
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
            <div class="pessoa-card">
                <div class="id-user"><?= $pessoaSelecionada->id ?></div>
                <?php
                printDado("Nome", $pessoaSelecionada->nome);
                printDado("Sobrenome", $pessoaSelecionada->sobrenome);
                printDado("Genero", $pessoaSelecionada->genero);
                printDado("Idade", $pessoaSelecionada->idade);
                PrintDado('Frase', "Olá, meu nome é $pessoaSelecionada->nome $pessoaSelecionada->sobrenome, tenho $pessoaSelecionada->idade anos.");
                ?>
            </div>
        <?php
        endforeach;
    }
    function __construct($novoNome, $novoSobrenome, $novoGenero, $novaIdade)
    {
        $this->nome = $novoNome;
        $this->sobrenome = $novoSobrenome;
        $this->genero = $novoGenero;
        $this->idade = $novaIdade;
        self::$list[] = $this;
        $this->id = count(self::$list);
    }
    public function print()
    {
        ?>
        <div class="pessoa-card">
            <?php
            printDado("Nome", $this->nome);
            printDado("Sobrenome", $this->sobrenome);
            printDado("Genero", $this->genero);
            printDado("Idade", $this->idade);
            ?>
        </div>
<?php
    }
}

new Pessoa("Kawan", "Araújo", "M", 18);
new Pessoa("João Vitor", "Pinheiro", "M", 17);
new Pessoa("zaias", "Roberto", "M", 18);
new Pessoa("Queque", "Santos", "F", 18);
define('TITULO', 'Fundamentos basicos');
?>