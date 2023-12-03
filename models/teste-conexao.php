<?php
    require_once "Conexao.php";

    try{

        $Conexao = Conexao::getConnection();
        $query = $Conexao->query("SELECT produto_nome FROM PRODUTO");
        $produtos = $query->fetchAll();
    }catch(Exception $e){ 
        echo $e->getMessage();
        exit;
    }
?> 

<table>
    <tr>    <td>Nome</td></tr>
    <tr><td><?php print_r($produtos);?></td></tr>
</table>