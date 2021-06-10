<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pedidos Online | Tienda </title>
  <!-- icon -->
  <link rel="icon" href="https://images.rappi.com/web/rappi_favicon.png">
  <link rel="icon" type="image/png" sizes="192x192" href="https://images.rappi.com/web/fav-icons_android-icon-192x192.png">
  <link rel="mask-icon" href="ttps://images.rappi.com/web/rappi_favicon.png">
  <link rel="shortcut icon" href="https://images.rappi.com/web/rappi_favicon.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/adminLTE/dist/css/adminlte.min.css">
  <!-- propio style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/home.css">  
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url();?>" class="navbar-brand">
        <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">vShop</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categoria Tienda</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow" id="list_categorias_tiendas_nav_bar">
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Categoria Producto</a>
            <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow" id="list_categorias_productos_nav_bar">
            </ul>
          </li>
        </ul>
        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-12 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <div class="container-new-bascket">
            <img src="https://gemahub.rappi.com.uy/assets/shopping_cart.svg" alt="basket">
            <span class="product-number">0</span>
          </div>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url();?>cLogin" class="nav-link">
            <i class="far fa-user"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
