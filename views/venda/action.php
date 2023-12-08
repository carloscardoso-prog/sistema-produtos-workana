<?php

require_once __DIR__ . "/../../controllers/VendaController.php";
require_once __DIR__ . "/../../controllers/ProdutoController.php";

iniciaFluxoCodigo();
function iniciaFluxoCodigo()
{
    if (isset($_POST['acao'])) {

        switch ($_POST['acao']) {
            case 'busca-dados-produto':
                $dadosProduto = ProdutoController::buscar([
                    'select' => 'PRODUTO.produto_nome AS Produto, PRODUTO_TIPO.produto_imposto AS Imposto',
                    'from' => 'PRODUTO',
                    'joins' => 'INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id',
                    'where' => 'PRODUTO.produto_nome = ' . "'". $_POST['dados']['nomeProduto'] . "'"
                ]);
                
                return $dadosProduto;
                break;
            default:
                break;
        }
    }
}
