<?php
    
require_once  __DIR__ . '/../model/Model.php';
class ProdutoController extends Model
{

    public static function listarProduto(array $data)
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

    public static function listarProdutoGeral(array $data)
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

    public static function buscarDadosProduto(array $data){
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
}