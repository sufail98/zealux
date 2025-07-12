<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<?php include'header.php'; ?>

    <div class="container">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Reviews</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3">
            <div class="col-12">

              <div class="card">
                <div class="card-body">
                  <div class="questions ">
                      <?php foreach ($editdata as $index => $editdata) { ?>
                        <p><?= $editdata->order_to_display; ?>. <?= $editdata->question; ?></p>
                        <input type="text" name="qid[]" value="<?= $editdata->qid; ?>" hidden>

                        <?php if($editdata->rating_type == 'Star'){?>
                        <div class="rating-options">
                          <?php for ($i = 1; $i <= 5; $i++) {
                          $inputId = "rating-{$index}-{$i}";
                          ?>
                          <input type="radio" name="rating[<?= $editdata->qid; ?>]" class="visually-hiddens" id="<?= $inputId ?>" value="<?= $i ?>" <?= ($editdata->star_rating == $i) ? 'checked' : '' ?>>
                          <label for="<?= $inputId ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 48 48" width="48" height="48">
                              <title><?= $i ?></title>
                              <path d="M24 34.54 36.36 42l-3.27-14.06L44 18.49l-14.38-1.24L24 4l-5.62 13.25L4 18.49l10.91 9.45L11.64 42z"></path>
                            </svg>
                          </label>
                        <?php } ?>

                        </div>
                      <?php }else{ ?>

                        <textarea name="rating_desc[<?= $editdata->qid; ?>]" rows="3" class="form-control"><?= $editdata->text_rating; ?></textarea>
                      <?php } ?>
                      <?php } ?>

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