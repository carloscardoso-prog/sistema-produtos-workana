<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Checkout example · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../../../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      width: 100%;
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
      --bd-violet-bg: #712cf9;
      --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

      --bs-btn-font-weight: 600;
      --bs-btn-color: var(--bs-white);
      --bs-btn-bg: var(--bd-violet-bg);
      --bs-btn-border-color: var(--bd-violet-bg);
      --bs-btn-hover-color: var(--bs-white);
      --bs-btn-hover-bg: #6528e0;
      --bs-btn-hover-border-color: #6528e0;
      --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
      --bs-btn-active-color: var(--bs-btn-hover-color);
      --bs-btn-active-bg: #5a23c8;
      --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
      z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
      display: block !important;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../../assets/css/venda.css" rel="stylesheet">
</head>

<body class="bg-body-tertiary">


  <div class="container">

    <main>
      <div class="py-5 text-center">
        <h2>Listagem de Venda</h2>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Produtos Vendidos:</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Produto Bacana</h6>
                <span>1</span>
              </div>
              <span class="text-body-secondary">R$12,00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Produto Ruim</h6>
                <span>1</span>
              </div>
              <span class="text-body-secondary">R$8,00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <div>
                <h6 class="my-0">Produto Mediano</h6>
                <span>1</span>
              </div>
              <span class="text-body-secondary">R$5,00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
              <div class="text-success">
                <h6 class="my-0">Valor Imposto</h6>
              </div>
              <span class="text-success">+R$ 0,00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total:</span>
              <strong>R$ 20,00</strong>
            </li>
          </ul>

        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Dados da venda:</h4>
          <div class="row g-3">
            <div class="col-sm-12">
              <label for="firstName" class="form-label">Nome completo do cliente:</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="" disabled>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Vendedor:</label>
              <div class="input-group has-validation">
                <input type="text" disabled class="form-control" id="username" value="NomeUsuario" required>
              </div>
            </div>

            <hr class="my-4">
          </div>
        </div>
    </main>

  </div>

  <script src="../../assets/js/jquery.js"></script>
  <script src="../../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="../../assets/js/dados-venda.js"></script>
</body>

</html>