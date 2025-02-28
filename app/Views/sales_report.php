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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Sales Report</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-md-3">
                <label>From Date:</label>
                <input type="date" id="fromDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label>To Date:</label>
                <input type="date" id="toDate" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Delivered Status:</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option value="2">All</option>
                    <option value="1">Delivered</option>
                    <option value="0" selected>Pending</option>
                </select>
            </div>
            <div class="col-md-3">
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
                                    <th>Invoice No</th>
                                    <th>Invoice Date</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Mail</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th id="overalltotal"></th>
                                    <th id="paidTotal"></th>
                                    <th id="balanceTotal"></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
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

        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0];
        $('#fromDate').val(formattedToday);
        $('#toDate').val(formattedToday);
        const status = $('#status').val();

        // Function to load the sales report by date
        function loadSalesReport(fromDate, toDate, status) {
            $.ajax({
                url: '<?php echo base_url(); ?>/get-sales-report-by-date',
                type: 'POST',
                data: { from_date: fromDate, to_date: toDate, status: status },
                success: function(response) {
                    const session = "<?= $_SESSION['user_type']; ?>";
                    let rows = '';
                    let overalltotal = 0;
                    let paidTotal = 0; 
                    let balanceTotal = 0;
                    const baseUrl = "<?php echo base_url(); ?>";

                    // Loop through the filtered report and create table rows
                    response.forEach((value, index) => {
                        rows += `
                            <tr>
                                <td>#${index + 1}</td>
                                <td><strong>${value.invoice_no}</strong></td>
                                <td>
                               ${new Date(value.invoice_date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                  })}
                                </td>
                                <td><strong>${value.customer_name}</strong></td>
                                <td>${value.phone}</td>
                                <td>${value.email}</td>
                                <td>${value.total_amount}</td>
                                <td>${value.totalPaid}</td>
                                <td>${(value.total_amount - value.totalPaid).toFixed(2)}</td>

                                <td>
                                    <span class="badge ${value.delivered == 1 ? 'bg-success' : 'bg-danger'}">
                                        ${value.delivered == 1 ? 'Delivered' : 'Not Delivered'}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="<?php echo base_url(); ?>/invoice-print/${value.master_id}" type="button" class="btn btn-outline-secondary" title="Print"><i class="icofont-print text-success"></i></a>
                                        ${value.phone !== '' ?
                                        `<a href="https://wa.me/${value.phone}?text=${encodeURIComponent(`Thank you for your purchase! Your total bill amount is ${value.total_amount}. Here is your invoice link: ${baseUrl}/invoice-whatsapp/${value.master_id}`)}" type="button" class="btn btn-outline-success" title="WhatsApp" target="_blank">
                                           <i class="icofont-whatsapp text-success"></i>
                                        </a>` : ''}

                                        <a href="<?php echo base_url(); ?>/invoice-view/${value.master_id}" type="button" class="btn btn-outline-secondary" title="View">View</a>
                                        ${session == 'admin' ?
                                        `<button onclick="confirmDelete('<?php echo base_url(); ?>/delete-invoice/${value.master_id}')" class="btn btn-outline-secondary deleterow" title="Delete" ${value.delivered == 1 ? 'disabled' : ''}>
                                                Delete
                                            </button>`: ''}
                                        <a href="javascript:void(0);" type="button" class="btn btn-outline-secondary invoice-mail" title="Mail" data-id="${value.master_id}">Mail</a>
                                    </div>
                                </td>
                            </tr>
                        `;
                        overalltotal += parseFloat(value.total_amount || 0);
                        paidTotal += parseFloat(value.totalPaid || 0);
                        balanceTotal += parseFloat(value.total_amount - value.totalPaid || 0);

                    });

                    // Update the table body with the filtered rows
                    $('#myDataTable tbody').html(rows);
                    $('#overalltotal').text(overalltotal.toFixed(2));
                    $('#paidTotal').text(paidTotal.toFixed(2));
                    $('#balanceTotal').text(balanceTotal.toFixed(2));
                    
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while fetching the data.");
                }
            });
        }

        // Load today's data on page load
        loadSalesReport(formattedToday, formattedToday, status);

        $('#filterBtn').on('click', function(e) {
            e.preventDefault();

            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();
            const status = $('#status').val();

            // Load the sales report based on selected dates
            loadSalesReport(fromDate, toDate, status);
        });




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



    $(document).on('click', '.invoice-mail', function(e) {
        e.preventDefault();

        var Id = $(this).data('id');

        $.ajax({
            url: '<?php echo base_url(); ?>/invoice-mail',
            type: 'GET',
            data: { id: Id },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: response.message
                    }).then(() => {
                        window.location.href = "<?php echo base_url(); ?>/sales-report";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: response.message
                    });
                }
            },
            error: function() {
                console.log('An error occurred while fetching the salesman details.');
            }
        });
    });
    </script>