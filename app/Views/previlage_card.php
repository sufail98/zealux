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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Privilage Card</h3>
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 mb-3">
            
            <div class="col-xl-6 col-lg-6" id="addForm">
                <form method="post" action="<?php echo base_url(); ?>/save-previlage" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="pname" required>
                            </div>
                            <div class="col-md-6">
                                <div><label class="form-label">Gender </span></label></div>

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
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">Phone <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                <option value="">Select Type</option>
                                <?php foreach ($types as $types) { ?>
                                    <option value="<?= $types->id; ?>"><?= $types->type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">D.O.B </label>
                                <input type="date" class="form-control" name="dob" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            
                            <div class="col-md-6">
                                <label class="form-label">From Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="date" class="form-control" name="from_date" id="from_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">To Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="date" class="form-control" name="to_date" id="to_date" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">Amount <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="amount" required>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                
                </form>
            </div>
            <div class="col-xl-6 col-lg-6" id="editForm">
                <form method="post" action="<?php echo base_url(); ?>/update-previlage" enctype="multipart/form-data">
                <div class="card mb-3">
                    
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="text" class="form-control" name="pname" required>
                            </div>
                            <div class="col-md-6">
                                <div><label class="form-label">Gender </span></label></div>

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
                        </div>

                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">Phone <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email </label>
                                <input type="email" class="form-control" name="email" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label  class="form-label">Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                <select class="form-select" aria-label="Default select example" name="type" id="etype" required>
                                <option value="">Select Type</option>
                                <?php foreach ($edittypes as $edittypes) { ?>
                                    <option value="<?= $edittypes->id; ?>"><?= $edittypes->type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">D.O.B </label>
                                <input type="date" class="form-control" name="dob" >
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            
                            <div class="col-md-6">
                                <label class="form-label">From Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="date" class="form-control" name="from_date" id="efrom_date" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">To Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="date" class="form-control" name="to_date" id="eto_date" required>
                            </div>
                        </div>
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label class="form-label">Amount <span style="color: #f00; font-size: 15px;">*</span></label>
                                <input type="number" class="form-control" name="amount" required>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $n=1;
                                  foreach ($previlage as $value) { ?>
                                <tr>
                                    <td>#<?= $n++; ?></td>
                                    <td><?= $value->name; ?></td>
                          
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <button type="button" data-id="<?= $value->id; ?>" class="btn btn-outline-secondary btnedit" title="Edit"><i class="icofont-edit text-success"></i></button>

                                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-previlage/<?php echo $value->id;?>')" class="btn btn-outline-secondary deleterow" title="Delete">
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

        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0];
        $('#from_date').val(formattedToday);

        $('#addForm').show();
        $("#editForm").hide();

        $('.btnedit').on('click',function(){

            $('#addForm').hide();
            $('#editForm').show();

            var prevId = $(this).data('id');

            $.ajax({
                url: '<?php echo base_url(); ?>/get-previlage',
                type: 'GET',
                data: { id: prevId },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var previlage = response.data;
                        $('#editForm').find('input[name="pname"]').val(previlage.name);
                        $('#editForm').find('input[name="phone"]').val(previlage.phone);
                        $('#editForm').find('input[name="email"]').val(previlage.email);
                        $('#editForm').find('input[name="dob"]').val(previlage.dob);
                        $('#editForm').find('input[name="id"]').val(previlage.id);
                        $('#editForm').find('input[name="gender"][value="' + previlage.gender + '"]').prop('checked', true);
                        // Set selected option for the "type" dropdown
                        $('#editForm').find('select[name="type"]').val(previlage.type).change();
                        $('#editForm').find('input[name="from_date"]').val(previlage.from_date);
                        $('#editForm').find('input[name="to_date"]').val(previlage.to_date);
                        $('#editForm').find('input[name="amount"]').val(previlage.amount);
                        
                        $('#addForm').hide();
                        $('#editForm').show();
                    } else {
                        alert('Failed to load previlage details.');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching the previlage details.');
                }
            });
        });

    });


    $('#type').on('change',function(){
        var type = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>/get-previlage-types',
            type: 'GET',
            data: { id: type },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var previlage = response.data;

                    const days = previlage.days;
                    const currentDate = new Date(); // Get today's date

                    // Calculate the new date directly by creating a fresh Date object
                    const futureDate = new Date(currentDate.getTime() + days * 24 * 60 * 60 * 1000);

                    // Format the future date for display
                    const options = { year: 'numeric', month: 'long', day: 'numeric' };
                    const formattedDate = futureDate.toLocaleDateString('en-US', options);

                    const yyyyMmDdFormat = `${futureDate.getFullYear()}-${String(futureDate.getMonth() + 1).padStart(2, '0')}-${String(futureDate.getDate()).padStart(2, '0')}`;
                    $('#addForm').find('input[id="to_date"]').val(yyyyMmDdFormat);
                    $('#addForm').find('input[name="amount"]').val(previlage.amount);

  
                } else {
                    console.log('Failed to load previlage type details.');
                }
            },
            error: function() {
                console.log('An error occurred while fetching the previlage details.');
            }
        });
    });


    $('#etype').on('change',function(){

        var type = $(this).val();

        $.ajax({
            url: '<?php echo base_url(); ?>/get-previlage-types',
            type: 'GET',
            data: { id: type },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    var previlage = response.data;

                    const days = previlage.days;
                    const currentDate = new Date(); // Get today's date

                    // Calculate the new date directly by creating a fresh Date object
                    const futureDate = new Date(currentDate.getTime() + days * 24 * 60 * 60 * 1000);

                    // Format the future date for display
                    const options = { year: 'numeric', month: 'long', day: 'numeric' };
                    const formattedDate = futureDate.toLocaleDateString('en-US', options);

                    const yyyyMmDdFormat = `${futureDate.getFullYear()}-${String(futureDate.getMonth() + 1).padStart(2, '0')}-${String(futureDate.getDate()).padStart(2, '0')}`;
                    $('#editForm').find('input[id="eto_date"]').val(yyyyMmDdFormat);
                    $('#editForm').find('input[name="amount"]').val(previlage.amount);

  
                } else {
                    console.log('Failed to load e previlage types details.');
                }
            },
            error: function() {
                console.log('An error occurred while fetching the previlage details.');
            }
        });
    });
</script>




