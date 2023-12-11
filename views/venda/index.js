$(document).ready(function () {

    $('form').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();

        $.ajax({
            url: "../../views/venda/action.php",
            method: 'POST',
            data: { acao: 'cadastrar-venda', dados: { dadosVenda: formData } },
        }).done(function (resultado) {
            if (resultado.length) {
                window.location.href = "../../";
            } else { 
                alert("ERRO! EXISTEM CAMPOS VAZIOS NA SOLITAÇÃO.");
            }
        });
    });

    $('#produto-adicionar-select').on('change', function () {
        let nomeProduto = $(this).val();
        let contador = $("#contador");
        let valorContador = parseInt(contador.attr('data-contador')) + 1;

        $.ajax({
            url: "../../views/venda/action.php",
            method: 'POST',
            data: { acao: 'busca-dados-produto', dados: { contador: valorContador, nomeProduto: nomeProduto } },
        }).done(function (resultado) {
            contador.attr('data-contador', valorContador);
            $('.produtos-listagem-cadastro').append(resultado);
            adicionaRemoveProduto();
        });

        $(this).prop('selectedIndex', 0);
    });

    function calcularValorImposto() {
        let totalImposto = 0;

        $('.valor-imposto').each(function () {
            let divProduto = $(this).siblings('div');

            let quantidade = parseInt(divProduto.find('.quantidade-produto').text());
            let valorImposto = parseFloat($('#valor-unico-imposto-' + divProduto.attr('id')).text());
            totalImposto += quantidade * valorImposto;
        });

        return totalImposto;
    }

    function calcularEAtualizarValorImposto() {
        let valorImposto = calcularValorImposto();
        $('#imposto').text('+R$ ' + valorImposto);
    }

    function adicionaRemoveProduto() {
        calcularEAtualizarValorImposto();
        calculaValorTotal();
        
        $('.adiciona-produto').off().on('click', function () {
            let valorBotao = $(this).closest('div').attr('id');
            let quantidadeProduto = $('#exibe-quantidade-' + valorBotao).text();
            let valorUnico = $('#valor-unico-' + valorBotao).text();

            quantidadeProduto = parseInt(quantidadeProduto) + 1;
            $('#exibe-quantidade-' + valorBotao).text(quantidadeProduto);
            $('#valor-multiplicado-' + valorBotao).text("R$ " + parseFloat(quantidadeProduto) * parseFloat(valorUnico));

            $('input[name="produtos[' + valorBotao + '][quantidade]"]').val(quantidadeProduto);

            calcularEAtualizarValorImposto();
            calculaValorTotal();
        });

        $('.remove-produto').off().on('click', function () {
            let valorBotao = $(this).closest('div').attr('id');
            let quantidadeProduto = $('#exibe-quantidade-' + valorBotao).text();
            let valorUnico = $('#valor-unico-' + valorBotao).text();

            if (quantidadeProduto > 0) {
                quantidadeProduto = parseInt(quantidadeProduto) - 1;
                $('#exibe-quantidade-' + valorBotao).text(quantidadeProduto);
                $('#valor-multiplicado-' + valorBotao).text("R$ " + parseFloat(quantidadeProduto) * parseFloat(valorUnico));

                $('input[name="produtos[' + valorBotao + '][quantidade]"]').val(quantidadeProduto);

                calcularEAtualizarValorImposto();
                calculaValorTotal();
            }
        });
    }

    function calculaValorTotal() {
        let totalImposto = calcularValorImposto();
        let valorTotal = 0;

        $('.produto').each(function () {
            let divProduto = $(this).siblings('div');

            let quantidade = parseInt(divProduto.find('.quantidade-produto').text());
            let valorUnico = parseFloat($('#valor-unico-' + divProduto.attr('id')).text().replace('R$ ', ''));

            valorTotal += quantidade * valorUnico;
        });

        $('#imposto').text('+R$ ' + totalImposto.toFixed(2));
        $('#valor-final').text('R$ ' + (valorTotal + totalImposto).toFixed(2));
    }
});
