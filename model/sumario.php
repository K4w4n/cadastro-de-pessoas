<?php
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
