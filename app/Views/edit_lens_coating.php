<?php include'header.php'; ?>
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/update-lens-coating" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Lens Coating</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-12 col-lg-12">
                <div class="card mb-3">
                    <input type="text" name="cid" value="<?= $editdata[0]->id; ?>" hidden>
                   
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                               <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="coatingname" required value="<?= $editdata[0]->coating_name; ?>">
                            </div> 
                            <div class="col-md-3">
                                <label  class="form-label">Sales Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="amount" required value="<?= $editdata[0]->amount; ?>">
                            </div>
                            <div class="col-md-3">
                                <label  class="form-label">Purchase Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="purchase" required value="<?= $editdata[0]->purchase_rate; ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" placeholder="Description..." name="desc"><?= $editdata[0]->description; ?></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Image <span style="color: #f00; font-size: 15px;">*</span></label>
                                 <img id="loadImage" src="<?php echo base_url(); ?>/images/lenscoating/<?= $editdata[0]->image; ?>" style="height: 100px; margin-top: 20px; margin-bottom: 20px;">
                                <input type="file" name="coatimage" accept="image/*" class="form-control" onchange="previewImages(this)" >
                                <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                            </div>
                            
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

    <!-- Jquery Page Js -->   
    <script src="<?php echo base_url(); ?>/assets/js/template.js"></script>

    <?php if (session()->getFlashdata('alert')): ?>
        <script>
             const [type, title, message] = "<?php echo session()->getFlashdata('alert'); ?>".split('|');
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            });
        </script>
    <?php endif; ?>

<script>
    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#loadImage').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#coatimage").change(function() {
  readURL(this);
});
</script>