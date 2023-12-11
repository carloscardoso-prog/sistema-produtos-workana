<?php

require_once  __DIR__ . '/../models/VendaProduto.php';
class VendaProdutoController extends VendaProduto
{
    public function index()
    {
        require_once __DIR__ . '/../views/index.php';
        exit();
    }
}
