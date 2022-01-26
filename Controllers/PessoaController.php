<?php

/**
 * Classe controller que define as ações que envolvem o crud dos dados de pessoas 
 */
class PessoaController extends Controller
{

    /**
     * Rota raiz da classe pessoa
     */

    public function index()
    {
        header("Location: /cadastro-de-pessoas/pessoa/pagina/1");
    }

    /**
     * Rota onde uma lista de pessoas é exibida
     * @param int $pg Numero da pagina a ser vizualizada
     */

    public function pagina($pageNumber = 1)
    {
        $pageNumber = intval($pageNumber);

        global $currentPage;
        $currentPage = $pageNumber;

        global $peopleList;
        $peopleList = People::getPage($pageNumber);

        if (empty($peopleList)) {
            $this->loadView('404');
            return;
        };

        global $summaryInfo;
        $summaryInfo = People::getSummary($pageNumber);

        $this->loadView('lista-pessoas');
    }

    /**
     * Rota de cadastro de pessoas
     */
    public function cadastro()
    {
        global $haveErro;
        global $idOrError;

        global $name;
        global $surname;
        global $gender;
        global $age;
        global $phrase;

        if (isset($_POST['submit'])) {

            $name = $_POST['nome'];
            $surname = $_POST['sobrenome'];
            $gender = $_POST['genero'];
            $age = $_POST['idade'];
            $phrase = $_POST['frase'];

            $idOrError = People::register($name, $surname, $gender, $age, $phrase);
            $haveErro = is_a($idOrError, 'ErrorMenssage');

            if (!$haveErro) header('Location: /cadastro-de-pessoas/pessoa');
        }

        $this->loadView('cadastro-pessoas');
    }
}
