<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>
    <meta charset="utf-8" />
    <title>User Registration | CAVZ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
    <!-- Layout config Js -->
    <script src="<?php echo base_url() ?>assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="<?php echo base_url() ?>assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="auth-page-wrapper pt-5 login">
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo guest-reg">
                                    <img src="" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center guest-reg-wrap">
                    <div class="col-md-8 col-lg-8 col-xl-8">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                </div>
                                <div class="p-2 mt-4">
                                    <form class="needs-validation" action="#">
                                        <h5 class="reg-heading">User Details</h5>
                                        <div class="firm-details-wrap">
                                            <div class="mb-3">
                                                <label for="useremail" class="form-label">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Full Name
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Email<span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                                                <div class="invalid-feedback">
                                                    Please Enter Email
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Password <span class="text-danger">*</span></label>
                                                        <input type="password" class="form-control" id="password" placeholder="Enter Password" required>
                                                        <div class="invalid-feedback">
                                                            Please Enter Password
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button class="btn btn-success w-100 yellow-prim" onclick="register()" type="button">Sign Up</button>
                                        </div>
                                        <span style="color:red" id="errorspan"></span>
                                        <span style="color:red" id="invalid_email"></span>
                                        <span style="color:red" id="errorpassword"></span>

                                    </form>

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0" style="color: white;">Already have an account ? <a href="<?php echo base_url() ?>Login" class="fw-semibold text-primary text-decoration-underline" style="color: #f5a623!important;"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/node-waves/waves.min.js"></script>
    <script src="<?php echo base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins.js"></script>
    <!-- particles js -->
    <script src="<?php echo base_url() ?>assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="<?php echo base_url() ?>assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/password-addon.init.js"></script>
</body>

</html>
<script>
    function register() {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        if (name != "" && email != "" && password != "") {
            $("#errorspan").text("");
            if (IsEmail(email) == false) {
                $('#invalid_email').text("Invalid Emailid");
            } else {
                $('#invalid_email').text("");
                if (password.length > 8) {
                    $.ajax({
                        method: "post",
                        url: '<?php echo base_url() ?>Register/register',
                        data: {
                            name: name,
                            email: email,
                            password:password
                        },
                        beforeSend: function() {},
                        dataType: "json",
                        success: function(d) {
                            if (d == "1") {
                     window.location.href = "<?php echo base_url() ?>Dashboard";

                  } 

                        },
                    });
                    $("#errorpassword").text("");
                } else {
                    $("#errorpassword").text("Password Length Should be 8 Charecter");
                }
            }
        } else {
            $("#errorspan").text("Please Fill All Fields");

        }
    }

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            return false;
        } else {
            return true;
        }
    }
</script>