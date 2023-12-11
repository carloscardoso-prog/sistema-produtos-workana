<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Dashboard Template · Bootstrap v5.3</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">



  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

  <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../assets/css/index.css" rel="stylesheet">
</head>

<body>

  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <span class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">VendaSystem</span>

    <ul class="navbar-nav flex-row d-md-none">
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
          <svg class="bi">
            <use xlink:href="#search" />
          </svg>
        </button>
      </li>
      <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="bi">
            <use xlink:href="#list" />
          </svg>
        </button>
      </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
      <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
        <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="/">
                  <svg class="bi">
                    <use xlink:href="#house-fill" />
                  </svg>
                  Menu
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/venda/venda-cadastrar">
                  <svg class="bi">
                    <use xlink:href="#file-earmark" />
                  </svg>
                  Cadastrar vendas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/produto/produto-cadastrar">
                  <svg class="bi">
                    <use xlink:href="#cart" />
                  </svg>
                  Cadastrar produtos
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="/tipoProduto/tipo-produto-cadastrar">
                  <svg class="bi">
                    <use xlink:href="#people" />
                  </svg>
                  Cadastrar tipo de produtos
                </a>
              </li>
            </ul>

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
              <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 deslogar" href="/usuario/usuario-login">
                  <svg class="bi">
                    <use xlink:href="#door-closed" />
                  </svg>
                  Sair
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <h2>Lista de Vendas</h2>
        <?php if (!isset($dadosVenda)) { ?>
          <div class="table-responsive small" id="venda-<?php echo $dadoVenda['protocolo'] ?>">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Protocolo</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Valor</th>
                  <th scope="col">Imposto</th>
                  <th scope="col">Valor Total</th>
                  <th scope="col">Dados da Venda</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($dadosVenda as $chaveDado => $dadoVenda) { ?>
                  <tr>
                    <td><?php echo $dadoVenda['protocolo']; ?></td>
                    <td><?php echo $dadoVenda['cliente']; ?></td>
                    <td><?php echo $dadoVenda['valor']; ?></td>
                    <td><?php echo $dadoVenda['imposto']; ?></td>
                    <td><?php echo number_format($dadoVenda['valor'] + $dadoVenda['imposto'], 2); ?></td>
                    <td>
                      <a class="btn btn-primary venda-listar" id="<?php echo $dadoVenda['protocolo'] ?>-venda-listar" href="/venda/dados-venda/?id_venda=<?php echo $dadoVenda['protocolo'] ?>" role="button">
                        <i class="bi bi-grid-3x3-gap-fill"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php } ?>
      </main>
    </div>
  </div>

  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script>
  <script src="../assets/js/index.js"></script>
</body>

</html>