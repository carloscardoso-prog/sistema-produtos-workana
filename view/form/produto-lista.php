<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-sm">
        <div id="<?php echo $dados['produto_nome'];?>">
            <h6 class="my-0"><?php echo $dados['nome_produto'];?></h6>
            <a class="btn btn-primary btn-sm adiciona-produto" id="adiciona-<?php echo $dados['produto_nome'];?>"><i>+1</i></a>
            <a class="btn btn-primary btn-sm remove-produto" id="remove-<?php echo $dados['produto_nome'];?>"><i>-1</i></a>
            <span id="exibe-quantidade-<?php echo $dados['produto_nome'];?>"><?php echo isset($dados['quantidade_produto'])? isset($dados['quantidade_produto']) : "1";?></span>
        </div>
        <input type="hidden" name="produto[<?php echo $dados['produto_nome'];?>]"  class="valor-form-<?php echo $dados['produto_nome'];?>" id="quantidade-<?php echo $dados['produto_nome'];?>" value="1">
        <span class="text-body-secondary <?php echo $dados['produto_nome'];?>" id="<?php echo $dados['produto_nome'];?>-valor-multiplicado">R$ <?php echo isset($dados['produto_valor_multiplicado'])? isset($dados['produto_valor_multiplicado']): "0.00";?></span>
        <span class="d-none text-body-secondary" id="<?php echo $dados['produto_nome'];?>-valor-unico">R$ <?php echo isset($dados['produto_valor_unico'])? isset($dados['produto_valor_unico']) : "0.00";?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
        <div class="text-success">
            <h6 class="my-0">Valor Imposto</h6>
        </div>f
        <span class="text-success" id="imposto">R$ <?php echo isset($dados['produto_imposto'])? $dados['produto_imposto'] : "0.00";?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <span>Total:</span>
        <strong id="valor-final">R$ <?php echo isset($dados['valor-final'])? $dados['valor-final'] : "0.00";?></strong>
    </li>
</ul>