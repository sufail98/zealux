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
            <div class="col-md-2">
                <label class="form-label">From Date:</label>
                <input type="date" id="fromDate" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">To Date:</label>
                <input type="date" id="toDate" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">Delivered Status:</label>
                <select class="form-select" aria-label="Default select example" name="status" id="status">
                    <option value="2">All</option>
                    <option value="1">Delivered</option>
                    <option value="0" selected>Pending</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Name:</label>
                <input type="text" id="cname" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">Phone:</label>
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
            <div class="col-md-1">
                <div class="form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" name="allreport" value="1" id="allreport" >
                    <label class="form-check-label" for="allreport">
                        All Report
                    </label>
                </div>
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
    $(document).ready(function () {
        const today = new Date().toISOString().split('T')[0];

        $('#fromDate').val(today);
        $('#toDate').val(today);

        var table = $('#myDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo base_url(); ?>/get-sales-report-by-date',
                type: 'POST',
                data: function (d) {
                    d.from_date = $('#fromDate').val();
                    d.to_date = $('#toDate').val();
                    d.status = $('#status').val();
                    d.store = $('#store').val();
                    d.mobile = $('#mobile').val();
                    d.cname = $('#cname').val();
                    d.allreport = $('#allreport').prop('checked') ? 1 : 0;
                },
                dataSrc: function (json) {
                    // console.log(json); 
                    if (!json.overalltotal || isNaN(json.overalltotal)) json.overalltotal = 0;
                    if (!json.paidTotal || isNaN(json.paidTotal)) json.paidTotal = 0;
                    if (!json.balanceTotal || isNaN(json.balanceTotal)) json.balanceTotal = 0;

                    // Update totals in the footer
                    $('#overalltotal').text(parseFloat(json.overalltotal).toFixed(2));
                    $('#paidTotal').text(parseFloat(json.paidTotal).toFixed(2));
                    $('#balanceTotal').text(parseFloat(json.balanceTotal).toFixed(2));

                    return json.data; // Return table data
                }
            },
            columns: [
                { data: null, render: function (data, type, row, meta) { return meta.row + 1; }, title: "Slno" },
                { 
                    data: "invoice_no",
                    render: function (data, type, row) {
                        return `<strong>${data}</strong>`;
                    }
                },
                { 
                    data: "invoice_date", 
                    render: function (data, type, row) {
                        return new Date(data).toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        });
                    }
                },
                { 
                    data: "customer_name",
                    render: function (data, type, row) {
                        return `<strong>${data}</strong>`;
                    }
                },
                { data: "phone" },
                { data: "email" },
                { data: "total_amount" },
                { data: "totalPaid" },
                { 
                    data: null, // No direct property
                    render: function (data, type, row) {
                        let totalAmount = parseFloat(row.total_amount) || 0; // Ensure a valid number
                        let totalPaid = parseFloat(row.totalPaid) || 0; // Ensure a valid number
                        let balance = totalAmount - totalPaid;
                        return balance.toFixed(2); // Format to 2 decimal places
                    },
                    title: "Balance"
                },
                { data: "delivered" },
                { data: "action" }
            ],
            columnDefs: [
                { targets: [0, -1], orderable: false },
                { 
                    targets: 9, 
                    render: function (data, type, row) {
                        return `<span class="badge ${row.delivered == 1 ? 'bg-success' : 'bg-danger'}">
                                    ${row.delivered == 1 ? 'Delivered' : 'Not Delivered'}
                                </span>`;
                    }
                },

                { targets: 10, render: function (data, type, row) {
                    const baseUrl = "<?php echo base_url(); ?>";
                    return `
                        <div class="btn-group">
                            <a href="<?php echo base_url(); ?>/invoice-print/${row.master_id}" class="btn btn-outline-secondary" title="Print">
                                <i class="icofont-print text-success"></i>
                            </a>

                            ${row.phone !== '' ?
                            `<a href="https://wa.me/${row.phone}?text=${encodeURIComponent(`Thank you for your purchase! Your total bill amount is ${row.total_amount}. Here is your invoice link: ${baseUrl}/invoice-whatsapp/${row.master_id}`)}" type="button" class="btn btn-outline-success" title="WhatsApp" target="_blank">
                               <i class="icofont-whatsapp text-success"></i>
                            </a>` : ''}


                            <a href="<?php echo base_url(); ?>/invoice-view/${row.master_id}" class="btn btn-outline-secondary" title="View">View</a>
                            <?php if ($_SESSION['user_type'] == 'super admin') { ?>
                                <button onclick="confirmDelete('<?php echo base_url(); ?>/delete-invoice/${row.master_id}')" class="btn btn-outline-secondary" title="Delete" ${row.delivered == 1 ? 'disabled' : ''}>
                                    Delete
                                </button>
                            <?php } ?>
                            <a href="javascript:void(0);" class="btn btn-outline-secondary invoice-mail" title="Mail" data-id="${row.master_id}">Mail</a>
                        </div>
                    `;
                }}
            ],
            order: [],
            pageLength: 10,
            drawCallback: function(settings) {
                var api = this.api();
                var start = api.page.info().start;
                api.column(0, { order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = start + i + 1;
                });
            }
        });

        $('#filterBtn').on('click', function (e) {
            e.preventDefault();
            table.ajax.reload();
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