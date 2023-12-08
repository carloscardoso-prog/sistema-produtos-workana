$(document).ready(function () {

    $('#produto-adicionar-select').on('change', function () {
        let nomeProduto = $(this).find(":selected").val();

        $.ajax({
            url: "../../views/venda/action.php",
            method: 'POST',
            data: { acao: 'busca-dados-produto', dados: { nomeProduto : nomeProduto } },
          }).done(function (resultado) {
            console.log(resultado);
          });

        $(this).prop('selectedIndex', 0);
    });

    $(document).on('click', '.adiciona-produto', function () {
        let valorBotao = $(this).closest('div').attr('id');
        let quantidadeProduto = $('#exibe-quantidade-' + valorBotao).text();

        $('#exibe-quantidade-' + valorBotao).text(parseInt(quantidadeProduto) + 1);

        let valorForm = $('.valor-form-' + valorBotao).val();
        $('.valor-form-' + valorBotao).val(parseInt(valorForm) + 1);
    });

    $(document).on('click', '.remove-produto', function () {
        let valorBotao = $(this).closest('div').attr('id');
        let quantidadeProduto = $('#exibe-quantidade-' + valorBotao).text();

        if (quantidadeProduto > 0) {
            $('#exibe-quantidade-' + valorBotao).text(parseInt(quantidadeProduto) - 1);

            let valorForm = $('.valor-form-' + valorBotao).val();
            $('.valor-form-' + valorBotao).val(parseInt(valorForm) - 1);
        }
    });
});