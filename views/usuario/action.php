<?php

require_once __DIR__ . "/../../controllers/UsuarioController.php";

iniciaFluxoCodigo();
function iniciaFluxoCodigo()
{
    if (isset($_POST['acao'])) {

        switch ($_POST['acao']) {
            case 'cadastrar-usuario':
                UsuarioController::usuario_cadastrar(['dados_usuario' => $_POST['dados']]);
                break;
            case 'login-usuario':
                UsuarioController::usuario_login(['dados_usuario' => $_POST['dados']]);
                break;
            case 'deslogar-usuario':
                UsuarioController::usuarioDeslogar([]);
                break;
            default:
                break;
        }
    }
}
