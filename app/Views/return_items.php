<?php  
if($_SESSION['user_type'] == 'user'){
    include'user_header.php';
}else{
    include'header.php'; 
} ?>

<div class="body d-flex py-3">

    <div class="single-btn w-sm-100 d-flex justify-content-end me-4 mt-3">

        <a href="javascript:void(0);" class="btn btn-primary w-sm-100" onclick="storeReturnData()">Save Sales Return</a>

    </div>
    <div class="container-xxl">
        <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Invoice Details</h3>
                </div>
            </div>
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
                                            <span class="frame-disc-price">₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->product_rate)) - floatval(str_replace('₹', '', $salesDetailData->product_discount)), 2) ?></span>

                                            </p>
                                            <div class="price-sec flex-wrap">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-checkbox" type="checkbox" name="return" value="1" id="return" onclick="checkFrameWarranty(<?= $salesDetailData->pid; ?>,<?= $salesMasterData[0]->master_id; ?>)">
                                                    <input type="text" id="master_id" value="<?= $salesMasterData[0]->master_id; ?>" hidden>
                                                    <input type="text" id="details_id" value="<?= $salesDetailData->id; ?>" hidden>
                                                    <input type="text" id="invoice_no" value="<?= $salesMasterData[0]->invoice_no; ?>" hidden>
                                                    <input type="text" id="product_id" value="<?= $salesDetailData->pid; ?>" hidden>
                                                    <input type="text" id="color_name" value="<?= $salesDetailData->color_name; ?>" hidden>
                                                    <input type="text" id="product_rate" value="<?= $salesDetailData->product_rate; ?>" hidden>
                                                    <input type="date" id="invoice_date" value="<?= $salesMasterData[0]->invoice_date; ?>" hidden>
                                                    <input type="text" name="type" value="frame" hidden>

                                                    <label class="form-check-label" for="Return">
                                                        Return
                                                    </label>
                                                </div>
                                            </div>
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
                                            <span class="lens-disc-price">₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->lens_rate)) - floatval(str_replace('₹', '', $salesDetailData->lens_discount)), 2) ?></span>
                                            </p>

                                            <div class="price-sec flex-wrap">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-checkbox" type="checkbox" name="return" value="1" id="lensreturn" onclick="checkLensWarranty(<?= $salesDetailData->lensid; ?>,<?= $salesMasterData[0]->master_id; ?>)">
                                                    <input type="text" id="master_id" value="<?= $salesMasterData[0]->master_id; ?>" hidden>
                                                    <input type="text" id="details_id" value="<?= $salesDetailData->id; ?>" hidden>
                                                    <input type="text" id="invoice_no" value="<?= $salesMasterData[0]->invoice_no; ?>" hidden>
                                                    <input type="text" id="product_id" value="<?= $salesDetailData->pid; ?>" hidden>
                                                    <input type="text" id="color_name" value="<?= $salesDetailData->color_name; ?>" hidden>
                                                    <input type="text" id="product_rate" value="<?= $salesDetailData->product_rate; ?>" hidden>
                                                    <input type="date" id="invoice_date" value="<?= $salesMasterData[0]->invoice_date; ?>" hidden>
                                                    <input type="text" name="type" value="lens" hidden>

                                                    <label class="form-check-label" for="Return">
                                                        Return
                                                    </label>
                                                </div>
                                            </div>
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
                                            <span class="cart-disc-price">₹<?= number_format(floatval(str_replace('₹', '', $salesDetailData->coating_rate)) - floatval(str_replace('₹', '', $salesDetailData->coating_discount)), 2) ?></span>
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


                                    <div class="form-check ms-2">
                                        <input class="form-check-input custom-checkbox" type="checkbox" name="warranty" value="1" id="warranty">
                                
                                        <label class="form-check-label" for="warranty">
                                            Is Breakage Warranty Applied
                                        </label>
                                    </div>
                                    
                                </div>
                                <?php } ?>

                            </div>
                        </div> 
                    </div>


                    <div class="card mb-3" id="return_details">
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label  class="form-label">Select Salesman</label>
                                    <select class="form-select" aria-label="Default select example" name="salesman" id="salesman">
                                    <?php foreach ($salesmans as $salesmans) { ?>

                                        <option value="<?= $salesmans->id; ?>"><?= $salesmans->name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Description </label>
                                     <textarea class="form-control" id="desc" placeholder="Description..." name="desc"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Image </label>
                                    <input type="file" name="rimage" accept="image/*" class="form-control" onchange="previewImages(this)">
                                    <div class="image-preview d-flex mt-2" id="image-preview"></div> 
                                </div>

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

<?php include'footer.php'; ?>


<style>
    .custom-checkbox {
        transform: scale(1.7); /* Increase the size of the checkbox */
        margin-right: 8px; /* Optional: Adjust spacing */
    }
</style>

<script>

document.addEventListener('DOMContentLoaded', function () {
    $('#return_details').hide();

    // Listen for changes on the checkboxes
    const checkboxes = document.querySelectorAll('.custom-checkbox');
    
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            $('#return_details').show();

            const detailsId = checkbox.closest('.cart-detail-sec').querySelector('input#details_id').value;

            // Disable all checkboxes with a different details_id
            checkboxes.forEach(function (otherCheckbox) {
                const otherDetailsId = otherCheckbox.closest('.cart-detail-sec').querySelector('input#details_id').value;

                if (detailsId !== otherDetailsId) {
                    otherCheckbox.disabled = true;
                } else {
                    otherCheckbox.disabled = false;
                }
            });
        });
    });
});

