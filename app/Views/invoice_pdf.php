<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ZEALUX </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

    <div class="header">
        <img src="<?= base_url(); ?>/images/<?= esc($salesMasterData['header_image']); ?>" alt="" class="">
    </div>

    <div class="customer-details">
        <h3><?= esc($salesMasterData['header_name']); ?></h3>
        <div style="display: inline-block; width: 48%; padding-right: 10px; vertical-align: top;">
            <p><strong>Invoice No:</strong> <span style="color: #f00;"><b><?= esc($salesMasterData['invoice_no']); ?></b></span></p>
            <p><strong>Invoice Date:</strong> <?= date('d-M-Y', strtotime($salesMasterData['invoice_date'])); ?></p>
            <p><strong>Salesman:</strong> <?= esc($salesMasterData['salesman_name']); ?></p>
        </div>
        <div style="display: inline-block; width: 48%; padding-left: 10px; vertical-align: top;">
            <p><strong>Customer Name:</strong> <?= esc($salesMasterData['customer_name']); ?></p>
            <p><strong>Phone Number:</strong> <?= esc($salesMasterData['phone']); ?></p>
            <p><strong>Email:</strong> <?= esc($salesMasterData['email']); ?></p>
        </div>
    </div>


    <div class="carts">
        <?php 
        $previlage_discount = 0;
        $sub_total = 0;
        foreach ($salesDetailData as $salesItem): 

        $prescription = is_string($salesItem['prescription']) ? json_decode($salesItem['prescription'], true) : $salesItem['prescription'];
        $frame_measurement = is_string($salesItem['frame_measurement']) ? json_decode($salesItem['frame_measurement'], true) : $salesItem['frame_measurement'];

        $previlage_discount += (float) ($salesItem['product_discount'] ?? 0) + (float) ($salesItem['lens_discount'] ?? 0) + (float) ($salesItem['coating_discount'] ?? 0);


        $sub_total += (float) ($salesItem['product_rate'] ?? 0) + (float) ($salesItem['lens_price'] ?? 0) + (float) ($salesItem['coating_price'] ?? 0) ;
                       
    ?>
        <div class="cart-detail-sec" >
            <div class="cart-frame">
                <div class="cart-frame-show">
                    <img src="<?= esc($salesItem['product_image']) ?>" alt="">
                    <div class="cart-frame-deatils">
                        <h2 class="cart-frame-product-name"><?= esc($salesItem['product_name']) ?></h2>
                        <p class="selected-color-name-cart">PID: <?= esc($salesItem['barcode']) ?>, <?= esc($salesItem['product_color']) ?></p>
                    </div>
                </div>
                <div class="cart-frame-price-sec">
                    <p class="cart-frame-product-price">
                      &#8377;<?= esc(
                            (float) ($salesItem['product_rate'] ?? 0)  +
                            (float) ($salesItem['lens_price'] ?? 0) +
                            (float) ($salesItem['coating_price'] ?? 0)
                        ) ?>
                    </p>
                </div>
            </div>

          <!--   <?php if(!empty($salesItem['lens_name'])){?>
                 
            <div class="cart-frame">
                <div class="cart-frame-show">
                    <div class="cart-frame-deatils cdetails" >
                        <h2 class="cart-lens-name"><?= esc($salesItem['lens_name']) ?></h2>
                        <p class="exp-delivery"><?= esc($salesItem['exp_delivery']) ?></p>
                    </div>
                </div>
                <div class="lens-price-sec">
                    <p class="cart-lens-price"></p>
                </div>
            </div>
        <?php } ?> -->


            <?php if(!empty($salesItem['coating_name'])){?>

            <div class="cart-frame">
                <div class="cart-frame-show">
                    <div class="cart-frame-deatils coating" >
                        <h2 class="cart-coating-name"><?= esc($salesItem['coating_name']) ?></h2>
                        <p class="cart-coating-desc"><?= esc($salesItem['coating_desc']) ?></p>
                        <p class="exp-delivery"><?= esc($salesItem['exp_delivery']) ?></p>
                        
                    </div>
                </div>
                <div class="coating-price-sec">
                    <p class="cart-coating-price"></p>
                </div>
            </div>
        <?php } ?>

            <div class="medical-report">
            

            <?php if (!empty($prescription) && is_array($prescription)): ?>
                <div class="ptable">
                    <table id="prescriptionTable" class="table" style="width:40%">
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
                                <td style="background-color: #77CDFF; color: #fff;"><?= esc($prescription['right']['sph'] ?? '') ?></td>
                                <td style="background-color: #77CDFF; color: #fff;"><?= esc($prescription['left']['sph'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>CYL</th>
                                <td style="background-color: #6A9AB0; color: #fff;"><?= esc($prescription['right']['cyl'] ?? '') ?></td>
                                <td style="background-color: #6A9AB0; color: #fff;"><?= esc($prescription['left']['cyl'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>AXIS</th>
                                <td style="background-color: #DA8359; color: #fff;"><?= esc($prescription['right']['axis'] ?? '') ?></td>
                                <td style="background-color: #DA8359; color: #fff;"><?= esc($prescription['left']['axis'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>ADD</th>
                                <td style="background-color: #BC7C7C; color: #fff;"><?= esc($prescription['right']['add'] ?? '') ?></td>
                                <td style="background-color: #BC7C7C; color: #fff;"><?= esc($prescription['left']['add'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>PD</th>
                                <td style="background-color: #626F47; color: #fff;"><?= esc($prescription['right']['pd'] ?? '') ?></td>
                                <td style="background-color: #626F47; color: #fff;"><?= esc($prescription['left']['pd'] ?? '') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if (!empty($frame_measurement) && is_array($frame_measurement)): ?>
                <div class="frame_measurement">
                    <table id="frame_measurement" class="table" style="width:40%">
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
                                <td style="background-color: #77CDFF; color: #fff;"><?= esc($frame_measurement['right']['segmentheight'] ?? '') ?></td>
                                <td style="background-color: #77CDFF; color: #fff;"><?= esc($frame_measurement['left']['segmentheight'] ?? '') ?></td>
                            </tr>
                            <tr>
                                <th>Fitting Height</th>
                                <td style="background-color: #6A9AB0; color: #fff;"><?= esc($frame_measurement['right']['fittingheight'] ?? '') ?></td>
                                <td style="background-color: #6A9AB0; color: #fff;"><?= esc($frame_measurement['left']['fittingheight'] ?? '') ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if ($salesMasterData['previlage_id'] != 0): ?>
    <div class="privilage-card">
      <div class="front-card">
        <h3 id="main-title">Privilege Card </h3>
        <!-- <i id="globe" class="fa fa-globe"></i> -->
        <img src="<?= base_url(); ?>/images/logo02.png" alt="" id="globe" class="privilage-img">

        <div id="chip"></div>
        <div class="card-info">
          <p id="no"><?= $salesMasterData['privilege_phone']; ?></p>
          <p id="name"><?= $salesMasterData['privilege_name']; ?></p>
          <p id="exp-date"><span>Expiry</span>: <?= date('d-M-Y', strtotime($salesMasterData['privilege_expiry'])); ?>
</p>
        </div>
        <div id="mastercard"></div>
      </div>
    </div>
    <?php endif; ?>

    <?php if ($salesMasterData['coupen_id'] != 0): ?>
    <p class="coupen-code">Used Coupen Code: <?= $salesMasterData['coupen_code']; ?></p>
    <?php endif; ?>

    <?php if ($salesMasterData['delivered'] != 0): ?>
    <img src="<?= base_url(); ?>/images/delivered.jpg" alt="" class="delivered-img">
    <?php endif; ?>


    <?php
    $grand_total = 0;
    $balance_amount = $salesMasterData['total_amount'] - $salesMasterData['paid_amount'];
    $grand_total += $sub_total - $previlage_discount - (float) ($salesMasterData['coupen_disc_amt'] ?? 0) - (float) ($salesMasterData['ReturnAmount'] ?? 0) + (float) ($salesMasterData['warranty_amt'] ?? 0);
    ?>
    <div class="total-sec">
        <?php if (!empty($salesMasterData['warranty_amt'])) { ?>
            <div class="warranty_section">
                <p>Warranty: <?= esc($salesMasterData['warranty_name']); ?></p>
            </div>

        <?php } ?>
        <table id="pricetable" class="table" style="width:100%; border-collapse: collapse;">
            <tbody>
                <?php if($previlage_discount != 0 || $salesMasterData['coupen_disc_amt'] != 0){ ?>
                    <tr>
                        <td class="pricetd">Sub Total</td>
                        <td class="pricetd right-align">&#8377;<?= esc(number_format($sub_total,2)); ?></td>
                    </tr>

                    <?php if($previlage_discount != 0){ ?>
                    <tr>
                        <td class="pricetd">Privilage Card Discount</td>
                        <td class="pricetd right-align">&#8377;<?= esc(number_format($previlage_discount,2)); ?></td>
                    </tr>
                    <?php } ?>

                    <?php if($salesMasterData['coupen_disc_amt'] != 0){ ?>
                    <tr>
                        <td class="pricetd">Coupen Discount</td>
                        <td class="pricetd right-align">&#8377;<?= esc(number_format($salesMasterData['coupen_disc_amt'],2)); ?></td>
                    </tr>
                    <?php } ?>
                <?php } ?>

                <?php if (!empty($salesMasterData['ReturnAmount']) && is_numeric($salesMasterData['ReturnAmount']) && $salesMasterData['ReturnAmount'] != 0) { ?>
                <tr>
                    <td class="pricetd">Sales Return</td>
                    <td class="pricetd right-align">&#8377;<?= esc(number_format((float)$salesMasterData['ReturnAmount'],2)); ?></td>
                </tr>
                <?php } ?>

                <?php if (!empty($salesMasterData['warranty_amt'])) { ?>
                <tr>
                    <td class="pricetd">Breakage Warranty</td>
                    <td class="pricetd right-align">&#8377;<?= esc(number_format((float)$salesMasterData['warranty_amt'],2)); ?></td>
                </tr>
                <?php } ?>

                <tr style="font-weight: 700; color: #f00;">
                    <th class="priceth" style="font-size: 20px;">Grand Total</th>
                    <td class="pricetd right-align" style="font-size: 20px;" >&#8377;<?= esc(number_format($grand_total,2)); ?></td>
                </tr>
                <tr>
                    <td class="pricetd">Paid Amount</td>
                    <td class="pricetd right-align">&#8377;<?= esc(number_format($salesMasterData['paid_amount'],2)); ?></td>
                </tr>
                <tr>
                    <th class="priceth">Balance Amount</th>
                    <th class="priceth right-align">&#8377;<?= esc(number_format($balance_amount,2)); ?></th>
                </tr>
            </tbody>
        </table>
    </div>



</body>

<style>
    /*.warranty_section{
        margin: 5px 0 5px 420px;
    }*/
    .warranty_section p{
        margin: 0;
        color: #051937;
        font-weight: 600;
    }
    .delivered-img{
        width: 22%;
        position: absolute;
        bottom: -35px;
        left: 5px;
    }
    .privilage-card .front-card {
      /*position: absolute;
      bottom: -150px;
      left: 10px;*/

      margin: 5px 0 5px 12px;
      padding: 0.1em 1em;
      color: white;
      max-width: 300px;
      height: 160px;
      border-radius: 11px;
      background: rgb(5,25,55);
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.75);
      transition: transform 0.3s ease, box-shadow 0.2s ease-in;
      page-break-after: avoid;

    }
    .privilage-card .front-card:hover {
      cursor: pointer;
      transform: scale(1.015);
      box-shadow: 0px 0px 30px 0px rgba(0, 0, 0, 0.45);
    }
    .privilage-card .front-card #globe {
      float: right;
      margin-top: -3.2em;
      margin-right: -15px;
      height: 40px;
    }
    .privilage-card .front-card span {
      font-weight: normal;
      color: #F8F8F8;
    }

    .privilage-card .front-card .card-info #no {
      font-size: 0.9em;
      font-family: "Cutive Mono";
      font-weight: bold;
      letter-spacing: 2px;
      margin-top: 40px;
      letter-spacing: 5px; 
      text-shadow: 2px 2px 1px rgba(0, 0, 0, 0.3);
    }
    .privilage-card .front-card .card-info #name {
      font-family: "Cutive Mono";
      font-weight: bold;
      font-size: 0.9em;
      margin-top: -0.4em;
    }
    .privilage-card .front-card .card-info #exp-date {
      position: relative;
      left: 173px;
      bottom: 35px;
      font-size: 0.8em;
      opacity: 0.9;
    }
    .coupen-code{
        margin: 0px 0 0 10px;
        color: #051937;
        font-weight: 600;
    }

    .total-sec{
        position: absolute;
        bottom: -20px;
        right: 10px;
    }
    .total-sec p{
        font-size: 14px;
        margin: 0;
    }
    #pricetable .priceth, .pricetd {
      border: 1px solid #ccc;
      padding: 2px;
      text-align: left;
      font-size: 14px;

    }
    .right-align{
        text-align: right !important;
    }
    .header img{
        width: 107%;
        padding: 0;
        margin: -53px 0 0 0;
        height: 145px;
        object-fit: contain;
    }
    .customer-details h3{
        margin: -1px 0 5px 0;
        font-size: 18px;
        text-align: center;
        text-decoration: underline;
    }

    .customer-details p{
        font-size: 14px;
        margin: 2px 0;
    }
    .cart-detail-sec{
        border: 1px solid #ccc;
        margin: 8px 15px;
        border-radius: 5px;
        padding: 0 0 5px 0; 
        box-sizing: border-box; 
        overflow: hidden;
    }

    .cart-frame-show{
        position: relative;
    }
    .cart-frame-show img{
        width: 130px;
        height: 98px;
        object-fit: contain;
        margin: 8px 0 0 0;
    }
    .cart-frame-product-name{
        margin: -100px 0px 0px 160px;
        padding: 0 50px 0 0;
    }
    .selected-color-name-cart{
        margin: -1px 0px 0px 160px;
    }

    .cart-frame-deatils .selected-color-name-cart{
        font-size: 13px;
/*        margin-top: -10px;*/
        color: #212529;
    }
    .cart-frame-deatils h2 {
        color: #7258db;
        font-size: 15px;
        text-transform: capitalize;
    }
    .cart-frame-price-sec{
        position: relative;
    }
    .cart-frame-product-price{
        color: #343a40;
        font-size: 18px;
        font-weight: 800;
        margin: 5px 0;
        font-style: italic;
        position: absolute;
        top: -155px;
        right: 5px;
        margin: 50px 0px 0px 0px;
    }

    .exp-delivery{
        font-size: 13px;
        margin: 0px 0px 0px 160px;

    }
    .cart-lens-name{
        font-size: 15px;
        margin: -40px 0px 0px 160px;
    }
    .cart-lens-price{
        color: #343a40;
        font-size: 16px;
        font-weight: 600;
        font-style: italic;
    }

    .cart-coating-name{
        font-size: 15px;
        margin: -20px 0px 0px 160px;
    }
    .cart-coating-price{
        color: #343a40;
        font-size: 16px;
        font-weight: 600;
        font-style: italic;
    }
    .cart-coating-desc{
        font-size: 13px;
        color: #212529;
        margin: 8px 0px 0px 160px;
    }
    .ptable{
        margin: -30px 0px 0px 150px;
    }
    #prescriptionTable tr th{
        font-size: 10px;
        background-color: #212529;
        color: #fff;
    }
    #prescriptionTable tr td{
        font-size: 10px;
        text-align: center;
    }

    #frame_measurement tr th{
        font-size: 10px;
        background-color: #212529;
        color: #fff;
    }
    #frame_measurement tr td{
        font-size: 10px;
        text-align: center;
    }
    .frame_measurement{
        margin: -150px 0px 0px 380px;
        width: 100%;
        padding-bottom: 50px;

    }

</style>

</html> 