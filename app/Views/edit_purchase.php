<?php include'header.php'; ?>

                  
    <div class="body d-flex py-lg-3 py-md-2">
        <div class="container-xxl">

            <form method='post' action='<?php echo base_url();?>/update-purchase'>
            <input type="text" name="pid" value="<?= $editdata[0]->purchase_id; ?>" hidden>

            <div class="row g-3">
                <div class="col-12">
                  <div class="card print_invoice">
                    <div class="card-body">
                      <div class="card p-3">
                        <div style="clear:both"></div>
                        <div class="customer">
                        <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Purchase</h3>

                          <!-- <textarea class="form-control customer-title">Widget Catalog</textarea> -->
                          <table class="meta">
                            <tbody>
                              <tr>
                                <td class="meta-head">Store</td>
                                <td>
                                    <select class="form-select" aria-label="" name="store" required>
                                        <?php foreach ($stores as $stores) { ?>
                                        <option value="<?php echo $stores->storeId; ?>" <?php if($editdata[0]->store_id == $stores->storeId){echo 'selected=""';}?>><?php echo $stores->store_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                              </tr>
                              <tr>
                                <td class="meta-head">Date</td>
                                <td><input type="date" class="form-control" name="pdate" value="<?= $editdata[0]->purchase_date; ?>"/></td>
                              </tr>
                              <tr>
                                <td class="meta-head">Remarks</td>
                                <td>
                                  <textarea class="form-control" name="remarks" rows="2"><?= $editdata[0]->description; ?></textarea>
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
                            <?php for($i= 0; $i<count($editsplitdata); $i++) { ?>
                            <tr class="item-row">
                              <td class="item-name">
                                <div class="delete-wpr">
                                    <select class="js-example-placeholder-single form-select product" name="product[]" required>
                                        <?php foreach ($products as $product) { ?>
                                        <option value="<?= $product->pid; ?>" <?php if($editsplitdata[$i]->product_id == $product->pid){echo 'selected=""';}?>><?= $product->barcode; ?> - <?= $product->productName; ?></option>
                                        <?php } ?>
                                    </select>
                                    <a class="delete" href="javascript:;" title="Remove row">X</a>
                                </div>
                              </td>
                              <td class="description">
                                <select class="js-example-placeholder-single form-select color" name="color[]" required>
                                  <option value="">Select color</option>
                                </select>
                                <input type="hidden" class="existing-color-id" value="<?= $editsplitdata[$i]->color_id; ?>">
                              </td>
                              <td>
                                <textarea class="qty" name="qty[]"><?php echo $editsplitdata[$i]->qty;?></textarea>
                                <input type="text" class="form-control selected-color" name="selected_color_name[]" hidden>
                              </td>
                            </tr>
                          <?php } ?>
                        
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
                  <button type="submit" class="btn btn-lg btn-primary" >Update</button>
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
          url: '<?= base_url('/get-colors') ?>', 
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


    // set selected colors
    $('.item-row').each(function () {
      let row = $(this);
      let productSelect = row.find('select.product');
      let colorSelect = row.find('select.color');
      let savedColorId = row.find('.existing-color-id').val();
      let selectedProductId = productSelect.val();

      if (selectedProductId) {
        $.ajax({
          url: '<?= base_url('/get-colors') ?>',
          method: 'POST',
          data: { product_id: selectedProductId },
          success: function (response) {
            colorSelect.empty();
            colorSelect.append('<option value="">Select color</option>');

            $.each(response, function (i, color) {
              let isSelected = color.cid == savedColorId ? 'selected' : '';
              colorSelect.append(`<option value="${color.cid}" ${isSelected}>${color.colorName}</option>`);
            });

            // Trigger Select2 to refresh
            colorSelect.trigger('change');

            // Optional: Set the hidden input for color name
            let selectedColorText = colorSelect.find('option:selected').text();
            row.find('input.selected-color').val(selectedColorText);
          }
        });
      }
    });



});
</script>