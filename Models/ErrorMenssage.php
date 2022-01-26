<?php

/** Classe responsavel por armazenar as informações de erro. 
 * Por padrão, os erros são classificados da seguinte maneira:
 * * De 0 a 100 = erros que envolvem dados em branco
 * * De 101 a 200 = erros que envolvem dados menores que o permitido
 * * De 201 a 300 = erros que envolvem dados maiores que o permitido
 * * Acima de 1000 = erros não classificados
*/
class ErrorMenssage
{
    /** @var string Nome do erro */
    public $name;

    /** @var int Código do erro */
    public $code;

    /** @var string Descrição do erro */
    public $description;

    /**
     * @param string $name Nome do erro
     * @param int $code Código de erro
     * @param string $description Descrição do erro
     */

    public function __construct($name, $code, $description)
    {
        $this->name = $name;
        $this->code = $code;
        $this->description = $description;
    }
}