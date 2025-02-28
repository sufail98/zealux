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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Sales Return</h3>
                </div>
                    <p class="fw-bold fs-5">Please select sales invoice for return</p>
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
                <label>Invoice No:</label>
                <input type="number" id="invoice_no" class="form-control">
            </div>
            <div class="col-md-3">
                <label>Customer Name:</label>
                <input type="text" id="cutomer" class="form-control">
            </div>
            <div class="col-md-2">
                <label>Mobile:</label>
                <input type="number" id="mobile" class="form-control">
            </div>

            <div class="col-md-1">
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

<script>
       $(document).ready(function() {

        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0];
        $('#fromDate').val(formattedToday);
        $('#toDate').val(formattedToday);
        const invoice_no = $('#invoice_no').val();
        const cutomer = $('#cutomer').val();
        const mobile = $('#mobile').val();

        // Function to load the sales report by date
        function loadSalesReturn(fromDate, toDate, invoice_no, cutomer, mobile) {
            $.ajax({
                url: '<?php echo base_url(); ?>/get-sales-return-by-filter',
                type: 'POST',
                data: { from_date: fromDate, to_date: toDate, invoice_no: invoice_no, cutomer: cutomer, mobile: mobile },
                success: function(response) {
                    let rows = '';

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

                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="<?php echo base_url(); ?>/return-view/${value.master_id}" type="button" class="btn btn-outline-secondary" title="Return">Return Invoice</a>
                                    </div>
                                </td>
                            </tr>
                        `;


                    });

                    // Update the table body with the filtered rows
                    $('#myDataTable tbody').html(rows);
                    
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while fetching the data.");
                }
            });
        }

        // Load today's data on page load
        loadSalesReturn(formattedToday, formattedToday, invoice_no, cutomer, mobile);

        $('#filterBtn').on('click', function(e) {
            e.preventDefault();

            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();
            const invoice_no = $('#invoice_no').val();
            const cutomer = $('#cutomer').val();
            const mobile = $('#mobile').val();

            // Load the sales report based on selected dates
            loadSalesReturn(fromDate, toDate, invoice_no, cutomer, mobile);
        });


        var t = $('#myDataTable').DataTable({
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ],
            "columnDefs": [{
                "targets": 0, // Adjust if your serial number column is not the first one
                "orderable": false,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Serial number based on row index
                } // Disable sorting for the serial number column
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