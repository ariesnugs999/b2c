<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sign In</title>
  <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="<?= $assets ?>css/nucleo-icons.css" rel="stylesheet">
  <link href="<?= $assets ?>assets/css/nucleo-svg.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> -->
  <link href="<?= $assets ?>css/nucleo-svg.css" rel="stylesheet">
  <!-- CSS Files -->
  <!-- <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" /> -->
  <link id="pagestyle" href="<?= $assets ?>css/argon-dashboard.css?v=2.0.4" rel="stylesheet">
</head>

<body>

  <!-- <div class="container">
       <div class="col-md-4 col-md-offset-4">
         <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
           <h2 class="form-signin-heading">Please sign in</h2>
           <?php echo $this->session->flashdata('msg');?>
           <label for="username" class="sr-only">Username</label>
           <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
           <label for="password" class="sr-only">Password</label>
           <input type="password" name="password" class="form-control" placeholder="Password" required>
           <div class="checkbox">
             <label>
               <input type="checkbox" value="remember-me"> Remember me
             </label>
           </div>
           <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
         </form>
       </div>
      </div> /container -->


  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
          <div class="container">
            <div class="row">
              <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                    <?php if ($error)  { ?>
                      <div class="alert alert-danger alert-dismissable">
                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          <?= $error; ?>
                      </div>
                      <?php } if ($message) { ?>
                      <div class="alert alert-success alert-dismissable">
                          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                          <?= $message; ?>
                      </div>
                    <?php } ?>
                   

                  <?= form_open("auth/login"); ?>
                  <!-- <div class="login-logo">
                      <a href="<?=base_url();?>"><?= $Settings->site_name == 'KhanzaPOS' ? 'Simple<b>POS</b>' : '<img src="'.base_url('uploads/'.$Settings->logo).'" alt="'.$Settings->site_name.'" />'; ?></a>
                  </div> -->
                  <div class="card card-plain">
                    <div class="card-header pb-0 text-start">
                      <h4 class="font-weight-bolder">Sign In</h4>
                      <p class="mb-0">Enter your email and password to sign in</p>
                    </div>
                    <div class="card-body">                 

                      <div class="mb-3">
                        <input type="text" name="identity" class="form-control form-control-lg" placeholder="Email" required autofocus>
                      </div>
                      <div class="mb-3">
                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                      </div>
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                      <div class="text-center">
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                        <!-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
                      </div>
                    </div>
                  </div>
                  <?= form_close(); ?>
              </div>
              <div
                class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <div
                  class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex  flex-column justify-content-center overflow-hidden"
                  style="background-image: url('uploads/paste.png');
                            background-size: cover;">
                  <span class="mask bg-gradient-primary opacity-6"></span>
                  <h4 class="mt-5 text-white font-weight-bolder position-relative">"Integrated Livestock, breeding, feedmill, waste management organic fertilizer"</h4>
                  <p class="text-white position-relative">merupakan fasilitas farm terbesar di Indonesia.</p>
                </div>
              </div>
            </div>
            </form>
          </div>
      </div>
    </section>
  </main>



  <script src="<?= $assets ?>js/bootstrap.min.js"></script>
  <script src="<?= $assets ?>js/core/popper.min.js"></script>
  <script src="<?= $assets ?>js/core/bootstrap.min.js"></script>
  <script src="<?= $assets ?>js/plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= $assets ?>js/plugins/smooth-scrollbar.min.js"></script>
</body>

</html>
