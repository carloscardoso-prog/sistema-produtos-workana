<?php

require_once  __DIR__ . '/../models/Produto.php';
class ProdutoController extends Produto
{
    public static function produto_buscar(array $data){
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

    public static function produto_cadastrar(array $data)
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
            require_once __DIR__ . '/../views/produto/produto-cadastrar.php';
        }
    }

    public static function buscarProdutoPorNome(array $data){
        $retorno = [];
        
        if(!empty($data['nome_produto'])){
            $retorno = self::buscar([
                'select' => 'PRODUTO.produto_nome AS Produto, PRODUTO_TIPO.produto_valor AS Valor, PRODUTO_TIPO.produto_imposto AS Imposto',
                'from' => 'PRODUTO',
                'joins' => 'INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id',
                'where' => 'PRODUTO.produto_nome = ' . "'". $data['nome_produto'] . "'"
            ]);
        }

        return $retorno;
    }
}