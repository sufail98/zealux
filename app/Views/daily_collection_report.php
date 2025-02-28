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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Daily Collection Report</h3>
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
                <label>Payment Mode:</label>
                <select class="form-select" aria-label="Default select example" name="pay_mode" id="pay_mode">
                    <option value="">Select Payment Mode</option>
                    <option value="Cash">Cash</option>
                    <option value="Card">Card</option>
                    <option value="Gpay">Gpay</option>
                    <option value="Credit">Credit</option>
                </select>
            </div>
            <div class="col-md-1">
                <label>Invoice No:</label>
                <input type="number" id="invoice_no" class="form-control">
            </div>
            <div class="col-md-2">
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
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Invoice No</th>
                                    <th>Mail</th>
                                    <th>Mobile</th>
                                    <th>Bill Amount</th>
                                    <th>Pending Amount</th>
                                    <th>Paid Amount</th>
                                    <th>Balance</th>
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
                                    <th id="billTotal"></th>
                                    <th id="pendingTotal"></th>
                                    <th id="paidTotal"></th>
                                    <th id="balanceTotal"></th>
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
        const pay_mode = $('#pay_mode').val();
        const invoice_no = $('#invoice_no').val();
        const cutomer = $('#cutomer').val();
        const mobile = $('#mobile').val();
 
        // Load today's data on page load
        loadDailyReport(formattedToday, formattedToday, pay_mode, invoice_no, cutomer, mobile);

        // Function to load the sales report by date
        function loadDailyReport(fromDate, toDate, pay_mode, invoice_no, cutomer, mobile) {
            $.ajax({
                url: '<?php echo base_url(); ?>/get-daily-report-by-date',
                type: 'POST',
                data: { from_date: fromDate, to_date: toDate, pay_mode: pay_mode, invoice_no: invoice_no, cutomer: cutomer, mobile: mobile },
                success: function(response) {
                    let rows = '';
                    let billTotal = 0;
                    let pendingTotal = 0;
                    let paidTotal = 0;
                    let balanceTotal = 0;

                    // Loop through the filtered report and create table rows
                    response.forEach((value, index) => {
                        rows += `
                            <tr>
                                <td>#${index + 1}</td>
                                <td>

                                ${new Date(value.master_invoice_date).toLocaleDateString('en-GB', {
                                    day: '2-digit',
                                    month: 'short',
                                    year: 'numeric',
                                  }).replace(',', '')}</td>
                                <td><strong>${value.customer_name}</strong></td>
                                <td><strong>${value.InvoiceNo}</strong></td>
                                <td>${value.email}</td>
                                <td>${value.phone}</td>
                                <td>${value.BillAmount}</td>
                                <td>${value.PendingAmount}</td>
                                <td>${value.PaidAmount}</td>
                                <td>${value.Balance}</td>
                            </tr>
                        `;
                        billTotal += parseFloat(value.BillAmount || 0);
                        pendingTotal += parseFloat(value.PendingAmount || 0);
                        paidTotal += parseFloat(value.PaidAmount || 0);
                        balanceTotal += parseFloat(value.Balance || 0);

                    });

                    // Update the table body with the filtered rows
                    $('#myDataTable tbody').html(rows);
                    $('#billTotal').text(billTotal.toFixed(2));
                    $('#pendingTotal').text(pendingTotal.toFixed(2));
                    $('#paidTotal').text(paidTotal.toFixed(2));
                    $('#balanceTotal').text(balanceTotal.toFixed(2));
                    
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while fetching the data.");
                }
            });
        }


        $('#filterBtn').on('click', function(e) {
            e.preventDefault();

            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();
            const pay_mode = $('#pay_mode').val();
            const invoice_no = $('#invoice_no').val();
            const cutomer = $('#cutomer').val();
            const mobile = $('#mobile').val();

            // Load the daily report based on selected dates
            loadDailyReport(fromDate, toDate, pay_mode, invoice_no, cutomer, mobile);
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