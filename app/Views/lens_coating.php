<?php include'header.php'; ?>
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-lens-coating" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Lens Coating</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-8 col-lg-8">
                <div class="card mb-3">
                   
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                               <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="coatingname" required>
                            </div> 
                            <div class="col-md-3">
                                <label  class="form-label">Sales Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                            <div class="col-md-3">
                                <label  class="form-label">Purchase Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="purchase" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" placeholder="Description..." name="desc"></textarea>
                            </div>
                           <!--  <div class="col-md-6">
                                <label class="form-label">Image <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="file" name="coatimage" accept="image/*" class="form-control" onchange="previewImages(this)" required>
                                <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                            </div> -->
   
                            
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
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
    function previewImages(input) {
        var previewContainer = input.nextElementSibling; // Find the image preview container
        previewContainer.innerHTML = ""; // Clear any previous images

        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    var imgElement = document.createElement("img");
                    imgElement.src = event.target.result;
                    imgElement.classList.add("img-thumbnail", "m-1");
                    imgElement.style.maxWidth = "100px"; // Adjust size of the preview images

                    previewContainer.appendChild(imgElement);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }
    }
</script>