<?php include'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/cropper/cropper.min.css"><!--Cropperer Css -->   
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-lens-creation" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Lens Creation</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-8 col-lg-8">
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Basic information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                               <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="lensname" required>
                            </div> 
                            <div class="col-md-6">
                               <label  class="form-label">Lens Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                <select class="form-select" aria-label="" name="lens" required>
                                    <option selected="">Select Lens</option>
                                    <?php foreach ($lens as $lens) { ?>
                                    <option value="<?php echo $lens->id; ?>"><?php echo $lens->lens_name; ?></option>
                                    <?php } ?>
                                </select>
                                        
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Purchase Rate</label>
                                <input type="number" class="form-control" name="purchaserate">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">M.R.P</label>
                                <input type="number" class="form-control" name="mrp">
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Sales Rate </label>
                                <input type="number" class="form-control" name="salesrate" >
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Delivery Days <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="delivery_days" value="1" required>
                            </div>
                            <div class="col-md-6">
                                <label  class="form-label">Warranty Days <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="warranty" required>
                            </div>
                            
                        </div>
                    </div>

                </div>
                
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <!-- <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Features</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($features as $features){ ?>
                            <div class="form-check">
                                <input class="form-check-input mt-3" type="checkbox" name="features[]" value="<?= $features->id; ?>" id="feature<?= $features->id; ?>">
                                <img src="<?php echo base_url(); ?>/images/lensfeatures/<?= $features->image; ?>" style="height: 50px; border-radius: 50px;">
                                <label class="form-check-label" for="feature<?= $features->id; ?>">
                                <?= $features->description; ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div> -->



                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Lens Coating</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($coating as $coating){ ?>

                            <div class="form-check">
                                <input class="form-check-input mt-3" type="checkbox" name="coating[]" value="<?= $coating->id; ?>" id="coating<?= $coating->id; ?>">
                                <?php if($coating->image){?>
                                <img src="<?= base_url(); ?>/images/lenscoating/<?= $coating->image; ?>" style="height: 50px; border-radius: 50px;">
                                <?php } ?>
                                <label class="form-check-label mt-2" for="coating<?= $coating->id; ?>">
                                <?= $coating->coating_name; ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
   
                </div>
            </div>
        </div><!-- Row end  --> 
    </form>
        
    </div>
</div>    


 <!-- Jquery Core Js -->      
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Plugin -->  
    <script src="<?php echo base_url(); ?>/assets/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugin/multi-select/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>  
    <script src="<?php echo base_url(); ?>/assets/plugin/cropper/cropper.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugin/cropper/cropper-init.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bundles/dropify.bundle.js"></script>
    <script src="<?php echo base_url(); ?>/assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->   
    <script src="<?php echo base_url(); ?>/assets/js/template.js"></script>

    <?php if (session()->getFlashdata('alert')): ?>
        <script>
             const [type, title, message] = "<?php echo session()->getFlashdata('alert'); ?>".split('|');
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            }).then((result) => {
                // Redirect after the alert is closed
                if (result.isConfirmed || result.isDismissed) {
                    window.location.href = "<?php echo base_url('lens-creation'); ?>"; // Replace with your desired URL
                }
            });
        </script>
    <?php endif; ?>