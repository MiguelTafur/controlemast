<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Controle de equipamentos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="CONTROLEMAST">
    <!-- <meta name="theme-color" content="#009688"> -->
    <link rel="shortcut icon" href="<?= media();?>/images/C2.png">
    <title><?= $data['page_tag'] ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/bootstrap-select.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/js/datepicker/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css"> -->
  </head>
  <body class="app sidebar-mini">
    <div id="divLoading">
      <div>
        <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
      </div>
    </div>
    <!-- Navbar-->
    <header class="app-header">
      <a class="app-header__logo font-weight-bold font-italic" href="<?= base_url(); ?>/entregar">
        <img src="<?= media();?>/images/sloganControle-removebg-preview-fotor.png" alt="CONTROLEMAST" style="margin-left: -1rem; padding: .2rem;"  height="40px">
      </a>
      <!-- Sidebar toggle button-->
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar">
        <i class="fas fa-bars"></i>
      </a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown">
          <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu">
            <i class="fa fa-user fa-lg">
            </i>
          </a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= base_url(); ?>/logout"><i class="fa fa-sign-out fa-lg"></i> Sair</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php require_once("nav_admin.php"); ?> 