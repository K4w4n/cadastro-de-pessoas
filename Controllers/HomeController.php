<?php
class HomeController extends Controller
{
    public function index()
    {
        header("Location: /pessoa/");
    }
}
