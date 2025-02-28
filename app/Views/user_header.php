<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ZEALUX </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- plugin css file  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/datatables/dataTables.bootstrap5.min.css">

    <!-- project css file  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include SweetAlert CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>
</head>
<body class="">
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->
        
        <div class="sidebar user-sidebar px-4 py-4 py-md-4 me-0">
            <button class="close-sidebar-btn">X</button>
            <div class="d-flex flex-column h-100">
                <a href="" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">
                        <img src="<?= base_url(); ?>/images/logo02.png" class="logo-mainimg" alt="ZEALUX">
                    </span>
                </a>
                <?php 
                $currentUri = service('uri');
                $currentSegment = $currentUri->getSegment(1);
                $MastersActive = in_array($currentSegment, ['groups','feature','lens','lens-feature','size','previlage-cards']);
                $ProductsActive = in_array($currentSegment, ['add-product', 'products']);
                $LensActive = in_array($currentSegment, ['add-lens-creation','lens-creation']);
                $EyeTestActive = in_array($currentSegment, ['customers','eye-test']);
                $CutomerActive = in_array($currentSegment, ['customer-registration','customers-list']);
                $Reports = in_array($currentSegment, ['sales-report','daily-collection-report']);

                ?>
                <ul class="menu-list flex-grow-1 mt-3">
                    <li><a class="m-link <?= $currentSegment == 'dashboard' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/dashboard"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    <li class="collapsed">
                        <a class="m-link <?= $MastersActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>Masters</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $MastersActive ? 'show' : ''; ?>" id="categories">
                                <li><a class="ms-link <?= $currentSegment == 'previlage-cards' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/previlage-cards">Previlage Card</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $CutomerActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#customer" href="#">
                            <i class="icofont-notepad  fs-5"></i> <span>Registration</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $CutomerActive ? 'show' : ''; ?>" id="customer">
                                <li><a class="ms-link <?= $currentSegment == 'customer-registration' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/customer-registration">Customer Creation</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'customers-list' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/customers-list">Customers List</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $EyeTestActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-eye" href="#">
                            <i class="icofont-eye-open fs-5"></i> <span>Eye Test</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $EyeTestActive ? 'show' : ''; ?>" id="menu-eye">
                                <li><a class="ms-link <?= $currentSegment == 'customers' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/customers">Add Eye Test</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'eye-test' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/eye-test">Eye Test List</a></li>
                                
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $Reports ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#reports" href="#">
                            <i class="icofont-page fs-5"></i> <span>Reports</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Reports ? 'show' : ''; ?>" id="reports">
                                <li><a class="ms-link <?= $currentSegment == 'sales-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/sales-report">Sales Report</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'daily-collection-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/daily-collection-report">Daily Collection Report</a></li>
                                
                            </ul>
                    </li>
                    <li><a class="m-link <?= $currentSegment == 'sales-return' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/sales-return"><i class="fa fa-retweet fs-5"></i> <span>Sales Return</span></a></li>
                    <li><a class="m-link" href="<?php echo base_url(); ?>/logout"><i class="icofont-logout fs-5"></i> <span>Signout</span></a></li>

                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main user-body">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar user-navbar">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-3">
                            
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold text-white">User </span></p>
                                    <small class="text-white">User Profile</small>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="<?php echo base_url(); ?>/assets/images/profile_av.svg" alt="">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/profile_av.svg" alt="">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold">User</span></p>
                                                    <small class="">User</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <!-- <a href="admin-profile.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a> -->
                                            <!-- <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a> -->
                                            <a href="<?php echo base_url(); ?>/logout" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="setting ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal"><i class="icofont-gear-alt fs-5 text-white"></i></a>
                            </div>
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle user-menu-toggle order-1" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars text-white"></span>
                            <img src="<?= base_url(); ?>/images/logo.png" class="logo-img" alt="ZEALUX">
                        </button>
                        <!-- <a href="" class="mb-0 brand-icon ">
                            <span class="logo-icon">
                                <i class="bi bi-bag-check-fill fs-4"></i>
                            </span>
                            <span class="logo-text">ZEALUX</span>
                        </a> -->
        
                        <!-- main menu Search-->
                        <?php 
                        $currentUri = service('uri');
                        $currentSegment = $currentUri->getSegment(1);
                        ?>

                        <div class="order-2 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 d-flex">
                            <div class="input-group flex-nowrap input-group-lg <?= $currentSegment == 'sales' ? '' : 'd-none'; ?>">
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping" id="product_search">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            </div>
                            <a href="<?php echo base_url(); ?>/sales" class="mb-0 brand-icon mt-3 ms-2 <?= ($currentSegment == 'sales' || $currentSegment == 'get-product-details') ? '' : 'd-none'; ?>">
                                <span class="logo-icon">
                                    <i class="icofont-plus-circle fs-5 text-white "> Add New</i>
                                </span>
                            </a>
                        </div>
        
                    </div>
                </nav>
            </div>