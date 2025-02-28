<?php include'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/cropper/cropper.min.css"><!--Cropperer Css -->   
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-product" enctype="multipart/form-data" id="productForm">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Products Add</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase" onclick="validateCheckboxes()">Save</button>
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
                                   <label  class="form-label">Brand</label>
                                    <input type="text" class="form-control" name="brand">
                                </div> 
                                <div class="col-md-6">
                                    <label  class="form-label">PID/Barcode <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="text" class="form-control" name="barcode" required>
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="text" class="form-control" name="pname" required>
                                </div>
                                <div class="col-md-4">
                                   <label  class="form-label">Group <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="group" required>
                                        <option selected="">Select Group</option>
                                        <?php foreach ($groups as $groups) { ?>
                                        <option value="<?php echo $groups->id; ?>"><?php echo $groups->group_name; ?></option>
                                        <?php } ?>
                                        
                                    </select>
                                            
                                </div>
                                <div class="col-md-4">
                                   <label  class="form-label">Model <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <select class="form-select" aria-label="Default select example" name="model" required>
                                        <option selected="">Select Model</option>
                                        <option value="Full Frame">Full Frame</option>
                                        <option value="Half Frame">Half Frame</option>
                                        <option value="Rimless">Rimless</option>
                                    </select>   
                                </div>
                                <div class="col-md-4">
                                    <label  class="form-label">Warranty Days <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="number" class="form-control" name="warranty" required>
                                </div>
                                <!-- <div class="col-md-12">
                                    <label class="form-label">Product Description</label>
                                   
                                    <textarea class="form-control" id="editor" placeholder="Description..." name="pdescription" rows="5">
                                        
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
                                                    <tr class="tabRow">
                                                        <td>
                                                            <div class="product-cart d-flex align-items-center">
                                                                <div class="product-thumb">
                                                                    <!-- <img src="<?php echo base_url(); ?>/assets/images/product/upload.png" class="img-fluid avatar xl" alt=""> -->

                                                                     <input type="file" name="product_images0[]" accept="image/*" class="form-control" multiple onchange="previewImages(this)" required>
                                                                    <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Color Name" name="colorname[]" required>
                                                        </td>
                                                        <td>
                                                            <input type="color" class="form-control" name="colorcode[]" required>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control" value="1" name="stock[]" min="1" required>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <button type="button" class="btn btn-outline-secondary deleterow" id="btnremove"><i class="icofont-ui-delete text-danger"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
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
                        <h6 class="m-0 fw-bold">Features</h6>
                    </div>
                    <div class="card-body">
                        <?php foreach ($features as $features){ ?>
                        <div class="form-check">
                            <input class="form-check-input mt-3" type="checkbox" name="features[]" value="<?= $features->id; ?>" id="feature<?= $features->id; ?>">
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
                                    <input type="number" class="form-control" name="purchase_rate">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">M.R.P</label>
                                    <input type="number" class="form-control" name="mrp">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Sales Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                    <input type="number" class="form-control" name="salesrate" required>
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="supportedlense[]" value="<?= $lens->id; ?>" id="sizechek<?= $lens->id; ?>" >
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="size[]" value="<?= $size->id; ?>" id="sizechek<?= $size->id; ?>">
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
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="1" checked>
                                <label class="form-check-label">
                                    Published
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="2">
                                <label class="form-check-label">
                                    Scheduled
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="visibilitystatus" value="0">
                                <label class="form-check-label">
                                    Hidden
                                </label>
                            </div>
                        </div>
                    </div>
                   <!--  <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                            <h6 class="m-0 fw-bold">Publish Schedule</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-12">
                                    <label  class="form-label">Publish Date</label>
                                    <input type="date" class="form-control w-100" name="publishdate">
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Publish Time</label>
                                    <input type="time" class="form-control w-100" name="publishtime">
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


        function validateCheckboxes() {
            const imageInput = document.querySelector('input[name="product_images0[]"]');
            const imageFiles = imageInput.files;
            if (imageFiles.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select at least one product image.',
                });
                return;
            }

            const sizeCheckboxes = document.querySelectorAll('input[name="size[]"]');
            const featureCheckboxes = document.querySelectorAll('input[name="features[]"]');
            const lensCheckboxes = document.querySelectorAll('input[name="supportedlense[]"]');

            let isSizeChecked = false;
            let isFeatureChecked = false;
            let isLensChecked = false;

            // Check if at least one size checkbox is checked
            sizeCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isSizeChecked = true;
                }
            });

            // Check if at least one feature checkbox is checked
            featureCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isFeatureChecked = true;
                }
            });

            // Check if at least one supported lens checkbox is checked
            lensCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    isLensChecked = true;
                }
            });

            if (!isLensChecked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select at least one supported lens.',
                });
                return false;
            }

            if (!isSizeChecked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select at least one size.',
                });
                return false;
            }

            if (!isFeatureChecked) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please select at least one feature.',
                });
                return false;
            }

            // Submit the form if all validations pass
            document.getElementById('productForm').submit();
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
            newRow.find('input[name="stock[]"]').val('1');

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


