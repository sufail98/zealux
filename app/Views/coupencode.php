<?php  
if($_SESSION['user_type'] == 'user'){
    include'user_header.php';
}else{
    include'header.php'; 
} ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->  
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Coupen Code</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-6 col-lg-6" id="addForm">
                <form method="post" action="<?php echo base_url(); ?>/save-coupencode" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Coupen Code <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="code" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Discount Percentage <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="discount" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">

                            <div class="col-md-6">
                                <label class="form-label">Date From </label>
                                <input type="date" class="form-control" name="date_from" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date To </label>
                                <input type="date" class="form-control" name="date_to" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" name="description" rows="2"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                
                </form>
            </div>
            <div class="col-xl-6 col-lg-6" id="editForm">
                <form method="post" action="<?php echo base_url(); ?>/update-coupencode" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Coupen Code <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="code" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Discount Percentage <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="discount" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">

                            <div class="col-md-6">
                                <label class="form-label">Date From </label>
                                <input type="date" class="form-control" name="date_from" >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Date To </label>
                                <input type="date" class="form-control" name="date_to" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-12">
                                <label class="form-label">Description </label>
                                <textarea class="form-control" name="description" rows="2"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Update</button>
                
                </form>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Slno</th>
                                    <th>Coupen</th>
                                    <th>Percentage</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $n=1;
                                  foreach ($coupencode as $value) { ?>
                                <tr>
                                    <td>#<?= $n++; ?></td>
                                    <td><?= $value->coupen_code; ?></td>
                                    <td><?= $value->discount_percentage; ?></td>
                          
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btnedit" title="Edit"><i class="icofont-edit text-success"></i></button>

                                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-coupencode/<?php echo $value->id;?>')" class="btn btn-outline-secondary deleterow" title="Delete">
                                                <i class="icofont-ui-delete text-danger"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div><!-- Row end  --> 
        
    </div>
</div>    





 <!-- Jquery Core Js -->      
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>

    <!-- Jquery Plugin -->  
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
        function confirmDelete(url) {
            Swal.fire({
                title: 'Are you sure to Delete?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, proceed with deletion
                    window.location.href = url;
                }
            });
        }
    </script>

    <script>
        $('#myDataTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    </script>


<script>
    $(document).ready(function(){
        $('#addForm').show();
        $("#editForm").hide();

        $('.btnedit').on('click',function(){

            $('#addForm').hide();
            $('#editForm').show();

            var prevId = $(this).data('id');

            $.ajax({
                url: '<?php echo base_url(); ?>/get-coupen-code',
                type: 'GET',
                data: { id: prevId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var coupenCode = response.data;
                        $('#editForm').find('input[name="code"]').val(coupenCode.coupen_code);
                        $('#editForm').find('input[name="discount"]').val(coupenCode.discount_percentage);
                        $('#editForm').find('input[name="date_from"]').val(coupenCode.date_from);
                        $('#editForm').find('input[name="date_to"]').val(coupenCode.date_to);
                        $('#editForm').find('textarea[name="description"]').val(coupenCode.description);
                        $('#editForm').find('input[name="id"]').val(coupenCode.id);
                        
                        $('#addForm').hide();
                        $('#editForm').show();
                    } else {
                        alert('Failed to load CoupenCode details.');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching the CoupenCode details.');
                }
            });
        });
    });
</script>




