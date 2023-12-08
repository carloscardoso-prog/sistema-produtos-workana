<?php

require_once  __DIR__ . '/../models/Usuario.php';
class UsuarioController extends Usuario
{
    public function index()
    {
        require_once __DIR__ . '/../views/index.php';
    }

    public static function usuario_listar(array $data)
    {
        if (!empty($data)) {
            $vendaLista = self::buscar([
                'select' => 'VENDA.id AS protocolo, VENDA.cliente_nome, USUARIO.usuario, PRODUTO.produto_nome, PRODUTO_TIPO.produto_valor, PRODUTO_TIPO.produto_imposto',
                'from' => 'VENDA',
                'joins' => '
                INNER JOIN VENDA_PRODUTO ON VENDA_PRODUTO.venda_id = VENDA.id
                INNER JOIN PRODUTO ON PRODUTO.id = VENDA_PRODUTO.produto_id
                INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id
                INNER JOIN USUARIO ON VENDA.usuario_id = USUARIO.id
                ',
                'where' => 'VENDA.id = ' . $data['id_venda']
            ]);
        }

        if (!empty($vendaLista)) {
            return $vendaLista;
        }
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
