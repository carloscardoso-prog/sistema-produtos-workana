<?php

require_once  __DIR__ . '/../models/Usuario.php';
class UsuarioController extends Usuario
{
    public static function buscarUsuarioIdPorUsuario(array $data)
    {
        $retorno = [];

        if (!empty($data)) {
            $retorno = self::buscar([
                'select' => 'USUARIO.id',
                'from' => 'USUARIO',
                'where' => 'USUARIO.usuario = ' . "'" . $data['usuario'] . "'"
            ]);

            if (!empty($retorno)) {
                $retorno = $retorno[0];
            }
        }

        return $retorno;
    }

    public static function usuario_cadastrar(array $data)
    {
        if (!empty($data)) {

            $dadosUsuarioFiltrados = (self::reorganizaDadosCadastroUsuario(['dadosForm' => $data['dados_usuario']]));

            $usuarioExistente = self::buscar([
                'select' => 'USUARIO.id',
                'from' => 'USUARIO',
                'where' => 'USUARIO.usuario = ' . "'" . $dadosUsuarioFiltrados['login'] . "'"
            ]);

            if (empty($usuarioExistente)) {
                $usuarioCadastro = self::inserir([
                    'insert' => 'USUARIO',
                    'columns' => '(usuario, senha)',
                    'values' => "('" . $dadosUsuarioFiltrados["login"] . "', '" . password_hash($dadosUsuarioFiltrados['password'], PASSWORD_DEFAULT) . "')"
                ]);

                echo json_encode($usuarioCadastro);
                exit();
            } else {
                echo json_encode('ERRO: USER EXISTENTE');
                exit();
            }
        } else {
            require_once __DIR__ . '/../views/usuario/usuario-cadastrar.php';
            exit();
        }
    }

    public static function usuario_login(array $data)
    {
        if (!empty($data)) {

            $dadosUsuarioFiltrados = (self::reorganizaDadosCadastroUsuario(['dadosForm' => $data['dados_usuario']]));

            $usuarioDados = self::buscar([
                'select' => 'USUARIO.id, USUARIO.usuario, USUARIO.senha',
                'from' => 'USUARIO',
                'where' => 'USUARIO.usuario = ' . "'" . $dadosUsuarioFiltrados['login'] . "'"
            ]);

            if (!empty($usuarioDados) && !empty($dadosUsuarioFiltrados)) {
                if (password_verify($dadosUsuarioFiltrados['password'], $usuarioDados[0]['senha'])) {
                    session_start();
                    $_SESSION["usuario"] = $dadosUsuarioFiltrados['login'];
                    $_SESSION["usuarioLoginRecente"] = true;
                    
                    echo json_encode($usuarioDados);
                    exit();
                }
            }

            echo json_encode("ERRO: DADOS INCORRETOS");
            exit();
        } else {
            require_once __DIR__ . '/../views/usuario/usuario-login.php';
            exit();
        }
    }

    public static function reorganizaDadosCadastroUsuario(array $data)
    {
        $dadosInsert = [];

        $postArray = $data['dadosForm']['dadosUsuario'];

        foreach ($postArray as $item) {
            $name = $item['name'];
            $value = $item['value'];

            if ($name === 'usuario[usuario][login]') {
                $dadosInsert['login'] = $value;
            } elseif ($name === 'usuario[usuario][password]') {
                $dadosInsert['password'] = $value;
            }
        }

        return $dadosInsert;
    }

    public static function usuarioDeslogar(array $data)
    {
        session_start();
        if (!empty($_SESSION)) {
            session_unset();
            session_destroy();
        }
        echo json_encode("Sessão finalizada");
    }
}
