<?php include'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->  
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Features</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-6 col-lg-6" id="editForm">
                <form method="post" action="<?php echo base_url(); ?>/update-feature" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label">Description <span style="color: #f00; font-size: 15px;">*</span></label>
                                 <textarea class="form-control" id="editors" placeholder="Description..." name="desc"><?php echo $editdata->description; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Image <span style="color: #f00; font-size: 15px;">*</span></label>
                                <img id="loadImage" src="<?php echo base_url(); ?>/images/features/<?= $editdata->image; ?>" style="height: 100px; margin-top: 20px; margin-bottom: 20px;">
                                <input type="file" name="fimage" id="fimage" accept="image/*" class="form-control" >
                                <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $editdata->id; ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Update</button>
                
                </form>
            </div>
            
            
        </div><!-- Row end  --> 
        
    </div>
</div>    

 <!-- Jquery Core Js -->      
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Plugin -->  
    <script src="<?php echo base_url(); ?>/assets/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugin/multi-select/js/jquery.multi-select.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>  
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

<script>
    $(document).ready(function(){
        //Ch-editer
        ClassicEditor
        .create( document.querySelector( '#editors' ) )
        .catch( error => {
            console.error( error );
        } );
        //Datatable
        $('#myDataTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });   

    });
</script>


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

$("#fimage").change(function() {
  readURL(this);
});
</script>




