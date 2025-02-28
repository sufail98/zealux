<?php include'header.php'; ?>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/multi-select/css/multi-select.css"><!-- Multi Select Css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css"><!-- Bootstrap Tagsinput Css -->  
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/plugin/dropify/dist/css/dropify.min.css"/><!-- Dropify Css -->
   
<div class="body d-flex py-3">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Size</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-6 col-lg-6" id="addForm">
                <form method="post" action="<?php echo base_url(); ?>/save-size" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="size" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                
                </form>
            </div>
            <div class="col-xl-6 col-lg-6" id="editForm">
                <form method="post" action="<?php echo base_url(); ?>/update-size" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="size" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id">
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $n=1;
                                  foreach ($size as $value) { ?>
                                <tr>
                                    <td>#<?= $n++; ?></td>
                                    <td><?= $value->size_name; ?></td>
                          
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btnedit" title="Edit"><i class="icofont-edit text-success"></i></button>
                                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-size/<?php echo $value->id;?>')" class="btn btn-outline-secondary deleterow" title="Delete">
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

            var sizeId = $(this).data('id');

            $.ajax({
                url: '<?php echo base_url(); ?>/get-size',
                type: 'GET',
                data: { id: sizeId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var size = response.data;
                        $('#editForm').find('input[name="size"]').val(size.size_name);
                        $('#editForm').find('input[name="id"]').val(size.id);
                        
                        $('#addForm').hide();
                        $('#editForm').show();
                    } else {
                        alert('Failed to load size details.');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching the size details.');
                }
            });
        });
    });
</script>




