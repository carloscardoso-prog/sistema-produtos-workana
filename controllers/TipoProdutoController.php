<?php

require_once  __DIR__ . '/../models/TipoProduto.php';
class TipoProdutoController extends TipoProduto
{

    public static function tipo_produto_listar_todos(array $data)
    {
        $tipoProdutoLista = [];

        $tipoProdutoLista = self::buscar([
            'select' => 'PRODUTO_TIPO.tipo_nome, PRODUTO_TIPO.id',
            'from' => 'PRODUTO_TIPO',
            'where' => 'PRODUTO_TIPO.id != 0'
        ]);

        return $tipoProdutoLista;
    }

    public static function tipo_produto_cadastrar(array $data)
    {
        if (!empty($data)) {
            $data['dados_tipo_produto'] = self::reorganizaDadosCadastroTipoProduto(['dadosPost' => $data['dados_tipo_produto']]);

            $produtoTipoCadastro = self::inserir([
                'insert' => 'PRODUTO_TIPO',
                'columns' => '(tipo_nome, produto_valor, produto_imposto)',
                'values' => "('" . $data['dados_tipo_produto']['tipo_nome'] . "', '" . str_replace(',', '', number_format($data['dados_tipo_produto']['produto_valor'], 2)) . "', '" . str_replace(',', '', number_format($data['dados_tipo_produto']['produto_imposto'], 2)) . "')"
            ]);

            echo json_encode($produtoTipoCadastro);
            exit();
        } else {
            require_once __DIR__ . '/../views/tipo-produto/tipo-produto-cadastrar.php';
            exit();
        }
    }

    public static function reorganizaDadosCadastroTipoProduto(array $data)
    {
        $dadosInsert = [];
        $produtoIndex = 0;
        $dadosProduto = [];

        $postArray = $data['dadosPost']['dadosProduto'];

        foreach ($postArray as $item) {
            $name = $item['name'];
            $value = $item['value'];

            if (strpos($name, 'tipo_produto[tipo_produto][tipo_nome]') !== false) {
                $dadosInsert['tipo_nome'] = $value;
            } elseif (strpos($name, 'tipo_produto[tipo_produto][produto_valor]') !== false) {
                $dadosInsert['produto_valor'] = $value;
            } elseif (strpos($name, 'tipo_produto[tipo_produto][produto_imposto]') !== false) {
                $dadosInsert['produto_imposto'] = $value;
            }
        }

        return $dadosInsert;
    }
}
