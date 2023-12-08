<?php
require_once __DIR__ . '/../models/Venda.php';

class Controller
{
    public function index()
    {
        $dadosVenda = [];

        $dadosVenda = Venda::buscar([
            'select' => 'VENDA.id AS Protocolo, VENDA.cliente_nome AS Cliente, SUM(PRODUTO_TIPO.produto_valor) AS Valor, SUM(PRODUTO_TIPO.produto_imposto) AS Imposto',
            'from' => 'VENDA',
            'joins' => 'INNER JOIN VENDA_PRODUTO ON VENDA_PRODUTO.venda_id = VENDA.id
                            INNER JOIN PRODUTO ON PRODUTO.id = VENDA_PRODUTO.produto_id
                            INNER JOIN PRODUTO_TIPO ON PRODUTO_TIPO.id = PRODUTO.produto_tipo_id',
            'where' => 'VENDA.id != ' . "0",
            'group' => 'VENDA.id, VENDA.cliente_nome'
        ]);

        require_once __DIR__ . '/../views/index.php';
    }

    public static function getParamFromURL(array $data)
    {
        $return = [];

        if (isset($data[1])) {
            $parameterData = explode("&", $data[1]);

            for ($i = 0; $i < count($parameterData); $i++) {
                if (str_contains($parameterData[$i], "=")) {
                    $parameterStringExplode = explode("=", $parameterData[$i]);
                    $return[$parameterStringExplode[0]] = $parameterStringExplode[1];
                }
            }
        }
        return $return;
    }
}
