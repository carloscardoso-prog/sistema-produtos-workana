$(document).ready(function () {
    $('.deslogar').on('click', function () {
        event.preventDefault();
        $.ajax({
            url: "../../views/usuario/action.php",
            method: 'POST',
            data: { acao: 'deslogar-usuario' },
        }).done(function (resultado) {
            if (resultado.length) {
                window.location.href = "../../";
            }
        });
    });
})