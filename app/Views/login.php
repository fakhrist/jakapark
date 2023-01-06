

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- Meta Tags -->
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="author" content="themeholder">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Page Title -->
      <title>JakaPark - Parking Solution</title>
      <!-- Favicon Icon -->
      <link rel="shortcut icon" type="image/png" href="<?=base_url('assetslanding/img/favicon.png')?>">
      <!-- Stylesheets -->
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/font-awesome.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/animate.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/slicknav.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/owl.carousel.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/bootstrap.min.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/fonts/flaticon.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/style.css')?>">
      <link rel="stylesheet" href="<?=base_url('assetslanding/css/responsive.css')?>">
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->
      <!-- Main Content site -->
      <div class="main-site">
         <!--preloader  -->
         <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
         </div>
         <!--/End preloader  -->
         <!-- Header Area Start-->
         <header class="sticky-header">
            <div class="container">
               <div class="row">
                  <div class="col-md-4">
                     <div class="logo">
                        <a href="index.html">
                        <img src="<?=base_url('assetslanding/img/logo.png')?>" alt=""> <img src="<?=base_url('assetslanding/img/logo-text.png')?>" alt="">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- Header Area End!-->
         <!-- Start Hero  -->
         <div class="hero-area" data-scroll-index="0">
            <div class="single-hero">
               <div class="hero-wrapper">
                  <div class="container">
                     <div class="row">
                        <div class="col-md-6 col-sm-12">
                           <div class="hero-content">
                              <h1>JakaPark
                                 Accompanies Your Parking Experience
                              </h1>
                              <a class="viso-btn hero" href="#" data-toggle="modal" data-target="#SignupModal">Register</a>
                              <a class="viso-btn two" href="#" data-toggle="modal" data-target="#LoginModal">Login</a>
                           </div>
                            <?php if (session()->getFlashdata('inforeg')) : ?>
                                </br>
                                <div class="alert alert-danger" role="alert">Akun terdaftar dan menunggu moderasi dari admin</div>
                            <?php endif  ?>                   
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- /End Hero  -->
         <!-- Work Progress -->
         <div class="work-area section-padding">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2 col-md-8">
                     <div class="section-title text-center">
                        <h2>Mempermudah Urusan Parkirmu !</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- Single Work-->
                  <div class="col-md-4">
                     <div class="single-work">
                        <div class="work-icon">
                           <i class="flaticon-test"></i>
                        </div>
                        <h2>Cari</h2>
                        <p>Cari tempat parkir terdekat.</p>
                     </div>
                  </div>
                  <!-- Single Work-->
                  <!-- Single Work-->
                  <div class="col-md-4">
                     <div class="single-work">
                        <div class="work-icon two">
                           <i class="flaticon-plan"></i>
                        </div>
                        <h2>Pesan</h2>
                        <p>Pesan sesuai kebutuhanmu.</p>
                     </div>
                  </div>
                  <!-- Single Work-->
                  <!-- Single Work-->
                  <div class="col-md-4">
                     <div class="single-work">
                        <div class="work-icon three">
                           <i class="flaticon-ux"></i>
                        </div>
                        <h2>Parkir</h2>
                        <p>Datang dan tempat tersedia.</p>
                     </div>
                  </div>
                  <!-- Single Work-->
               </div>
            </div>
         </div>
         <!-- /End Work Progress -->


        <div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="SignupModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="user" action="<?= site_url('register_user'); ?>" method="post">
                        <div class="form-group">
                            <input type="nama" name="nama" class="form-control form-control-user" placeholder="Nama Lengkap" value="">
                        </div>
                        <div class="form-group">
                            <input type="alamat" name="alamat" class="form-control form-control-user" placeholder="Alamat" value="">
                        </div>
                        <div class="form-group">
                            <input type="telpon" name="telpon" class="form-control form-control-user" placeholder="Telepon" value="">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" placeholder="email" value="">
                        </div>                    
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block " type="submit">Daftar</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php $validation = session()->getFlashdata('validation') ?>
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger" role="alert"><?= session()->getFlashdata('error') ?></div>
                    <?php endif  ?>

                    <form class="user" action="<?= site_url('login'); ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-user" placeholder="Username" value="">
                            <small class="form-text text-danger"><?= $validation ? $validation->showError('username') : '' ?></small>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-user" placeholder="Password" value="">
                            <small class="form-text text-danger"><?= $validation ? $validation->showError('password') : '' ?></small>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block " type="submit">Login</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
         <!-- /End Footer Area -->
      </div><!-- /End Main Site -->
      <!-- Js File-->
      <script src="<?=base_url('assetslanding/js/jquery.v3.4.1.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/bootstrap.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/scrollIt.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/jquery.slicknav.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/map.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/owl.carousel.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/isotope.pkgd.min.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/plugins.js')?>"></script>
      <script src="<?=base_url('assetslanding/js/main.js')?>"></script>
      
   </body>
</html>

