$(document).ready(function () {
    $('form').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();

        $.ajax({
            url: "../../views/tipo-produto/action.php",
            method: 'POST',
            data: { acao: 'cadastrar-tipo-produto', dados: { dadosProduto: formData } },
        }).done(function (resultado) {
            if (resultado.length) {
                window.location.href = "../../";
            } else { 
                alert("ERRO! EXISTEM CAMPOS VAZIOS NA SOLITAÇÃO.");
            }
        });
    });
});