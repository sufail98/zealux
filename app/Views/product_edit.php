<?php include'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/cropper/cropper.min.css"><!--Cropperer Css -->   
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/update-product" enctype="multipart/form-data" id="productForm">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Products Edit</h3>
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
                                  <input type="text" name="pid" value="<?php echo $editdata[0]->pid; ?>" hidden>

                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                   <label  class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand" value="<?= $editdata[0]->brand; ?>">
                                </div> 
                                <div class="col-md-6">
                                    <label  class="form-label">PID/Barcode <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="text" class="form-control" name="barcode" value="<?= $editdata[0]->barcode; ?>" required>
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="text" class="form-control" name="pname" required value="<?= $editdata[0]->productName; ?>">
                                </div>
                                <div class="col-md-4">
                                   <label  class="form-label">Group <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="group" required>
                                        <option selected="">select Group</option>
                                        <?php foreach ($groups as $groups) { ?>
                                           <option value="<?php echo $groups->id; ?>" <?php if($groups->id==$editdata[0]->group){echo 'selected=""';}?>><?php echo $groups->group_name; ?></option>
                                          <?php } ?>
                                    </select>
                                            
                                </div>
                                <div class="col-md-4">
                                   <label  class="form-label">Model <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="model" required>
                                        <option selected="">Select Model</option>
                                        <option value="Full Frame" <?php if($editdata[0]->model == 'Full Frame'){echo 'selected=""';}?>>Full Frame</option>
                                        <option value="Half Frame" <?php if($editdata[0]->model == 'Half Frame'){echo 'selected=""';}?>>Half Frame</option>
                                        <option value="Rimless" <?php if($editdata[0]->model == 'Rimless'){echo 'selected=""';}?>>Rimless</option>
                                    </select>   
                                </div>
                                <div class="col-md-4">
                                    <label  class="form-label">Warranty Days <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="number" class="form-control" name="warranty" required value="<?= $editdata[0]->warranty_days; ?>">
                                </div>
                                <!-- <div class="col-md-12">
                                    <label class="form-label">Product Description</label>
                                   
                                    <textarea class="form-control" id="editor" placeholder="Description..." name="pdescription" rows="5">
                                        <?= $editdata[0]->description; ?>
                                    </textarea>
                                </div> -->
                            </div>
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold ">Images  <span style="color: #f00; font-size: 15px;">*</span></h6>
                    </div>
                    <div class="card-body">
                        
                            <div class="row g-3 align-items-center">
                                
                                
                                <div class="col-md-12">
                                    <div class="product-cart">
                                        <div class="checkout-table table-responsive">
                                            <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th class="product">Product</th>
                                                        <th class="product">Color Name</th>
                                                        <th class="quantity">Color</th>
                                                        <th class="price">Stock</th>
                                                        <th class="quantity">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                     for ($i= 0; $i<count($editsplitdata); $i++) { 
                                                        $images = json_decode($editsplitdata[$i]->colorImage);
                                                        ?>
                                                    <tr class="tabRow">
                                                        <td>
                                                            <div class="product-cart d-flex align-items-center">
                                                                <div class="product-thumb">
                                                                    <!-- <img src="<?php echo base_url(); ?>/assets/images/product/upload.png" class="img-fluid avatar xl" alt=""> -->

                                                                     <input type="file" name="product_images<?php echo $i; ?>[]" accept="image/*" class="form-control" multiple onchange="previewImages(this)">
                                                                   

                                                                    <div class="image-preview d-flex mt-2" id="image-preview-<?php echo $i; ?>">
                                                                        <?php if (!empty($images)) {
                                                                            foreach ($images as $image) { ?>
                                                                                <div class="image-item">
                                                                                    <img src="<?php echo base_url('images/product/' . $image); ?>" class="img-thumbnail" alt="">
                                                                                </div>
                                                                            <?php } 
                                                                        } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Color Name" name="colorname[]" required value="<?php echo $editsplitdata[$i]->colorName;?>">
                                                        </td>
                                                        <td>
                                                            <input type="color" class="form-control" name="colorcode[]" required value="<?php echo $editsplitdata[$i]->colorCode;?>">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" value="<?php echo $editsplitdata[$i]->stock;?>" name="stock[]" min="1" required>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <button type="button" class="btn btn-outline-secondary deleterow" id="btnremove"><i class="icofont-ui-delete text-danger"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <a class="btn btn-sm btn-outline-primary" id="butVal"><span class="icofont-plus"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                        <h6 class="m-0 fw-bold">Features <span style="color: #f00; font-size: 15px;">*</span></h6>
                    </div>
                    <div class="card-body">
                        <?php foreach ($features as $features){ ?>
                            <?php $efeatures = explode(',', $editdata[0]->feature);  ?>
                        <div class="form-check">
                            <input class="form-check-input mt-3" type="checkbox" name="features[]" value="<?= $features->id; ?>" id="feature<?= $features->id; ?>" <?php echo in_array($features->id, $efeatures) ? 'checked' : ''; ?>>
                            <img src="<?php echo base_url(); ?>/images/features/<?= $features->image; ?>" style="height: 50px; border-radius: 50px;">
                            <label class="form-check-label" for="feature<?= $features->id; ?>">
                            <?= $features->description; ?>
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Pricing Info</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Purchase Rate</label>
                                    <input type="number" class="form-control" name="purchase_rate" value="<?= $editdata[0]->purchase_rate; ?>">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">M.R.P</label>
                                    <input type="number" class="form-control" name="mrp" value="<?= $editdata[0]->mrp; ?>">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Sales Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="number" class="form-control" name="salesrate" value="<?= $editdata[0]->sales_rate; ?>" required>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Supported Lens <span style="color: #f00; font-size: 15px;">*</span></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($lens as $lens){ ?>

                            <?php $supportedLenses = explode(',', $editdata[0]->supportedLense);  ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="supportedlense[]" value="<?= $lens->id; ?>" id="sizechek<?= $lens->id; ?>" <?php echo in_array($lens->id, $supportedLenses) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sizechek<?= $lens->id; ?>">
                                <?= $lens->lens_name; ?>
                                </label>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Size <span style="color: #f00; font-size: 15px;">*</span></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($size as $size){ ?>

                            <?php $sizes = explode(',', $editdata[0]->size);  ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="<?= $size->id; ?>" id="sizechek<?= $size->id; ?>" <?php echo in_array($size->id, $sizes) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sizechek<?= $size->id; ?>">
                                <?= $size->size_name; ?>
                                </label>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Visibility Status</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="1" <?php if($editdata[0]->active_status == '1'){echo 'checked=""';}?>>
                                <label class="form-check-label">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="2" <?php if($editdata[0]->active_status == '2'){echo 'checked=""';}?>>
                                <label class="form-check-label">
                                    Scheduled
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="0" <?php if($editdata[0]->active_status == '0'){echo 'checked=""';}?>>
                                <label class="form-check-label">
                                    Hidden
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Publish Schedule</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Publish Date</label>
                                    <input type="date" class="form-control w-100" name="publishdate" value="<?= $editdata[0]->publish_date; ?>">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Publish Time</label>
                                    <input type="time" class="form-control w-100" name="publishtime" value="<?= $editdata[0]->publish_time; ?>">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    
                    
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
                    window.location.href = "<?php echo base_url('products'); ?>"; // Replace with your desired URL
                }
            });
        </script>
    <?php endif; ?>


    <script>
        function previewImages(input) {
            const row = $(input).closest('tr'); // Find the closest row
            const preview = row.find('.image-preview'); // Find the preview container

            preview.empty(); // Clear existing previews

            if (input.files) {
                for (let i = 0; i < input.files.length; i++) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail');
                        preview.append(img); // Add new image to preview container
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }

    </script>

    <script>
        $(document).ready(function() {

            let imageIndex = 0;
        // Function to add a new row
          $('#butVal').click(function () {
            // Clone the first row and append it to the tbody
            const newRow = $('tr.tabRow:first').clone(true).appendTo('#myCartTable>tbody');

            // Clear the input fields in the newly added row
            newRow.find('input').val('');
            newRow.find('.image-preview').empty(); // Clear the image preview

            // Reset the file input so it doesn't retain previous files
            newRow.find('input[type="file"]').val('');

            // Increment the index for product_images[]
            imageIndex++;

            // Update the name attribute of the file input for the new row
            newRow.find('input[type="file"]').attr('name', `product_images${imageIndex}[]`);

            // Update the serial numbers
            updateRowNumbers();
          });

          // Function to remove a row
          $(document).on('click', '#btnremove', function () {
            // Ensure at least one row remains
            if ($('#myCartTable tbody tr').length > 1) {
              $(this).closest('tr.tabRow').remove();
              updateRowNumbers();
            } else {
              $(this).closest('tr.tabRow').find('input').val(''); // Clear the fields if it's the last row
            }
          });

          // Function to update row numbers after adding/removing
          function updateRowNumbers() {
            $('#myCartTable tbody tr.tabRow').each(function (index, element) {
              $(element).find('td.sno input').val(index + 1); // Update serial number
            });
          }



        //Ch-editer
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
            //Datatable
            $('#myCartTable')
            .addClass( 'nowrap' )
            .dataTable( {
                responsive: true,
                columnDefs: [
                    { targets: [-1, -3], className: 'dt-body-right' }
                ]
            });
            
           //Multiselect
           $('#optgroup').multiSelect({ selectableOptgroup: true });
        });

        $(function() {
            $('.dropify').dropify();

            var drEvent = $('#dropify-event').dropify();
            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-dÃ©posez un fichier ici ou cliquez',
                    replace: 'Glissez-dÃ©posez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'DÃ©solÃ©, le fichier trop volumineux'
                }
            });
        });
            
    </script>

    <style>
        .image-preview img {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
        }
    </style>


