<?php  
if($_SESSION['user_type'] == 'user'){
    include'user_header.php';
}else{
    include'header.php'; 
} ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/cropper/cropper.min.css"><!--Cropperer Css -->   
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/update-customer" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Customer Creation</h3>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
                <div class="card" >
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
     
                            <div class="card step" id="step-1">
                                <div class="card-body">

                                    <div class="row g-3 align-items-center">
                                        <input type="text" name="eid" value="<?php echo $editdata[0]->EyeTestId; ?>" hidden>

                                        <div class="col-md-3">
                                           <label  class="form-label">Register No </label>
                                            <input type="text" class="form-control" name="testno" value="<?php echo $editdata[0]->Testno; ?>" readonly>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Register Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="date" class="form-control" name="testdate" required value="<?php echo $editdata[0]->Test_date; ?>" >
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Customer Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="cutomer" required value="<?php echo $editdata[0]->CustomerName; ?>">
                                        </div> 
                                        <div class="col-md-3">
                                            <label  class="form-label">Age <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="age" required value="<?php echo $editdata[0]->CustomerAge; ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label class="form-label">Gender </span></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male" <?php if($editdata[0]->Gender == 'Male'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female" <?php if($editdata[0]->Gender == 'Female'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Mobile 1 <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="mob1" value="<?php echo $editdata[0]->MobileNo1; ?>" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Mobile 2</label>
                                            <input type="number" class="form-control" name="mob2" value="<?php echo $editdata[0]->MobileNo2; ?>">
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $editdata[0]->Email; ?>">
                                        </div>
                                    </div>
                                    <div class="float-end">
                                        <button type="submit" class="btn btn-secondary mt-2">Save & Eyetest</button>
                                        <button type="button" class="btn btn-primary mt-2" onclick="nextStep()">Save & Prescription</button>

                                    </div>
                                </div>

                            </div>



                            <div class="card step" id="step-2" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Prescription</h6>
                                </div>
                             
                                <div class="card-body">
                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $Prescription = json_decode($editdata[0]->Prescription, true); ?>

                                            <tr>
                                                <td>SPH</td>
                                                <td><input type="text" class="form-control" name="prescription_sph_right" value="<?= !empty($Prescription['right']['sph']) ? $Prescription['right']['sph'] : '' ?>"></td>
                                                <td><input type="text" class="form-control" name="prescription_sph_left" value="<?= !empty($Prescription['left']['sph']) ? $Prescription['left']['sph'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>CYL</td>
                                                <td><input type="text" class="form-control" name="prescription_cyl_right" value="<?= !empty($Prescription['right']['cyl']) ? $Prescription['right']['cyl'] : '' ?>"></td>
                                                <td><input type="text" class="form-control" name="prescription_cyl_left" value="<?= !empty($Prescription['left']['cyl']) ? $Prescription['left']['cyl'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>AXIS</td>
                                                <td><input type="text" class="form-control" name="prescription_axis_right" value="<?= !empty($Prescription['right']['axis']) ? $Prescription['right']['axis'] : '' ?>"></td>
                                                <td><input type="text" class="form-control" name="prescription_axis_left" value="<?= !empty($Prescription['left']['axis']) ? $Prescription['left']['axis'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>ADD</td>
                                                <td><input type="text" class="form-control" name="prescription_add_right" value="<?= !empty($Prescription['right']['add']) ? $Prescription['right']['add'] : '' ?>"></td>
                                                <td><input type="text" class="form-control" name="prescription_add_left" value="<?= !empty($Prescription['left']['add']) ? $Prescription['left']['add'] : '' ?>"></td>
                                            </tr>
                                            <tr>
                                                <td>PD</td>
                                                <td><input type="text" class="form-control" name="prescription_pd_right" value="<?= !empty($Prescription['right']['pd']) ? $Prescription['right']['pd'] : '' ?>"></td>
                                                <td><input type="text" class="form-control" name="prescription_pd_left" value="<?= !empty($Prescription['left']['pd']) ? $Prescription['left']['pd'] : '' ?>"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card step" id="step-3" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Check GP Outside From Clinic</h6>
                                </div>
                            
                                <div class="card-body">
                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gpoutside" value="Comfortable" <?php if($editdata[0]->GPOutside == 'Comfortable'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Comfortable
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gpoutside" value="Discomfortable" <?php if($editdata[0]->GPOutside == 'Discomfortable'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Discomfortable
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Advice</h6>
                                    </div>
                                    
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <div class="">
                                                <label class="form-label">Usage </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="adviceusage" value="Constant Use" <?php if($editdata[0]->adviceUsage == 'Constant Use'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Constant Use
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="adviceusage" value="Occasional Use" <?php if($editdata[0]->adviceUsage == 'Occasional Use'){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Occasional Use
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Lens Design</h6>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($lens as $lens){ ?>
                                            <?php $lensdesign = explode(',', $editdata[0]->advice_lensDesign);  ?>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="lensdesign[]" value="<?= $lens->id; ?>" id="sizechek<?= $lens->id; ?>" <?php echo in_array($lens->id, $lensdesign) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="sizechek<?= $lens->id; ?>">
                                            <?= $lens->lens_name; ?>
                                            </label>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                     
                                        <button type="submit" class="btn btn-primary mt-2 text-uppercase">Save</button>
                                    </div>
                                   
                                </div>
                            </div>                
                            
                        </div>
                    </div>
                </div>

        </div><!-- Row end  --> 
    </form>
        <!-- <a href="#topsec" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a> -->
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
            });
        </script>
    <?php endif; ?>

    <!-- pagination -->
    <script>
        let currentStep = 1;

        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.step').forEach(function(stepDiv) {
                stepDiv.style.display = 'none';
            });
            
            // Show the current step
            document.getElementById('step-' + step).style.display = 'block';
        }

        function validateStep(step) {
            // Get the current step's container
            const currentStepDiv = document.getElementById('step-' + step);
            
            // Select all elements with the 'required' attribute within the current step
            const requiredElements = currentStepDiv.querySelectorAll('[required]');

            let valid = true;

            requiredElements.forEach(function(element) {
                // Check if the element is valid
                if (element.tagName === 'select') {
                    // For select boxes, check if the value is not the default (empty or "0")
                    if (element.value === '' || element.value === '0') {
                        valid = false;
                        element.classList.add('is-invalid');  // Add an 'is-invalid' class for invalid selects
                    } else {
                        element.classList.remove('is-invalid');  // Remove invalid class if valid
                    }
                } else if (!element.value || (element.type === 'checkbox' && !element.checked)) {
                    // For other input elements, check if they are valid
                    valid = false;
                    element.classList.add('is-invalid');  // Add 'is-invalid' class for invalid fields
                } else {
                    element.classList.remove('is-invalid');  // Remove invalid class if valid
                }
            });

            return valid;
        }

        function nextStep() {
            // Validate the current step before moving to the next one
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            } else {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Please fill out all required fields.',
                });
            }
        }

        function prevStep() {
            currentStep--;
            showStep(currentStep);
        }

        // Initial display of the first step
        showStep(currentStep);

    </script>

