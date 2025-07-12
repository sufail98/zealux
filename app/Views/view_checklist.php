<?php include'header.php'; ?>


<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

 
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Check List</h3>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
            <div class="card" >
                <div class="card-body">
                   
                    <div class="checklist-qstions">
                        <?php
                        $i = 1;
                         foreach($editdata as $view){ ?>

                        <div class="checklist-item" style="border: 1px solid #ccc; padding: 15px 15px; margin: 10px 10px; border-radius: 5px;">
                            <p><strong><?= $i; ?>.</strong> <?= $view->question; ?></p>

                            <div class="mb-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Yes" <?php if($view->yes_or_no == 'Yes'){echo 'checked=""';}?>>
                                    <label class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="No" <?php if($view->yes_or_no == 'No'){echo 'checked=""';}?>>
                                    <label class="form-check-label">No</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control mt-2" name="desc" rows="2" placeholder="Comments..."><?= $view->details; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <img src="<?php echo base_url(); ?>/images/checklist/<?= $view->qfile; ?>" style="height: 120px; width: 150px; object-fit: contain;">
                            </div>
                        </div>
                    <?php $i++; } ?>
                    </div>
                    
                </div>
            </div>

        </div><!-- Row end  --> 

    </div>
</div>    

<?php include'footer.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            $(".custom-select").select2({
                placeholder: "Select Type",
                allowClear: true,
                tags: true
            });
        });

    </script>
