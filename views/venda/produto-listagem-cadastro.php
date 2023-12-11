<?php if (!empty($dadosProduto) && !empty($contador)) { ?>
    <li class="list-group-item d-flex justify-content-between lh-sm">
        <div id="produto-<?php echo $contador; ?>">
            <h6 class="my-0"><?php echo $dadosProduto[0]['produto']; ?></h6>
            <a class="btn btn-primary btn-sm adiciona-produto" id="adiciona-produto-<?php echo $contador; ?>"><i>+1</i></a>
            <a class="btn btn-primary btn-sm remove-produto" id="remove-produto-<?php echo $contador; ?>"><i>-1</i></a>
            <span class="quantidade-produto" id="exibe-quantidade-produto-<?php echo $contador; ?>">1</span>
        </div>
        <span class="text-body-secondary produto" id="valor-multiplicado-produto-<?php echo $contador; ?>">R$ <?php echo $dadosProduto[0]['valor']; ?></span>
        <span class="d-none text-body-secondary" id="valor-unico-produto-<?php echo $contador; ?>"><?php echo $dadosProduto[0]['valor']; ?></span>
        <span class="d-none text-body-secondary valor-imposto" id="valor-unico-imposto-produto-<?php echo $contador; ?>"><?php echo $dadosProduto[0]['imposto']; ?></span>

        <input type="hidden" name="produtos[produto-<?php echo $contador; ?>][nome]" value="<?php echo $dadosProduto[0]['produto']; ?>">
        <input type="hidden" name="produtos[produto-<?php echo $contador; ?>][valor]" value="<?php echo $dadosProduto[0]['valor']; ?>">
        <input type="hidden" name="produtos[produto-<?php echo $contador; ?>][imposto]" value="<?php echo $dadosProduto[0]['imposto']; ?>">
        <input type="hidden" name="produtos[produto-<?php echo $contador; ?>][quantidade]" value="1">
    </li>
<?php } ?>