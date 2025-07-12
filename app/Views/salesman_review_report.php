<?php include'header.php'; ?>
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Salesman Review Report</h3>
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

            <div class="col-md-3">
                <label class="form-label">Salesman:</label>
                <select class="form-select" id="salesman">
                <?php foreach ($salesmans as $salesmans) { ?>
                    <option value="<?= $salesmans->id; ?>"><?= $salesmans->name; ?></option>
                    <?php } ?>
                </select>
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
                                    <th>Question</th>
                                    <th>Percentage</th>
                                    <th>Review Count</th>
                                    <th>1 Rating Count</th>
                                    <th>2 Rating Count</th>
                                    <th>3 Rating Count</th>
                                    <th>4 Rating Count</th>
                                    <th>5 Rating Count</th>
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
    $(document).ready(function () {
        const today = new Date().toISOString().split('T')[0];

        $('#fromDate').val(today);
        $('#toDate').val(today);

        var table = $('#myDataTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?php echo base_url(); ?>/get-salesman-review-report-by-date',
                type: 'POST',
                data: function (d) {
                    d.from_date = $('#fromDate').val();
                    d.to_date = $('#toDate').val();
                    d.salesman = $('#salesman').val();
                },
                dataSrc: function (json) {
                    // console.log(json);
                    return json.data; // Return table data
                }
            },
            columns: [
                { data: null, render: function (data, type, row, meta) { return meta.row + 1; }, title: "Slno" },
                { 
                    data: "Question",
                    render: function (data, type, row) {
                        if (data.length > 80) {
                            return data.substr(0, 80) + '...';
                        } else {
                            return data;
                        }
                    }
                },
                { data: "Percentage" },
                { data: "Review_Count" },
                { data: "1_Rating_Count" },
                { data: "2_Rating_Count" },
                { data: "3_Rating_Count" },
                { data: "4_Rating_Count" },
                { data: "5_Rating_Count" }
            ],
            columnDefs: [
                { targets: [0, -1], orderable: false },
                { targets: 1, width: "300px" }
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