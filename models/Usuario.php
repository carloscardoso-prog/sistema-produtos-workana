<?php
require_once __DIR__ . '/../models/Conexao.php';
class Usuario extends Conexao
{
    public static function buscar(array $data)
    {
        $dadosQuery = $data;
        $resultadoQuery = "";

        if (!empty($dadosQuery)) {

            $queryMontada = "SELECT " . $dadosQuery['select'] . " FROM " . $dadosQuery['from'];
            
            if(isset($dadosQuery['joins'])){
                $queryMontada .= ' '.$dadosQuery['joins'];
            }

            $queryMontada .= " WHERE " . $dadosQuery['where'];

            if(isset($dadosQuery['group'])){
                $queryMontada .= " GROUP BY " . $dadosQuery['group'];
            }

            $resultadoQuery = self::executarQuery(['query' => $queryMontada . ";"]);
        }

        return $resultadoQuery;
    }

    public static function inserir(array $data)
    {
        $dadosQuery = $data;
        $resultadoQuery = "";

        if (!empty($dadosQuery)) {
            $resultadoQuery = self::executarQuery(['query' => "INSERT INTO " . $dadosQuery['insert'] . $dadosQuery['columns'] . " VALUES " . $dadosQuery['values'] . " RETURNING id" . ";"]);
        }

        return $resultadoQuery;
    }

    public static function remover(array $data)
    {
        $dadosQuery = $data;
        $resultadoQuery = "";

        if (!empty($dadosQuery)) {
            $resultadoQuery = self::executarQuery(['query' => "DELETE FROM " . $dadosQuery['from'] . " WHERE " . $dadosQuery['where'] . " RETURNING id" . ";"]);
        }

        return $resultadoQuery;
    }

    public static function alterar(array $data)
    {
        $dadosQuery = $data;
        $resultadoQuery = "";

        if (!empty($dadosQuery)) {
            $resultadoQuery = self::executarQuery(['query' => "UPDATE " . $dadosQuery['update'] . " SET " . $dadosQuery['set'] . " WHERE " . $dadosQuery['where'] . " RETURNING id" . ";"]);
        }

        return $resultadoQuery;
    }

    private static function executarQuery(array $data)
    {
        if (!empty($data)) {
            try {
                $Conexao = self::getConnection();
                $query = $Conexao->query($data['query']);
                $resultado = $query->fetchAll();
            } catch (Exception $e) {
                echo $e->getMessage();
                exit;
            }

            return $resultado;
        }
    }
}
