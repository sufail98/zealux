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
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Stock Report</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row align-items-center">
            <div class="col-md-4">
                <label>Name:</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="col-md-2">
                <label>PID/Barcode:</label>
                <input type="text" id="barcode" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label">Group:</label>
               <select class="form-select" aria-label="Default select example" id="group">
                    <option value="" >Select Group</option>
                    <?php foreach ($groups as $groups) { ?>
                    <option value="<?php echo $groups->id; ?>"><?php echo $groups->group_name; ?></option>
                    <?php } ?>
                    
                </select>
            </div>
            <div class="col-md-2">
               <label  class="form-label">Model </label>
                <select class="form-select" aria-label="Default select example" id="model" >
                    <option value="">Select Model</option>
                    <option value="Full Frame">Full Frame</option>
                    <option value="Half Frame">Half Frame</option>
                    <option value="Rimless">Rimless</option>
                </select>   
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
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Barcode</th>
                                    <th>Group</th>
                                    <th>Model</th>
                                    <th>Color</th>
                                    <th>Stock</th>
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
    $(document).ready(function() {

        const name = $('#name').val();
        const barcode = $('#barcode').val();
        const group = $('#group').val();
        const model = $('#model').val();

        // Initialize DataTable once
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

        // Function to load the sales report by filter
        function loadStockReport(name, barcode, group, model) {
            $.ajax({
                url: '<?php echo base_url(); ?>/get-stock-report-by-filter',
                type: 'POST',
                data: { name: name, barcode: barcode, group: group, model: model },
                success: function(response) {
                    let rows = [];
                    const baseUrl = "<?php echo base_url(); ?>";
                    const parsedResponse = typeof response === 'string' ? JSON.parse(response) : response;

                    if (parsedResponse.valid && parsedResponse.products) {
                        parsedResponse.products.forEach((value, index) => {
                            const productId = value.pid;
                            const productColor = value.color ? value.color.trim() : 'Unknown'; // Handle null or undefined color
                            let firstAvailableImage = '';

                            // Check if product_images exists for this product ID and that the color exists in product_images
                            if (
                                parsedResponse.product_images[productId] && 
                                parsedResponse.product_images[productId][productColor]
                            ) {
                                const imageSet = parsedResponse.product_images[productId][productColor];

                                // Loop through the image set and decode each JSON string containing images
                                imageSet.forEach(imageSetString => {
                                    const images = JSON.parse(imageSetString); // Convert string into an array

                                    if (images && Array.isArray(images)) {
                                        // Find the first available image
                                        firstAvailableImage = images.find(image => image) || '';
                                    }
                                });
                            }

                            // Generate HTML for the first available image
                            const imageHTML = firstAvailableImage
                                ? `<img src="${baseUrl}/images/product/${firstAvailableImage}" alt="${productColor} Product Image" style="width:50px;height:50px;">`
                                : '';

                            // Prepare row data in an array format (for DataTables)
                            rows.push([
                                index + 1, // Serial Number (first column)
                                imageHTML, // Image column (second column)
                                `<strong>${value.productName}</strong>`, // Product Name (third column)
                                value.barcode, // Barcode (fourth column)
                                value.group_name, // Group (fifth column)
                                value.model, // Model (sixth column)
                                productColor, // Color (seventh column)
                                value.stock_count // Stock (eighth column)
                            ]);
                        });

                        // Clear the table and add new rows
                        t.clear(); // Clear the existing data in the table
                        t.rows.add(rows); // Add the new rows
                        t.draw(); // Redraw the table with new data
                    }
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred while fetching the data.");
                }
            });
        }

        // Load today's data on page load
        loadStockReport(name, barcode, group, model);

        $('#filterBtn').on('click', function(e) {
            e.preventDefault();

            const name = $('#name').val();
            const barcode = $('#barcode').val();
            const group = $('#group').val();
            const model = $('#model').val();

            // Load the stock report 
            loadStockReport(name, barcode, group, model);
        });

    });

</script>