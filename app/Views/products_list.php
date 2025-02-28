<?php include'header.php'; ?>
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Product List</h3>
                    <a href="<?php echo base_url(); ?>/add-product" class="btn btn-primary py-2 px-5 btn-set-task w-sm-100"><i class="icofont-plus-circle me-2 fs-6"></i> Add Product</a>
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
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Barcode</th>
                                    <th>Brand</th>
                                    <th>Group</th>
                                    <th>Sales rate</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  $n=1;
                                  foreach ($products as $value) {
                                    $productId = $value->pid;
        
                                    $firstAvailableImage = '';

                                    if (!empty($product_images[$productId]) && is_array($product_images[$productId])) {
          
                                        foreach ($product_images[$productId] as $img) {
                                            $decodedImages = json_decode($img, true);

                                            if (!empty($decodedImages) && is_array($decodedImages)) {
                                                foreach ($decodedImages as $image) {
                                                    if (!empty($image)) {
                                                        $firstAvailableImage = $image;
                                                        break;
                                                    }
                                                }
                                            }

                                            if (!empty($firstAvailableImage)) {
                                                break;
                                            }
                                        }
                                    }

                                   ?>
                                <tr>
                                    <td>#<?= $n++; ?></td>
                                    <td>
                                     
                                        <img class="w120 rounded img-fluid" src="<?php echo base_url(); ?>/images/product/<?php echo $firstAvailableImage; ?>" alt="">
                                        
                                    </td>
                                    <td><strong><?= $value->productName; ?></strong></td>
                                    <td><?= $value->barcode; ?></td>
                                    <td><?= $value->brand; ?></td>
                                    <td><?= $value->group_name; ?></td>
                                    <td><?= $value->sales_rate; ?></td>
                                    <td>
                                        <?php if($value->active_status == 1) {
                                            echo '<span class="badge bg-success">Published</span>';
                                        } else if($value->active_status == 2){
                                            echo '<span class="badge bg-warning">Scheduled</span>';
                                        } else {
                                            echo '<span class="badge bg-danger">Hidden</span>';
                                        }?>
                                        
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="<?php echo base_url(); ?>/edit-product/<?php echo $value->pid;?>" class="btn btn-outline-secondary" title="Edit"><i class="icofont-edit text-success"></i></a>
                                            <a href="javascript:void(0);" onclick="confirmDelete('<?php echo base_url(); ?>/delete-product/<?php echo $value->pid;?>')" class="btn btn-outline-secondary deleterow" title="Delete">
                                                <i class="icofont-ui-delete text-danger"></i>
                                            </a>
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