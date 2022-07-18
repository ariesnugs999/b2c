<?php (defined('BASEPATH')) or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= $page_title . ' | ' . $Settings->site_name; ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= $assets ?>css/nucleo-icons.css" rel="stylesheet">
    <link href="<?= $assets ?>css/nucleo-svg.css" rel="stylesheet">
    <!-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
    <link href="<?= $assets ?>css/nucleo-svg.css" rel="stylesheet">
    <!-- CSS Files -->
    <!-- <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> -->
    <link id="pagestyle" href="<?= $assets ?>css/argon-dashboard.css?v=2.0.4" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?= $assets ?>DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css"/>

    <script src="<?= $assets ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
</head>

<body>
            <!-- <div class="col-lg-12 alerts">
                <div id="custom-alerts" style="display:none;">
                    <div class="alert alert-dismissable">
                        <div class="custom-msg"></div>
                    </div>
                </div>
                <?php if ($error) { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-ban"></i> <?= lang('error'); ?></h4>
                        <?= $error; ?>
                    </div>
                <?php }
                if ($warning) { ?>
                    <div class="alert alert-warning alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-warning"></i> <?= lang('warning'); ?></h4>
                        <?= $warning; ?>
                    </div>
                <?php }
                if ($message) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4> <i class="icon fa fa-check"></i> <?= lang('Success'); ?></h4>
                        <?= $message; ?>
                    </div>
                <?php } ?>
            </div> -->
            <div class="clearfix"></div>


    <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('uploads/paste.PNG'); background-position-y: 50%;">
        <span class="mask bg-primary opacity-6"></span>
    </div>

    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" # " target="_blank">
            <img src="<?= base_url('uploads/'.$store->logo); ?>" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold"><?= $store->name; ?></span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">

        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <!-- <li class="user-header">
                    <img src="#>" class="img-circle" >
                    <p>
                        <?= $this->session->username; ?>
                    </p>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link active" href="<?= site_url(); ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li> -->

                <?php if ($Admin) { ?>
                <!-- <li class="nav-item">
                    <a class="nav-link " href="<?= site_url('purchases'); ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Purchases</span>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link " href="<?= site_url('sales'); ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sales</span>
                    </a>
                </li>
               
              
                <li class="nav-item">
                    <a class="nav-link " href="<?= site_url('logout'); ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Out</span>
                    </a>
                </li>

               

                <?php } else { ?>
                <li class="mm_products"><a href="<?= site_url('products'); ?>"><i class="fa fa-barcode"></i> <span><?= lang('products'); ?></span></a></li>
                <li class="mm_categories"><a href="<?= site_url('categories'); ?>"><i class="fa fa-folder-open"></i> <span><?= lang('categories'); ?></span></a></li>
         
              
               
                <?php } ?>



            </ul>
        </div>

        <!-- <div class="sidenav-footer mx-3 ">
            <div class="card card-plain shadow-none" id="sidenavCard">
                <img class="w-50 mx-auto" src=" <?php echo base_url('assets/img/illustrations/icon-documentation.svg'); ?>" alt="sidebar_illustration">
                <div class="card-body text-center p-3 w-100 pt-0">
                    <div class="docs-info">
                        <h6 class="mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
                    </div>
                </div>
            </div>
            <a href="" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
            <a class="btn btn-primary btn-sm mb-0 w-100" href="" type="button">Upgrade to pro</a>
        </div> -->

    </aside>

    <main class="main-content position-relative border-radius-lg ">
      <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
              
            <h4 class="font-weight-bolder text-white mb-0">Selamat Datang</h4>
            </ol>
            <h4 class="font-weight-bolder text-white mb-0"><?= $this->session->username; ?></h4>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
              <div class="input-group">
              <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none"><?= $this->session->username; ?></span>
                </a>
              </div>
            </div>
            <!-- <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                  <i class="fa fa-user me-sm-1"></i>
                  <span class="d-sm-inline d-none"><?= $this->session->username; ?></span>
                </a>
              </li>
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                    <i class="sidenav-toggler-line bg-white"></i>
                  </div>
                </a>
              </li>
             
            </ul> -->
          </div>
        </div>
      </nav>
    <div class="container-fluid py-4">  







    