function storeReturnData() {
    const masterId = document.getElementById('master_id').value;
    let returnDetailsMap = new Map();
    let totalReturnBillAmount = 0;

    // Get all checked checkboxes
    const checkedCheckboxes = document.querySelectorAll('input[name="return"]:checked');

    // Show alert if no checkbox is checked
    if (checkedCheckboxes.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: 'Please select at least one item to return.',
        });
        return;
    }

    // Iterate through all checked checkboxes
    checkedCheckboxes.forEach((checkbox) => {
        const cartFrame = checkbox.closest('.cart-frame');
        const cartDetailSec = checkbox.closest('.cart-detail-sec');
        const detailsId = cartFrame.querySelector('#details_id').value;
        const product_id = cartFrame.querySelector('#product_id').value;
        const invoice_no = cartFrame.querySelector('#invoice_no').value;
        const color_name = cartFrame.querySelector('#color_name').value;
        const product_rate = cartFrame.querySelector('#product_rate').value;
        const invoice_date = cartFrame.querySelector('#invoice_date').value;

        // Retrieve prices
        const productPriceElement = cartDetailSec.querySelector('.frame-disc-price');
        const lensPriceElement = cartDetailSec.querySelector('.lens-disc-price');
        const coatingPriceElement = cartDetailSec.querySelector('.cart-disc-price');

        const type = cartFrame.querySelector('input[name="type"]').value;

        // Initialize prices
        const productPrice = productPriceElement
            ? parseFloat(productPriceElement.childNodes[productPriceElement.childNodes.length - 1].textContent.trim().replace(/₹|,/g, '')) || 0
            : 0;

        const lensPrice = lensPriceElement
            ? parseFloat(lensPriceElement.textContent.replace(/₹|,/g, '')) || 0
            : 0;

        const coatingPrice = coatingPriceElement
            ? parseFloat(coatingPriceElement.textContent.replace(/₹|,/g, '')) || 0
            : 0;

        // Add or update details in the map
        if (!returnDetailsMap.has(detailsId)) {
            returnDetailsMap.set(detailsId, {
                master_id: masterId,
                details_id: detailsId,
                product_price: 0,
                lens_price: 0,
                coating_price: 0,
                item_total: 0,
                invoice_no: invoice_no,
                product_id: product_id,
                color_name: color_name,
                product_rate: product_rate,
                invoice_date: invoice_date,
                type: [],
            });
        }

        const existingDetail = returnDetailsMap.get(detailsId);

        // Update the detail based on the selected type
        if (type === 'frame') {
            existingDetail.product_price = productPrice;
        } else if (type === 'lens') {
            existingDetail.lens_price = lensPrice;
        } else if (type === 'coating') {
            existingDetail.coating_price = coatingPrice;
        }

        // Add type to the array (avoid duplicates)
        if (!existingDetail.type.includes(type)) {
            existingDetail.type.push(type);
        }

        // Recalculate the item total based on selected types
        existingDetail.item_total =
            (existingDetail.type.includes('frame') ? productPrice : 0) +
            (existingDetail.type.includes('lens') ? lensPrice : 0) +
            (existingDetail.type.includes('coating') ? coatingPrice : 0);

        // Update the map
        returnDetailsMap.set(detailsId, existingDetail);
    });

    // Transform the map into an array
    const returnDetails = Array.from(returnDetailsMap.values()).map((detail) => {
        totalReturnBillAmount += detail.item_total; // Add to total bill amount
        return {
            ...detail,
            item_total: detail.item_total.toFixed(2),
            type: detail.type.join(','), // Convert type array to comma-separated string
        };
    });

    // Create the final object structure
    const returnData = {
        return_details: returnDetails,
        returnBillAmount: totalReturnBillAmount.toFixed(2),
        master_id: masterId,
    };

    // Save updated returnData to localStorage
    localStorage.setItem('returnData', JSON.stringify(returnData));
    console.log("returnData:", returnData);


    let returnDatas = JSON.parse(localStorage.getItem('returnData')) || [];

    const desc = document.getElementById('desc').value;
    const salesman = $('#salesman').val();
    const warranty = $('#warranty').val();
    const isWarrantyApplied = warranty ? 1 : 0;

    const fileInput = document.querySelector('input[name="rimage"]');
    const file = fileInput.files[0]; 

    let rimage = null;

    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            rimage = e.target.result; // Base64-encoded image

            sendReturnData(returnDatas, desc, rimage);
        };
        reader.readAsDataURL(file); // Read the file as Base64
    } else {
        // If no file is selected, proceed with a null value for `rimage`
        sendReturnData(returnDatas, desc, rimage);
    }

    // Function to send the AJAX request
    function sendReturnData(returnDatas, desc, rimage) {
        $.ajax({
            url: "<?php echo base_url(); ?>/save-return-data", 
            type: "POST",
            dataType: "json",
            contentType: "application/json",
            data: JSON.stringify({
                returnData: returnDatas,
                salesman: salesman,
                desc: desc,
                rimage: rimage,
                isWarrantyApplied: isWarrantyApplied
            }),
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success...',
                        text: response.message
                    }).then(() => {
                        // Clear return details from localStorage
                        localStorage.removeItem('returnData');

                        window.location.href = "<?php echo base_url(); ?>/dashboard";
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: response.message || 'Failed to save data.'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error saving data:", error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'An error occurred while saving return data.'
                });
            }
        });
    }

}


