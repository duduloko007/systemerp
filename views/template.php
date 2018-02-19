<!DOCTYPE html>
<html lang="pt-br">
<head>  
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>ERP</title>
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <!--<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_CSS ?>/estilo_rela.css"/>-->
 <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_CSS ?>/style.css"/>
 <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_CSS ?>/bootstrap.min.css">
 <script  src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script  src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href="<?php echo BASE_URL_BOWER ?>/font-awesome/css/font-awesome.min.css">
 <link rel="stylesheet" href="<?php echo BASE_URL_BOWER ?>/Ionicons/css/ionicons.min.css">
 <link rel="stylesheet" href="<?php echo BASE_URL_DIST ?>/css/AdminLTE.min.css">
 <link rel="stylesheet" href="<?php echo BASE_URL_DIST ?>/css/skins/_all-skins.min.css">
 <script type="text/javascript"> var BASE_URL = '<?php echo BASE_URL;?>'</script>
<script type="text/javascript">
  var base_url = '<?php echo BASE_URL?>';
</script>
  <script src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">

      <!-- Logo -->
      <a href="#" class="logo">
        <span class="logo-mini"><b></b></span>
        <span class="logo-lg"><b></b><?php echo $viewData['company_name'];?></span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                  <a href="#">
                    <h3>
                      Create a nice theme
                      <small class="pull-right">40%</small>
                    </h3>
                    <div class="progress xs">
                      <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar"
                      aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                      <span class="sr-only">40% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <!-- end task item -->
              <li><!-- Task item -->
                <a href="#">
                  <h3>
                    Some task I need to do
                    <small class="pull-right">60%</small>
                  </h3>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar"
                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </a>
            </li>
            <!-- end task item -->
            <li><!-- Task item -->
              <a href="#">
                <h3>
                  Make beautiful transitions
                  <small class="pull-right">80%</small>
                </h3>
                <div class="progress xs">
                  <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar"
                  aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                  <span class="sr-only">80% Complete</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </li>
      <li class="footer">
        <a href="#">View all tasks</a>
      </li>
    </ul>
  </li>        
</ul>
</div>
</nav>

</header>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo BASE_URL_IMAGES ?>/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Eduardo</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Administrador</a>
      </div>
    </div>
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Pesquisar...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
              <li>
          <a href="<?php echo BASE_URL;?>">
            <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
       <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Usuários</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE_URL;?>users"></i> Usuários</a></li>
          <li><a href="<?php echo BASE_URL;?>permissions"></i> Permissões</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-pie-chart"></i>
          <span>Lançamentos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE_URL;?>pay"></i> Contas a Pagar</a></li>
          <li><a href="<?php echo BASE_URL ?>receive"></i> Contas a receber</a></li>
        </ul>
      </li>
      <li>
          <a href="<?php echo BASE_URL;?>clients">
            <i class="fa fa-users"></i>
          <span>Clientes</span>
        </a>
      </li>
            <li>
          <a href="<?php echo BASE_URL;?>inventory">
            <i class="fa fa-cubes"></i>
          <span>Estoque</span>
        </a>
      </li>
      <li>
          <a href="<?php echo BASE_URL;?>sales">
            <i class="fa fa-dollar"></i>
          <span>Vendas</span>
        </a>
      </li>
      <li>
          <a href="<?php echo BASE_URL;?>purchases">
            <i class="fa  fa fa-shopping-bag"></i>
          <span>Compras</span>
        </a>
      </li>
     <li>
          <a href="<?php echo BASE_URL;?>report">
            <i class="fa fa-file-pdf-o"></i>
          <span>Relatórios</span>
        </a>
      </li>
       <li>
          <a href="<?php echo BASE_URL;?>supplier">
            <i class="fa fa-file-pdf-o"></i>
          <span>Fornecedor</span>
        </a>
      </li>

      <li>
          <a href="<?php echo BASE_URL; ?>/login/logout">
            <i class="fa fa-sign-out"></i>
          <span>Sair</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
<div class="content-wrapper">
</section>

<?php echo $this->loadViewInTemplate($viewName, $viewData); ?>

</div><footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Versão</b> 1.0.0
  </div>
  <strong>ERP - Todos direitos reservados.</strong> 
</footer>
<div class="control-sidebar-bg"></div>
</div>


<script src="<?php echo BASE_URL_DIST; ?>/js/adminlte.min.js"></script>
<script src="<?php echo BASE_URL_DIST; ?>/js/demo.js"></script>
<script  src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
<script  src="<?php echo BASE_URL; ?>assets/js/ajax.js"></script>
</body>
</html>

