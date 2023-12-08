<?php

require_once  __DIR__ . '/../models/Venda.php';
require_once  __DIR__ . '/../models/Produto.php';
class VendaController extends Venda
{
    public function index()
    {
        require_once __DIR__ . '/../views/index.php';
    }

    public static function listarDadoUnico(array $data)
    {
        $dadosVenda = [];

        if (!empty($data)) {
            $dadosVenda = self::buscar([
                'select' => 'VENDA.id AS protocolo, VENDA.cliente_nome, USUARIO.usuario, PRODUTO.produto_nome, PRODUTO_TIPO.produto_valor, PRODUTO_TIPO.produto_imposto, COUNT(VENDA_PRODUTO.produto_id) AS quantidade_produto',
                'from' => 'VENDA',
                'joins' => 'INNER JOIN VENDA_PRODUTO ON VENDA_PRODUTO.venda_id = VENDA.id
                            INNER JOIN PRODUTO ON PRODUTO.id = VENDA_PRODUTO.produto_id
                            INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id
                            INNER JOIN USUARIO ON VENDA.usuario_id = USUARIO.id',
                'where' => 'VENDA.id = ' . $data['id_venda'],
                'group' => 'VENDA.id, VENDA.cliente_nome, USUARIO.usuario, PRODUTO.produto_nome, PRODUTO_TIPO.produto_valor, PRODUTO_TIPO.produto_imposto'
            ]);
        }

        require_once __DIR__ . '/../views/venda/venda-dados-listar.php';
    }

    public static function venda_listar(array $data)
    {
        if (!empty($data)) {
            $vendaLista = self::buscar([
                'select' => 'VENDA.id AS protocolo, VENDA.cliente_nome, PRODUTO_TIPO.produto_valor, PRODUTO_TIPO.produto_imposto',
                'from' => 'VENDA',
                'joins' => '
                INNER JOIN VENDA_PRODUTO ON VENDA_PRODUTO.venda_id = VENDA.id
                INNER JOIN PRODUTO ON PRODUTO.id = VENDA_PRODUTO.produto_id
                INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id
                ',
                'where' => 'VENDA.id = ' . $data['id_objeto']
            ]);
        }
        if (!empty($vendaLista)) {
            return $vendaLista;
        }
    }

    public static function venda_cadastrar(array $data)
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

            $produtoDados = Produto::buscar([
                'select' => 'PRODUTO.produto_nome AS Produto, PRODUTO_TIPO.produto_valor AS Valor, PRODUTO_TIPO.produto_imposto AS Imposto',
                'from' => 'PRODUTO',
                'joins' => 'INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id',
                'where' => 'PRODUTO.id != ' . "0"
            ]);

            require_once __DIR__ . '/../views/venda/venda-cadastrar.php';
        }
    }
}
