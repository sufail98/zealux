<?php include'header.php'; ?>
   
<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-user" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Add User</h3>
                    <button type="submit" id="saveBtn" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
                <div class="card" >
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
     
                            <div class="card">
                                <div class="card-body">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-3">
                                           <label  class="form-label">User Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="username" id="username" required>
                                            <small id="usernameFeedback" class="form-text"></small>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Password <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label class="form-label">User Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <select class="form-select" aria-label="" name="user_type" required>
                                                <option selected="">Select Type</option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                                    
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Store <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <select class="form-select" aria-label="" name="store" required>
                                                <option selected="">Select Store</option>
                                                <?php foreach ($stores as $stores) { ?>
                                                <option value="<?php echo $stores->storeId; ?>"><?php echo $stores->store_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="">
                                                <label class="form-label">Status </span></label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="1">
                                                <label class="form-check-label">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="0">
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

<script>
  $(document).ready(function () {
    $('#username').on('keyup', function () {
      var username = $(this).val().trim();

      if (username.length >= 3) { 
        $.ajax({
          url: '<?php echo base_url("check-username"); ?>',
          type: 'POST',
          data: { username: username },
          success: function (response) {
            if (response === 'available') {
              $('#usernameFeedback').text('✅ Username is available').css('color', 'green');
               $('#saveBtn').prop('disabled', false);
            } else {
              $('#usernameFeedback').text('❌ Username is already taken').css('color', 'red');
              $('#saveBtn').prop('disabled', true);
            }
          }
        });
      } else {
        $('#usernameFeedback').text('');
        $('#saveBtn').prop('disabled', true);
      }
    });
  });
</script>
