<?php include'user_header.php'; ?>

<!-- Body: Body -->
<div class="body d-flex py-3 mt-2">
    <div class="container-xxl">

        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <div class="col">
                <div class="alert-success alert mb-0" onclick="clearStorageAndRedirect('<?php echo base_url(); ?>/sales')">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-success text-light"><i class="icofont-ui-cart fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Sale </div>
                            <span class="small">
                                <a href="javascript:void(0);" onclick="clearStorageAndRedirect('<?php echo base_url(); ?>/sales')"> Add New <i class="icofont-arrow-right fa-lg"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col">
                <div class="alert-danger alert mb-0" onclick="window.location.href='<?php echo base_url(); ?>/sales-report';">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-danger text-light"><i class="icofont-page fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Sales Report</div>
                             <span class="small">
                                <a href="<?php echo base_url(); ?>/sales-report"> Show Reports <i class="icofont-arrow-right fa-lg"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="alert-warning alert mb-0" onclick="window.location.href='<?php echo base_url(); ?>/sales-return';">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-warning text-light"><i class="fa fa-retweet fa-lg"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">Sales Return</div>
                            <span class="small">
                                <a href="<?php echo base_url(); ?>/sales-return"> Show Returns <i class="icofont-arrow-right fa-lg"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col">
                <div class="alert-info alert mb-0">
                    <div class="d-flex align-items-center">
                        <div class="avatar rounded no-thumbnail bg-info text-light"><i class="fa fa-shopping-bag" aria-hidden="true"></i></div>
                        <div class="flex-fill ms-3 text-truncate">
                            <div class="h6 mb-0">New StoreOpen</div>
                            <span class="small">8,925</span>
                        </div>
                    </div>
                </div>
            </div> -->
        </div> 

        
    </div>
</div>
<script>
   function clearStorageAndRedirect(url) {
      localStorage.clear();
      window.location.href = url;
   }
</script>

<?php if (session()->getFlashdata('clear_localstorage')): ?>
   <script>
      localStorage.clear();
   </script>
<?php endif; ?>

<?php include'footer.php'; ?>
