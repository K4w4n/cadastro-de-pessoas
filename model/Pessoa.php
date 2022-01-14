<?php
include 'sumario.php';
include 'print-dado.php';

class Pessoa
{
    public static $list = [];
    function __construct($id, $novoNome, $novoSobrenome, $novoGenero, $novaIdade, $novaFrase)
    {
        $this->id = $id;
        $this->nome = $novoNome;
        $this->sobrenome = $novoSobrenome;
        $this->genero = $novoGenero;
        $this->idade = $novaIdade;
        $this->frase = $novaFrase;
        self::$list[] = $this;
    }
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
}
?>