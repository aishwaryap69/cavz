<div class="app-menu navbar-menu grey-bg">
    <!-- LOGO -->
    <div class="navbar-brand-box" style="background-color: white;">
        <!-- Light Logo-->
        <a href="<?php echo base_url() ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?php echo base_url() ?>assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?php echo base_url() ?>assets/images/logo-1.png" alt="">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo base_url() ?>Dashboard" aria-controls="sidebarApps">
                        <i class="ri-dashboard-2-line"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo base_url() ?>Masters" aria-controls="sidebarApps">
                        <i class="bx bx-layer"></i> <span>Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?php echo base_url() ?>Book" aria-controls="sidebarApps">
                        <i class="ri-file-list-3-line"></i><span>Books</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>