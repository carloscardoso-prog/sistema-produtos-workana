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

  //Carrega lista de produto pro select
  let arquivo = 'produto';
  let funcao = 'listarProdutoGeral';
  // listar/cadastrar/inserir/atualizar

  $.ajax({
    url: "../../controller/action.php",
    method: 'POST',
    data: { acao: 'listar', dados: { arquivo: arquivo, funcao: funcao } },
  }).done(function (resultado) {
    console.log(resultado);

    $.ajax({
      url: "../../controller/action.php",
      method: 'POST',
      data: { acao: 'append-arquivo', dados: { rota: '/../view/form/produto-lista.php', produto: resultado} },
    }).done(function (retornoArquivo) {
      console.log(retornoArquivo);
    });
  });


  $('#venda').on('submit', function (event) {
    event.preventDefault();

    let arquivo = 'venda';
    let funcao = 'cadastrarVenda';
    // listar/cadastrar/inserir/atualizar

    let formData = $('#venda :input').serialize();

    $.ajax({
      url: "../../controller/action.php",
      method: 'POST',
      data: { acao: 'inserir', dados: { arquivo: arquivo, funcao: funcao, formData: formData } },
    }).done(function (resultado) {
      console.log(resultado);
    });
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