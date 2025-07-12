<?php include'header.php'; ?>
   
<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-questions">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Questions</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                    
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
                                        <div class="col-md-12">
                                           <label class="form-label">Question <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <textarea name="question" rows="5" class="form-control" required></textarea>
                                        </div>
                                        <div class="col-md-3">
                                           <label class="form-label">Rating Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <select class="form-select" aria-label="" name="rating_type" required>
                                                <option selected="">Select Type</option>
                                                <option value="Star">Star</option>
                                                <option value="Text">Text</option>
                                            </select>
                                                    
                                        </div>
                                        <div class="col-md-2">
                                           <label class="form-label">Order to Display <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" name="order" class="form-control" required />
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
