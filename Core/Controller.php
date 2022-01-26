<?php
class Controller
{
    public $dados;
    public function __construct()
    {
        $this->dados = array();
    }/* 
    public function carregarTemplate($nomeView, $dadosModel = [])
    {
        $this->dados = $dadosModel;
        require 'Views/template.php';
    } */
    public function loadView($viewName, $modelData = [])
    {
        extract($modelData);
        require 'Views/' . $viewName . '.php';
    }
}
