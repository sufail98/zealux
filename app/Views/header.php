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
<body>
    <div id="ebazar-layout" class="theme-blue">
        
        <!-- sidebar -->
        
        <div class="sidebar px-4 py-4 py-md-4 me-0">
            <div class="d-flex flex-column h-100">
                <a href="" class="mb-0 brand-icon">
                    <span class="logo-icon">
                        <i class="bi bi-bag-check-fill fs-4"></i>
                    </span>
                    <span class="logo-text">
                        <img src="<?= base_url(); ?>/images/logo.png" class="logo-mainimg" alt="ZEALUX">
                    </span>
                </a>
                <?php 
                $session = session();
                $currentUri = service('uri');
                $currentSegment = $currentUri->getSegment(1);
                $MastersActive = in_array($currentSegment, ['groups','feature','lens','lens-feature','size','previlage-cards','previlage-card-types','salesman','coupencode','breakage-warranty']);
                $ProductsActive = in_array($currentSegment, ['add-product', 'products']);
                $Users = in_array($currentSegment, ['add-user', 'users']);
                $LensActive = in_array($currentSegment, ['add-lens-creation','lens-creation']);
                $LensCoating = in_array($currentSegment, ['lens-coating','add-lens-coating']);
                $EyeTestActive = in_array($currentSegment, ['customers','eye-test']);
                $CustomerActive = in_array($currentSegment, ['customer-registration','customers-list']);
                $Reports = in_array($currentSegment, ['sales-report','daily-collection-report','bill-wise-profit-report','account-summary-report','stock-report','deleted-sales-report','checklist-report']);
                $Settings = in_array($currentSegment, ['upi-details']);
                $Purchase = in_array($currentSegment, ['purchase-list','purchase']);
                $Stock = in_array($currentSegment, ['stock-transfer-list','stock-transfer']);
                $Questions = in_array($currentSegment, ['questions','add-questions']);
                $ReviewReports = in_array($currentSegment, ['customer-review-report','saved-reviews','salesman-review-report']);
                $checklist = in_array($currentSegment, ['checklists','add-checklist']);


                ?>
                <ul class="menu-list flex-grow-1 mt-3">
                    <?php if($session->get('user_type') == 'super admin'){ ?>

                    <li><a class="m-link <?= $currentSegment == 'dashboard' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/dashboard"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
                    <li class="collapsed">
                        <a class="m-link <?= $ProductsActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                            <i class="icofont-truck-loaded fs-5"></i> <span>Products</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $ProductsActive ? 'show' : ''; ?>" id="menu-product">
                                <li><a class="ms-link <?= $currentSegment == 'add-product' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-product">Product Add</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'products' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/products">Product List</a></li>
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link <?= $LensActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-lens" href="#">
                            <i class="icofont-focus fs-5"></i> <span>Lens</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $LensActive ? 'show' : ''; ?>" id="menu-lens">
                                <li><a class="ms-link <?= $currentSegment == 'add-lens-creation' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-lens-creation">Lens Creation</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'lens-creation' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/lens-creation">Lens List</a></li>
                                
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $LensCoating ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-coating" href="#">
                            <i class="icofont-lens fs-5"></i> <span>Lens Coating</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $LensCoating ? 'show' : ''; ?>" id="menu-coating">
                                <li><a class="ms-link <?= $currentSegment == 'add-lens-coating' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-lens-coating">Lens Coating</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'lens-coating' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/lens-coating">Lens Coating List</a></li>
                            </ul>
                    </li>
                    
                    <li class="collapsed">
                        <a class="m-link <?= $Purchase ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-purchase" href="#">
                            <i class="icofont-cart-alt fs-5"></i> <span>Purchase</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Purchase ? 'show' : ''; ?>" id="menu-purchase">
                                <li><a class="ms-link <?= $currentSegment == 'purchase' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/purchase">Purchase Add</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'purchase-list' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/purchase-list">Purchase List</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $Stock ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-stock" href="#">
                            <i class="icofont-exchange fs-5"></i> <span>Stock Transfer</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Stock ? 'show' : ''; ?>" id="menu-stock">
                                <li><a class="ms-link <?= $currentSegment == 'stock-transfer' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/stock-transfer">Stock Transfer Add</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'stock-transfer-list' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/stock-transfer-list">Stock Transfer List</a></li>

                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $checklist ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-checklist" href="#">
                            <i class="icofont-tasks fs-5"></i> <span>Check List</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $checklist ? 'show' : ''; ?>" id="menu-checklist">
                                <li><a class="ms-link <?= $currentSegment == 'add-checklist' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-checklist">Check List Add</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'checklists' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/checklists">Check List</a></li>
                            </ul>
                    </li>
                    <li class="collapsed">
                        <a class="m-link <?= $Questions ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-Questions" href="#">
                            <i class="icofont-ui-copy fs-5"></i> <span>Customer Review</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Questions ? 'show' : ''; ?>" id="menu-Questions">
                                <li><a class="ms-link <?= $currentSegment == 'add-questions' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-questions">Questions Add</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'questions' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/questions">Questions List</a></li>
                            </ul>
                    </li>
                    <?php } ?>

                    <li class="collapsed">
                        <a class="m-link <?= $Reports ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#reports" href="#">
                            <i class="icofont-page fs-5"></i> <span>Reports</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Reports ? 'show' : ''; ?>" id="reports">
                                <li><a class="ms-link <?= $currentSegment == 'sales-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/sales-report">Sales Report</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'deleted-sales-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/deleted-sales-report">Deleted Sales Report</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'stock-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/stock-report">Stock Report</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'daily-collection-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/daily-collection-report">Daily Collection Report</a></li>

                                <?php if($session->get('user_type') == 'super admin'){ ?>
                                    <li><a class="ms-link <?= $currentSegment == 'checklist-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/checklist-report">Checklist Report</a></li>
                                    <li><a class="ms-link <?= $currentSegment == 'bill-wise-profit-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/bill-wise-profit-report">Bill Wise Profit Report</a></li>
                                <?php } ?>

                                <li><a class="ms-link <?= $currentSegment == 'account-summary-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/account-summary-report">Account Summary Report</a></li>
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link <?= $ReviewReports ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#reviewreports" href="#">
                            <i class="icofont-ebook fs-5"></i> <span>Review Reports</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $ReviewReports ? 'show' : ''; ?>" id="reviewreports">
                                <li><a class="ms-link <?= $currentSegment == 'customer-review-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/customer-review-report">Send Feedback Review</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'saved-reviews' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/saved-reviews">Customer Reviews</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'salesman-review-report' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/salesman-review-report">Salesman Review Report </a></li>

                            </ul>
                    </li>

                    <?php if($session->get('user_type') == 'super admin'){ ?>
                    <li class="collapsed">
                        <a class="m-link <?= $Settings ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#settings" href="#">
                            <i class="icofont-settings fs-5"></i> <span>Settings</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Settings ? 'show' : ''; ?>" id="settings">
                                <li><a class="ms-link <?= $currentSegment == 'upi-details' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/upi-details">UPI Details</a></li>
                            </ul>
                    </li>

                    <li class="collapsed">
                        <a class="m-link <?= $Users ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#menu-user" href="#">
                            <i class="icofont-users-alt-5 fs-5"></i> <span>Users</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $Users ? 'show' : ''; ?>" id="menu-user">
                                <li><a class="ms-link <?= $currentSegment == 'add-user' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/add-user">Add User</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'users' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/users">User List</a></li>
                            </ul>
                    </li>
                    <?php } ?>

                 
                    <li class="collapsed">
                        <a class="m-link <?= $MastersActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#categories" href="#">
                            <i class="icofont-chart-flow fs-5"></i> <span>Masters</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $MastersActive ? 'show' : ''; ?>" id="categories">
                                <?php if($session->get('user_type') == 'super admin'){ ?>
                                <li><a class="ms-link <?= $currentSegment == 'groups' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/groups">Groups</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'feature' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/feature">Features</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'lens' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/lens">Lens Type</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'lens-feature' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/lens-feature">Lens Features</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'size' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/size">Size</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'previlage-cards' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/previlage-cards">Previlage Card</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'previlage-card-types' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/previlage-card-types">Previlage Card Type</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'coupencode' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/coupencode">Coupen Code</a></li>
                                <li><a class="ms-link <?= $currentSegment == 'breakage-warranty' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/breakage-warranty">Breakage Warranty</a></li>
                                <?php } ?>
                                <li><a class="ms-link <?= $currentSegment == 'salesman' ? 'active' : ''; ?>" href="<?php echo base_url(); ?>/salesman">Salesman</a></li>


                            </ul>
                    </li>
             

                    
                    <?php if($session->get('user_type') == 'admin'){ ?>

                    <li class="collapsed">
                        <a class="m-link <?= $CustomerActive ? 'active' : ''; ?>" data-bs-toggle="collapse" data-bs-target="#customer" href="#">
                            <i class="icofont-notepad  fs-5"></i> <span>Registration</span> <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span></a>
                            <ul class="sub-menu collapse <?= $CustomerActive ? 'show' : ''; ?>" id="customer">
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
                <?php } ?>
                    

                    <li><a class="m-link" href="javascript:void(0);" onclick="clearStorageAndRedirect('<?php echo base_url(); ?>/logout')">
                    <i class="icofont-logout fs-5"></i> <span>Signout</span>
                  </a></li>

                </ul>
                <!-- Menu: menu collepce btn -->
                <button type="button" class="btn btn-link sidebar-mini-btn text-light">
                    <span class="ms-2"><i class="icofont-bubble-right"></i></span>
                </button>
            </div>
        </div>

        <!-- main body area -->
        <div class="main px-lg-4 px-md-4">

            <!-- Body: Header -->
            <div class="header">
                <nav class="navbar py-4">
                    <div class="container-xxl">

                        <!-- header rightbar icon -->
                        <div class="h-right d-flex align-items-center mr-5 mr-lg-0 order-1">
                            <!-- <div class="d-flex">
                                <a class="nav-link text-primary collapsed" href="help.html" title="Get Help">
                                    <i class="icofont-info-square fs-5"></i>
                                </a>
                            </div> -->
                           <!--  <div class="dropdown zindex-popover">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <img src="<?php echo base_url(); ?>/assets/images/flag/GB.png" alt="">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0">
                                        <ul class="list-unstyled py-2 px-3">
                                            <li>
                                                <a href="#" class=""><img src="<?php echo base_url(); ?>/assets/images/flag/GB.png" alt=""> English</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="<?php echo base_url(); ?>/assets/images/flag/DE.png" alt=""> German</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="<?php echo base_url(); ?>/assets/images/flag/FR.png" alt=""> French</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="<?php echo base_url(); ?>/assets/images/flag/IT.png" alt=""> Italian</a>
                                            </li>
                                            <li>
                                                <a href="#" class=""><img src="<?php echo base_url(); ?>/assets/images/flag/RU.png" alt=""> Russian</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="dropdown notifications">
                                <a class="nav-link dropdown-toggle pulse" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="icofont-alarm fs-5"></i>
                                    <span class="pulse-ring"></span>
                                </a>
                                <div id="NotificationsDiv" class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-md-end p-0 m-0 mt-3">
                                    <div class="card border-0 w380">
                                        <div class="card-header border-0 p-3">
                                            <h5 class="mb-0 font-weight-light d-flex justify-content-between">
                                                <span>Notifications</span>
                                                <span class="badge text-white">06</span>
                                            </h5>
                                        </div>
                                        <div class="tab-content card-body">
                                            <div class="tab-pane fade show active">
                                                <ul class="list-unstyled list mb-0">
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/xs/avatar1.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Chloe Walkerr</span> <small>2MIN</small></p>
                                                                <span class="">Added New Product 2021-07-15 <span class="badge bg-success">Add</span></span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <div class="avatar rounded-circle no-thumbnail">AH</div>
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Alan	Hill</span> <small>13MIN</small></p>
                                                                <span class="">Invoice generator </span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/xs/avatar3.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Melanie	Oliver</span> <small>1HR</small></p>
                                                                <span class="">Orader  Return RT-00004</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/xs/avatar5.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Boris Hart</span> <small>13MIN</small></p>
                                                                <span class="">Product Order to Toyseller</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2 mb-1 border-bottom">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/xs/avatar6.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Alan	Lambert</span> <small>1HR</small></p>
                                                                <span class="">Leave Apply</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="py-2">
                                                        <a href="javascript:void(0);" class="d-flex">
                                                            <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/xs/avatar7.svg" alt="">
                                                            <div class="flex-fill ms-2">
                                                                <p class="d-flex justify-content-between mb-0 "><span class="font-weight-bold">Zoe Wright</span> <small class="">1DAY</small></p>
                                                                <span class="">Product Stoke Entry Updated</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <a class="card-footer text-center border-top-0" href="#"> View all notifications</a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="dropdown user-profile ml-2 ml-sm-3 d-flex align-items-center zindex-popover">
                                <div class="u-info me-2">
                                    <p class="mb-0 text-end line-height-sm "><span class="font-weight-bold text-capitalize"><?= $session->get('user'); ?> </span></p>
                                    <small class="text-capitalize"><?= $session->get('user_type'); ?> Profile</small>
                                </div>
                                <a class="nav-link dropdown-toggle pulse p-0" href="#" role="button" data-bs-toggle="dropdown" data-bs-display="static">
                                    <img class="avatar lg rounded-circle img-thumbnail" src="<?php echo base_url(); ?>/assets/images/profile_av.svg" alt="profile">
                                </a>
                                <div class="dropdown-menu rounded-lg shadow border-0 dropdown-animation dropdown-menu-end p-0 m-0">
                                    <div class="card border-0 w280">
                                        <div class="card-body pb-0">
                                            <div class="d-flex py-1">
                                                <img class="avatar rounded-circle" src="<?php echo base_url(); ?>/assets/images/profile_av.svg" alt="profile">
                                                <div class="flex-fill ms-3">
                                                    <p class="mb-0"><span class="font-weight-bold text-capitalize"><?= $session->get('user'); ?></span></p>
                                                    <small class="text-capitalize"><?= $session->get('user_type'); ?> Profile</small>
                                                </div>
                                            </div>
                                            
                                            <div><hr class="dropdown-divider border-dark"></div>
                                        </div>
                                        <div class="list-group m-2 ">
                                            <!-- <a href="admin-profile.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-ui-user fs-5 me-3"></i>Profile Page</a> -->
                                            <!-- <a href="order-invoices.html" class="list-group-item list-group-item-action border-0 "><i class="icofont-file-text fs-5 me-3"></i>Order Invoices</a> -->
                                            <a href="javascript:void(0);" onclick="clearStorageAndRedirect('<?php echo base_url(); ?>/logout')" class="list-group-item list-group-item-action border-0 "><i class="icofont-logout fs-5 me-3"></i>Signout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!--  <div class="setting ms-2">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#Settingmodal"><i class="icofont-gear-alt fs-5"></i></a>
                            </div> -->
                        </div>
        
                        <!-- menu toggler -->
                        <button class="navbar-toggler p-0 border-0 menu-toggle order-3" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader">
                            <span class="fa fa-bars"></span>
                        </button>
        
                        <!-- main menu Search-->
                        <div class="order-0 col-lg-4 col-md-4 col-sm-12 col-12 mb-3 mb-md-0 ">
                            <!-- <div class="input-group flex-nowrap input-group-lg">
                                <input type="search" class="form-control" placeholder="Search" aria-label="search" aria-describedby="addon-wrapping">
                                <button type="button" class="input-group-text" id="addon-wrapping"><i class="fa fa-search"></i></button>
                            </div> -->
                        </div>
        
                    </div>
                </nav>
            </div>


<script>
   function clearStorageAndRedirect(url) {
      localStorage.clear();
      window.location.href = url;
   }
</script>