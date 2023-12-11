<?php

require_once __DIR__ . "/../../controllers/VendaController.php";
require_once __DIR__ . "/../../controllers/ProdutoController.php";
require_once __DIR__ . "/../../controllers/TipoProdutoController.php";

iniciaFluxoCodigo();
function iniciaFluxoCodigo()
{
    if (isset($_POST['acao'])) {

        switch ($_POST['acao']) {
            case 'cadastrar-produto':
                ProdutoController::produto_cadastrar(['dados_produto' => $_POST['dados']]);
                break;
            default:
                break;
        }
    }
}
