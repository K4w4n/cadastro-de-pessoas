<?php

/**
 * Classe responsavel por validar os dados da aplicação, caso algum erro seja 
 * encontrado durante a validação será retornada uma instancia da classe ErrorMenssage,
 * se nenhum erro for encontrado nada será retornado.
 */
class Validator
{
    /** 
     * Valida o nome
     * @param string $name 
     * @return ErrorMenssage|null
     */

    public static function name($name)
    {
        if (!$name)
            return new ErrorMenssage('Nome invalido', 0, 'Nomes não podem estar em branco');

        if (strlen($name) < 3)
            return new ErrorMenssage('Nome invalido', 100, 'Nome muito curto, ele deve ter pelo menos 3 caracteres');
        if (strlen($name) > 100)
            return new ErrorMenssage('Nome invalido', 200, 'Nome muito longo, ele deve ter no máximo 100 caracteres');
    }

    /** 
     * Valida o sobrenome
     * @param string $surname
     * @return ErrorMenssage|null
     */

    public static function surname($surname)
    {
        if (!$surname)
            return new ErrorMenssage('Sobrenome invalido', 1, 'Sobrenomes não podem estar em branco');

        if (strlen($surname) < 3)
            return new ErrorMenssage('Sobrenome invalido', 101, 'Sobrenome muito curto, ele deve ter pelo menos 3 caracteres');

        if (strlen($surname) > 100)
            return new ErrorMenssage('Sobrenome invalido', 201, 'Sobrenome muito longo, ele deve ter no máximo 100 caracteres');
    }

    /** 
     * Valida o genero
     * @param string $gender
     * @return ErrorMenssage|null
     */

    public static function gender($gender)
    {
        if (!$gender)
            return new ErrorMenssage('Genero invalido', 2, 'Generos não podem estar em branco');

        $allowedGenres = ['masculino', 'feminino', 'outro', 'nao dizer'];

        if (!in_array($gender, $allowedGenres))
            return new ErrorMenssage('Genero invalido', 1000, 'O genero informado não esta entre as opções possiveis');
    }

    /** 
     * Valida a idade
     * @param int $age
     * @return ErrorMenssage|null
     */

    public static function age($age)
    {
        if (!$age && !($age == 0))
            return new ErrorMenssage('Idade invalida', 3, 'A idade não pode estar em branco');

        if ($age < 0)
            return new ErrorMenssage('Idade invalida', 102, 'A idade deve ser maior ou igual há 0');

        if ($age > 150)
            return new ErrorMenssage('Idade invalida', 202, 'A idade deve ser menor ou igual há 150');
    }

    /** 
     * Valida a frase
     * @param string $phrase
     * @return ErrorMenssage|null
     */

    public static function phrase($phrase)
    {
        if (!strlen($phrase))
            return new ErrorMenssage('Frase invalida', 4, 'Frases não podem estar em branco');

        if (str_word_count($phrase) < 2)
            return new ErrorMenssage('Frase invalida', 103, 'A frase precisa ter no minimo duas palavras');

        if (strlen($phrase) > 200)
            return new ErrorMenssage('Frase invalida', 203, 'Frases não podem ultrapassar 200 palavras');
    }
}