function previewImages(input) {
    var previewContainer = input.nextElementSibling; // Find the image preview container
    previewContainer.innerHTML = ""; // Clear any previous images

    if (input.files) {
        var filesAmount = input.files.length;
        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
                var imgElement = document.createElement("img");
                imgElement.src = event.target.result;
                imgElement.classList.add("img-thumbnail", "m-1");
                imgElement.style.maxWidth = "100px"; // Adjust size of the preview images

                previewContainer.appendChild(imgElement);
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
}

function checkFrameWarranty(prodcut_id,master_id) {
    // alert(prodcut_id);
    $.ajax({
        url: '<?php echo base_url(); ?>/get-frame-warranty',
        type: 'GET',
        data: { id: prodcut_id },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                const frame = response.data;
                const warranty_days = frame.warranty_days;

                $.ajax({
                    url: '<?php echo base_url(); ?>/get-frame-purchase-date',
                    type: 'GET',
                    data: { id: master_id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            var purchase = response.data;

                            const purchase_date = new Date(purchase.invoice_date);
                            const expiry_date = new Date(purchase_date.getTime() + warranty_days * 24 * 60 * 60 * 1000);
                            expiry_date.setHours(23, 59, 59, 999);
                            // Get the current date
                            const currentDate = new Date();
                            // console.log("expiry_date : ", expiry_date);
            
                            if (currentDate > expiry_date) {
                                const checkbox = document.getElementById('return');
                                checkbox.checked = false;
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Expired Frame',
                                    text: `This Frame Warranty Expired !.`
                                });
                            } 

                        } else {
                            console.log('Failed to load frame purchase-date details.');
                        }
                    },
                    error: function() {
                        console.log('An error occurred while fetching the frame purchase-date details.');
                    }
                });



            } else {
                console.log('Failed to load frame warranty details.');
            }
        },
        error: function() {
            console.log('An error occurred while fetching the frame warranty details.');
        }
    });
}



function checkLensWarranty(lensid,master_id) {
    // alert(prodcut_id);
    $.ajax({
        url: '<?php echo base_url(); ?>/get-lens-warranty',
        type: 'GET',
        data: { id: lensid },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                const lens = response.data;
                const warranty_days = lens.warranty_days;

                $.ajax({
                    url: '<?php echo base_url(); ?>/get-frame-purchase-date',
                    type: 'GET',
                    data: { id: master_id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            var purchase = response.data;

                            const purchase_date = new Date(purchase.invoice_date);
                            const expiry_date = new Date(purchase_date.getTime() + warranty_days * 24 * 60 * 60 * 1000);
                            expiry_date.setHours(23, 59, 59, 999);
                            // Get the current date
                            const currentDate = new Date();
                            // console.log("expiry_date : ", expiry_date);
            
                            if (currentDate > expiry_date) {
                                const checkbox = document.getElementById('lensreturn');
                                checkbox.checked = false;
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Expired Lens',
                                    text: `This Lens Warranty Expired !.`
                                });
                            } 

                        } else {
                            console.log('Failed to load Lens purchase-date details.');
                        }
                    },
                    error: function() {
                        console.log('An error occurred while fetching the Lens purchase-date details.');
                    }
                });



            } else {
                console.log('Failed to load frame warranty details.');
            }
        },
        error: function() {
            console.log('An error occurred while fetching the frame warranty details.');
        }
    });
}



</script>