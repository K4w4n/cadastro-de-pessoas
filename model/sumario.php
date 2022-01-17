<?php
function sumarioPaginas($paginaAtual, $quantidadePaginas)
{
    $paginaAtual++;
    if ($paginaAtual <= 5) {
        $indexInicial = 1;
        if ($quantidadePaginas < ($indexInicial + 9)) {
            $indexFinal = $quantidadePaginas;
        } else {
            $indexFinal = $indexInicial + 9;
        }
    } elseif (($paginaAtual + 5) <= $quantidadePaginas) {
        $indexInicial = $paginaAtual - 4;
        $indexFinal = $paginaAtual + 5;
    } else {
        $indexFinal = $quantidadePaginas;
        if (($indexFinal - 9) <= 0) {
            $indexInicial = 1;
        } else {
            $indexInicial = $indexFinal - 9;
        }
    }

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
