<?php if(isset($_SERVER['HTTPS'])){
    $protocol='https://';
}
else{
    $protocol='http://';
}
$api_url=$protocol.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).''; 
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ZEALUX </title>
    <link rel="icon" href="../favicon.ico" type="image/x-icon"> <!-- Favicon-->

    <!-- project css file  -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/style.min.css">
    <!-- Include SweetAlert CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.1/dist/sweetalert2.all.min.js"></script>
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- main body area -->
        <div class="main p-2 py-3 p-xl-5 ">
            
            <!-- Body: Body -->
            <div class="body d-flex p-0 p-xl-5">
                <div class="container-xxl">

                    <div class="row g-0">
                        <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center rounded-lg auth-h100">
                            <div style="max-width: 25rem;">
                                <div class="text-center mb-5">
                                    <i class="bi bi-bag-check-fill  text-primary" style="font-size: 90px;"></i>
                                </div>
                                <div class="mb-5">
                                    <h2 class="color-900 text-center">ZEALUX</h2>
                                </div>
                                <!-- Image block -->
                                <div class="">
                                    <img src="<?php echo base_url(); ?>/assets/images/login-img.svg" alt="login-img">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex justify-content-center align-items-center border-0 rounded-lg auth-h100">
                            <div class="w-100 p-3 p-md-5 card border-0 shadow-sm" style="max-width: 32rem;">
                                <!-- Form -->
                                <form class="row g-1 p-3 p-md-4" method="post" action="<?php echo base_url();?>/login">
                                    <div class="col-12 text-center mb-5">
                                        <h1>Sign in</h1>
                                        <!-- <span>Free access to our dashboard.</span> -->
                                    </div>
                                   <!--  <div class="col-12 text-center mb-4">
                                        <a class="btn btn-lg btn-light btn-block" href="#">
                                            <span class="d-flex justify-content-center align-items-center">
                                                <img class="avatar xs me-2" src="<?php echo base_url(); ?>/assets/images/google.svg" alt="Image Description">
                                                Sign in with Google
                                            </span>
                                        </a>
                                        <span class="dividers text-muted mt-4">OR</span>
                                    </div> -->
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control form-control-lg" name="uname" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-2">
                                            <div class="form-label">
                                                <span class="d-flex justify-content-between align-items-center">
                                                    Password
                                                    <!-- <a class="text-secondary" href="auth-password-reset.html">Forgot Password?</a> -->
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="***************">
                                        </div>
                                    </div>
                                    <!-- <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                    </div> -->
                                    <div class="col-12 text-center mt-4">
                                        
                                        <button type="submit" name="submit" class="btn btn-lg btn-block btn-light lift text-uppercase">SIGN IN</button>
                                    </div>
                                    <!-- <div class="col-12 text-center mt-4">
                                        <span>Don't have an account yet? <a href="auth-signup.html" class="text-secondary">Sign up here</a></span>
                                    </div> -->
                                </form>
                                <!-- End Form -->
                                
                            </div>
                        </div>
                    </div> <!-- End Row -->
                    
                </div>
            </div>

        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url(); ?>/assets/bundles/libscripts.bundle.js"></script>
</body>

<?php if (session()->getFlashdata('alert')): ?>
        <script>
             const [type, title, message] = "<?php echo session()->getFlashdata('alert'); ?>".split('|');
            Swal.fire({
                icon: type,
                title: title,
                text: message,
            }).then((result) => {
                // Redirect after the alert is closed
                if (result.isConfirmed || result.isDismissed) {
                    window.location.href = "<?php echo base_url('/'); ?>"; // Replace with your desired URL
                }
            });
        </script>
    <?php endif; ?>
</html>