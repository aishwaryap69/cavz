<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
  <meta charset="utf-8" />
  <title>Dashboard | CAVZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!-- App favicon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
  <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

  <script src="<?php echo base_url() ?>assets/js/layout.js"></script>
  <!-- Bootstrap Css -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- custom Css-->
  <link href="<?php echo base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/libs/glightbox/css/glightbox.min.css">
  <link media="screen" rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <header id="page-topbar">
      <div class="layout-width">
        <div class="navbar-header">
          <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
              <a href="<?php echo base_url() ?>" class="logo logo-light">
                <span class="logo-sm">
                  <img src="<?php echo base_url() ?>assets/images/logo-1.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                  <img src="<?php echo base_url() ?>assets/images/logo-1.png" alt="" height="17">
                </span>
              </a>
            </div>
            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
              <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
              </span>
            </button>
            <!-- App Search-->
          </div>
          <div class="d-flex align-items-center">


            <div class="dropdown ms-sm-3 header-item topbar-user">
              <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                  <img class="rounded-circle header-profile-user" src="<?php echo base_url() ?>assets/images/user.png" alt="Header Avatar">
                </span>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <?php if (isset($this->user['uid'])) { ?>
                  <h6 class="dropdown-header">Welcome <?php echo $this->user['name']; ?>!</h6>
                <?php } ?>


                <a class="dropdown-item" href="<?php echo base_url() ?>Login/signout">
                  <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i>
                  <span class="align-middle" data-key="t-logout">Logout</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
          </div>
          <div class="modal-body">
            <div class="mt-2 text-center">
              <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
              </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
              <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->