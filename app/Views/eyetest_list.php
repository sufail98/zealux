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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Eye Test</h3>
                    <!-- <a href="<?php echo base_url(); ?>/add-eye-test" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i> Add Eye Test</a> -->
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-md-2">
                <label>From Date:</label>
                <input type="date" id="fromDate" class="form-control">
            </div>
            <div class="col-md-2">
                <label>To Date:</label>
                <input type="date" id="toDate" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Customer:</label>
                <input type="text" id="cname" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Mobile:</label>
                <input type="number" id="mobile" class="form-control">
            </div>
            <?php if($_SESSION['user_type'] !== 'user'){ ?>
            <div class="col-md-2">
                <label class="form-label">Store:</label>
                <select class="form-select" aria-label="" id="store" required>
                    <?php foreach ($stores as $stores) { ?>
                    <option value="<?php echo $stores->storeId; ?>"><?php echo $stores->store_name; ?></option>
                    <?php } ?>
                </select>
            </div>
        <?php } ?>
            <div class="col-md-2">
                <div class="form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" name="allreport" value="1" id="allreport" >
                    <label class="form-check-label" for="allreport">
                        All Report
                    </label>
                </div>
            </div>
            <div class="col-md-2">
                <button id="filterBtn" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
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
        const today = new Date().toISOString().split('T')[0];

        $('#fromDate').val(today);
        $('#toDate').val(today);

        var table = $('#myDataTable').DataTable({
            processing: true,
            serverSide: true, // Enable server-side processing
            ajax: {
                url: '<?php echo base_url(); ?>/get-eye-test-by-date', // API URL
                type: 'POST',
                data: function(d) {
                    d.from_date = $('#fromDate').val();
                    d.to_date = $('#toDate').val();
                    d.cname = $('#cname').val();
                    d.mobile = $('#mobile').val();
                    d.store = $('#store').val();
                    d.allreport = $('#allreport').prop('checked') ? 1 : 0;
                }
            },
            columns: [
                { data: null, orderable: false }, // Serial Number
                { data: 'Testno' },
                { data: 'Test_date', render: function(data) {
                    return new Date(data).toLocaleDateString('en-GB', {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    });
                }},
                { data: 'CustomerName' },
                { data: 'MobileNo1' },
                { data: 'EyeTestId', orderable: false, render: function(data) {
                    return `
                        <div class="btn-group" role="group">
                            <a href="<?php echo base_url(); ?>/edit-eye-test/${data}" class="btn btn-outline-secondary" title="Edit">
                                <i class="icofont-edit text-success"></i>
                            </a>
                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-eye-test/${data}')" class="btn btn-outline-secondary deleterow" title="Delete">
                                <i class="icofont-ui-delete text-danger"></i>
                            </a>
                        </div>
                    `;
                }}
            ],
            order: [], // No default sorting
            pageLength: 10, // Number of rows per page
            drawCallback: function(settings) {
                var api = this.api();
                var start = api.page.info().start;
                api.column(0, { order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = start + i + 1;
                });
            }
        });

        // Reload DataTable on Filter Click
        $('#filterBtn').on('click', function(e) {
            e.preventDefault();
            table.ajax.reload(); // Reload data
        });
    });

    </script>