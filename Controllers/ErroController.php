<?php
class ErroController extends Controller
{
    public function index()
    {
        $this->loadView('404');
    }
}
