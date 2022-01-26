<?php

/** 
 * Classe responsavel por acessar os dados das pessoas no banco de dados
 */

class People
{

    /**
     * Metodo responsavel por registra a pessoa no sistema
     * @param string $name Nome da pessoa
     * @param string $surname Sobrenome da pessoa
     * @param int $age idade da pessoa
     * @param string $phrase
     * @return int|ErrorMenssage Id do usuario criado ou um erro
     */

    public static function register($name, $surname, $gender, $age, $phrase)
    {
        $name = trim($name);
        $surname = trim($surname);
        $gender = trim($gender);
        $phrase = trim($phrase);

        $error = Validator::name($name);
        if ($error) return $error;

        $error = Validator::surname($surname);
        if ($error) return $error;

        $error = Validator::gender($gender);
        if ($error) return $error;

        $error = Validator::age($age);
        if ($error) return $error;

        $error = Validator::phrase($phrase);
        if ($error) return $error;

        $conexaoDb = new Database();
        $conexaoDb = $conexaoDb->connection;

        $sql = "INSERT INTO tb_pessoas (user_nome, user_sobrenome, user_genero, user_idade, user_frase) 
        VALUES (?, ?, ?, ?, ?);";

        $stmt = $conexaoDb->prepare($sql);
        $stmt->bind_param('sssis', $name, $surname, $gender, $age, $phrase);
        $stmt->execute();

        $sql = "SELECT MAX(user_id) as id_pessoa from tb_pessoas;";
        $stmt = $conexaoDb->prepare($sql);
        $stmt->execute();

        $result = $stmt->get_result()->fetch_row()[0];

        return $result;
    }

    /**
     * Metodo responsavel por pegar uma pagina de dados do usuario
     * @param int $pageNumber Nuimero da pagina
     * @return array Lista de pessoas da pagina
     */

    public static function getPage($pageNumber = 1)
    {
        $conexaoDb = new Database();
        $conexaoDb = $conexaoDb->connection;

        $sql = "SELECT * FROM tb_pessoas LIMIT ?, 10;";
        $stmt = $conexaoDb->prepare($sql);
        $pageNumberFormated = ($pageNumber - 1) * 10;
        $stmt->bind_param('i', $pageNumberFormated);
        $stmt->execute();
        $listaPessoas = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        return $listaPessoas;
    }
    /**
     * Método responsavel por pegar os dados para a geração do sumario.
     * @return array Array com o indice inicial e final do sumario 
     */
    public static function getSummary($actualPage)
    {
        $conexaoDb = new Database();
        $conexaoDb = $conexaoDb->connection;

        $sql = 'SELECT COUNT(*) AS quantidade FROM tb_pessoas';
        $stmt = $conexaoDb->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_object();

        $quantidadePaginas = ceil(($result->quantidade) / 10);

        if ($actualPage <= 5) {

            $indexInicial = 1;

            if ($quantidadePaginas < ($indexInicial + 9)) {

                $indexFinal = $quantidadePaginas;
            } else {

                $indexFinal = $indexInicial + 9;
            }
        } elseif (($actualPage + 5) <= $quantidadePaginas) {

            $indexInicial = $actualPage - 4;
            $indexFinal = $actualPage + 5;
        } else {

            $indexFinal = $quantidadePaginas;

            if (($indexFinal - 9) <= 0) {

                $indexInicial = 1;
            } else {

                $indexInicial = $indexFinal - 9;
            }
        }
        return [
            'indexInicial' => $indexInicial,
            'indexFinal' => $indexFinal,
            'quantidadePaginas' => $quantidadePaginas,
        ];
    }
}
