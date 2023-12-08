<?php

require_once  __DIR__ . '/../models/TipoProduto.php';
class TipoProdutoController extends TipoProduto
{

    public static function tipo_produto_listar(array $data)
    {
        if (!empty($data)) {
            $produtosLista = self::buscar([
                'select' => 'PRODUTO.produto_nome, PRODUTO.id',
                'from' => 'PRODUTO',
                'where' => 'PRODUTO.id = ' . $data['id_objeto']
            ]);

            if (!empty($produtosLista)) {
                return $produtosLista;
            }
        }
    }

    public static function tipo_produto_listar_todos(array $data)
    {
        if (!empty($data)) {
            $produtosLista = self::buscar([
                'select' => 'PRODUTO.produto_nome, PRODUTO.id',
                'from' => 'PRODUTO',
                'where' => 'PRODUTO.id != 0'
            ]);

            if (!empty($produtosLista)) {
                return $produtosLista;
            }
        }
    }

    public static function tipo_produto_buscar(array $data){
        $produtosLista = self::buscar([
            'select' => 'PRODUTO.produto_nome, PRODUTO.id, PRODUTO_TIPO.produto_produto_imposto , PRODUTO_TIPO.produto_valor',
            'from' => 'PRODUTO',
            'joins' => '
                INNER JOIN VENDA_PRODUTO ON VENDA_PRODUTO.venda_id = VENDA.id
                INNER JOIN PRODUTO ON PRODUTO.id = VENDA_PRODUTO.produto_id
                INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id
                ',
            'where' => 'VENDA.id = ' . $data['id_objeto']
        ]);

        if(!empty($produtosLista)){
            return $produtosLista;
        }
    }

    public static function tipo_produto_cadastrar(array $data)
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
            require_once __DIR__ . '/../views/tipo-produto/tipo-produto-cadastrar.php';
        }
    }
}