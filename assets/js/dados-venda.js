// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

$(document).ready(function () {

  let vendaId = location.search.split('id-venda=')[1];
  let arquivo = 'venda';
  let funcao = 'listarVendaUnica';
  // listar/cadastrar/inserir/atualizar

  $.ajax({
    url: "../../controller/action.php",
    method: 'POST',
    data: {acao: 'listar', dados: {idObjeto: vendaId, arquivo: arquivo, funcao: funcao}},
  }).done(function (resultado) {
    console.log(resultado);
  });
});