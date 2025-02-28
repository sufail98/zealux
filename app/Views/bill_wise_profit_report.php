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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Bill Wise Profit Report</h3>
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
                                    <th>Bill No</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Bill</th>
                                    <th>Purchase Cost</th>
                                    <th>Profit</th>
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
                                    <th id="billTotal"></th>
                                    <th id="purchaseTotal"></th>
                                    <th id="profitTotal"></th>
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
       $(document).ready(function() {

        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0];
        $('#fromDate').val(formattedToday);
        $('#toDate').val(formattedToday);

        // Function to load the sales report by date
        function loadProfitReport(fromDate, toDate) {
            $.ajax({
                url: '<?php echo base_url(); ?>/billwise-profit-report-by-date',
                type: 'POST',
                data: { from_date: fromDate, to_date: toDate },
                dataType: 'json',
                success: function(response) {
                    let rows = '';
                    let billTotal  = 0;
                    let purchaseTotal = 0;
                    let profitTotal = 0;
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
                                  }).replace(',', '')}</td>
                                <td><strong>${value.customer_name}</strong></td>
                                <td>${parseFloat(value.total_bill_amount).toFixed(2)}</td>
                                <td>${parseFloat(value.total_purchase_cost).toFixed(2)}</td>
                                <td><strong>${parseFloat(value.total_profit).toFixed(2)}</strong></td>
                            </tr>
                        `;

                        billTotal += parseFloat(value.total_bill_amount || 0);
                        purchaseTotal += parseFloat(value.total_purchase_cost || 0);
                        profitTotal += parseFloat(value.total_profit || 0);
                    });

                    // Update the table body with the filtered rows
                    $('#myDataTable tbody').html(rows);

                    $('#billTotal').text(billTotal.toFixed(2));
                    $('#purchaseTotal').text(purchaseTotal.toFixed(2));
                    $('#profitTotal').text(profitTotal.toFixed(2));
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while fetching the data.");
                }
            });
        }

        // Load today's data on page load
        loadProfitReport(formattedToday, formattedToday);

        $('#filterBtn').on('click', function(e) {
            e.preventDefault();

            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();

            // Load the sales report based on selected dates
            loadProfitReport(fromDate, toDate);
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

    </script>