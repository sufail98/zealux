<?php  
if($_SESSION['user_type'] == 'user'){
    include'user_header.php';
}else{
    include'header.php'; 
} ?>

<div class="body d-flex py-3">
    <div class="single-btn w-sm-100 d-flex justify-content-end me-4 mt-3">

        <?php if($salesMasterData[0]->delivered == 1) { ?>
         <div class="alert-box" >
            <div class="alert alert-success delivered-complete">
              <div class="alert-icon text-center">
                <i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i> 
              </div>
              <div class="alert-message text-center ms-1">
                <strong>Delivered</strong>
              </div>
            </div>
          </div>
        <?php } else { ?>
        <a href="javascript:void(0);" class="btn btn-primary w-sm-100" data-bs-toggle="modal" data-bs-target="#deliveredmodal">Delivered</a>
       <?php } ?>


       <div class="modal fade" id="deliveredmodal" tabindex="-1" aria-labelledby="" style="display: none;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title h4" id="deliveredLgLabel">Delivered</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" id="deliveredForm" action="<?php echo base_url(); ?>/save-delivered">
                            <div class="card mb-3">
                                
                                <div class="card-body">
                                    <input type="text" class="form-control" name="invoice_no" value="<?= $salesMasterData[0]->invoice_no; ?>" hidden>
                                    <input type="text" class="form-control" name="master_id" value="<?= $salesMasterData[0]->master_id; ?>" hidden>
                                    <input type="text" class="form-control" name="billamt" value="<?= $salesMasterData[0]->total_amount; ?>" hidden>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label  class="form-label">Invoice Date </label>
                                            <input type="date" class="form-control" name="invoice_date" id="invoice_date" value="" >
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label  class="form-label">Pending Amount</label>
                                             <?php $paid = $salesMasterData[0]->total_amount - $paid_amt_sum; ?>
                                            <input type="number" class="form-control" name="pending" id="pending" value="<?= $paid; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label  class="form-label">Salesman</label>
                                            <select class="form-select" aria-label="Default select example" name="salesman" id="salesman">
                                                <?php foreach ($salesmans as $salesmans) { ?>

                                                    <option value="<?= $salesmans->id; ?>"><?= $salesmans->name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="form-label">Paid Amount <span style="color: #f00; font-size: 15px;">*</span></label>
                                            <input type="number" class="form-control" name="paid" id="paid" value="<?= $paid; ?>" required>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label  class="form-label">Payment Mode:</label>
                                            <select class="form-select" aria-label="Default select example" name="pay_mode" id="pay_mode">
                                                <option value="Cash">Cash</option>
                                                <option value="Card">Card</option>
                                                <option value="Gpay">Gpay</option>
                                                <option value="Credit">Credit</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label  class="form-label">Balance Amount</label>
                                            <?php $balalnce = $salesMasterData[0]->balance_amount - $salesMasterData[0]->advance_amont; ?>
                                            <input type="number" class="form-control" name="balance" id="balance" value="<?= $balalnce; ?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-6">
                                            <label class="form-label">Reference No </label>
                                            <input type="text" class="form-control" name="refno" >
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-check-inline mt-3">
                                                <input class="form-check-input" type="checkbox" name="delivered" value="1" id="delivered" checked>
                                                <label class="form-check-label" for="delivered">
                                                    Delivered
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="qr-code-container" class="mt-3"></div>

                         
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase ">Save</button> 
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-xxl">
        <div class="row g-3"> 
            <div class="col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="checkout-steps">
                            <ul id="accordionExample">
                                <li>
                                    <section id="customer_details">
                                        <div class="checkout-steps-form-content collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                                            <form class="mt-3">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-md-6">
                                                        <label for="firstname1" class="form-label">Bill No: <?= $salesMasterData[0]->invoice_no; ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php
                                                        $invoice_date = new DateTime($salesMasterData[0]->invoice_date);
                                                        ?>

                                                        <label for="firstname1" class="form-label">Bill Date: <?= $invoice_date->format('F d, Y'); ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label  class="form-label">Salesman: <?= $salesman; ?></label>
                                                    </div>
                                                    
                                                    
                                                </div>

                                            </form>
                                        </div>
                                    </section>
                                </li>
                                
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="col-lg-6 col-xl-6">
                <div class="card ">
                    <div class="card-body">
                        <div class="checkout-steps">
                            <ul id="accordionExample1">
                                <li>
                                    <section>
                                        
                                        <div class="checkout-steps-form-content collapse show" id="collapsTwo" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1" >
                                            <form class="mt-3">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-md-6">
                                                        <label for="firstname1" class="form-label">Name: <?= $salesMasterData[0]->customer_name; ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="phonenumber1" class="form-label">Phone: <?= $salesMasterData[0]->phone; ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="emailaddress1" class="form-label">Email: <?= $salesMasterData[0]->email; ?></label>
                                                    </div>
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </section>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>

        <div class="container-xxl">
            
            <div class="row g-3 mb-xl-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <div class="carts-checkout">
                                
                                <?php 
                                $before_privilege_total = 0;
                                $privilege_discount = 0;

                                foreach($salesDetailData as $salesDetailData){ 
      
                                $before_privilege_total += $salesDetailData->product_rate + $salesDetailData->lens_rate + $salesDetailData->coating_rate;
                                $privilege_discount += $salesDetailData->product_discount + $salesDetailData->lens_discount + $salesDetailData->coating_discount;

                                ?>
                                <div class="cart-detail-sec">
                                    <div class="cart-frame">
                                        <div class="cart-frame-show g-3">
                                            <img src="<?= $salesDetailData->product_image; ?>" alt="" class="img-fluid mb-2">
                                            <div class="cart-frame-deatils">
                                                <h2 class="fw-bold fs-4 cart-frame-product-name"><?= $salesDetailData->productName; ?></h2>
                                                <p class="selected-color-name-cart">Selected Color: <?= $salesDetailData->color_name; ?></p>
                                            </div>
                                        </div>
                                        <?php if($salesDetailData->product_rate != 0){ ?>

                                        <div class="addto-cartbtn flex-wrap">
                                            <p class="cart-frame-product-price">
                                            <?php if($salesDetailData->product_discount != 0){ ?>

                                            <span class="cut-rate text-danger">₹<?= str_replace('₹', '', $salesDetailData->product_rate) ?></span>
                                        <?php } ?>
                                            ₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->product_rate)) - floatval(str_replace('₹', '', $salesDetailData->product_discount)), 2) ?>

                                            </p>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="cart-frame">
                                        <div class="cart-frame-show">
                                            <div class="cart-frame-deatils cdetails">
                                                <h2 class="cart-lens-name"><?= $salesDetailData->lensName; ?></h2>
                                                <?php
                                                $deliveryDate = new DateTime($salesDetailData->delivery_date);
                                                 if($salesDetailData->lensid != 0){ ?>
                                                <p>Expected delivery date: <?= $deliveryDate->format('F d, Y'); ?></p>
                                            <?php } ?>
                                            </div>
                                        </div>
                                        <?php if($salesDetailData->lens_rate != 0){ ?>

                                        <div class="price-sec flex-wrap">
                                            <p class="cart-lens-price">
                                            <?php if($salesDetailData->lens_discount != 0){ ?>
                                                
                                            <span class="cut-rate text-danger">₹<?= str_replace('₹', '', $salesDetailData->lens_rate) ?></span>
                                        <?php } ?>
                                            ₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->lens_rate)) - floatval(str_replace('₹', '', $salesDetailData->lens_discount)), 2) ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="cart-frame">
                                        <div class="cart-frame-show">
                                            <div class="cart-frame-deatils cdetails">
                                                <h2 class="cart-coating-name"><?= $salesDetailData->coating_name; ?></h2>
                                                <p class="cart-coating-desc"><?= $salesDetailData->description; ?></p>
                                            </div>
                                        </div>
                                        <?php if($salesDetailData->coating_rate != 0){ ?>

                                        <div class="price-sec flex-wrap">
                                            <p class="cart-coating-price">
                                                <?php if($salesDetailData->coating_discount != 0){ ?>
                                                <span class="cut-rate text-danger">₹<?= str_replace('₹', '', $salesDetailData->coating_rate) ?></span>
                                                <?php } ?>
                                            ₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->coating_rate)) - floatval(str_replace('₹', '', $salesDetailData->coating_discount)), 2) ?>
                                            </p>
                                        </div>
                                    <?php } ?>
                                    </div>
                                    <div class="cart-frame">
                                        <div class="cart-frame-show g-3">
                                            <?php $Prescription = json_decode($salesDetailData->Prescription, true); 
                                                if(isset($Prescription)) { ?>
                                                <div class="medical-record">
                                                    <table id="" class="table align-middle cartdisplay-presc" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>R<sub>x</sub></th>
                                                                <th>Right Eye</th>
                                                                <th>Left Eye</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th>SPH</th>
                                                                <td style="background-color: #77CDFF; color: #fff;"><?= !empty($Prescription['right']['sph']) ? $Prescription['right']['sph'] : '' ?></td>
                                                                <td style="background-color: #77CDFF; color: #fff;"><?= !empty($Prescription['left']['sph']) ? $Prescription['left']['sph'] : '' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>CYL</th>
                                                                <td style="background-color: #6A9AB0; color: #fff;"><?= !empty($Prescription['right']['cyl']) ? $Prescription['right']['cyl'] : '' ?></td>
                                                                <td style="background-color: #6A9AB0; color: #fff;"><?= !empty($Prescription['left']['cyl']) ? $Prescription['left']['cyl'] : '' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>AXIS</th>
                                                                <td style="background-color: #DA8359; color: #fff;"><?= !empty($Prescription['right']['axis']) ? $Prescription['right']['axis'] : '' ?></td>
                                                                <td style="background-color: #DA8359; color: #fff;"><?= !empty($Prescription['left']['axis']) ? $Prescription['left']['axis'] : '' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>ADD</th>
                                                                <td style="background-color: #BC7C7C; color: #fff;"><?= !empty($Prescription['right']['add']) ? $Prescription['right']['add'] : '' ?></td>
                                                                <td style="background-color: #BC7C7C; color: #fff;"><?= !empty($Prescription['left']['add']) ? $Prescription['left']['add'] : '' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>PD</th>
                                                                <td style="background-color: #626F47; color: #fff;"><?= !empty($Prescription['right']['pd']) ? $Prescription['right']['pd'] : '' ?></td>
                                                                <td style="background-color: #626F47; color: #fff;"><?= !empty($Prescription['left']['pd']) ? $Prescription['left']['pd'] : '' ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="addto-cartbtn flex-wrap">
                                            <?php $frame_measurement = json_decode($salesDetailData->frame_measurement, true); 
                                                if(isset($frame_measurement)) { ?>
                                                <div class="medical-record">
                                                    <div>
                                                        <table id="frame_measurement" class="table align-middle" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>R<sub>x</sub></th>
                                                                    <th>Right Eye</th>
                                                                    <th>Left Eye</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Segment Height</th>
                                                                    <td style="background-color: #77CDFF; color: #fff;"><?= !empty($frame_measurement['right']['segmentheight']) ? $frame_measurement['right']['segmentheight'] : '' ?></td>
                                                                    <td style="background-color: #77CDFF; color: #fff;"><?= !empty($frame_measurement['left']['segmentheight']) ? $frame_measurement['left']['segmentheight'] : '' ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Fitting Height</th>
                                                                    <td style="background-color: #6A9AB0; color: #fff;"><?= !empty($frame_measurement['right']['fittingheight']) ? $frame_measurement['right']['fittingheight'] : '' ?></td>
                                                                    <td style="background-color: #6A9AB0; color: #fff;"><?= !empty($frame_measurement['left']['fittingheight']) ? $frame_measurement['left']['fittingheight'] : '' ?></td>
                                                                </tr>
                                                                
                                                            </tbody>
                                                        </table>

                                                       
                                                    </div>
                                                </div>
                                                <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <?php } ?>




                            </div>
                        </div> 
                    </div>
          
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4">

                    <div class="checkout-sidebar col align-self-end mt-2">
                        <div class="checkout-sidebar-price-table mt-30">
                            
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Payment Mode:</p>
                                    <p class="price fw-bold"><?= $salesMasterData[0]->payment_mode; ?></p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Before Previlage Total:</p>
                                    <p class="price fw-bold" id="checkout-final-total"><?= $before_privilege_total; ?></p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Previlage discount:</p>
                                    <p class="price fw-bold" id="checkout-final-total"><?= $privilege_discount; ?></p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Subtotal:</p>
                                    <p class="price fw-bold" id="bal-amount">
                                        <?php
                                        $subtotal = $before_privilege_total - $privilege_discount;
                                        echo $subtotal;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Coupen discount:</p>
                                    <p class="price fw-bold" ><?= $salesMasterData[0]->coupen_disc_amt; ?></p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value fw-bold">Total Payable:</p>
                                    <p class="price fw-bold" >
                                        <?php
                                        $total_payable = $subtotal - $salesMasterData[0]->coupen_disc_amt;
                                        echo $total_payable;
                                        ?>
                                    </p>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
</div>





<div class="fullscreen-loader" style="display: none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<style>
    .form-control[type="number"] {
    text-align: right;
}
</style>

<?php include'footer.php'; ?>

<script>
    const today = new Date();
    const formattedToday = today.toISOString().split('T')[0];
    $('#invoice_date').val(formattedToday);

    // Function to update the balance amount
    function updateBalanceAmount() {
        const pending = parseFloat(document.getElementById('pending').value) || 0;
        const paid = parseFloat(document.getElementById('paid').value) || 0;
        
        // Calculate the new balance
        const balanceAmount = pending - paid;
        
        // Update the balance amount in the input field
        document.getElementById('balance').value = balanceAmount.toFixed(2);
    }

    // Add an event listener to update the balance when the "Paid Amount" changes
    document.getElementById('paid').addEventListener('input', updateBalanceAmount);

    // Initialize balance amount on page load if necessary
    updateBalanceAmount();




    // Delivered Submission
    $(document).ready(function () {

        let upi = '';
        let name = '';

        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>/get-upi-details', 
            data: { id: 1 },
            dataType: 'json',
            success: function (response) {
                if (response.valid) {
                    upi = response.data.upi;
                    name = response.data.name;

                    const paid_amt = parseFloat($('#paid').val()) || 0;
                    generateQRCode(paid_amt,upi,name);
                } else {
                    console.log('There was an error getting the upi data');
                }
            },
            error: function () {
                console.log('There was an error getting the upi');
            }
        });

        // generate gpay qrcode for the amounts

        function generateQRCode(paid_amt,upi,name) {
            // console.log('paid_amt :', paid_amt); 

            if (!paid_amt || paid_amt <= 0) {
                $('#qr-code-container').html(''); // Clear QR code if invalid amount
                return;
            }

            let url = `upi://pay?pa=${upi}&pn=${name}&am=${paid_amt}&cu=INR&tn=Payment%20for%20Order`;
            $.ajax({
                url: '<?= base_url("QrCodeController/generate"); ?>',
                type: 'GET',
                data: { text: url },
                xhrFields: {
                    responseType: 'blob' // Expect binary data
                },
                success: function (data) {
                    // Create a URL for the returned binary image data
                    const qrImageUrl = URL.createObjectURL(data);

                    // Set the QR code image in the target div
                    $('#qr-code-container').html(`<img src="${qrImageUrl}" alt="GPay QR Code" class="img-fluid">`);
                },
                error: function (error) {
                    console.error('Error generating QR code:', error);
                }
            });
        }
       
        // Event listener for advance_amt input
        $('#paid').on('input', function () {
            var tot_amt = parseFloat($(this).val()) || 0;
            generateQRCode(tot_amt,upi,name);

        });

        
        $('#deliveredForm').on('submit', function (e) {
            $('.fullscreen-loader').show();
            e.preventDefault(); 
            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'), 
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (response) {
                    $('.fullscreen-loader').hide();
                    if (response.success) {

                        $('#deliveredmodal').modal('hide'); 
                        Swal.fire({
                            icon: 'success',
                            title: 'Success...',
                            text: 'Added Successfully.'
                        }).then(() => {
                            // Check if PDF data is present in the response and download it
                            if (response.pdf_base64) {
                                // console.error("pdf data:", response.pdf_base64);

                                const pdfData = 'data:application/pdf;base64,' + response.pdf_base64;
                                const pdfName = response.pdf_name || 'invoice.pdf';

                                // Create a temporary link and trigger the download
                                const downloadLink = document.createElement('a');
                                downloadLink.href = pdfData;
                                downloadLink.download = pdfName;
                                downloadLink.click();
                            }

                            window.location.href = "<?php echo base_url(); ?>/sales-report";
                        });
                    } else {
                        $('#deliveredmodal').modal('hide'); 
                        Swal.fire({
                            icon: 'error',
                            title: 'Error...',
                            text: response.message || 'Failed to save data.'
                        }).then(() => {
                            window.location.href = "<?php echo base_url(); ?>/sales-report";
                        });
                    }

                    
                },
                error: function (xhr, status, error) {
                    $('.fullscreen-loader').hide();
                    console.error('Submission error:', error);
                    alert('An error occurred while submitting the form.');
                }
            });
        });

    });

</script>