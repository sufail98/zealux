<?php include 'user_header.php'; ?>
   
<div class="body d-flex py-2" >
    <div class="container-xxl">

        <div class="row g-3 mb-3 step" id="step-1" >
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="product-details">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="product-details-image mt-50">
                                        <div class="product-thumb-image">
                                            <div class="product-thumb-image-active nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                                <?php 
                                                $active_cid = $editdata['images'][0]->cid;
                                                foreach ($editdata['images'] as $image) { 
                                                    $images = json_decode($image->colorImage, true);

                                                    if ($images) {
                                                        foreach ($images as $index => $img) { ?>
                                                            <a class="single-thumb <?= $image->cid == $active_cid ? '' : 'd-none'; ?>" data-cid="<?= $image->cid; ?>" id="product-image-tab<?= $image->cid . '-' . $index; ?>" data-bs-toggle="pill" href="#product-image-<?= $image->cid . '-' . $index; ?>" role="button" aria-controls="product-image-<?= $image->cid . '-' . $index; ?>">
                                                                <img src="<?= base_url(); ?>/images/product/<?= $img; ?>" alt="">
                                                            </a>
                                                        <?php } 
                                                    }
                                                } ?>

                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <div class="product-image-active tab-content" id="v-pills-tabContent">
                                               
                                                <?php 
                                                    foreach ($editdata['images'] as $image) {
                                                        $images = json_decode($image->colorImage, true); 
                                                        if ($images) {
                                                            foreach ($images as $index => $img) { ?>
                                                                <a class="single-image tab-pane fade <?= $image->cid == $active_cid && $index == 0 ? 'active show' : ''; ?>" id="product-image-<?= $image->cid . '-' . $index; ?>" role="tabpanel" aria-labelledby="product-image-tab<?= $image->cid . '-' . $index; ?>" data-cid="<?= $image->cid; ?>" data-index="<?= $index; ?>">
                                                                    <img src="<?= base_url(); ?>/images/product/<?= $img; ?>" alt="">
                                                                </a>
                                                            <?php } 
                                                        }
                                                    } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product-details-content mt-45">
                                        <div class="my-1">
                                            <span class="text-muted"><?= $editdata['product_details'][0]->barcode; ?></span>
                                        </div>
                                        <h2 class="fw-bold fs-5"><?= $editdata['product_details'][0]->productName; ?></h2>
                                        
                                        <div class="product-price">
                                            <h6 class="price-title fw-bold">Price</h6>
                                            <p class="sale-price">&#8377; <?= $editdata['product_details'][0]->sales_rate; ?></p>
                                            <p class="regular-price text-danger">&#8377; <?= $editdata['product_details'][0]->mrp; ?></p>
                                        </div>
                                        <div class="product-select-wrapper flex-wrap">
                                            <div class="select-item d-flex">
                                                <div>
                                                    <h6 class="select-title fw-bold">Select Color</h6>
                                                    <ul class="color-select" id="select-color-1">
                                                        <?php 
                                                        foreach ($editdata['images'] as $image) { ?>
                                                        <li data-pid="<?= $editdata['product_details'][0]->pid; ?>" data-cid="<?= $image->cid; ?>" data-colorname="<?= $image->colorName; ?>" data-colorcode="<?= $image->colorCode; ?>" style="background-color: <?= $image->colorCode; ?>;" class="color-thumb <?= $image->cid == $active_cid ? 'active' : ''; ?>"></li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                                <div id="stock_status" class="mt-25 ms-2"></div>
                                               
                                            </div>
                                        </div>

                                        <div>
                                            <h6 class="price-title fw-bold">Features</h6>

                                            <ul class="list-unstyled features-list">
                                                <?php  
                                                $product_features = explode(',', $editdata['product_details'][0]->feature);
                                                foreach ($features as $features){ 
                                                if (in_array($features->id, $product_features)) { ?>
                                                <li class="card">
                                                    <div class="card-body p-lg-1 p-3">
                                                        <div class="d-flex border-bottom flex-wrap">
                                                            <img class="avatar rounded" src="<?php echo base_url(); ?>/images/features/<?= $features->image; ?>" alt="">
                                                            <div class="flex-fill ms-3 text-truncate">
                                                                <h6 class="mb-0 mt-2"><span><?= $features->description; ?></span></h6>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </li> <!-- .Card End -->
                                            <?php 
                                                }
                                            }
                                             ?>
                                            </ul>

                                        </div>


                                        <div class="product-items flex-wrap">
                                            <h6 class="item-title fw-bold">Similar Products </h6>
                                            <div class="items-wrapper" id="select-item-1">
                                                <?php foreach ($similarproduct as $similarproduct){
                                                $images = json_decode($similarproduct['colorImage'], true);
                                                $imageToShow = !empty($images) ? $images[0] : '';
                                                if (!empty($imageToShow)) { ?>
                                                <div class="single-item ">
                                                    <a href="<?php echo base_url(); ?>/get-product-details/<?= $similarproduct['pid']; ?>">
                                                    <div class="items-image">
                                                        <img src="<?= base_url(); ?>/images/product/<?= $imageToShow; ?>" alt="">
                                                    </div>
                                                    </a>
                                                    <p class="text"><?= $similarproduct['productName']; ?></p>
                                                </div>
                                                <?php }
                                                 } ?>
                                            </div>
                                        </div>

                                        <!-- <div class="product-btn mb-5">
                                            <div class="d-flex flex-wrap">
                                                <button class="btn btn-primary mx-1 mt-2  mt-sm-0"><i class="fa fa-heart me-1"></i> Addto Wishlist</button>
                                                <button class="btn btn-primary mx-1 mt-2 mt-sm-0 w-sm-100"><i class="fa fa-shopping-cart me-1"></i> Add to Cart</button>
                                            </div>
                                        </div> -->
                                    </div>
                                </div> 
                            </div>



                            <div class="product-btn mb-5 mt-3">
                                <div class="d-flex flex-wrap justify-content-center align-items-center">
                                    <?php 
                                        $product_lens = explode(',', $editdata['product_details'][0]->supportedLense);
                                        foreach ($lens as $lens) { 
                                            if (in_array($lens->id, $product_lens)) { 
                                                // Check if the current lens ID is 6 to call Withoutpower()
                                                if ($lens->id == 6) { ?>
                                                    <button class="btn btn-primary mx-1 mt-2 mt-sm-0" onclick="Withoutpower()"><?= $lens->lens_name; ?></button>
                                                <?php } else { ?>
                                                    <button class="btn btn-primary mx-1 mt-2 mt-sm-0" onclick="showLensList(<?= $lens->id; ?>)"> <?= $lens->lens_name; ?></button>
                                                <?php } 
                                            }
                                        }
                                        ?>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row g-3 mb-3 step" id="step-2" style="display:none;">

            <div class="col-md-12">
                <div class="">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="lens-list-tab"></div>

                        <?php $index = 1; ?>
                        <?php foreach ($lenslist as $lens): ?>
                            <?php 
                            $lens_features = explode(',', $lens->lensFeaturesId ?? '');
                            ?>
                            <div id="tab<?= $index; ?>" class="lens-tabcontent" style="<?= $index === 1 ? 'display:block;' : 'display:none;'; ?>">
                                <!-- <h3><?= htmlspecialchars($lens->lensName); ?> </h3> -->
                                <div>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0 lens-feature-list">
                                        <?php foreach ($lensfeatures as $feature): ?>
                                            <?php 
                                            if (in_array($feature->id, $lens_features)): 
                                            ?>
                                                <li class="list-group-item px-md-4 py-3 py-md-4">
                                                    <a href="javascript:void(0);" class="d-flex">
                                                        <img class="avatar rounded" src="<?php echo base_url(); ?>/images/lensfeatures/<?= $feature->image; ?>" alt="">
                                                        <div class="flex-fill ms-3 text-truncate">
                                                            <h6 class="d-flex justify-content-between mb-0"><span><?= $feature->description; ?></span> 
                                                                <!-- <small class="msg-time">10:45 AM</small> -->
                                                            </h6>
                                                            <span class="text-muted"><?= $lens->lensName; ?></span>
                                                        </div>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>

                                    <div class="product-btn mb-2 float-end">
                                        <div class="d-flex flex-wrap">
                                            <span class="price-tag">
                                              <span>&#8377;<?= $lens->salesRate; ?></span>
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php $index++; ?>
                        <?php endforeach; ?>


                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="frame-sec">
                    <div class="frame-show g-3">
                       <img id="frame-product-image" src="" alt="" class="img-fluid mb-2">
                       <div class="frame-deatils">
                        <input type="text" name="product_id" id="product_id" value="<?= $editdata['product_details'][0]->pid; ?>" hidden>
                           <h2 class="fw-bold fs-5" id="frame-product-name"><?= $editdata['product_details'][0]->productName; ?></h2>
                           <p id="frame-product-price">&#8377;<?= $editdata['product_details'][0]->sales_rate; ?></p>
                       </div>
                    </div>
                    <div class="addto-cartbtn flex-wrap">
                        <button type="button" class="btn btn-primary mx-1 mt-sm-0 btn-lg btn-block text-uppercase" onclick="nextStep()">Next</button>
                    </div>
                </div>
            </div>

            
        </div>


        <div class="row g-3 mb-3 step" id="step-3" style="display:none;">

            <div class="col-md-12">
                <div class="">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                </div>
            </div>
            <div class="container mt-2">
               
              <div class="row g-0">
                <div class="col card-carousel">

                  <div class="card-carousel__nav col-12 col-lg-4 g-2">
                    <span id="moveLeft" class="carousel__arrow">
                      <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                      </svg>
                    </span>
                    <span id="moveRight" class="carousel__arrow">
                      <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                      </svg>
                    </span>
                  </div>
                  <?php foreach ($lenscoating as $index => $lenscoating){ ?>

                  <div class="coating-card">
                    <div class="row g-0 ">
                      <div class="col-lg-4 d-flex align-items-center coating-detail">
                        <div class="card-body">
                          <h6 class="card-subtitle text-uppercase">&#8377;<?= $lenscoating->amount; ?></h6>
                          <h4 class="card-title display-5 mb-2"><?= $lenscoating->coating_name; ?></h4>
                          <p class="card-text"><?= $lenscoating->description; ?></p>
                          <!-- <a href="#" class="card-link stretched-link">Card link</a> -->
                        </div>
                      </div>
                      <div class="col-lg-8 coating-image">
                        <img src="<?= base_url(); ?>/images/lenscoating/<?= $lenscoating->image; ?>" class="img-fluid rounded-end" alt="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="coating" value="<?= $lenscoating->coating_name; ?>,<?= $lenscoating->amount; ?>,<?= $lenscoating->description; ?>" id="coating-<?= $index; ?>" onclick="setCoatingDetails('<?= $lenscoating->coating_name; ?>', '<?= $lenscoating->amount; ?>', '<?= $lenscoating->description; ?>', <?= $lenscoating->id; ?>)">
                            <label class="form-check-label" for="coating-<?= $index; ?>">
                            ADD COATING
                            </label>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>

                </div>
              </div>

              <div class="col-md-12 mt-5">
                <div class="coating-btns">
                    <a href="javascript:void(0);" class="btn mt-2 without-btn" onclick="removeCoatingSelectionAndProceed()">Continue without coating</a>
                    <a href="javascript:void(0);" class="btn mt-2 lens-btn" onclick="Addlenscoating()">Add lens coating</a>
                </div>
              </div>
            </div>

        </div>

        <div class="container-xxl g-3 mb-3 step" id="step-4" style="display:none;">

            <div class="row align-items-center"> 
                <div class="border-0"> 
                    <?php
                    $product_lens = explode(',', $editdata['product_details'][0]->supportedLense); 
                    if (in_array(6, $product_lens)) { ?>
                        <button type="button" class="btn btn-secondary" onclick="showStep(1)">Back</button>

                   <?php } else { ?>
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                    <?php } ?>
                    <a href="javascript:void(0);" class="btn btn-primary w-sm-100 justify-content-center mt-sm-5 float-end" data-bs-toggle="modal" data-bs-target="#BreakageWarranty">Add Breakage Warranty</a>

                    <a href="javascript:void(0);" class="btn btn-primary w-sm-100 justify-content-center mt-sm-5 float-end me-1" data-bs-toggle="modal" data-bs-target="#salesreturnModal">Add Sales Return</a>
                    <div class="card-header py-2 no-bg bg-transparent d-flex align-items-center px-0 justify-content-center border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Cart Detail</h3>
                    </div>
                </div>
            </div> <!-- Row end  -->
            <div class="row g-3 mb-3"> 
                <div class="col-lg-8 col-xl-8 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">

                                <input type="text" id="cart-frame-product-price" value="<?= $editdata['product_details'][0]->sales_rate; ?>" hidden>
                                <input type="text" id="cart-frame-product-color" value="" hidden>
                                <input type="text" id="cart-frame-product-colorCode" value="" hidden>
                                <input type="text" id="cart-frame-product-colorName" value="" hidden>

                                <input type="text" id="cart-frame-product-name" value="<?= $editdata['product_details'][0]->productName; ?>" hidden>
                                <input type="text" id="group_id" value="<?= $group_id; ?>" hidden>
                                <input type="text" id="isPrivilegeApplied" value="<?= $isPrivilegeApplied; ?>" hidden>

                                <img id="cart-frame-product-image" src="" alt="" hidden>

                                <input type="text" id="cart-lens-id" value="" hidden>
                                <input type="text" id="cart-lens-name" value="" hidden>
                                <input type="text" id="cart-lens-price" value="" hidden>
                                <input type="text" id="expected-delivery" value="" hidden>
                                <input type="date" id="expected-delivery-date" value="" hidden>


                                <input type="text" id="cart-coating-id" value="" hidden>
                                <input type="text" id="cart-coating-price" value="" hidden>
                                <input type="text" id="cart-coating-desc" value="" hidden>
                                <input type="text" id="cart-coating-name" value="" hidden>
                                <div class="carts"></div>

                            </div>
                        </div> 
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4 col-md-4">
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="checkout-sidebar">
                                <div class="checkout-sidebar-price-table mt-30">
                                    <div class="sub-total-price">
                                        <div class="total-price">
                                            <p class="value">Before Privilage Total:</p>
                                            <p class="price" id="before-previlage-total">₹0</p>
                                        </div>
                                        <div class="total-price discount">
                                            <p class="value">Privilage discount:</p>
                                            <p class="price" id="previlage-discount-amount">₹0</p>
                                        </div>
                                        <div class="total-price shipping">
                                            <p class="value">Subtotal:</p>
                                            <p class="price" id="total-pay"></p>
                                        </div>
                                        <div class="row coupen-code mb-3">
                                            <div class="col-md-6">
                                                <label class="title fw-bold">Coupen Code:</label>
                                            </div>
                                            <div class="col-md-6 d-flex">
                                                <input type="text" name="couponcode" id="couponcode" class="form-control me-1">
                                                <input type="text" name="couponid" id="couponid" class="form-control me-1" hidden>
                                                <input type="text" name="coupon_disc_percentage" id="coupon_disc_percentage" class="form-control me-1" hidden>

                                                <button type="button" class="btn btn-primary" id="coupensubmit">Submit</button>

                                            </div>
                                        </div>
                                        <input class="form-control" type="number" name="return_amt" id="return_amt" hidden>
                                        <input class="form-control" type="number" name="return_masterid" id="return_masterid" hidden>

                                        <input class="form-control" type="number" name="warranty_amt" id="warranty_amt" hidden>
                                        <input class="form-control" type="number" name="warranty_id" id="warranty_id" hidden>
                                        <div class="total-price discount">
                                            <p class="value">Coupen discount:</p>
                                            <p class="price" id="discount-amount">₹0</p>
                                        </div>
                                        <div class="total-price">
                                            <p class="value"></p>
                                            <p class="price" id="coupen-details"></p>
                                        </div>
                                        <div class="total-price shipping" id="return_section"></div>
                                        <div class="total-price" id="warranty_section"></div>

                                        <div class="row mb-3 previlage-sec">
                                         
                                            <a href="javascript:void(0);" class="btn btn-primary w-sm-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#previlagecard">Select Privilege Card</a>
                                    
                                            <a href="javascript:void(0);" class="w-sm-100 justify-content-center" data-bs-toggle="modal" data-bs-target="#addprevilagecard">Don't have yet, create here</a>

                                            <div class="card profile-card" id="previlage-details">
                                                <div class="card-body d-flex profile-fulldeatil flex-column">
                                                    
                                                    <div class="profile-info w-100">
                                                        <h6  class="mb-0 mt-2  fw-bold d-block fs-6 text-center"> Privilege Card User</h6>
                                                        
                                                        <div class="row g-2 pt-2">
                                                            <div class="col-xl-12">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-ui-user"></i>
                                                                    <input type="text" id="previlage_id" name="previlage_id" value="" hidden>
                                                                    <span class="ms-2" id="puser_name"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-ui-touch-phone"></i>
                                                                    <span class="ms-2" id="puser_mob"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-email"></i>
                                                                    <span class="ms-2" id="puser_mail"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icofont-birthday-cake"></i>
                                                                    <span class="ms-2" id="puser_dob"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">

                                                                <button class="btn btn-danger mt-2 text-white  mt-sm-0" onclick="RemovePrevilage()"> Remove Privilege</button>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                  
                                        </div>


                                    </div>
                                    
                                    <div class="total-payable">
                                        <div class="payable-price">
                                            <p class="value fw-bold">Total Payable:</p>
                                            <p class="price fw-bold fs-4 text-danger" id="final-total"></p>
                                        </div>
                                    </div>
                                    <div class="checkout-btn d-flex justify-content-between pt-3 flex-wrap align-self-end">
                                        <!-- <div class="single-btn w-sm-100">
                                            <a href="" class="btn btn-secondary w-sm-100">Continue Shopping</a>
                                        </div> -->
                                        <div class="single-btn w-sm-100">
                                            <a href="javascript:void(0);" class="btn btn-primary w-sm-100" onclick="nextStep()">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>


                <div class="modal fade" id="addprevilagecard" tabindex="-1" aria-labelledby="" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="addprevilagecardLgLabel">Privilege Card</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form method="post" id="privilegeCardForm" enctype="multipart/form-data">
                                    <div class="card mb-3">
                                        
                                        <div class="card-body">
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <label  class="form-label">Name <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <input type="text" class="form-control" name="pname" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <div><label class="form-label">Gender </span></label></div>

                                                    <div class="form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" value="Male">
                                                        <label class="form-check-label">
                                                            Male
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" value="Female">
                                                        <label class="form-check-label">
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <input type="number" class="form-control" name="phone" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Email </label>
                                                    <input type="email" class="form-control" name="email" >
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <label  class="form-label">Type <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <select class="form-select" aria-label="Default select example" name="type" id="type" required>
                                                    <option value="">Select Type</option>
                                                    <?php foreach ($types as $types) { ?>
                                                        <option value="<?= $types->id; ?>"><?= $types->type; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">D.O.B </label>
                                                    <input type="date" class="form-control" name="dob" >
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <label class="form-label">From Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <input type="date" class="form-control" name="from_date" id="from_date" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">To Date <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <input type="date" class="form-control" name="to_date" id="to_date" required>
                                                </div>
                                            </div>
                                            <div class="row g-3 align-items-center">
                                                <div class="col-md-6">
                                                    <label class="form-label">Amount <span style="color: #f00; font-size: 15px;">*</span></label>
                                                    <input type="number" class="form-control" name="amount" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button> 
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="BreakageWarranty" tabindex="-1" aria-labelledby="" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalLgLabel">Breakage Warranty</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="previlage-step">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="search" placeholder="Search.." id="BreakageWarrantyserach" class="form-control">
                                        </div>
                                    </div>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0 previlage_users" id="BreakageWarrantyList"></ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="salesreturnModal" tabindex="-1" aria-labelledby="" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalLgLabel">Sales Returns</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="previlage-step">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="search" placeholder="Search.." id="salesReturnserach" class="form-control">
                                        </div>
                                    </div>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0 previlage_users" id="salesReturnList"></ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="previlagecard" tabindex="-1" aria-labelledby="" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalLgLabel">Privilage Card</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="previlage-step" id="previlage-step-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="search" placeholder="Search.." id="previlageUserserach" class="form-control">
                                        </div>
                                    </div>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0 previlage_users" id="previlageUserList"></ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="modal fade" id="medicalrecord" tabindex="-1" aria-labelledby="exampleModalLgLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title h4" id="exampleModalLgLabel">Eye Test Records</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="text" name="eyetest_id" id="eyeid" value="" hidden>
                                <div class="medical_step" id="medical_step-1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="search" placeholder="Search.." id="userserach" class="form-control">
                                        </div>
                                    </div>
                                    <ul class="list-unstyled list-group list-group-custom list-group-flush mb-0 eyetest_users" id="userList">
                                       <?php foreach ($eyetest_users as $eyetest_users) { ?>
                                        <li class="list-group-item px-md-4 py-3 py-md-4 eyetest_user_item">
                                            <a href="javascript:void(0);" onclick="M_nextStep(<?= $eyetest_users->EyeTestId; ?>)" class="d-flex">
                                                <img class="avatar rounded" src="<?= base_url(); ?>/assets/images/xs/avatar4.svg" alt="">
                                                <div class="flex-fill ms-3 text-truncate">
                                                    <h6 class="d-flex justify-content-between mb-0"><span><?= $eyetest_users->CustomerName; ?></span> </h6>
                                                    <span class="text-muted"><?= $eyetest_users->MobileNo1; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                       
                                    </ul>
                                </div>


                                <div class="col-md-12 medical_step" id="medical_step-2" style="display:none;">
                                    <div class="frame-sec">
                                        <div class="frame-show g-3">
                                           <img id="medical-product-image" src="" alt="" class="img-fluid mb-2">
                                           <div class="frame-deatils">
                                               <h2 class="fw-bold fs-4" id="medical-product-name"></h2>
                                               <p id="medical-product-color"></p>
                                               <p id="medical-product-price"></p>
                                           </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card">
                                               
                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="review">
                                                        <div class="card-body">
                                                            <div class="row clearfix">
                                                                <div class="col-lg-3 col-md-3">
                                                                    <div class="feedback-info sticky-top">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                
                                                                                <div class="customer-like">
                                                                                    <h6 class="mb-0 fw-bold " id="userName"></h6>
                                                                                    <ul class="list-group mt-3">
                                                                                        <li class="list-group-item d-flex">
                                                                                            <div class="number border-end pe-2 fw-bold">
                                                                                                <strong class="color-light-success">Register Date</strong>
                                                                                            </div>
                                                                                            <!-- <div class="cs-text flex-fill ps-2">
                                                                                                <span ></span>
                                                                                            </div> -->
                                                                                            <div class="vote-text">
                                                                                                <span class="text-muted" id="regdate"></span>
                                                                                            </div>
                                                                                        </li>
                                                                                        <li class="list-group-item d-flex">
                                                                                            <div class="number border-end pe-2 fw-bold">
                                                                                                <strong class="color-light-success">Mobile</strong>
                                                                                            </div>
                                                                                            <!-- <div class="cs-text flex-fill ps-2">
                                                                                                <span ></span>
                                                                                            </div> -->
                                                                                            <div class="vote-text">
                                                                                                <span class="text-muted" id="usermob"></span>
                                                                                            </div>
                                                                                        </li>
                                                                                        
                                                                                    </ul>
                                                                                </div>
                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-5 col-md-5">
                                                                   <div class="card">
                                                                        <div class="card-body">
                                                                             
                                                                            <h6 class="mb-0 fw-bold ">Frame Measurement</h6>
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
                                                                                        <td style="background-color: #77CDFF; color: #fff;"><input type="text" name="segmentheight_right" id="segmentheight_right" class="form-control"></td>
                                                                                        <td style="background-color: #77CDFF; color: #fff;"><input type="text" name="segmentheight_left" id="segmentheight_left" class="form-control"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>Fitting Height</th>
                                                                                        <td style="background-color: #6A9AB0; color: #fff;"><input type="text" name="fittingheight_right" id="fittingheight_right" class="form-control"></td>
                                                                                        <td style="background-color: #6A9AB0; color: #fff;"><input type="text" name="fittingheight_left" id="fittingheight_left" class="form-control"></td>
                                                                                    </tr>
                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>



                                                                <div class="col-lg-4 col-md-4">
                                                               
                                                                <input type="text" name="frame_measurements" id="frame_measurements" value="" hidden>
                                                                   <div class="card">
                                                                        <div class="card-body">
                                                                            <table id="prescriptionTable" class="table align-middle" style="width:100%">
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
                                                                                        <td style="background-color: #77CDFF; color: #fff;"></td>
                                                                                        <td style="background-color: #77CDFF; color: #fff;"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>CYL</th>
                                                                                        <td style="background-color: #6A9AB0; color: #fff;"></td>
                                                                                        <td style="background-color: #6A9AB0; color: #fff;"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>AXIS</th>
                                                                                        <td style="background-color: #DA8359; color: #fff;"></td>
                                                                                        <td style="background-color: #DA8359; color: #fff;"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>ADD</th>
                                                                                        <td style="background-color: #BC7C7C; color: #fff;"></td>
                                                                                        <td style="background-color: #BC7C7C; color: #fff;"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th>PD</th>
                                                                                        <td style="background-color: #626F47; color: #fff;"></td>
                                                                                        <td style="background-color: #626F47; color: #fff;"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            
                                                                        </div>
                                                                    </div>

                                                                    <div class="float-end">
                                                                        <button class="btn btn-primary mx-1 mt-2  mt-sm-0" onclick="M_prevStep()"> Change Medical Record</button>
                                                                        <button class="btn btn-primary mx-1 mt-2  mt-sm-0" onclick="confirmMedical()"> Confirm</button>
                                                                    </div>

                                                                </div>




                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- Row end  --> 

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-3 mb-3 step" id="step-5" style="display:none;">
            <div class="col-md-12">
                <div class="">
                    <button type="button" class="btn btn-secondary" onclick="prevStep()">Back</button>
                </div>
            </div>

            <div class="row align-items-center">
                <div class="border-0">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Checkout Details</h3>
                    </div>
                </div>
            </div> 

            <div class="row g-3 mb-3"> 
                <div class="col-lg-6 col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="checkout-steps">
                                <ul id="accordionExample">
                                    <li>
                                        <section id="customer_details">
                                            <h6 class="title collapsed fw-bold" id="headingOne" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Customer Details </h6>
                                            <div class="checkout-steps-form-content collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample" >
                                                <form class="mt-3">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-md-6">
                                                            <label for="firstname1" class="form-label">Name</label>
                                                            <input type="text" class="form-control" name="cname">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phonenumber1" class="form-label">Phone Number</label>
                                                            <input type="text" class="form-control" name="cphone">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="emailaddress1" class="form-label">Email Address</label>
                                                            <input type="email" class="form-control" name="cmail">
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <!-- <button type="submit" class="btn btn-primary mt-4 px-5 text-uppercase">Save</button> -->
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
                    <div class="card  mb-3">
                        <div class="card-body">
                            <div class="checkout-steps">
                                <ul id="accordionExample1">
                                    <li>
                                        <section>
                                            <h6 class="title collapsed fw-bold" id="headingOne1" data-bs-toggle="collapse" data-bs-target="#collapsTwo" aria-expanded="true" aria-controls="collapsTwo">Salesman Details </h6>
                                            <div class="checkout-steps-form-content collapse show" id="collapsTwo" aria-labelledby="headingOne1" data-bs-parent="#accordionExample1" >
                                                <form class="mt-3">
                                                    <div class="row g-3 align-items-center">
                                                        <div class="col-md-6">
                                                            <label  class="form-label">Select Salesman</label>
                                                            <select class="form-select" aria-label="Default select example" name="salesman" id="salesman">
                                                            <?php foreach ($salesmans as $salesmans) { ?>

                                                                <option value="<?= $salesmans->id; ?>"><?= $salesmans->name; ?></option>
                                                                <?php } ?>
                                                            </select>
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
                    <!-- <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12">
                        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-1 row-deck g-3">
                            <div class="col">
                                <div class="card profile-card">
                                    <div class="card-body d-flex profile-fulldeatil flex-column">
                                        <div class="profile-block text-center w220 mx-auto">
                                            <a href="#">
                                                <img src="" alt="" class="avatar xxl rounded img-thumbnail shadow-sm" id="checkout-product-image">
                                            </a>
                                            <div class="about-info d-flex align-items-center mt-3 justify-content-center flex-column">
                                                <span class="text-muted small" id="checkout-product-color"></span>
                                            </div>
                                        </div>
                                        <div class="profile-info w-100">
                                            <h6  class="mb-0 mt-2  fw-bold d-block fs-6 text-center"> <?= $editdata['product_details'][0]->productName; ?></h6>
                                            <span class="py-1 fw-bold small-11 mb-0 mt-1 text-muted text-center mx-auto d-block">&#8377;<?= $editdata['product_details'][0]->sales_rate; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div> -->
                    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8">
                        <!-- <div class="row g-3 mb-3 row-cols-1 row-cols-md-1 row-cols-lg-2 row-deck"> 
                            <div class="col">
                                <div class="card auth-detailblock">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Lens Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label col-6 col-sm-5" id="checkout-lens-name"></label>
                                                <span><strong id="checkout-lens-price"></strong></span>
                                                <p id="expected-delivery"></p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold ">Coating Details</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-12">
                                                <label class="form-label col-6 col-sm-5" id="checkout-coating-name"></label>
                                                <span><strong id="checkout-coating-price"></strong></span>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <div class="card">
                            <div class="card-body">
                                <div class="carts-checkout"></div>
                            </div> 
                        </div>
              
                    </div>
                    <div class="col-lg-4 col-xl-4 col-md-4">

                        <div class="checkout-sidebar col align-self-end mt-2">
                            <div class="checkout-sidebar-price-table mt-30">
                                <div class="col-md-12">
                                    <label  class="form-label">Payment Mode:</label>
                                    <select class="form-select" aria-label="Default select example" name="pay_mode" id="pay_mode">
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card</option>
                                        <option value="Gpay">Gpay</option>
                                        <option value="Credit">Credit</option>
                                    </select>
                                </div>
                                <div id="qr-code-container" class="mt-3"></div>

                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value fw-bold">Total Amount:</p>
                                        <p class="price fw-bold" id="checkout-final-total"></p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label  class="form-label">Paid Amount:</label>
                                    <input class="form-control" type="number" name="advance_amt" id="advance_amt" >
                                </div>
                                <div class="total-payable">
                                    <div class="payable-price">
                                        <p class="value fw-bold">Balance Amount:</p>
                                        <p class="price fw-bold" id="bal-amount"></p>
                                    </div>
                                </div>
                                
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="downloadpdf" value="1" id="pdfdownload" checked>
                                    <label class="form-check-label" for="pdfdownload">
                                        Download PDF
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="delivered" value="1" id="delivered" >
                                    <label class="form-check-label" for="delivered">
                                        Delivered
                                    </label>
                                </div>
                                
                                <div class="checkout-btn pt-3">
                                    <div class="single-btn w-sm-100">
                                        <a href="javascript:void(0);" class="btn btn-primary w-sm-100" onclick="saveData()">Confirm</a>
                                        <div class="fullscreen-loader" style="display: none;">
                                            <div class="spinner-border text-primary" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Row end  -->


            </div>

        </div>

        

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

                    } else {
                        console.log('There was an error getting the upi data');
                    }
                },
                error: function () {
                    console.log('There was an error getting the upi');
                }
            });


            // generate gpay qrcode for the amounts

            function generateQRCode(tot_amt,upi,name) {
                if (!tot_amt || tot_amt <= 0) {
                    $('#qr-code-container').html(''); // Clear QR code if invalid amount
                    return;
                }

                let url = `upi://pay?pa=${upi}&pn=${name}&am=${tot_amt}&cu=INR&tn=Payment%20for%20Order`;

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

            // Event listener for pay_mode change
            $('#pay_mode').on('change', function () {
                var pay_mode = $(this).val();
                var tot_amt = parseFloat($('#checkout-final-total').text().replace('₹', '')) || 0;

                if (pay_mode === 'Gpay') {
                    var advance_amt = parseFloat($('#advance_amt').val()) || 0;
                    tot_amt = advance_amt > 0 ? advance_amt : tot_amt; // Use advance_amt if entered
                    generateQRCode(tot_amt,upi,name);
                } else {
                    $('#qr-code-container').html(''); // Clear QR code if not GPay
                }
            });

            // Event listener for advance_amt input
            $('#advance_amt').on('input', function () {
                var pay_mode = $('#pay_mode').val();
                if (pay_mode === 'Gpay') {
                    var tot_amt = parseFloat($(this).val()) || 0;
                    generateQRCode(tot_amt,upi,name);
                }
            });

            $('#coupensubmit').on('click', function () {
                const couponCode = $('#couponcode').val();
                const totalPayable = parseFloat($('#final-total').text().replace('₹', ''));

                const discount_amount = parseFloat($('#discount-amount').text().replace('₹', ''));
                if (discount_amount != 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Coupen discount has already set. Please remove the current coupen & update again !'
                    });
                    return;
                }

                // console.log("subtotal c : ", subtotal);

                if (couponCode.length > 0) {
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url(); ?>/get-coupencode', 
                        data: { coupon: couponCode },
                        dataType: 'json',
                        success: function (response) {
                            if (response.valid) {

                                const discountPercentage = parseFloat(response.coupen.discount_percentage);
                                const dateFrom = new Date(response.coupen.date_from);
                                const dateTo = new Date(response.coupen.date_to);
                                // Add a full day to include the entire day of `dateTo`
                                dateTo.setHours(23, 59, 59, 999);
                                const currentDate = new Date();

                                // Check if the current date is within the valid range
                                if (currentDate >= dateFrom && currentDate <= dateTo) {
                                    const discountAmount = totalPayable * (discountPercentage / 100);
                                    $('#couponid').val(response.coupen.id);
                                    $('#coupon_disc_percentage').val(discountPercentage);

                                    $('#coupen-details').html(`Used Coupen: ${response.coupen.coupen_code}, (${response.coupen.discount_percentage}%)  
                                    <a href="javascript:void(0);" class="btn cart-btn-del w-sm-100" onclick="RemoveCoupen()" title="Remove Coupen">
                                        <i class="icofont-close"></i>
                                    </a>`);


                                    $('#discount-amount').text(`₹${discountAmount.toFixed(2)}`);
                                    $('#final-total').text(`₹${(totalPayable - discountAmount).toFixed(2)}`);
                                    $('#checkout-final-total').text(`₹${(totalPayable - discountAmount).toFixed(2)}`);
                                }else{
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Expired Coupon',
                                        text: `This coupon was valid from ${response.coupen.date_from} to ${response.coupen.date_to}.`
                                    });
                                }


                            } else {
                                $('#discount-amount').text('₹0.00');
                                $('#final-total').text(`₹${totalPayable.toFixed(2)}`);
                                $('#checkout-final-total').text(`₹${totalPayable.toFixed(2)}`);

                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Coupon Not Exist !'
                                });
                            }
                        },
                        error: function () {
                            alert('There was an error validating the coupon');
                        }
                    });
                } else {
                    // Reset if the coupon code is cleared
                    $('#discount-amount').text('₹0.00');
                    $('#final-total').text(`₹${totalPayable.toFixed(2)}`);
                    $('#checkout-final-total').text(`₹${totalPayable.toFixed(2)}`);

                }
            });


            $('#privilegeCardForm').on('submit', function(e) {
                e.preventDefault(); 

                $.ajax({
                    url: '<?php echo base_url(); ?>/save-previlage-data',  
                    type: 'POST',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success...',
                                text: response.message,
                            });

                            $('#addprevilagecard').modal('hide');
                            $('#privilegeCardForm')[0].reset();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("An error occurred. Please try again.");
                    }
                });
            });

        });

        
        const ftoday = new Date();
        const fformattedToday = ftoday.toISOString().split('T')[0];
        $('#from_date').val(fformattedToday);
        $('#type').on('change',function(){
            var type = $(this).val();

            $.ajax({
                url: '<?php echo base_url(); ?>/get-previlage-types',
                type: 'GET',
                data: { id: type },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var previlage = response.data;

                        const days = previlage.days;
                        const currentDate = new Date(); // Get today's date

                        // Calculate the new date directly by creating a fresh Date object
                        const futureDate = new Date(currentDate.getTime() + days * 24 * 60 * 60 * 1000);

                        // Format the future date for display
                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                        const formattedDate = futureDate.toLocaleDateString('en-US', options);

                        const yyyyMmDdFormat = `${futureDate.getFullYear()}-${String(futureDate.getMonth() + 1).padStart(2, '0')}-${String(futureDate.getDate()).padStart(2, '0')}`;
                        $('#privilegeCardForm').find('input[id="to_date"]').val(yyyyMmDdFormat);
                        $('#privilegeCardForm').find('input[name="amount"]').val(previlage.amount);

      
                    } else {
                        console.log('Failed to load previlage type details.');
                    }
                },
                error: function() {
                    console.log('An error occurred while fetching the previlage details.');
                }
            });
        });




        $('#previlagecard').on('show.bs.modal', function () {
            // Clear existing list
            $('#previlageUserList').empty();

            // Make AJAX request to get previlage users
            $.ajax({
                url: '<?php echo base_url(); ?>/get-previlage-users',  
                type: 'GET',
                success: function(users) {
                    if (users.length > 0) {
        
                        users.forEach(function(user) {
                            $('#previlageUserList').append(`
                                <li class="list-group-item px-md-4 py-3 py-md-4 previlage_user_item">
                                    <a href="javascript:void(0);" onclick="SetPrevilage(${user.id})" class="d-flex">
                                        <img class="avatar rounded" src="<?= base_url(); ?>/assets/images/xs/avatar4.svg" alt="">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h6 class="d-flex justify-content-between mb-0">
                                                <span>${user.name}</span>
                                            </h6>
                                            <span class="text-muted">${user.phone}</span>
                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    } else {
                        $('#previlageUserList').append('<li class="list-group-item text-center">No users found.</li>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#previlageUserList').append('<li class="list-group-item text-center">Error loading users.</li>');
                }
            });
        });



        $('#salesreturnModal').on('show.bs.modal', function () {
            // Clear existing list
            $('#salesReturnList').empty();

            // Make AJAX request to get previlage users
            $.ajax({
                url: '<?php echo base_url(); ?>/get-sales-returns',  
                type: 'GET',
                success: function(returns) {
                    if (returns.length > 0) {
        
                        returns.forEach(function(returndata) {
                            $('#salesReturnList').append(`
                                <li class="list-group-item px-md-4 py-3 py-md-4 previlage_user_item">
                                    <a href="javascript:void(0);" onclick="SetReturnAmount(${returndata.ReturnAmount}, ${returndata.SalesMasterId})" class="d-flex">
                                        <img class="avatar rounded" src="<?= base_url(); ?>/assets/images/xs/avatar4.svg" alt="">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h6 class="d-flex justify-content-between mb-0">
                                                <span>Return No: ${returndata.ReturnNo}</span>
                                                <small class="msg-time">Date: 
                                                ${new Date(returndata.ReturnDate).toLocaleDateString('en-GB', {
                                                    day: '2-digit',
                                                    month: 'short',
                                                    year: 'numeric',
                                                  })}
                                                </small>
                                            </h6>
                                            <p class="m-0">Bill Amount: ${returndata.ReturnAmount}</p>
                                            <span class="text-muted">Customer: ${returndata.Customername}</span><br>
                                            <p class="text-muted">Phone: ${returndata.Phone}</p>

                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    } else {
                        $('#salesReturnList').append('<li class="list-group-item text-center">No Returns found.</li>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#salesReturnList').append('<li class="list-group-item text-center">Error loading Returns.</li>');
                }
            });
        });


        $('#BreakageWarranty').on('show.bs.modal', function () {
            // Clear existing list
            $('#BreakageWarrantyList').empty();

            // Make AJAX request to get previlage users
            $.ajax({
                url: '<?php echo base_url(); ?>/get-breakage-warranty',  
                type: 'GET',
                success: function(warranty) {
                    if (warranty.length > 0) {
        
                        warranty.forEach(function(data) {
                            $('#BreakageWarrantyList').append(`
                                <li class="list-group-item px-md-4 py-3 py-md-4 previlage_user_item">
                                    <a href="javascript:void(0);" onclick="SetWarrantyAmount(${data.sales_rate}, ${data.id})" class="d-flex">
                                        <i class="icofont-card fa-2x"></i>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h6 class="d-flex justify-content-between mb-0">
                                                <span>${data.name}</span>
                                            </h6>
                                            <p class="m-0 w_amount">Amount: ${data.sales_rate}</p>
                                        </div>
                                    </a>
                                </li>
                            `);
                        });
                    } else {
                        $('#BreakageWarrantyList').append('<li class="list-group-item text-center">No Warranties found.</li>');
                    }
                },
                error: function(xhr, status, error) {
                    $('#BreakageWarrantyList').append('<li class="list-group-item text-center">Error loading Warranties.</li>');
                }
            });
        });


    </script>


    <script>
        // get stock status
        function fetchAndSetStockStatus(pid, color) {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>/get-color-wise-stock', 
                data: { pid: pid, color: color },
                dataType: 'json',
                success: function (response) {
                    if (response.valid) {
                        const data = response.data;
                        const stock = data[0].stock_count; 
                        let stockStatus = '';
                        if (stock > 1) {
                            stockStatus = '<span class="badge bg-success">In stock</span>';
                        } else if (stock == 1) {
                            stockStatus = '<span class="badge bg-warning">Only 1 left in stock</span>';
                        } else {
                            stockStatus = '<span class="badge bg-danger">Out of stock</span>';
                        }

                        // Set the stock status in the div
                        $('#stock_status').html(stockStatus);
                    } else {
                        $('#stock_status').html('<span class="badge bg-danger">Error fetching stock</span>');
                    }
                },
                error: function () {
                    console.log('There was an error fetching stock status.');
                }
            });
        }

        document.querySelectorAll('.color-thumb').forEach(function (thumb) {
            thumb.addEventListener('click', function () {
                // Remove 'active' class from all color thumbs
                document.querySelectorAll('.color-thumb').forEach(function (el) {
                    el.classList.remove('active');
                });

                // Set the clicked color thumb as active
                this.classList.add('active');

                // Get the cid of the clicked color
                const selectedCid = this.getAttribute('data-cid');
                const selectedColor = this.getAttribute('data-colorname');
                const selectedProductId = this.getAttribute('data-pid');

                // Hide all thumbnails and images for all colors
                document.querySelectorAll('.single-thumb').forEach(function (thumb) {
                    thumb.classList.add('d-none'); // Hide all thumbnails
                });

                document.querySelectorAll('.single-image').forEach(function (image) {
                    image.classList.remove('active', 'show'); // Hide all images
                });

                // Show the thumbnails corresponding to the selected color (cid)
                document.querySelectorAll('.single-thumb[data-cid="' + selectedCid + '"]').forEach(function (thumb) {
                    thumb.classList.remove('d-none'); // Show thumbnails of the selected color
                });

                // Show the first image corresponding to the selected color
                const activeImage = document.querySelector('#product-image-' + selectedCid + '-0');
                if (activeImage) {
                    activeImage.classList.add('active', 'show');
                }

                // Optionally, you can activate the first thumbnail of the selected color
                const activeThumb = document.querySelector('#product-image-tab' + selectedCid + '-0');
                if (activeThumb) {
                    document.querySelectorAll('.single-thumb').forEach(function (thumb) {
                        thumb.classList.remove('active');
                    });
                    activeThumb.classList.add('active'); // Set the first thumbnail active
                    // console.log('Selected selectedProductId :', selectedProductId); 
                }

                // Fetch and set stock status
                fetchAndSetStockStatus(selectedProductId, selectedColor);
            });
        });

        // On page load: hide all non-active color thumbnails
        window.addEventListener('DOMContentLoaded', function () {

            // Get the active color (cid)
            const activeCid = document.querySelector('.color-thumb.active').getAttribute('data-cid');
            const selectedColor = document.querySelector('.color-thumb.active').getAttribute('data-colorname');
            const selectedProductId = document.querySelector('.color-thumb.active').getAttribute('data-pid');

            // Hide all thumbnails except for the active color's thumbnails
            document.querySelectorAll('.single-thumb').forEach(function (thumb) {
                if (thumb.getAttribute('data-cid') !== activeCid) {
                    thumb.classList.add('d-none'); // Hide thumbnails not belonging to the active color
                }

                // Fetch and set stock status for the active color
                fetchAndSetStockStatus(selectedProductId, selectedColor);
            });


            //  load the selected image, price details 
            const colorThumbs = document.querySelectorAll('.color-thumb');
            const frameProductImage = document.getElementById('frame-product-image');
            const frameProductName = document.getElementById('frame-product-name');

            const cartframeProductName = document.getElementById('cart-frame-product-name');
            const cartframeProductImage = document.getElementById('cart-frame-product-image');
            const cartframeProductColor = document.getElementById('cart-frame-product-color');
            const cartframeProductColorCode = document.getElementById('cart-frame-product-colorCode');
            const cartframeProductColorName = document.getElementById('cart-frame-product-colorName');

            const medicalProductName = document.getElementById('medical-product-name');
            const medicalProductImage = document.getElementById('medical-product-image');
            const medicalProductColor = document.getElementById('medical-product-color');

            // const checkoutProductImage = document.getElementById('checkout-product-image');
            // const checkoutProductColor = document.getElementById('checkout-product-color');

            // Create a new element to display selected color
            const selectedColorDisplay = document.createElement('p');
            selectedColorDisplay.id = 'selected-color-name';
            frameProductName.insertAdjacentElement('afterend', selectedColorDisplay);

            // Function to set the active image and color name
            function setActiveColorAndImage(cid, colorName, colorCode) {
                // Show the first image corresponding to the selected color
                const activeImage = document.querySelector(`.single-image[data-cid="${cid}"].active img`);
                if (activeImage) {
                    frameProductImage.src = activeImage.src;
                    cartframeProductImage.src = activeImage.src;
                    medicalProductImage.src = activeImage.src;
                    // checkoutProductImage.src = activeImage.src;
                }

                // Display the selected color name
                selectedColorDisplay.textContent = `Selected Color: ${colorName}`;
                // checkoutProductColor.textContent = `Selected Color: ${colorName}`;
                cartframeProductColor.textContent = `Selected Color: ${colorName}`;
                cartframeProductColorCode.textContent = colorCode;
                cartframeProductColorName.textContent = colorName;
                medicalProductColor.textContent = `Selected Color: ${colorName}`;
            }

            // On page load: Get the initially active color's CID and color name
            const activeColorThumb = document.querySelector('.color-thumb.active');
            if (activeColorThumb) {
                const initialCid = activeColorThumb.getAttribute('data-cid');
                const initialColorName = activeColorThumb.getAttribute('data-colorname');
                const initialColorCode = activeColorThumb.getAttribute('data-colorcode');

                setActiveColorAndImage(initialCid, initialColorName, initialColorCode);  // Set active color and image
            }

            // Add click event listener to each color thumb
            colorThumbs.forEach(function(colorThumb) {
                colorThumb.addEventListener('click', function() {
                    // Remove active class from all color thumbs
                    colorThumbs.forEach(function(c) {
                        c.classList.remove('active');
                    });

                    // Add active class to the clicked color thumb
                    this.classList.add('active');

                    // Get the CID (color ID) and color name of the clicked color
                    const cid = this.getAttribute('data-cid');
                    const colorName = this.getAttribute('data-colorname');
                    const colorCode = this.getAttribute('data-colorcode');

                    // Set the first image for the selected color and display the name
                    setActiveColorAndImage(cid, colorName, colorCode);
                });
            });

            // Add click event listener to each thumbnail image
            const thumbImages = document.querySelectorAll('.single-thumb');
            thumbImages.forEach(function(thumb) {
                thumb.addEventListener('click', function() {
                    const cid = this.getAttribute('data-cid');
                    const clickedImage = this.querySelector('img');
                    
                    // Update the frame image to the clicked thumbnail's image
                    if (clickedImage) {
                        frameProductImage.src = clickedImage.src;
                    }

                    // Optionally, you could update color if each thumbnail represents a specific shade
                });
            });



          // lens coating sections
          const items = document.querySelectorAll('.coating-card');
          let current = 0;
          const total = items.length;

          // Set the first card to be active
          items[0].classList.add('active');

          // Navigation functions
          function setSlide(prev, next) {
            if (next >= total) next = 0;
            if (next < 0) next = total - 1;
            
            items[prev].classList.remove('active');
            items[next].classList.add('active');
            
            current = next;
          }

          // Move right
          document.getElementById('moveRight').addEventListener('click', function () {
            const prev = current;
            const next = current + 1;
            setSlide(prev, next);
          });

          // Move left
          document.getElementById('moveLeft').addEventListener('click', function () {
            const prev = current;
            const next = current - 1;
            setSlide(prev, next);
          });

          // Swipe functionality for touchscreen devices
          let touchStartX = 0;
          let touchEndX = 0;

          const cardCarousel = document.querySelector('.card-carousel');

          cardCarousel.addEventListener('touchstart', function (event) {
            touchStartX = event.changedTouches[0].screenX;
          });

          cardCarousel.addEventListener('touchmove', function (event) {
            touchEndX = event.changedTouches[0].screenX;
          });

          cardCarousel.addEventListener('touchend', function () {
            if (touchEndX < touchStartX - 50) {
              // Swipe left to go to the next slide
              const prev = current;
              const next = current + 1;
              setSlide(prev, next);
            }
            if (touchEndX > touchStartX + 50) {
              // Swipe right to go to the previous slide
              const prev = current;
              const next = current - 1;
              setSlide(prev, next);
            }
          });
        });


        // users serach
        document.getElementById('userserach').addEventListener('input', function() {
            var input = this.value.toLowerCase();
            var listItems = document.querySelectorAll('#userList .eyetest_user_item');
            
            listItems.forEach(function(item) {
                var userName = item.querySelector('h6 span').textContent.toLowerCase();
                var userMobile = item.querySelector('.text-muted').textContent.toLowerCase();
                if (userName.includes(input) || userMobile.includes(input)) {
                    item.style.display = ''; 
                } else {
                    item.style.display = 'none'; 
                }
            });
        });

        // users serach
        document.getElementById('previlageUserserach').addEventListener('input', function() {
            var input = this.value.toLowerCase();
            var listItems = document.querySelectorAll('#previlageUserList .previlage_user_item');
            
            listItems.forEach(function(item) {
                var userName = item.querySelector('h6 span').textContent.toLowerCase();
                var userMobile = item.querySelector('.text-muted').textContent.toLowerCase();
                if (userName.includes(input) || userMobile.includes(input)) {
                    item.style.display = ''; 
                } else {
                    item.style.display = 'none'; 
                }
            });
        });

        // salesReturn serach
        document.getElementById('salesReturnserach').addEventListener('input', function() {
            var input = this.value.toLowerCase();
            var listItems = document.querySelectorAll('#salesReturnList .previlage_user_item');
            
            listItems.forEach(function(item) {
                var userName = item.querySelector('h6 span').textContent.toLowerCase();
                var userMobile = item.querySelector('.text-muted').textContent.toLowerCase();
                if (userName.includes(input) || userMobile.includes(input)) {
                    item.style.display = ''; 
                } else {
                    item.style.display = 'none'; 
                }
            });
        });

        document.getElementById('BreakageWarrantyserach').addEventListener('input', function() {
            var input = this.value.toLowerCase();
            var listItems = document.querySelectorAll('#BreakageWarrantyList .previlage_user_item');
            
            listItems.forEach(function(item) {
                var userName = item.querySelector('h6 span').textContent.toLowerCase();
                var userMobile = item.querySelector('.w_amount').textContent.toLowerCase();
                if (userName.includes(input) || userMobile.includes(input)) {
                    item.style.display = ''; 
                } else {
                    item.style.display = 'none'; 
                }
            });
        });

    </script>


    <script>
        // Function to calculate the total payable amount
        document.getElementById('cart-frame-product-price').textContent = '₹' + <?= $editdata['product_details'][0]->sales_rate; ?>.toFixed(2);

        // check exist multiple item in cart for add previlage
        function togglePrivilegeLinks() {
            let productData = JSON.parse(localStorage.getItem('productData')) || [];

            let privilegedItems = productData.filter(item => item.product_details.isPrivilegeApplied === "1");

            // Check if there are at least 2 privileged items
            if (privilegedItems.length >= 2) {

                // Show the links if there are multiple items
                document.querySelector('.btn.btn-primary.w-sm-100.justify-content-center[data-bs-target="#previlagecard"]').style.display = 'inline-block';
                document.querySelector('a.w-sm-100.justify-content-center[data-bs-target="#addprevilagecard"]').style.display = 'inline-block';
            } else {
                // Hide the links if there's only one item
                document.querySelector('.btn.btn-primary.w-sm-100.justify-content-center[data-bs-target="#previlagecard"]').style.display = 'none';
                document.querySelector('a.w-sm-100.justify-content-center[data-bs-target="#addprevilagecard"]').style.display = 'none';
            }
        }


        function openTab(evt, tabName, lensPrice, lensName, lensid) {
            // select delivery_days in checkout page
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url(); ?>/get-delivery-days', 
                data: { lensid: lensid },
                dataType: 'json',
                success: function (response) {
                    if (response.valid) {
                        const days = response.days;
                        const currentDate = new Date(); // Get today's date

                        // Calculate the new date directly by creating a fresh Date object
                        const futureDate = new Date(currentDate.getTime() + days * 24 * 60 * 60 * 1000);

                        // Format the future date for display
                        const options = { year: 'numeric', month: 'long', day: 'numeric' };
                        const formattedDate = futureDate.toLocaleDateString('en-US', options);

                        // Display the calculated date
                        $('#expected-delivery').text(`Expected delivery date: ${formattedDate}`);

                        const yyyyMmDdFormat = `${futureDate.getFullYear()}-${String(futureDate.getMonth() + 1).padStart(2, '0')}-${String(futureDate.getDate()).padStart(2, '0')}`;
                        $('#expected-delivery-date').val(yyyyMmDdFormat);

                        console.log("Formatted Expected Delivery Date:", formattedDate);
                        console.log("Expected Delivery Date (YYYY-MM-DD):", yyyyMmDdFormat);
                    } 
                },
                error: function () {
                    alert('There was an error get-delivery-days');
                }
            });

            var i, tabcontent;

            // Hide all tab contents
            tabcontent = document.getElementsByClassName("lens-tabcontent");
            const cartLensName = document.getElementById('cart-lens-name');
            const cartLensPrice = document.getElementById('cart-lens-price');

            // const checkoutLensName = document.getElementById('checkout-lens-name');
            // const checkoutLensPrice = document.getElementById('checkout-lens-price');

            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Show the selected tab
            document.getElementById(tabName).style.display = "block";

            // Get the frame price
            var framePrice = parseFloat(document.getElementById('frame-product-price').getAttribute('data-frame-price'));
            // Calculate total price
            var totalPrice = framePrice + parseFloat(lensPrice);

            // Set the total price
            document.getElementById('frame-product-price').innerHTML = `&#8377;${framePrice.toFixed(2)} + &#8377;${lensPrice} (${lensName}) = &#8377;${totalPrice.toFixed(2)}`;
            // Set the selected lens name and price in the cart
            cartLensName.textContent = lensName;
            cartLensPrice.innerHTML = '&#8377;' + lensPrice;
            document.getElementById('cart-lens-id').textContent = lensid;

            // checkoutLensName.textContent = lensName + ' :';
            // checkoutLensPrice.innerHTML = '&#8377;' + lensPrice;
        }

        // Set frame price in a data attribute for calculation
        document.getElementById('frame-product-price').setAttribute('data-frame-price', <?= $editdata['product_details'][0]->sales_rate; ?>);



        // load coating details
        function setCoatingDetails(name, price, desc, id) {
            const coatingDetails = document.getElementById('coating-details');
            const coatingName = document.getElementById('cart-coating-name');
            const coatingPrice = document.getElementById('cart-coating-price');
            const coatingDesc = document.getElementById('cart-coating-desc');

            const checkoutCoatingName = document.getElementById('checkout-coating-name');
            const checkoutCoatingPrice = document.getElementById('checkout-coating-price');


            // If a coating is selected, display the details
            if (name && price) {
                coatingName.textContent = name;
                coatingPrice.textContent = '₹' + parseFloat(price).toFixed(2);
                coatingDesc.textContent = desc;
                document.getElementById('cart-coating-id').textContent = id;
                checkoutCoatingName.textContent = name;
                checkoutCoatingPrice.textContent = '₹' + parseFloat(price).toFixed(2);
                // coatingDetails.style.display = 'block'; // Show the details section

            } else {
                // Hide the details section if no coating is selected
                coatingDetails.style.display = 'none';
            }
        }


        // Ensure no coating is selected by default
        document.querySelectorAll('input[name="coating"]').forEach((input) => {
            input.addEventListener('change', function() {
                if (!this.checked) {
                    setCoatingDetails('', '', '', '');
                }

            });
        });

    </script>

    <script>
        function saveData(){
            // Show the loader
            $('.fullscreen-loader').show();

            let productData = JSON.parse(localStorage.getItem('productData')) || [];

            if (productData.length === 0) {
                $('.fullscreen-loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'No data to save!'
                });
                return;
            }

            let customerName = $('#customer_details').find('input[name="cname"]').val();
            let mob = $('#customer_details').find('input[name="cphone"]').val();
            let Email = $('#customer_details').find('input[name="cmail"]').val();
            let salesman = $('#salesman').val();
            let salesman_name = $('#salesman option:selected').text();
            let tot_amt =  parseFloat($('#checkout-final-total').text().replace('₹', '')) || 0;
            let coupen_id = $('#couponid').val();
            let coupon_disc_percentage = $('#coupon_disc_percentage').val();
            let discount_amount = parseFloat($('#discount-amount').text().replace('₹', '')) || 0;
            let previlage_id = $('#previlage_id').val();
            let isDownload = $('#pdfdownload').prop('checked') ? 1 : 0;
            let delivered = $('#delivered').prop('checked') ? 1 : 0;
            let advance_amt = $('#advance_amt').val();
            let bal_amount = parseFloat($('#bal-amount').text().replace('₹', '')) || 0;
            let pay_mode = $('#pay_mode option:selected').text();
            let return_masterid = $('#return_masterid').val();
            let return_amt = $('#return_amt').val();
            let warranty_id = $('#warranty_id').val();
            let warranty_amt = $('#warranty_amt').val();

            // alert(isDownload);

            $.ajax({
                url: "<?php echo base_url(); ?>/save-cart-data", 
                type: "POST",
                dataType: "json",
                contentType: "application/json",
                data: JSON.stringify({
                    productData: productData ,
                    customer_name: customerName ,
                    mobile: mob,
                    email: Email,
                    salesman: salesman,
                    salesman_name: salesman_name,
                    tot_amt: tot_amt,
                    coupen_id: coupen_id,
                    discount_amount: discount_amount,
                    coupon_disc_percentage: coupon_disc_percentage,
                    previlage_id: previlage_id,
                    isDownload: isDownload,
                    delivered: delivered,
                    advance_amt: advance_amt,
                    bal_amount: bal_amount,
                    pay_mode: pay_mode,
                    return_masterid: return_masterid,
                    return_amt: return_amt,
                    warranty_id: warranty_id,
                    warranty_amt: warranty_amt

                }),
                success: function(response) {
                    // console.log(" response data : ", response);

                    $('.fullscreen-loader').hide();
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success...',
                            text: 'Added Successfully.'
                        }).then(() => {
                            // Clear cart details from localStorage
                            localStorage.removeItem('productData');

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

                             // Send WhatsApp message if phone number is available
                            if (response.MasterData && response.MasterData.length > 0) {
                                const master = response.MasterData[0];
                                if (master.phone) {
                                    const baseUrl = "<?php echo base_url(); ?>"; // Base URL for invoice link
                                    const message = `Thank you for your purchase! Your total bill amount is ${master.total_amount}. Here is your invoice link: ${baseUrl}/invoice-whatsapp/${master.master_id}`;
                                    const whatsappUrl = `https://wa.me/${master.phone}?text=${encodeURIComponent(message)}`;

                                    // Open WhatsApp link in a new tab
                                    window.open(whatsappUrl, '_blank');
                                }
                            }

                            window.location.href = "<?php echo base_url(); ?>/sales";
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
                    $('.fullscreen-loader').hide();
                    console.error("Error saving data:", error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error...',
                        text: 'An error occurred while saving data.'
                    });
                }
            });

        }

        function SetWarrantyAmount(Amount,WarrantyId) {

            if (document.getElementById('warranty')) {
                $('#BreakageWarranty').modal('hide');

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Warranty amount has already been set and cannot be updated again !'
                });
                return;
            }
            $('#BreakageWarranty').modal('hide');

            $('#warranty_id').val(WarrantyId);
            $('#warranty_amt').val(Amount);

            const warrantySectionHtml = `
            <p class="value">Breakage Warranty:</p> 
            <p class="price" id="warranty">₹${Amount}</p>`;
                
            // Add the HTML to the #warranty_section div
            document.getElementById('warranty_section').innerHTML = warrantySectionHtml;

            const totalPayable = parseFloat($('#final-total').text().replace('₹', ''));

            $('#final-total').text(`₹${(totalPayable + Amount).toFixed(2)}`);
            $('#checkout-final-total').text(`₹${(totalPayable + Amount).toFixed(2)}`);

        }

        function SetReturnAmount(ReturnAmount,SalesMasterId) {

            if (document.getElementById('return')) {
                $('#salesreturnModal').modal('hide');

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Return amount has already been set and cannot be updated again !'
                });
                return;
            }
            $('#salesreturnModal').modal('hide');

            $('#return_masterid').val(SalesMasterId);
            $('#return_amt').val(ReturnAmount);

            const returnSectionHtml = `
            <p class="value">Return:</p> 
            <p class="price" id="return">₹${ReturnAmount}</p>`;
                
            // Add the HTML to the #return_section div
            document.getElementById('return_section').innerHTML = returnSectionHtml;

            const totalPayable = parseFloat($('#final-total').text().replace('₹', ''));

            $('#final-total').text(`₹${(totalPayable - ReturnAmount).toFixed(2)}`);
            $('#checkout-final-total').text(`₹${(totalPayable - ReturnAmount).toFixed(2)}`);

        }
                        
        $('#previlage-details').hide();

        function SetPrevilage(user_id){
            $.ajax({
                url: '<?php echo base_url(); ?>/get-previlage',
                type: 'GET',
                data: { id: user_id },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const currentDate = new Date();
                        const toDate = new Date(response.data.to_date);
                        const type = response.data.type;
                        const privilege_id = response.data.id;


                        // alert(type);

                        // Reset time components for accurate date-only comparison
                        toDate.setHours(23, 59, 59, 999); // Ensure 'to_date' is end-of-day

                        // Check if the current date is within the valid range
                        if (currentDate > toDate) {
                            $('#previlagecard').modal('hide');

                            Swal.fire({
                                icon: 'error',
                                title: 'Expired User',
                                text: `User Privilege expired on ${response.data.to_date}.`
                            });
                        }else{
                            checkPurchaseCount(type,privilege_id,user_id);
                        }

                    } else {
                        console.log('Failed to load previlage details.');
                    }
                },
                error: function() {
                    console.log('An error occurred while fetching the previlage details.');
                }
            });

        }

        function checkPurchaseCount(type,privilege_id,user_id) {
            $.ajax({
                url: '<?php echo base_url(); ?>/get-previlage-types',
                type: 'GET',
                data: { id: type },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var purchase = response.data.no_of_purchase;

                        // alert(purchase);

                        $.ajax({
                            url: '<?php echo base_url(); ?>/get-total-purchase-count',
                            type: 'GET',
                            data: { id: privilege_id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    var purchase_count = response.data;

                                    // alert(purchase_count);
                                    if (purchase_count >= purchase) {
                                        $('#previlagecard').modal('hide');

                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Count Exceeded',
                                            text: `Purchase count exceeded. Only have ${purchase} purchase allowed !`
                                        });
                                    } else {
                                        PrivilegeCalculation(user_id);
                                    }

                     
                                } else {
                                    console.log('Failed to load purchase count.');
                                }
                            },
                            error: function() {
                                console.log('An error occurred while fetching the purchase details.');
                            }
                        });

         
                    } else {
                        console.log('Failed to load previlage details.');
                    }
                },
                error: function() {
                    console.log('An error occurred while fetching the previlage details.');
                }
            });
        }

        function PrivilegeCalculation(user_id){
            $.ajax({
                url: `<?php echo base_url(); ?>/get-previlage-user/${user_id}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#previlagecard').modal('hide');

                    if(data){
                        $('#previlage-details').show();
                        document.getElementById('puser_name').textContent = data.name;
                        document.getElementById('puser_mob').textContent = data.phone;
                        document.getElementById('puser_mail').textContent = data.email;
                        document.getElementById('puser_dob').textContent = data.dob;
                        $('#previlage_id').val(user_id);
            
                        // Get product data from localStorage
                        let productData = JSON.parse(localStorage.getItem('productData')) || [];

                        // Filter items with isPrivilegeApplied === 1
                        let privilegedItems = productData.filter(item => item.product_details.isPrivilegeApplied === "1");

                        // Check if there are at least 2 privileged items
                        if (privilegedItems.length >= 2) {
                            // Initialize variables to track the lowest total price and item
                            let minTotalPrice = Infinity;
                            let minTotalPriceItem = null;
                            let grandTotal = 0;

                            // Calculate total price for each privileged item and find the one with the lowest total price
                            privilegedItems.forEach(item => {
                                let productPrice = parseFloat((item.product_details.product_price || "0").replace('₹', '')) - parseFloat(item.product_details.product_discount.toString().replace('₹', ''));
                                let lensPrice = parseFloat((item.lens_details.lens_price || "0").replace('₹', '')) - parseFloat(item.lens_details.lens_discount.toString().replace('₹', ''));
                                let coatingPrice = parseFloat((item.coating_details.coating_price || "0").replace('₹', '')) - parseFloat(item.coating_details.coating_discount.toString().replace('₹', ''));
                                let totalPrice = productPrice + lensPrice + coatingPrice;

                                // Store total price for display
                                item.product_details.total_price = `₹${totalPrice.toFixed(2)}`;

                                // Add to grand total
                                grandTotal += totalPrice;

                                // Check if this is the lowest total price
                                if (totalPrice < minTotalPrice) {
                                    minTotalPrice = totalPrice;
                                    minTotalPriceItem = item;
                                }
                            });

                            // Calculate the percentage based on the lowest total price
                            let discountBase = minTotalPrice;
                            let discountPercentage = grandTotal > 0 ? (discountBase / grandTotal) * 100 : 0;

                            // Apply discounts to each privileged item based on the calculated percentage
                            privilegedItems.forEach(item => {
                                let productPrice = parseFloat((item.product_details.product_price || "0").replace('₹', '')) || 0;
                                let lensPrice = parseFloat((item.lens_details.lens_price || "0").replace('₹', '')) || 0;
                                let coatingPrice = parseFloat((item.coating_details.coating_price || "0").replace('₹', '')) || 0;

                                // Calculate and set discounts
                                item.product_details.product_discount = `₹${((productPrice * discountPercentage) / 100).toFixed(2)}`;
                                item.lens_details.lens_discount = `₹${((lensPrice * discountPercentage) / 100).toFixed(2)}`;
                                item.coating_details.coating_discount = `₹${((coatingPrice * discountPercentage) / 100).toFixed(2)}`;
                            });

                            // Set privilege discount amount for display
                            $('#previlage-discount-amount').text(`₹${discountBase.toFixed(2)}`);

                            // Save the updated product data to localStorage
                            localStorage.setItem('productData', JSON.stringify(productData));
                        } else {
                            // If less than 2 privileged items, show a message or handle as needed
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Not enough privileged items to apply discount.'
                            });
                        }


                        console.log("p storedProductData: ", productData);
                        displayCartItems();

                    }else{
                        $('#previlage-details').hide();
                    }

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching lens list:', error);
                }
            });

        }

        function RemoveCoupen() {

                const discountAmount = parseFloat($('#discount-amount').text().replace('₹', ''));
                const totalPayable = parseFloat($('#final-total').text().replace('₹', ''));

                $('#couponid').val('');
                $('#couponcode').val('');
                $('#coupon_disc_percentage').val('');
                $('#coupen-details').html('');
                $('#discount-amount').text('₹0.00');

                $('#final-total').text(`₹${(totalPayable + discountAmount).toFixed(2)}`);
                $('#checkout-final-total').text(`₹${(totalPayable + discountAmount).toFixed(2)}`)
        }

        function RemovePrevilage() {
            // Retrieve productData from localStorage
            let productData = JSON.parse(localStorage.getItem('productData')) || [];

            // Iterate over each item and set discounts to 0
            productData.forEach(item => {
                // Set discounts to 0
                item.product_details.product_discount = 0; 
                item.lens_details.lens_discount = 0; 
                item.coating_details.coating_discount = 0; 
            });

            // Save the updated productData back to localStorage
            localStorage.setItem('productData', JSON.stringify(productData));
            // console.log("remove storedProductData: ", productData);

            document.getElementById('puser_name').textContent = '';
            document.getElementById('puser_mob').textContent = '';
            document.getElementById('puser_mail').textContent = '';
            document.getElementById('puser_dob').textContent = '';
            $('#previlage-details').hide();

            const subtotal = parseFloat($('#total-pay').text().replace('₹', ''));
            const previlage_discount = 0;

            document.getElementById('before-previlage-total').innerHTML = '₹' + subtotal.toFixed(2);
            document.getElementById('previlage-discount-amount').innerHTML = '₹' + previlage_discount.toFixed(2);

            displayCartItems();
        }

        function storeCartItems(){
            // store cart details

                let productData = JSON.parse(localStorage.getItem('productData')) || [];

                // Collect data for the new item
                const productDetails = {
                    product_id: $('#product_id').val(),
                    product_name: $('#cart-frame-product-name').val(),
                    product_color:  $('#cart-frame-product-color').text().trim(),
                    product_color_code:  $('#cart-frame-product-colorCode').text().trim(),
                    product_color_name:  $('#cart-frame-product-colorName').text().trim(),
                    product_price: $('#cart-frame-product-price').val(),
                    product_discount: 0,
                    product_image: $('#cart-frame-product-image').attr('src'),
                    group_id: $('#group_id').val(),
                    isPrivilegeApplied: $('#isPrivilegeApplied').val()
                };

                const lensDetails = {
                    lens_id: $('#cart-lens-id').text().trim(),
                    lens_name: $('#cart-lens-name').text().trim(),
                    lens_price: $('#cart-lens-price').text().trim(),
                    lens_discount: 0,
                    exp_delivery: $('#expected-delivery').text().trim(),
                    exp_delivery_date: $('#expected-delivery-date').val()
                };

                const coatingDetails = {
                    coating_id: $('#cart-coating-id').text(),
                    coating_name: $('#cart-coating-name').text().trim(),
                    coating_desc: $('#cart-coating-desc').text().trim(),
                    coating_price: $('#cart-coating-price').text().trim(),
                    coating_discount: 0
                };

                // Create the new cart item object
                const newItem = {
                    product_details: productDetails,
                    medical_record: null,
                    lens_details: lensDetails,
                    coating_details: coatingDetails
                };

                // Check if an item with the same product_id and eye_id exists in productData
                const existingItemIndex = productData.findIndex(item => 
                    item.product_details.product_id === productDetails.product_id
                );

                if (existingItemIndex > -1) {
                    // Update the existing item

                    productData[existingItemIndex] = { ...productData[existingItemIndex], ...newItem };
                } else {
                    // Add the new item if it's not a duplicate
                    productData.push(newItem);
                }

                // Save the updated productData array to localStorage
                localStorage.setItem('productData', JSON.stringify(productData));
                

            console.log("storedProductData: ", productData);
            // console.log("last item: ", newItem);
        }

        // for medicalrecord edit load modal
        $('#medicalrecord').on('show.bs.modal', function(event) {

            const button = $(event.relatedTarget); // Button that triggered the modal
            const productId = button.data('product-id').toString();

            // Retrieve data from local storage
            const productData = JSON.parse(localStorage.getItem('productData')) || [];
            const selectedProduct = productData.find(item => item.product_details.product_id === productId);

            // console.log('productId: ', productId);
            // console.log('productData: ', productData);
            // console.log('selectedProduct: ', selectedProduct);

            if (selectedProduct) {
                $('#medical-product-image').attr('src', selectedProduct.product_details.product_image || '');
                $('#medical-product-name').text(selectedProduct.product_details.product_name);
                $('#medical-product-color').text(selectedProduct.product_details.product_color);
                $('#medical-product-price').text(`₹${selectedProduct.product_details.product_price}`);
            
                $('#product_id').val(selectedProduct.product_details.product_id || ''); 

                // Check if medical record exists and populate fields, otherwise set to empty
                if (selectedProduct.medical_record) {
                    $('#eyeid').val(selectedProduct.medical_record.eye_id || ''); 
                    $('#segmentheight_right').val(selectedProduct.medical_record.frame_measurement?.right?.segmentheight || '');
                    $('#segmentheight_left').val(selectedProduct.medical_record.frame_measurement?.left?.segmentheight || '');
                    $('#fittingheight_right').val(selectedProduct.medical_record.frame_measurement?.right?.fittingheight || '');
                    $('#fittingheight_left').val(selectedProduct.medical_record.frame_measurement?.left?.fittingheight || '');

                    // Make an AJAX call only if eye_id exists to fetch eye test details
                    if (selectedProduct.medical_record.eye_id) {
                        $.ajax({
                            url: "<?php echo base_url(); ?>/get-eyetest-details",
                            type: "GET",
                            data: { id: selectedProduct.medical_record.eye_id },
                            dataType: 'json',
                            success: function(response) {
                                if (response.status === 'success') {
                                    const datas = response.data;
                                    $('#userName').text(datas.CustomerName);
                                    $('#usermob').text(datas.MobileNo1);
                                    $('#regdate').text(datas.Test_date);

                                    const prescription = JSON.parse(datas.Prescription);

                                    // Reference the table
                                    const table = document.getElementById('prescriptionTable');

                                    // Set Right Eye data
                                    table.querySelector('tbody tr:nth-child(1) td:nth-child(2)').innerText = prescription.right.sph;
                                    table.querySelector('tbody tr:nth-child(2) td:nth-child(2)').innerText = prescription.right.cyl;
                                    table.querySelector('tbody tr:nth-child(3) td:nth-child(2)').innerText = prescription.right.axis;
                                    table.querySelector('tbody tr:nth-child(4) td:nth-child(2)').innerText = prescription.right.add;
                                    table.querySelector('tbody tr:nth-child(5) td:nth-child(2)').innerText = prescription.right.pd;

                                    // Set Left Eye data
                                    table.querySelector('tbody tr:nth-child(1) td:nth-child(3)').innerText = prescription.left.sph;
                                    table.querySelector('tbody tr:nth-child(2) td:nth-child(3)').innerText = prescription.left.cyl;
                                    table.querySelector('tbody tr:nth-child(3) td:nth-child(3)').innerText = prescription.left.axis;
                                    table.querySelector('tbody tr:nth-child(4) td:nth-child(3)').innerText = prescription.left.add;
                                    table.querySelector('tbody tr:nth-child(5) td:nth-child(3)').innerText = prescription.left.pd;
                                } else {
                                    console.log('Failed to load User details.');
                                }
                            },
                            error: function() {
                                console.error("Error fetching user details");
                            }
                        });
                    }
                } else {
                    // console.log('no medical.');

                    // Clear fields if no medical record exists
                    $('#eyeid').val('');
                    $('#segmentheight_right').val('');
                    $('#segmentheight_left').val('');
                    $('#fittingheight_right').val('');
                    $('#fittingheight_left').val('');

                    $('#userName').text('');
                    $('#usermob').text('');
                    $('#regdate').text('');
                    // Clear prescription table if no medical record
                    const table = document.getElementById('prescriptionTable');
                    if (table) {
                        for (let row of table.querySelectorAll('tbody tr')) {
                            row.querySelector('td:nth-child(2)').innerText = ''; // Right Eye Column
                            row.querySelector('td:nth-child(3)').innerText = ''; // Left Eye Column
                        }
                    }
                }
            } else {
                console.error('No matching product found for ID: ', productId);
            }
        });

        function updateMedicalRecord(productId) {
            let productData = JSON.parse(localStorage.getItem('productData')) || [];

            const seg_height_right = $('#segmentheight_right').val();
            const seg_height_left = $('#segmentheight_left').val();
            const fit_height_right = $('#fittingheight_right').val();
            const fit_height_left = $('#fittingheight_left').val();

            const frameMeasurement = {
                right: {
                    segmentheight: seg_height_right,
                    fittingheight: fit_height_right
                },
                left: {
                    segmentheight: seg_height_left,
                    fittingheight: fit_height_left
                }
            };

            const rightSph = $('#prescriptionTable tbody tr:nth-child(1) td:nth-child(2)').text().trim();
            const rightCyl = $('#prescriptionTable tbody tr:nth-child(2) td:nth-child(2)').text().trim();
            const rightAxis = $('#prescriptionTable tbody tr:nth-child(3) td:nth-child(2)').text().trim();
            const rightAdd = $('#prescriptionTable tbody tr:nth-child(4) td:nth-child(2)').text().trim();
            const rightPd = $('#prescriptionTable tbody tr:nth-child(5) td:nth-child(2)').text().trim();

            const leftSph = $('#prescriptionTable tbody tr:nth-child(1) td:nth-child(3)').text().trim();
            const leftCyl = $('#prescriptionTable tbody tr:nth-child(2) td:nth-child(3)').text().trim();
            const leftAxis = $('#prescriptionTable tbody tr:nth-child(3) td:nth-child(3)').text().trim();
            const leftAdd = $('#prescriptionTable tbody tr:nth-child(4) td:nth-child(3)').text().trim();
            const leftPd = $('#prescriptionTable tbody tr:nth-child(5) td:nth-child(3)').text().trim();

            const prescriptions = {
                right: {
                    sph : rightSph, cyl : rightCyl, axis : rightAxis, add : rightAdd, pd : rightPd
                },
                left: {
                    sph : leftSph, cyl : leftCyl, axis : leftAxis, add : leftAdd, pd : leftPd
                } 
            };

            const medicalRecord = {
                eye_id: $('#eyeid').val(),
                product_id: productId,
                frame_measurement: frameMeasurement,
                Prescription: prescriptions
            };

            const existingItemIndex = productData.findIndex(item => 
                item.product_details.product_id === productId
            );
            if (existingItemIndex > -1) {
                productData[existingItemIndex].medical_record = medicalRecord;
                localStorage.setItem('productData', JSON.stringify(productData));
            } else {
                console.log("Product ID not found. Please add the product first.");
            }
            console.log("updadete storedProductData: ", productData);

        }

        function confirmMedical() {
            $('#medicalrecord').modal('hide');

            // get user details on checkout page
            const eyeid = $('#eyeid').val();
            const productId = $('#product_id').val()

            $.ajax({
                url: '<?php echo base_url(); ?>/get-eyetest-user',
                type: 'GET',
                data: { id: eyeid },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        var eye = response.data;
                        $('#customer_details').find('input[name="cname"]').val(eye.CustomerName);
                        $('#customer_details').find('input[name="cphone"]').val('+91'+eye.MobileNo1);
                        $('#customer_details').find('input[name="cmail"]').val(eye.Email);
                        // for store medical record in the cart array
                        updateMedicalRecord(productId);
                        displayCartItems();
                    } else {
                        console.log('Failed to load eyetest details.');
                    }
                },
                error: function() {
                    console.log('An error occurred while fetching the size details.');
                }
            });

            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: 'Added Successfully.',
            });  
            M_showStep(2);


        }



        function displayCartItems() {
            const cartDetailSec = document.querySelector('.carts');
            const checkoutCartDetailSec = document.querySelector('.carts-checkout');

            const productData = JSON.parse(localStorage.getItem('productData')) || [];
            let grandTotal = 0;

            // Clear existing content
            cartDetailSec.innerHTML = '';
            checkoutCartDetailSec.innerHTML = '';

            const coupen_discount = parseFloat($('#discount-amount').text().replace('₹', '')) || 0;
            productData.forEach((item, index) => {

                // Parse individual item prices, removing currency symbols
                const framePrice = parseFloat((item.product_details.product_price || "0").replace('₹', '')) - parseFloat((item.product_details.product_discount || "0").replace('₹', ''));
                const lensPrice = parseFloat((item.lens_details.lens_price || "0").replace('₹', '')) - parseFloat((item.lens_details.lens_discount || "0").replace('₹', '') || "0");
                const coatingPrice = parseFloat((item.coating_details.coating_price || "0").replace('₹', '')) - parseFloat((item.coating_details.coating_discount || "0").replace('₹', '') || "0");

                // Calculate total payable for this item
                const totalPayable = framePrice + lensPrice + coatingPrice;
                grandTotal += totalPayable; // Add to grand total

                // const framePrice1 = (item.product_details.product_price || "0").replace('₹', '');
                // const lensPrice1 = (item.lens_details.lens_price || "0").replace('₹', '');
                // const coatingPrice1 = (item.coating_details.coating_price || "0").replace('₹', '');

                // // Calculate before previlage total 
                // const totalPayable1 = framePrice1 + lensPrice1 + coatingPrice1;
                // beforePrevilageTotal += totalPayable1; 

                const cartItemHTML = `
                <div class="cart-detail-sec">

                    <div class="cart-frame">
                        <div class="cart-frame-show g-3">
                            <img src="${item.product_details.product_image}" alt="" class="img-fluid mb-2">
                            <div class="cart-frame-deatils">
                                <h2 class="fw-bold fs-4 cart-frame-product-name">${item.product_details.product_name}</h2>
                                <p class="selected-color-name-cart">${item.product_details.product_color}</p>
                                <button type="button" class="btn power-btn" data-bs-toggle="modal" data-bs-target="#medicalrecord" data-product-id="${item.product_details.product_id}">Add Medical Record</button>
                            </div>
                        </div>
                        <div class="addto-cartbtn flex-wrap">
                            <p class="cart-frame-product-price">
                                ${item.product_details.product_discount !== 0 ?
                                `<span class="cut-rate text-danger">₹${item.product_details.product_price.replace('₹', '')}</span> ` : ''}
                            ₹${(parseFloat(item.product_details.product_price.replace('₹', ''))  - parseFloat(item.product_details.product_discount.toString().replace('₹', ''))).toFixed(2)}</p>
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show">
                            <div class="cart-frame-deatils cdetails">
                                <h2 class="cart-lens-name">${item.lens_details.lens_name}</h2>
                            </div>
                        </div>
                        <div class="price-sec flex-wrap">
                            ${item.lens_details.lens_price !== '' && item.lens_details.lens_discount !== '' ?
                            `<p class="cart-lens-price">

                                ${item.lens_details.lens_discount !== 0 ?
                                `<span class="cut-rate text-danger">₹${item.lens_details.lens_price.replace('₹', '')}</span>` : ''}

                            ₹${(parseFloat(item.lens_details.lens_price.replace('₹', ''))  - parseFloat(item.lens_details.lens_discount.toString().replace('₹', ''))).toFixed(2)}</p>` : '' 
                            }

                            ${
                                item.lens_details.lens_price
                                    ? `<a href="javascript:void(0);" class="btn change-btn w-sm-100" onclick="showStep(2)"><i class="icofont-edit-alt" title="Edit Lens"></i></a>`
                                    : ''
                            }
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show">
                            <div class="cart-frame-deatils cdetails">
                                <h2 class="cart-coating-name">${item.coating_details.coating_name}</h2>
                                <p class="cart-coating-desc">${item.coating_details.coating_desc}</p>
                            </div>
                        </div>
                        <div class="price-sec flex-wrap">
                        ${item.coating_details.coating_price !== '' && item.coating_details.coating_discount !== '' ?
                            `<p class="cart-coating-price">

                            ${item.coating_details.coating_discount !== 0 
                            ? `<span class="cut-rate text-danger">₹${item.coating_details.coating_price.replace('₹', '')}</span>` 
                            : ''}

                             ₹${(parseFloat(item.coating_details.coating_price.replace('₹', ''))  - parseFloat(item.coating_details.coating_discount.toString().replace('₹', ''))).toFixed(2)}</p>` : ''
                        }
                            ${
                                item.coating_details.coating_price
                                    ? `<a href="javascript:void(0);" class="btn change-btn w-sm-100" onclick="showStep(3)"><i class="icofont-edit-alt" title="Edit Coating"></i></a>`
                                    : ''
                            }
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show"></div>

                        <div class="price-sec flex-wrap">

                            <a href="javascript:void(0);" class="btn cart-btn-del w-sm-100" onclick="removeCartItem(${index})"><i class="icofont-ui-delete" title="Delete Item"></i></a>
                        </div>
                    </div>
                </div>
                `;

                // Append this cart item to the cart detail section
                cartDetailSec.innerHTML += cartItemHTML;

                const checkoutCartItemHTML = `
                <div class="cart-detail-sec">

                    <div class="cart-frame">
                        <div class="cart-frame-show g-3">
                            <img src="${item.product_details.product_image}" alt="" class="img-fluid mb-2">
                            <div class="cart-frame-deatils">
                                <h2 class="fw-bold fs-4 cart-frame-product-name">${item.product_details.product_name}</h2>
                                <p class="selected-color-name-cart">${item.product_details.product_color}</p>
                            </div>
                        </div>
                        <div class="addto-cartbtn flex-wrap">
                            <p class="cart-frame-product-price">₹${(parseFloat(item.product_details.product_price.replace('₹', ''))  - parseFloat(item.product_details.product_discount.toString().replace('₹', ''))).toFixed(2)}</p>
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show">
                            <div class="cart-frame-deatils cdetails">
                                <h2 class="cart-lens-name">${item.lens_details.lens_name}</h2>
                                <p>${item.lens_details.exp_delivery}</p>
                            </div>
                        </div>
                        <div class="price-sec flex-wrap">
                            ${item.lens_details.lens_price !== '' && item.lens_details.lens_discount !== '' ?
                            `<p class="cart-lens-price">₹${(parseFloat(item.lens_details.lens_price.replace('₹', ''))  - parseFloat(item.lens_details.lens_discount.toString().replace('₹', ''))).toFixed(2)}</p>` : '' 
                            }
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show">
                            <div class="cart-frame-deatils cdetails">
                                <h2 class="cart-coating-name">${item.coating_details.coating_name}</h2>
                                <p class="cart-coating-desc">${item.coating_details.coating_desc}</p>
                            </div>
                        </div>
                        <div class="price-sec flex-wrap">
                             ${item.coating_details.coating_price !== '' && item.coating_details.coating_discount !== '' ?
                            `<p class="cart-coating-price">₹${(parseFloat(item.coating_details.coating_price.replace('₹', ''))  - parseFloat(item.coating_details.coating_discount.toString().replace('₹', ''))).toFixed(2)}</p>` : ''
                            }
                        </div>
                    </div>
                    <div class="cart-frame">
                        <div class="cart-frame-show g-3">
                            ${item.medical_record && item.medical_record.Prescription ? `
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
                                                <td style="background-color: #77CDFF; color: #fff;">${item.medical_record.Prescription.right.sph || ''}</td>
                                                <td style="background-color: #77CDFF; color: #fff;">${item.medical_record.Prescription.left.sph || ''}</td>
                                            </tr>
                                            <tr>
                                                <th>CYL</th>
                                                <td style="background-color: #6A9AB0; color: #fff;">${item.medical_record.Prescription.right.cyl || ''}</td>
                                                <td style="background-color: #6A9AB0; color: #fff;">${item.medical_record.Prescription.left.cyl || ''}</td>
                                            </tr>
                                            <tr>
                                                <th>AXIS</th>
                                                <td style="background-color: #DA8359; color: #fff;">${item.medical_record.Prescription.right.axis || ''}</td>
                                                <td style="background-color: #DA8359; color: #fff;">${item.medical_record.Prescription.left.axis || ''}</td>
                                            </tr>
                                            <tr>
                                                <th>ADD</th>
                                                <td style="background-color: #BC7C7C; color: #fff;">${item.medical_record.Prescription.right.add || ''}</td>
                                                <td style="background-color: #BC7C7C; color: #fff;">${item.medical_record.Prescription.left.add || ''}</td>
                                            </tr>
                                            <tr>
                                                <th>PD</th>
                                                <td style="background-color: #626F47; color: #fff;">${item.medical_record.Prescription.right.pd || ''}</td>
                                                <td style="background-color: #626F47; color: #fff;">${item.medical_record.Prescription.left.pd || ''}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            ` : ''}
                        </div>
                        <div class="addto-cartbtn flex-wrap">
                            ${item.medical_record && item.medical_record.frame_measurement ? `
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
                                                    <td style="background-color: #77CDFF; color: #fff;">${item.medical_record.frame_measurement.right.segmentheight || ''}</td>
                                                    <td style="background-color: #77CDFF; color: #fff;">${item.medical_record.frame_measurement.left.segmentheight || ''}</td>
                                                </tr>
                                                <tr>
                                                    <th>Fitting Height</th>
                                                    <td style="background-color: #6A9AB0; color: #fff;">${item.medical_record.frame_measurement.right.fittingheight || ''}</td>
                                                    <td style="background-color: #6A9AB0; color: #fff;">${item.medical_record.frame_measurement.left.fittingheight || ''}</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>

                                       
                                    </div>
                                </div>
                            ` : ''}
                        </div>
                    </div>

                </div>
                `;
                // Append this cart item to the cart detail section
                checkoutCartDetailSec.innerHTML += checkoutCartItemHTML;
            });

            // Update the display with final totals
            let beforePrevilageTotal = 0;
            const previlage_discount = parseFloat($('#previlage-discount-amount').text().replace('₹', ''));
            if(previlage_discount == 0){
                beforePrevilageTotal = grandTotal;
            }else{
                beforePrevilageTotal = grandTotal+previlage_discount;
            }

            const returnBillAmount = 0;
            if (document.getElementById('return')) {
                returnBillAmount = parseFloat($('#return').text().replace('₹', ''));
            }

            finaltotal = Math.max(0, grandTotal - coupen_discount); // Ensure total doesn't go negative

            document.getElementById('before-previlage-total').innerHTML = '₹' + beforePrevilageTotal.toFixed(2);

            document.getElementById('total-pay').innerHTML = '₹' + grandTotal.toFixed(2);
            document.getElementById('final-total').innerHTML = '₹' + finaltotal.toFixed(2);
            document.getElementById('checkout-final-total').innerHTML = '₹' + finaltotal.toFixed(2);

            togglePrivilegeLinks();
            
        }

        function removeCartItem(index) {
            const productData = JSON.parse(localStorage.getItem('productData')) || [];
            
            // Remove item at the specified index
            productData.splice(index, 1);

            // Update localStorage with the modified product data
            localStorage.setItem('productData', JSON.stringify(productData));

            // Re-render the cart items and update totals
            displayCartItems();
        }


        // pagination 
        let currentStep = 1;
        const totalSteps = 5;

        function showStep(step) {
            // Hide all steps
            document.querySelectorAll('.step').forEach(function(stepDiv) {
                stepDiv.style.display = 'none';
            });
            
            // Show the current step
            const currentStepDiv = document.getElementById('step-' + step);
            if (currentStepDiv) {
                currentStepDiv.style.display = 'block';
                currentStep = step; // Update currentStep when showing a specific step
            }
            // console.log("currentStep:.",currentStep);

        }

        function removeCoatingSelectionAndProceed(){
             // Uncheck any selected radio button for coatings
            var selectedCoating = document.querySelector('input[name="coating"]:checked');
            if (selectedCoating) {

            document.getElementById('cart-coating-price').style.display = 'none';
            document.getElementById('cart-coating-name').style.display = 'none';
            document.getElementById('cart-coating-desc').style.display = 'none';
            // document.getElementById('coatingbtn').style.display = 'none';

                Swal.fire({
                    title: 'Are you sure?',
                    text: "A coating is already selected. Do you want to continue without coating?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, continue',
                    cancelButtonText: 'No, keep coating'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.querySelector('#cart-coating-price').innerHTML=0;
                        // If the user confirms, uncheck the selected coating
                        selectedCoating.checked = false;
                        // setCoatingDetails('', '', '', '');

                        // Call displayCartItems function to populate the cart details
                        storeCartItems();
                        displayCartItems();
                        // Move to the next step
                        nextStep();
                    }
                });
            } else {
                // Call displayCartItems function to populate the cart details
                storeCartItems();
                displayCartItems();
                // No coating selected, directly move to the next step
                nextStep();
            }
        }

        function Addlenscoating(){
            var selectedCoating = document.querySelector('input[name="coating"]:checked');
            document.getElementById('cart-coating-price').style.display = 'block';
            document.getElementById('cart-coating-name').style.display = 'block';
            document.getElementById('cart-coating-desc').style.display = 'block';
            // document.getElementById('coatingbtn').style.display = 'unset';

            if (!selectedCoating) {
                Swal.fire({
                    icon: 'warning',
                    title: 'No Coating Selected',
                    text: 'Please select a coating option to add coating.',
                });
                return false; 
            }
            // Call displayCartItems function to populate the cart details
            storeCartItems();
            displayCartItems();
            // Now call nextStep() to move forward
            nextStep();
        }



        function nextStep() {
          
            // Increment step and ensure it does not exceed total steps
            if (currentStep < totalSteps) {
                currentStep++;
                showStep(currentStep);
            } else {
                // Optional: Show a message or reset to the first step
                console.log("You have reached the last step.");
            }
        }

        function prevStep() {
            // Decrement step and ensure it does not go below 1
            if (currentStep > 1) {
                currentStep--;
                showStep(currentStep);
            };
        }

        // Initial display of the first step
        showStep(currentStep);


        function Withoutpower(){
            storeCartItems();
            displayCartItems();

            showStep(4); // go to directly the cart page
        }



        function showLensList(lensId) {
            nextStep();
            // Show the lens list tab container
            document.querySelector('.lens-list-tab').style.display = 'block';

            // Make an AJAX request to fetch the filtered lens list
            $.ajax({
                url: `<?php echo base_url(); ?>/get-lenses/${lensId}`,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
 
                    const lensListTab = document.querySelector('.lens-list-tab');
                    lensListTab.innerHTML = '';

                    if (data.length === 0) {
                        lensListTab.innerHTML = '<p class="text-center mt-2" style="color: #f00; font-weight: 600;">No lenses available !</p>';
                    } else {
                        data.forEach((lens, index) => {
                            const lensItem = document.createElement('div');
                            lensItem.classList.add('lens-item');
                            
                            lensItem.innerHTML = `
                                <label class="tab-label">
                                    <input type="radio" name="tab" onclick="openTab(event, 'tab${index + 1}', ${lens.salesRate}, '${lens.lensName}', ${lens.lensId})">
                                    ${lens.lensName}
                                </label>
                                <span class="lens-price">&#8377; <b>${lens.salesRate}</b></span>
                            `;
                            
                            lensListTab.appendChild(lensItem);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching lens list:', error);
                }
            });
        }




        // Medical record pagination 
        let mcurrentStep = 1;

        function M_showStep(step) {
            // Hide all steps
            document.querySelectorAll('.medical_step').forEach(function(stepDiv) {
                stepDiv.style.display = 'none';
            });
            
            // Show the current step
            document.getElementById('medical_step-' + step).style.display = 'block';
        }

        function M_nextStep(id) {
            mcurrentStep++;
            document.getElementById('eyeid').value = id;

            $.ajax({
                url: "<?php echo base_url(); ?>/get-eyetest-details",
                type: "GET",
                data: {id: id},
                dataType: 'json',
                success: function(response) {

                    if (response.status === 'success') {
                        
                        var datas = response.data;
                        document.getElementById('userName').innerText = datas.CustomerName;
                        document.getElementById('usermob').innerText = datas.MobileNo1;
                        document.getElementById('regdate').innerText = datas.Test_date;
        
                        var prescription = JSON.parse(datas.Prescription);

                        // Reference the table
                        var table = document.getElementById('prescriptionTable');

                        // Set Right Eye data
                        table.querySelector('tbody tr:nth-child(1) td:nth-child(2)').innerText = prescription.right.sph;
                        table.querySelector('tbody tr:nth-child(2) td:nth-child(2)').innerText = prescription.right.cyl;
                        table.querySelector('tbody tr:nth-child(3) td:nth-child(2)').innerText = prescription.right.axis;
                        table.querySelector('tbody tr:nth-child(4) td:nth-child(2)').innerText = prescription.right.add;
                        table.querySelector('tbody tr:nth-child(5) td:nth-child(2)').innerText = prescription.right.pd;

                        // Set Left Eye data
                        table.querySelector('tbody tr:nth-child(1) td:nth-child(3)').innerText = prescription.left.sph;
                        table.querySelector('tbody tr:nth-child(2) td:nth-child(3)').innerText = prescription.left.cyl;
                        table.querySelector('tbody tr:nth-child(3) td:nth-child(3)').innerText = prescription.left.axis;
                        table.querySelector('tbody tr:nth-child(4) td:nth-child(3)').innerText = prescription.left.add;
                        table.querySelector('tbody tr:nth-child(5) td:nth-child(3)').innerText = prescription.left.pd;


                    } else {
                        console.log('Failed to load User details.');
                    }

                    // Show the next step after updating details
                    M_showStep(mcurrentStep);
                },
                error: function() {
                    console.error("Error fetching user details");
                }
            });
            M_showStep(mcurrentStep);
        }
        function M_prevStep() {
            mcurrentStep--;
            M_showStep(mcurrentStep);
        }
        // Initial display of the first step
        M_showStep(mcurrentStep);



        // calculate balance amt
        function getFinalTotal() {
            const totalText = document.getElementById('checkout-final-total').innerHTML;
            return parseFloat(totalText.replace('₹', '').replace(',', '').trim()) || 0;
        }

        // Function to update the balance amount
        function updateBalanceAmount() {
            const finalTotal = getFinalTotal(); // Retrieve the total each time in case it changes
            const advanceAmount = parseFloat(document.getElementById('advance_amt').value) || 0;
            const balanceAmount = finalTotal - advanceAmount;
            
            document.getElementById('bal-amount').innerHTML = '₹' + balanceAmount.toFixed(2);
        }
        document.getElementById('advance_amt').addEventListener('input', updateBalanceAmount);

        // Initialize balance amount on page load if necessary
        updateBalanceAmount();

    </script>