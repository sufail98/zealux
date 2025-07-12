<?php include'user_header.php'; ?>

<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Check List</h3>
                </div>
                    
            </div>
        </div> <!-- Row end  -->
        
        <div class="row g-3 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
            <?php foreach($types as $types){ ?>
            <div class="col">
                <div class="alert-success alert mb-0 type-card" data-type="<?= $types->type; ?>" style="cursor: pointer;">
                    <div class="d-flex align-items-center">
                        <div class="flex-fill text-truncate">
                            <div class="h6 mb-0 text-center"><?= $types->type; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div> 

        <div class="row mt-5 question-section" style="display: none;">
            <form id="question-form" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>/insert-checklist"> 
                <div class="col-md-12" id="question-container">
                    <!-- Questions will load here -->
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
document.addEventListener("DOMContentLoaded", function () {
    const cards = document.querySelectorAll(".type-card");
    const questionSection = document.querySelector(".question-section");
    const questionContainer = document.getElementById("question-container");

    cards.forEach(card => {
        card.addEventListener("click", function () {
            cards.forEach(c => {
                c.classList.remove("active");
                c.closest(".col").style.display = "none"; // hide all
            });

            card.classList.add("active");
            card.closest(".col").style.display = "block";

            const qtype = card.getAttribute("data-type");

            $.ajax({
                url: '<?php echo base_url(); ?>/get-checklist-questions',
                type: 'GET',
                data: { qtype: qtype },
                dataType: 'json',
                success: function(response) {

                    const alreadySubmitted = response.exist?.type;
                    if (alreadySubmitted && alreadySubmitted === qtype) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Already Submitted',
                            text: `You have already submitted a checklist for "${qtype}".`,
                        });

                        questionSection.style.display = "none";
                        return;
                    }
                    
                    if (response.status === 'success' && Array.isArray(response.data) && response.data.length > 0) {
                        var datas = response.data;
                        questionSection.style.display = "block";
                        questionContainer.innerHTML = "";
                        // console.log('response: ',datas)

                            datas.forEach((q, index) => {
                                const html = `
                                    <div class="mb-3">
                                        <p><strong>${index + 1}. ${q.question}</strong></p>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="qyesno_${q.id}" value="Yes">
                                            <label class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="qyesno_${q.id}" value="No">
                                            <label class="form-check-label">No</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control mt-2" name="desc_${q.id}" rows="2" placeholder="Comments..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <input class="form-control" type="file" name="qfile_${q.id}" accept="image/*" >
                                    </div>
                                `;
                                questionContainer.innerHTML += html;
                            });
                    } else {
                        questionSection.style.display = "block";
                        questionContainer.innerHTML = "<p>No questions found for this type.</p>";
                    }

                },
                error: function() {
                    console.log('An error occurred while fetching the checklist-questions.');
                }
            });

            
        });
    });
});
</script>

