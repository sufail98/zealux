<?php include'header.php'; ?>

                  
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">

            <form method='post' action='<?php echo base_url();?>/save-stock-transfer'>
            <div class="row g-3">
                <div class="col-12">
                  <div class="card print_invoice">
                    <div class="card-body">
                      <div class="card p-3">
                        <div style="clear:both"></div>
                        <div class="customer">
                        <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Stock Transfer</h3>

                          <!-- <textarea class="form-control customer-title">Widget Catalog</textarea> -->
                          <table class="meta">
                            <tbody>
                              <tr>
                                <td class="meta-head">From Store</td>
                                <td>
                                    <select class="form-select" aria-label="" name="from_store" required>
                                        <?php foreach ($fstores as $fstores) { ?>
                                        <option value="<?= $fstores->storeId; ?>"><?= $fstores->store_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                              </tr>
                              <tr>
                                <td class="meta-head">To Store</td>
                                <td>
                                    <select class="form-select" aria-label="" name="to_store" required>
                                        <?php foreach ($tstores as $tstores) { ?>
                                        <option value="<?= $tstores->storeId; ?>"><?= $tstores->store_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                              </tr>
                              <tr>
                                <td class="meta-head">Date</td>
                                <td><input type="date" class="form-control" name="pdate" /></td>
                              </tr>
                              <tr>
                                <td class="meta-head">Remarks</td>
                                <td>
                                  <textarea class="form-control" name="remarks" rows="2"></textarea>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <div style="clear:both"></div>
                        <table class="items">
                          <tbody>
                            <tr>
                              <th style="width: 270px;">Product</th>
                              <th style="width: 150px;">Color</th>
                              <th style="width: 20px;">Quantity</th>
                            </tr>
                            <tr class="item-row">
                              <td class="item-name">
                                <div class="delete-wpr">
                                    <select class="js-example-placeholder-single form-select product" name="product[]" required>
                                        <?php foreach ($products as $products) { ?>
                                        <option value="<?= $products->pid; ?>"><?= $products->barcode; ?> - <?= $products->productName; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a class="delete" href="javascript:;" title="Remove row">X</a>
                                </div>
                              </td>
                              <td class="description">
                                <select class="js-example-placeholder-single form-select color" name="color[]" required>
                                  <option value="">Select color</option>
                                </select>
                              </td>
                              <td>
                                <textarea class="qty" name="qty[]">1</textarea>
                                <input type="text" class="form-control selected-color" name="selected_color_name[]" hidden>
                              </td>
                            </tr>
                        
                            <tr id="hiderow">
                              <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
                            </tr>
                            
                          </tbody>
                        </table>
         
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12 text-center text-md-end">
                  <button type="submit" class="btn btn-lg btn-primary" >Save</button>
                </div>
            </div><!-- Row end  -->
            </form>
        </div>
    </div>

<?php include'footer.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
  // Call it on initial page load
  initializeSelect2();

  function initializeSelect2() {
    $('select.product').select2({
        placeholder: "Select a product",
        allowClear: true
    });

    $('select.color').select2({
        placeholder: "Select color",
        allowClear: true
    });
  }


  // Add new row on "Add a row" click
  $('#addrow').click(function () {
    let newRow = `
      <tr class="item-row">
        <td class="item-name">
          <div class="delete-wpr">
            <select class="js-example-placeholder-single form-select product" name="product[]" required>
              <option value="">Select product</option>
              <?php foreach ($products2 as $products) { ?>
                <option value="<?= $products->pid; ?>"><?= $products->barcode; ?> - <?= $products->productName; ?></option>
              <?php } ?>
            </select>
            <a class="delete" href="javascript:;" title="Remove row">X</a>
          </div>
        </td>
        <td class="description">
          <select class="js-example-placeholder-single form-select color" name="color[]" required>
            <option value="">Select color</option>
          </select>
        </td>
        <td>
          <textarea class="qty" name="qty[]">1</textarea>
          <input type="text" class="form-control selected-color" name="selected_color_name[]" hidden>
        </td>
      </tr>
    `;
    $(newRow).insertBefore('#hiderow');

    // Re-initialize select2 on new elements
    initializeSelect2();
  });

  // Remove row on "X" click
   $(document).on('click', '.delete', function () {
    if ($('.item-row').length > 1) {
      $(this).closest('tr').remove();
    } else {

      let timerInterval;
        Swal.fire({
          title: "Oops...!",
          html: "At least one item row must remain!",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            // const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
              // timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          }
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            // console.log("I was closed by the timer");
          }
        });
    }
  });


 
    $(document).on('change', '.product', function () {
      const productId = $(this).val();
      const row = $(this).closest('tr'); // Get current row
      // alert(productId)

      if (productId) {
        $.ajax({
          url: '<?= base_url('/stock-tranfer-colors') ?>', 
          method: 'POST',
          data: { product_id: productId },
          success: function (response) {
            // console.log('response: ',response)
            let colorDropdown = row.find('.color');
            colorDropdown.empty();
            colorDropdown.append('<option value="">Select color</option>');

            // Assume response is JSON: [{id:1, name:"Black"},...]
            $.each(response, function (i, color) {
              colorDropdown.append(`<option value="${color.cid}">${color.colorName}</option>`);
            });
          }
        });
      }
    });

    // Set selected color name on change
    $(document).on('change', 'select.color', function () {
        let selectedColor = $(this).find('option:selected').text();
        $(this).closest('tr').find('input.selected-color').val(selectedColor);
    });


});
</script>