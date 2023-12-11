$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();

        $.ajax({
            url: "../../views/produto/action.php",
            method: 'POST',
            data: { acao: 'cadastrar-produto', dados: { dadosProduto: formData } },
        }).done(function (resultado) {
            if (resultado.length) {
                window.location.href = "../../";
            } else { 
                alert("ERRO! EXISTEM CAMPOS VAZIOS NA SOLITAÇÃO.");
            }
        });
    });
});