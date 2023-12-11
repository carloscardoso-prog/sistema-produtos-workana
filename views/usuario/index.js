$(document).ready(function () {
    $('#usuario-cadastrar').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();

        $.ajax({
            url: "../../views/usuario/action.php",
            method: 'POST',
            data: { acao: 'cadastrar-usuario', dados: { dadosUsuario: formData } },
        }).done(function (resultado) {
            if (resultado.length) {
                if (resultado.includes("ERRO")) {
                    alert(resultado);
                } else {
                    window.location.href = "../../";
                }
            } else {
                alert("ERRO! EXISTEM CAMPOS VAZIOS NA SOLITAÇÃO.");
            }
        });
    });

    $('#usuario-logar').on('submit', function (event) {
        event.preventDefault();
        let formData = $(this).serializeArray();

        $.ajax({
            url: "../../views/usuario/action.php",
            method: 'POST',
            data: { acao: 'login-usuario', dados: { dadosUsuario: formData } },
        }).done(function (resultado) {
            if (resultado.length) {
                if (resultado.includes("ERRO")) {
                    alert(resultado);
                } else {
                    window.location.href = "/../../index.php";
                }
            } else {
                alert("ERRO! EXISTEM CAMPOS VAZIOS NA SOLITAÇÃO.");
            }
        });
    });
});