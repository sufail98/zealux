<?php include'header.php'; ?>
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Reviews</h3>
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
                                    <th>Bill No</th>
                                    <th>Review Date</th>
                                    <th>Salesman</th>
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
    $(document).ready(function () {
        const today = new Date().toISOString().split('T')[0];

        $('#fromDate').val(today);
        $('#toDate').val(today);

        var table = $('#myDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo base_url(); ?>/get-saved-review-report-by-date',
                type: 'POST',
                data: function (d) {
                    d.from_date = $('#fromDate').val();
                    d.to_date = $('#toDate').val();
                    d.allreport = $('#allreport').prop('checked') ? 1 : 0;
                },
                dataSrc: function (json) {
                    // console.log(json);
                    return json.data; // Return table data
                }
            },
            columns: [
                { data: null, render: function (data, type, row, meta) { return meta.row + 1; }, title: "Slno" },
                { 
                    data: "bill_no",
                    render: function (data, type, row) {
                        return `<strong>${data}</strong>`;
                    }
                },
                { 
                    data: "review_date", 
                    render: function (data, type, row) {
                        return new Date(data).toLocaleDateString('en-GB', {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric'
                        });
                    }
                },
                { 
                    data: "salesman_name",
                    render: function (data, type, row) {
                        return `<strong>${data}</strong>`;
                    }
                },
                { data: "action" }
            ],
            columnDefs: [
                { targets: [0, -1], orderable: false },
                { targets: 4, render: function (data, type, row) {
                    const baseUrl = "<?php echo base_url(); ?>";
                    return `
                        <div class="btn-group">
                            <a href="<?php echo base_url(); ?>/view-review/${row.rid}" type="button" class="btn btn-outline-secondary" title="View">
                                <i class="icofont-eye-alt text-success"></i>
                            </a>

                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-review/${row.rid}')" class="btn btn-outline-secondary deleterow" title="Delete">
                                <i class="icofont-ui-delete text-danger"></i>
                            </a>
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


    </script>