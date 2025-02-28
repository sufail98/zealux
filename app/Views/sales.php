<?php include'user_header.php'; ?>
   
<div class="body d-flex py-3" id="topsec">
    <div class="container-xxl">

        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0"><span><a href="javascript:history.back()"><i class="icofont-block-left fs-3" title="Back"></i></a></span> Product List </h3>
                    <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase" id="show-all-btn">Show all Products</button>
                </div>
            </div>
        </div> <!-- Row end  -->


        <div class="row g-3 mb-3">
            <!-- <div class="col-md-12 col-lg-4 col-xl-4 col-xxl-3">
                <div class="sticky-lg-top">
                    <div class="card mb-3">
                        <div class="reset-block">
                            <div class="filter-title">
                                <h4 class="title">Filter</h4>
                            </div>
                            <div class="filter-btn">
                                <a class="btn btn-primary" href="#">Reset</a>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="categories">
                            <div class="filter-title">
                                <a class="title" data-bs-toggle="collapse" href="#groups" role="button" aria-expanded="true">Groups</a>
                            </div>
                            <div class="collapse show" id="groups" >
                                
                                <?php foreach ($groups as $groups){ ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="group" value="<?= $groups->id; ?>" id="sizechek<?= $groups->id; ?>">
                                    <label class="form-check-label" for="sizechek<?= $groups->id; ?>">
                                    <?= $groups->group_name; ?>
                                    </label>
                                </div>
                                <?php } ?>
                                   
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="categories">
                            <div class="filter-title">
                                <a class="title" data-bs-toggle="collapse" href="#model" role="button" aria-expanded="true">Model</a>
                            </div>
                            <div class="collapse show" id="model" >

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="model" value="Full Frame" id="model-1">
                                    <label class="form-check-label" for="model-1">
                                    Full Frame
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="model" value="Half Frame" id="model-2">
                                    <label class="form-check-label" for="model-2">
                                    Half Frame
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="model" value="Rimless" id="model-3">
                                    <label class="form-check-label" for="model-3">
                                    Rimless
                                    </label>
                                </div>
                                   
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="size-block">
                            <div class="filter-title">
                                <a class="title" data-bs-toggle="collapse" href="#size" role="button" aria-expanded="true">Select Size</a>
                            </div>
                            <div class="collapse show" id="size" >
                                <div class="filter-size" id="filter-size-1">
                                    <ul>
                                        <li>XS</li>
                                        <li>S</li>
                                        <li class="">M</li>
                                        <li>L</li>
                                        <li>XL</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="price-range-block">
                            <div class="filter-title">
                                <a class="title" data-bs-toggle="collapse" href="#pricingTwo" role="button" aria-expanded="false">Pricing Range</a>
                            </div>
                            <div class="collapse show" id="pricingTwo">
                                <div class="price-range">
                                    <div class="price-amount flex-wrap">
                                        <div class="amount-input mt-1">
                                            <label class="fw-bold">Minimum Price</label>
                                            <input type="number" id="minAmount2" class="form-control">
                                        </div>
                                        <div class="amount-input mt-1">
                                            <label class="fw-bold">Maximum Price</label>
                                            <input type="number" id="maxAmount2" class="form-control">
                                        </div>                                    
                                    </div>
                                    <div id="slider-range2" class="slider-range noUi-target noUi-ltr noUi-horizontal noUi-txt-dir-ltr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                <div class="row g-3 mb-3 row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-lg-4 row-cols-xl-4 row-cols-xxl-4" id="product-list">
                    
                </div>
                <!-- <div class="row g-3 mb-3">
                    <div class="col-md-12">
                        <nav class="justify-content-end d-flex">
                            <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item " aria-current="page">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                            </ul>
                        </nav>
                    </div>
                </div> -->
            </div>
        </div> <!-- Row end  -->


    </div>
