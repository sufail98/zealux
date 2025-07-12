<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ZEALUX </title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Include SweetAlert CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row g-3">
            <div class="col-12">

              <div class="card print_invoice">
                <div class="card-body">
                  <div class="card p-3">
                    <div style="clear:both"></div>
                    <div class="customer">

                    <h3 class="fw-bold mb-0">Customer Review</h3>

                    </div>
                    <div style="clear:both"></div>
                    
                  </div>
                </div>
              </div>

              <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <div class="card">
                        
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="review">
                                <div class="card-body">
                                    <div class="row clearfix g-3">
                                        <!-- <div class="col-lg-4 col-md-12">
                                            <div class="feedback-info sticky-top">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class=" display-6 fw-bold mb-0">4.5</h2>
                                                        <small class="text-muted">based on 1,032 ratings</small>
                                                        <div class="d-flex align-items-center">
                                                            <span class="mb-2 me-3">
                                                                <a href="#" class="rating-link active"><i class="fa fa-star text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="fa fa-star text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="fa fa-star text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="fa fa-star text-warning"></i></a>
                                                                <a href="#" class="rating-link active"><i class="fa fa-star-half-o text-warning"></i></a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="col-lg-8 col-md-12">
                                            <ul class="list-unstyled mb-4">
                                                <li class="card mb-2">
                                                    <div class="card-body p-lg-4 p-3">
                                                        <div class="d-flex mb-3 pb-3 border-bottom flex-wrap">
                                                            
                                                            <div class="flex-fill text-truncate">
                                                                <h4 class="mb-0"><span>Bill No: <?= $salesdata[0]->invoice_no; ?></span></h4>
                                                                <span class="text-muted">Date: <?= date('d M Y', strtotime($salesdata[0]->invoice_date)); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="timeline-item-post">
                                                            <h6 class="">Name: <?= $salesdata[0]->customer_name; ?></h6>
                                                            <p> Phone: <?= $salesdata[0]->phone; ?></p>
                                                        </div>
                                                    </div>
                                                </li> <!-- .Card End -->
                                        
                                            </ul>
                   
                                        </div>
                                    </div><!-- Row End -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


              <div class="card mt-2">
                <div class="card-body">
                    <?php if($checkexist == '') {?>
                  <form method="post" action="<?php echo base_url(); ?>/save-review">
                    <input type="text" name="billno" value="<?= $salesdata[0]->invoice_no; ?>" hidden>
                    <input type="text" name="salesmaster_id" value="<?= $salesdata[0]->master_id; ?>" hidden>
                    <input type="text" name="salesman_id" value="<?= $salesdata[0]->salesman_id; ?>" hidden>

                  <h3 class="fw-bold mb-0"> Write a review</h3>

                  <div class="questions mt-5">
                      <?php foreach ($questions as $index => $questions) { ?>
                        <p><?= $questions->order_to_display; ?>. <?= $questions->question; ?></p>
                        <input type="text" name="qid[]" value="<?= $questions->qid; ?>" hidden>

                        <?php if($questions->rating_type == 'Star'){?>
                        <div class="rating-options">
                          <?php for ($i = 1; $i <= 5; $i++) {
                          $inputId = "rating-{$index}-{$i}";
                          ?>
                          <input type="radio" name="rating[<?= $questions->qid; ?>]" class="visually-hiddens" id="<?= $inputId ?>" value="<?= $i ?>">
                          <label for="<?= $inputId ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 48 48" width="48" height="48">
                              <title><?= $i ?></title>
                              <path d="M24 34.54 36.36 42l-3.27-14.06L44 18.49l-14.38-1.24L24 4l-5.62 13.25L4 18.49l10.91 9.45L11.64 42z"></path>
                            </svg>
                          </label>
                        <?php } ?>

                        </div>
                      <?php }else{ ?>

                        <textarea name="rating_desc[<?= $questions->qid; ?>]" rows="3" class="form-control"></textarea>
                      <?php } ?>
                      <?php } ?>

                    </div>
            
                    <div class="col-12 text-center text-md-end">
                      <button type="submit" class="btn btn-lg btn-primary" >Save</button>
                    </div>
                  </form>
              <?php }else{
                echo ' <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Thanks..</strong> Review submitted successfully for this bill.
                    </div>';
              } ?>
                </div>
              </div>
            </div>
        </div>
    </div>

</body>

</html> 

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