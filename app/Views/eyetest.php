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

        <form method="post" action="<?php echo base_url(); ?>/save-eye-test" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Eye Test</h3>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
                <div class="card" >
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
     
                            <!-- <div class="card step" id="step-1">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 1</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">Customer Register</h6>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-3">
                                           <label  class="form-label">Register No </label>
                                            <input type="text" class="form-control" name="testno" value="<?= $maxtestno; ?>" readonly>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Register Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="date" class="form-control" name="testdate" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Customer Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="cutomer" required>
                                        </div> 
                                        <div class="col-md-3">
                                            <label  class="form-label">Age <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="age" required>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="">
                                                <label class="form-label">Gender </span></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Male">
                                                <label class="form-check-label">
                                                    Male
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" value="Female">
                                                <label class="form-check-label">
                                                    Female
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Mobile 1 <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="mob1" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Mobile 2</label>
                                            <input type="number" class="form-control" name="mob2" >
                                        </div>
                                        <div class="col-md-3">
                                            <label  class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                    <div class="float-end">
                                        <button type="button" class="btn btn-primary mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>

                            </div> -->


                            <div class="card step" id="step-1" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 2</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">History Taking</h6>

                                    <div class="row g-3 align-items-center">
                                        <input type="text" class="form-control" name="eid" value="<?= $eyetestId; ?>" hidden>
                                        <div class="col-md-12">
                                            <label  class="form-label">Customer History</label>
                                            <textarea name="c_history" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="float-end">
                                        <!-- <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button> -->
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="card step" id="step-2" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 3</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-4">
                                           <label  class="form-label">Occupation </label>
                                            <select class="form-select" aria-label="Default select example" name="occupation" >
                                                <option selected="">Select Occupation</option>
                                                <option value="Salaried">Salaried</option>
                                                <option value="Business">Business</option>
                                                <option value="Student">Student</option>
                                                <option value="Others">Others</option>
                                            </select>   
                                        </div>

                                        <div class="col-md-4">
                                            <label  class="form-label">Digital Usage </label>
                                            <select class="form-select" aria-label="Default select example" name="digitalusage" >
                                                <option selected="">Select Digital Usage</option>
                                                <option value="3HRS">3HRS</option>
                                                <option value="4HRS">4HRS</option>
                                                <option value="5HRS">5HRS</option>
                                                <option value="6HRS">6HRS</option>
                                                <option value="7HRS">7HRS</option>
                                                <option value="8HRS">8HRS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card step" id="step-3" style="display:none;">
                  
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 4</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">AR Power</h6>

                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SPH</td>
                                                <td><input type="text" class="form-control" name="sph_right"></td>
                                                <td><input type="text" class="form-control" name="sph_left"></td>
                                            </tr>
                                            <tr>
                                                <td>CYL</td>
                                                <td><input type="text" class="form-control" name="cyl_right"></td>
                                                <td><input type="text" class="form-control" name="cyl_left"></td>
                                            </tr>
                                            <tr>
                                                <td>ADD</td>
                                                <td><input type="text" class="form-control" name="add_right"></td>
                                                <td><input type="text" class="form-control" name="add_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold mx-auto">OR</h6>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Capture Photo</label>
                                        <input type="file" class="form-control" name="capturephoto" onchange="previewImages(this)">
                                        <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                                    </div>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>

                                </div>
                            </div>


                            <div class="card step" id="step-4" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 5</h6>
                                </div>
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">Unaided Vision</h6>

                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Distance Vision</td>
                                                <td><input type="text" class="form-control" name="unaided_dist_vision_right"></td>
                                                <td><input type="text" class="form-control" name="unaided_dist_vision_left"></td>
                                            </tr>
                                            <tr>
                                                <td>Near Vision</td>
                                                <td><input type="text" class="form-control" name="unaided_near_vision_right"></td>
                                                <td><input type="text" class="form-control" name="unaided_near_vision_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Pinhole Vision</h6>
                                    </div>
                                    
                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Distance Vision</td>
                                                <td><input type="text" class="form-control" name="pinhole_dist_vision_right"></td>
                                                <td><input type="text" class="form-control" name="pinhole_dist_vision_left"></td>
                                            </tr>
                                            <tr>
                                                <td>Near Vision</td>
                                                <td><input type="text" class="form-control" name="pinhole_near_vision_right"></td>
                                                <td><input type="text" class="form-control" name="pinhole_near_vision_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">PGP Vision</h6>
                                    </div>

                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Distance Vision</td>
                                                <td><input type="text" class="form-control" name="pgp_dist_vision_right"></td>
                                                <td><input type="text" class="form-control" name="pgp_dist_vision_left"></td>
                                            </tr>
                                            <tr>
                                                <td>Near Vision</td>
                                                <td><input type="text" class="form-control" name="pgp_near_vision_right"></td>
                                                <td><input type="text" class="form-control" name="pgp_near_vision_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                   
                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>



                            <div class="card step" id="step-5" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 6</h6>
                                </div>

                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">Flash Tourch</h6>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-5">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="flashtourch" value="Normal">
                                                <label class="form-check-label">
                                                    Normal
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="flashtourch" value="Upnormal">
                                                <label class="form-check-label">
                                                    Upnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <label  class="form-label">Description</label>
                                            <textarea name="flashdesc" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <h6 class="m-0 fw-bold">Cover & Uncover Test</h6>
                      
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-5">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="coveruncovertest" value="Normal">
                                                <label class="form-check-label">
                                                    Normal
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="coveruncovertest" value="Upnormal">
                                                <label class="form-check-label">
                                                    Upnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <label  class="form-label">Description</label>
                                            <textarea name="coveruncovertestdesc" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <h6 class="m-0 fw-bold">Convergence Test</h6>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-5">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="convergencetest" value="Normal">
                                                <label class="form-check-label">
                                                    Normal
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="convergencetest" value="Upnormal">
                                                <label class="form-check-label">
                                                    Upnormal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <label  class="form-label">Description</label>
                                            <textarea name="convergencetestdesc" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>


                            <div class="card step" id="step-6" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 7</h6>
                                </div>
                
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">PD Measurement</h6>
                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                                <th>Both Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" name="pd_right"></td>
                                                <td><input type="text" class="form-control" name="pd_left"></td>
                                                <td><input type="text" class="form-control" name="pd_both"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card step" id="step-7" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 8</h6>
                                </div>
           
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">Duochrome</h6>
                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Red</td>
                                                <td><input type="text" class="form-control" name="duochrome_red_right"></td>
                                                <td><input type="text" class="form-control" name="duochrome_red_left"></td>
                                            </tr>
                                            <tr>
                                                <td>Green</td>
                                                <td><input type="text" class="form-control" name="duochrome_green_right"></td>
                                                <td><input type="text" class="form-control" name="duochrome_green_left"></td>
                                            </tr>
                                            <tr>
                                                <td>Both are same</td>
                                                <td><input type="text" class="form-control" name="duochrome_both_right"></td>
                                                <td><input type="text" class="form-control" name="duochrome_both_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">JCC</h6>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="jcc" value="Refined">
                                                <label class="form-check-label">
                                                    Refined
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="jcc" value="Not Refined">
                                                <label class="form-check-label">
                                                    Not Refined
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card step" id="step-8" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 9</h6>
                                </div>
                             
                                <div class="card-body">
                                    <h6 class="m-0 fw-bold">Prescription</h6>
                                    <table id="" class="table display cust-border-none dataTable table-hover align-middle" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Right Eye</th>
                                                <th>Left Eye</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>SPH</td>
                                                <td><input type="text" class="form-control" name="prescription_sph_right"></td>
                                                <td><input type="text" class="form-control" name="prescription_sph_left"></td>
                                            </tr>
                                            <tr>
                                                <td>CYL</td>
                                                <td><input type="text" class="form-control" name="prescription_cyl_right"></td>
                                                <td><input type="text" class="form-control" name="prescription_cyl_left"></td>
                                            </tr>
                                            <tr>
                                                <td>AXIS</td>
                                                <td><input type="text" class="form-control" name="prescription_axis_right"></td>
                                                <td><input type="text" class="form-control" name="prescription_axis_left"></td>
                                            </tr>
                                            <tr>
                                                <td>ADD</td>
                                                <td><input type="text" class="form-control" name="prescription_add_right"></td>
                                                <td><input type="text" class="form-control" name="prescription_add_left"></td>
                                            </tr>
                                            <tr>
                                                <td>PD</td>
                                                <td><input type="text" class="form-control" name="prescription_pd_right"></td>
                                                <td><input type="text" class="form-control" name="prescription_pd_left"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="float-end">
                                        <button type="button" class="btn btn-secondary mt-2" onclick="prevStep()">Previous</button>
                                        <button type="button" class="btn btn-primary  mt-2" onclick="nextStep()">Next</button>
                                    </div>
                                </div>
                            </div>

                            <div class="card step" id="step-9" style="display:none;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                    <h6 class="m-0 fw-bold">Step 10</h6>
                                </div>
                            
                                <div class="card-body">
                                    <div class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
                                        <h6 class="m-0 fw-bold">Check GP Outside From Clinic</h6>
                                    </div>
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gpoutside" value="Comfortable">
                                                <label class="form-check-label">
                                                    Comfortable
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="gpoutside" value="Discomfortable">
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
                                                <input class="form-check-input" type="radio" name="adviceusage" value="Constant Use">
                                                <label class="form-check-label">
                                                    Constant Use
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="adviceusage" value="Occasional Use">
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
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="lensdesign[]" value="<?= $lens->id; ?>" id="sizechek<?= $lens->id; ?>">
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
            }).then((result) => {
                // Redirect after the alert is closed
                if (result.isConfirmed || result.isDismissed) {
                    window.location.href = "<?php echo base_url('eye-test'); ?>"; // Replace with your desired URL
                }
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

