<?php include'header.php'; ?>
   
<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

        <form method="post" action="<?php echo base_url(); ?>/save-breakage-warranty" enctype="multipart/form-data">
        <div class="row align-items-center">
            <div class="border-0 mb-3">
                <div class="card-header no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Add Warranty</h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
                    
                </div>
            </div>
        </div> <!-- Row end  -->  
        
        <div class="row g-3 ">
            
                <div class="card" >
                    
                    <div class="card-body">
                        <div class="row g-3 align-items-center">
     
                            <div class="card">
                                <div class="card-body">

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                           <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Price From <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="price_from" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Price To <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="price_to" required>
                                        </div>
                                        <div class="col-md-3">
                                           <label  class="form-label">Sales Rate <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="salesrate" required>
                                        </div>
                                        <div class="col-md-9">
                                           <label  class="form-label">Description </label>
                                            <textarea class="form-control" name="desc"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <table id="myCartTable" class="table display dataTable table-hover align-middle" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Feature</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="tabRow">
  
                                                        <td>
                                                            <input type="text" class="form-control" placeholder="Feature.." name="features[]" required>
                                                        </td>
                                                        
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic outlined example">
                                                                <button type="button" class="btn btn-outline-secondary deleterow" id="btnremove"><i class="icofont-ui-delete text-danger"></i></button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                            <a class="btn btn-sm btn-outline-primary" id="butVal"><span class="icofont-plus"></span></a>
                                        </div>
                 
                                        
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

        </div><!-- Row end  --> 
        </form> 
    </div>
</div>    

 <!-- Jquery Core Js -->      
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/template.js"></script>

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

            // Function to add a new row
          $('#butVal').click(function () {
            // Clone the first row and append it to the tbody
            const newRow = $('tr.tabRow:first').clone(true).appendTo('#myCartTable>tbody');

            // Clear the input fields in the newly added row
            newRow.find('input').val('');

          });

          // Function to remove a row
          $(document).on('click', '#btnremove', function () {
            // Ensure at least one row remains
            if ($('#myCartTable tbody tr').length > 1) {
              $(this).closest('tr.tabRow').remove();

            } else {
              $(this).closest('tr.tabRow').find('input').val(''); // Clear the fields if it's the last row
            }
          });

        });
    </script>
