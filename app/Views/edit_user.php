<?php include'header.php'; ?>
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/update-user" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Update User</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
                <div class="card" >
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                        <input type="text" class="form-control" name="uid" value="<?= $editdata[0]->id; ?>" hidden>
                            
                            <div class="card">
                                <div class="card-body">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-3">
                                           <label  class="form-label">User Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="username" value="<?= $editdata[0]->username; ?>" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Password <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="password" value="<?= $editdata[0]->password; ?>" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">User Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <select class="form-select" aria-label="" name="user_type" required>
                                                <option selected="">Select Type</option>
                                                <option value="admin" <?php if($editdata[0]->user_type == 'admin'){echo 'selected=""';}?>>Admin</option>
                                                <option value="user" <?php if($editdata[0]->user_type == 'user'){echo 'selected=""';}?>>User</option>
                                            </select>
                                                    
                                        </div>

                                        <div class="col-md-3">
                                            <div class="">
                                                <label class="form-label">Status </span></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="1" <?php if($editdata[0]->status == 1){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="0" <?php if($editdata[0]->status == 0){echo 'checked=""';}?>>
                                                <label class="form-check-label">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                        
                                    </div>
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
