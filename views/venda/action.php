<?php

require_once __DIR__ . "/../../controllers/VendaController.php";
require_once __DIR__ . "/../../controllers/ProdutoController.php";

iniciaFluxoCodigo();
function iniciaFluxoCodigo()
{
    if (isset($_POST['acao'])) {

        switch ($_POST['acao']) {
            case 'busca-dados-produto':
                $dadosProduto = ProdutoController::buscarProdutoPorNome(['nome_produto' => $_POST['dados']['nomeProduto']]);
                $contador = $_POST['dados']['contador'];

                require_once __DIR__ . '/produto-listagem-cadastro.php';
                break;
            case 'cadastrar-venda':
                VendaController::venda_cadastrar(['dados_venda' => $_POST['dados']]);
                break;
            default:
                break;
        }
    }
}
