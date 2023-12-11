<?php

require_once  __DIR__ . '/../models/Produto.php';
require_once  __DIR__ . '/../controllers/TipoProdutoController.php';
class ProdutoController extends Produto
{

    public static function produto_cadastrar(array $data)
    {
        if (!empty($data)) {
            $data['dados_produto'] = self::reorganizaDadosCadastroProduto(['dadosPost' => $data['dados_produto']]);

            $produtoCadastro = self::inserir([
                'insert' => 'PRODUTO',
                'columns' => '(produto_nome, produto_tipo_id)',
                'values' => "('" . $data['dados_produto']['produto_nome'] . "', '" . $data['dados_produto']['tipo_produto'] . "')"
            ]);

            echo json_encode($produtoCadastro);
            exit();
        } else {

            $tipoProdutos = TipoProdutoController::tipo_produto_listar_todos([]);
            require_once __DIR__ . '/../views/produto/produto-cadastrar.php';
            exit();
        }
    }

    public static function buscarProdutoPorNome(array $data)
    {
        $retorno = [];

        if (!empty($data['nome_produto'])) {
            $retorno = self::buscar([
                'select' => 'PRODUTO.produto_nome AS Produto, PRODUTO_TIPO.produto_valor AS Valor, PRODUTO_TIPO.produto_imposto AS Imposto',
                'from' => 'PRODUTO',
                'joins' => 'INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id',
                'where' => 'PRODUTO.produto_nome = ' . "'" . $data['nome_produto'] . "'"
            ]);
        }

        return $retorno;
    }

    public static function buscarProdutoIdPorNome(array $data)
    {
        $retorno = [];

        if (!empty($data['nome_produto'])) {
            $retorno = self::buscar([
                'select' => 'PRODUTO.id',
                'from' => 'PRODUTO',
                'where' => 'PRODUTO.produto_nome = ' . "'" . $data['nome_produto'] . "'"
            ]);
        }

        return $retorno;
    }

    public static function reorganizaDadosCadastroProduto(array $data)
    {
        $dadosInsert = [];

        $postArray = $data['dadosPost']['dadosProduto'];

        foreach ($postArray as $item) {
            $name = $item['name'];
            $value = $item['value'];

            if ($name === 'produto[produto][produto_nome]') {
                $dadosInsert['produto_nome'] = $value;
            } elseif ($name === 'produto[produto][tipo_produto]') {
                $dadosInsert['tipo_produto'] = $value;
            }
        }

        return $dadosInsert;
    }
}
