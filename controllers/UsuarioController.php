<?php

require_once  __DIR__ . '/../models/Usuario.php';
class UsuarioController extends Usuario
{
    public function index()
    {
        require_once __DIR__ . '/../views/index.php';
    }

    public static function buscarUsuarioIdPorUsuario(array $data)
    {
        $retorno = [];

        if (!empty($data)) {
            $retorno = self::buscar([
                'select' => 'USUARIO.id',
                'from' => 'USUARIO',
                'where' => 'USUARIO.usuario = ' . "'" . $data['usuario'] . "'"
            ]);

            if(!empty($retorno)){
                $retorno = $retorno[0];
            }
        }

        return $retorno;
    }

    public static function usuario_cadastrar(array $data)
    {
        if (!empty($data)) {

            print_r($data);
            parse_str($data['dadosForm'], $arrayResultado);
            die;
            foreach ($data['dadosForm'] as $chaveDado => $dadoInserir) {
            }

            $vendaCadastro = self::inserir([
                'insert' => 'VENDA',
                'columns' => 'cliente_nome, venda_data, usuario_id'
                // 'values' =>
            ]);
        } else {
            require_once __DIR__ . '/../views/venda/venda-cadastrar.php';
        }
    }

    public static function usuario_login(array $data)
    {
        if (!empty($data)) {

            print_r($data);
            parse_str($data['dadosForm'], $arrayResultado);
            die;
            foreach ($data['dadosForm'] as $chaveDado => $dadoInserir) {
            }

            $vendaCadastro = self::inserir([
                'insert' => 'VENDA',
                'columns' => 'cliente_nome, venda_data, usuario_id'
                // 'values' =>
            ]);
        } else {
            require_once __DIR__ . '/../views/usuario/usuario-login.php';
        }
    }
}
