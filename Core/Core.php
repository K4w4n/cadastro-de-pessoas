<?php
class Core
{
    public function __construct()
    {
        $home = ['Home', 'index'];

        $url = $_GET['url'] ?? '';

        $urlVazia = !isset($url) || empty($url);

        $url = $urlVazia ? $home : explode('/', $url);

        $url[0] = ucfirst(strtolower($url[0]));

        $controller = $url[0] . 'Controller';

        array_shift($url);

        $method = $url[0] ? $url[0] : 'index';

        array_shift($url);

        $haveParam = ((count($url) > 0) && !(empty($url) || ($url[0] === '')));

        $params = $haveParam ? $url : [];

        $dirFile = '/Controllers/' . $controller . '.php';

        if (!file_exists($dirFile) && !method_exists($controller, $method)) {
            $controller = 'ErroController';
            $method = 'index';
        }

        $c = new $controller;

        call_user_func_array([$c, $method], $params ?? []);
    }
}