</div>    

 <!-- Jquery Core Js -->      
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>

    <script src="<?php echo base_url(); ?>/assets/js/template.js"></script>

    <script>
        var stepsSlider2 = document.getElementById('slider-range2');
            var input3 = document.getElementById('minAmount2');
            var input4 = document.getElementById('maxAmount2');
            var inputs2 = [input3, input4];
            noUiSlider.create(stepsSlider2, {
                start: [149, 399],
                connect: true,
                step: 1,
                range: {
                    'min': [0],
                    'max': 2000
                },

            });

            stepsSlider2.noUiSlider.on('update', function (values, handle) {
                inputs2[handle].value = values[handle];
            });
    </script>

    <script>

        const productList = document.getElementById('product-list');
        const searchInput = document.getElementById('product_search');
        const searchButton = document.getElementById('addon-wrapping');
        const showAllButton = document.getElementById('show-all-btn');
        let offset = 0;
        const limit = 20;

        function searchProducts(query) {
            productList.innerHTML = ''; // Clear the product list

            offset = 0; // Reset offset for a new search

            fetch(`<?= base_url('get-sales-data-by-barcode'); ?>?query=${query}&limit=${limit}&offset=${offset}`)
                .then(response => response.json())
                .then(data => {
                    if (data.products.length > 0) {
                        renderProducts(data.products, data.product_images);
                        // console.log(data);
                        offset += limit; // Update offset for potential pagination
                    } 
                })
                .catch(error => console.error('Error searching products:', error));
        }

        function fetchAllProducts() {
            productList.innerHTML = ''; // Clear the product list

            fetch(`<?= base_url('get-all-products'); ?>`) // No query, limit, or offset
                .then(response => response.json())
                .then(data => {
                    // console.log(data.products);
                    if (data.products.length > 0) {
                        renderProducts(data.products, data.product_images);
                    }
                })
                .catch(error => console.error('Error fetching all products:', error));
        }

        function renderProducts(products, productImages) {
            products.forEach(product => {
                const productId = product.pid;
                // Parse the colorImage string into an actual array
                // Safely access productImages[productId]
                const colorImages = productImages[productId]
                    ? productImages[productId].map(image => {
                        try {
                            return JSON.parse(image); // Safely parse JSON
                        } catch (e) {
                            console.error('Error parsing product image:', image, e);
                            return null; // Return null if parsing fails
                        }
                    }).filter(image => image) // Remove null entries
                    : [];
                const noImgUrl = '<?= base_url("images/no-img.jpg"); ?>';
                // Default to no-image path if no valid images exist
                const imagePath = (colorImages.length > 0 && colorImages[0][0])
                    ? '<?= base_url("images/product"); ?>/' + colorImages[0][0] 
                    : noImgUrl;

                const productHTML = `
                    <div class="col">
                        <div class="card" onclick="window.location.href='<?= base_url(); ?>/get-product-details/${productId}';">
                            <div class="product">
                                <div class="product-image">
                                    <div class="product-item active">
                                        <img src="${imagePath}" alt="" class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="product-content p-3">
                                    <span class="rating mb-2 d-block">${product.barcode}</span>
                                    <a href="<?= base_url(); ?>/get-product-details/${productId}" class="fw-bold">${product.productName}</a>
                                    <p class="text-muted m-0">${product.brand}</p>
                                   
                                    ${product.stock_count > 1 ? 
                                        `<span class="badge bg-success">In stock</span>` : 
                                        (product.stock_count == 1 ? 
                                            `<span class="badge bg-warning">Only 1 left in stock</span>` : 
                                            `<span class="badge bg-danger">Out of stock</span>`
                                        )
                                    }

                                    <span class="d-block fw-bold fs-5 text-secondary">&#8377; ${product.sales_rate}</span>
                                    <a href="<?= base_url(); ?>/get-product-details/${productId}" class="btn btn-primary mt-3">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                productList.insertAdjacentHTML('beforeend', productHTML);
            });
        }



        // Trigger search on input
        searchInput.addEventListener('input', () => {
            const query = searchInput.value.trim();
            if (query) {
                searchProducts(query);
            } else {
                productList.innerHTML = ''; // Clear results if input is empty
            }
        });

        // Trigger search on button click (addon-wrapping)
        searchButton.addEventListener('click', () => {
            const query = searchInput.value.trim();
            if (query) {
                searchProducts(query);
            }
        });

        showAllButton.addEventListener('click', () => {
            fetchAllProducts(); // Fetch all products without query, limit, or offset
        });


        // product serach
        // function searchProducts() {
        //     const input = document.getElementById('product_search').value.toLowerCase();
        //     const listItems = document.querySelectorAll('#products');

        //     listItems.forEach(function(item) {
        //         const barcode = item.querySelector('.rating').textContent.toLowerCase();
        //         if (barcode.includes(input)) {
        //             item.style.display = ''; 
        //         } else {
        //             item.style.display = 'none'; 
        //         }
        //     });
        // }

        // // Event listeners for search
        // document.getElementById('product_search').addEventListener('input', searchProducts);
        // document.getElementById('addon-wrapping').addEventListener('click', searchProducts);

    </script>

