<?php

require_once  __DIR__ . '/../model/Model.php';
class VendaController extends Model
{

    public static function listarVenda(array $data)
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
    public static function listarVendaUnica(array $data)
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
                'where' => 'VENDA.id = ' . $data['id_objeto']
            ]);
        }
        if (!empty($vendaLista)) {
            return $vendaLista;
        }
    }

    public static function cadastrarVenda(array $data)
    {
        print_r("me chama de maconheiro");
        parse_str($data['dadosForm'],$arrayResultado);
        print_r($arrayResultado);
        die;
        if (!empty($data)) {

            foreach ($data['dadosForm'] as $chaveDado => $dadoInserir) {
                
            }

            $vendaCadastro = self::inserir([
                'insert' => 'VENDA',
                'columns' => 'cliente_nome, venda_data, usuario_id'
                // 'values' =>
            ]);
        }
    }
}
