<?php  
if($_SESSION['user_type'] == 'user'){
    include'user_header.php';
}else{
    include'header.php'; 
} ?>
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Customers</h3>
                    
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Slno</th>
                                    <th>Regno</th>
                                    <th>Reg Date</th>
                                    <th>Customer</th>
                                    <th>Mobile</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $n=1;
                                  foreach ($customers as $value) { ?>
                                <tr>
                                    <td>#<?= $n++; ?></td>
                                    <td><strong><?= $value->Testno; ?></strong></td>
                                    <td><?= date('d/M/Y',strtotime($value->Test_date)); ?></td>
                                    <td><strong><?= $value->CustomerName; ?></strong></td>
                                    <td><?= $value->MobileNo1; ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="<?php echo base_url(); ?>/add-eye-test/<?php echo $value->EyeTestId;?>" class="btn btn-outline-secondary" title="Add Eyetest"><i class="icofont-plus-circle text-success"></i></a>
                                            
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include'footer.php'; ?>
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
       $(document).ready(function() {
        var t = $('#myDataTable').DataTable({
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ],
            "columnDefs": [{
                "targets": 0, // Adjust if your serial number column is not the first one
                "orderable": false // Disable sorting for the serial number column
            }],
            "order": [], // Disable initial sorting
            "pageLength": 10, // Set the number of rows per page (here it's 10)
            "drawCallback": function(settings) {
                var api = this.api();
                var start = api.page.info().start; // Get the index of the first row on the current page
                api.column(0, { // Assuming serial number is in the first column (index 0)
                    "order": 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = start + i + 1; // Correctly calculate the serial number for each page
                });
            }
        });
    });
    </script>