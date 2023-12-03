<?php

require_once  __DIR__ . '/../controller/ProdutoController.php';
require_once  __DIR__ . '/../controller/VendaController.php';

iniciaFluxoCodigo();
function iniciaFluxoCodigo()
{
    if (isset($_POST['acao'])) {
        $idObjeto = "";
        $dadosForm = "";

        if (isset($_POST['dados']['idObjeto'])) {
            $idObjeto = $_POST['dados']['idObjeto'];
        }

        if (isset($_POST['dados']['formData'])) {
            $dadosForm = $_POST['dados']['formData'];
        }

        // if (isset($_POST[])) {
        // }

        $arquivo = $_POST['dados']['arquivo'];
        $funcao = $_POST['dados']['funcao'];

        $class = ucfirst($arquivo) . 'Controller';

        switch ($_POST['acao']) {
            case 'listar':
                echo json_encode($class::$funcao(['id_objeto' => $idObjeto]));
                break;
            case 'excluir':

                break;
            case 'inserir':
                echo json_encode($class::$funcao(['dadosForm' => $dadosForm]));
                break;
            case 'atualizar':

                break;
            case 'append-arquivo':
                // '/../view/form/produto-lista.php'
                require_once  __DIR__ . $_POST['dados']['rota'];
                break;
            default:
                break;
        }
    }
}
