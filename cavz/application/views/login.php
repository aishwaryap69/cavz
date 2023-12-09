<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
   <meta charset="utf-8" />
   <title>Sign In | CAVZ</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="" name="description" />
   <meta content="" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="assets/images/favicon.ico">
   <!-- Layout config Js -->
   <script src="assets/js/layout.js"></script>
   <!-- Bootstrap Css -->
   <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
   <!-- custom Css-->
   <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
   <div class="auth-page-wrapper pt-5 login">
      <div class="auth-page-content">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="text-white-50">
                     <div>
                        <a href="" class="d-inline-block auth-logo">
                           <img src="assets/images/logo-1.png" alt="" style="height: 85px;background-color: aliceblue;">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end row -->
            <div class="row login-wrap">
               <div class="col-md-7 col-lg-8">
                  <div class="mt-2">
                     <h2 class="login-title">
                        Welcome Back!</h2>
                     <p class="login-text">Login to continue </p>
                  </div>
               </div>

               <div class=" col-md-5 col-lg-4">
                  <div class="card mt-4">
                     <div class="card-body p-4">
                        <div class="p-2 mt-4">
                           <form novalidate="novalidate" action="<?php echo base_url() ?>Dashboard" method="post">
                              <div class="mb-3">
                                 <label for="username" class="form-label">User Name</label>
                                 <input type="text" class="form-control" name="uname" id="uname" placeholder="Enter username">
                              </div>
                              <div class="mb-3">
                                 <label class="form-label" for="password-input">Password</label>
                                 <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" name="paswd" id="paswd">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                 </div>
                              </div>
                              <div class="mt-5">
                                 <button type="button" onclick="userlogin()" class="btn btn-success w-100 yellow-prim">Login</button>
                              </div>
                             
                           </form>
                        </div>
                     </div>
                     <div class="mt-2 text-center">
                            <p class="mb-1" style="color: white;">Create account ? <a href="<?php echo base_url()?>Register" class="fw-semibold text-primary text-decoration-underline" style="color: #f5a623!important;"> Signup </a> </p>
                        </div>
                     <!-- end card body -->
                  </div>
                  <!-- end card -->
                  <!--  <div class="mt-4 text-center">
                        <p class="mb-0">Don't have an account ? <a href="auth-signup-basic.html" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
                        </div> -->
               </div>

            </div>
            <!-- end row -->

            <div class="login-bottom text-center">
               <p>Powered by <a href=""> CAVZ</a></p>
               <div class="terms-policy">
                  <p><a href="">Terms and Conditions |</a></p>
                  <p><a href="">Privacy Policy</a></p>
               </div>
            </div>

         </div>
         <!-- end container -->
      </div>
   </div>
   <!-- JAVASCRIPT -->
   <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets/libs/simplebar/simplebar.min.js"></script>
   <script src="assets/libs/node-waves/waves.min.js"></script>
   <script src="assets/libs/feather-icons/feather.min.js"></script>
   <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
   <script src="assets/js/plugins.js"></script>
   <script src="assets/libs/particles.js/particles.js"></script>
   <script src="assets/js/pages/particles.app.js"></script>
   <script src="assets/js/pages/password-addon.init.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript">
      function userlogin() {
         var uname = $("#uname").val();
         var paswd = $("#paswd").val();
         if (uname != "" && paswd != "") {
            $.ajax({
               method: "post",
               url: '<?php echo base_url() ?>Login/login_admin',
               data: {
                  uname: uname,
                  paswd: paswd
               },
               beforeSend: function() {},
               dataType: "json",
               success: function(d) {
                  if (d == "0") {
                     window.location.href = "<?php echo base_url() ?>Dashboard";

                  } else if (d == "00") {
                     alert("Invalid Username Or Password");

                  } else if (d == "11") {

                     alert("You can't login! please contact your admin");

                  } else {
                     window.location.href = "<?php echo base_url() ?>Dashboard";
                  }

               },
            });
         } else {
            alert("Username And Password Are Required");
         }
      }
   </script>
</body>

</html>