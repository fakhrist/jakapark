<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url('assets/images/favicon.png')?>">
    <title>JakaPark</title>
    <!-- Custom CSS -->
    <link href="<?=base_url('/dist/css/style.min.css')?>" rel="stylesheet">
</head>

<body>

    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper">

        <?= $this->include('themes/header') ?>

        <?= $this->include('themes/sidebar') ?>

        <div class="page-wrapper">
            <div class="container-fluid">
                <?= $this->renderSection('content'); ?>
            </div>


            <?= $this->include('themes/footer') ?>

        </div>

    </div>

    <div class="chat-windows"></div>
    <link href="<?=base_url('dist/css/style.min.css')?>" rel="stylesheet">


    <script src="<?=base_url('assets/libs/jquery/dist/jquery.min.js')?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?=base_url('assets/libs/popper.js/dist/umd/popper.min.js')?>"></script>
    <script src="<?=base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js')?>"></script>
    <!-- apps -->
    <script src="<?=base_url('dist/js/app.min.js')?>"></script>
    <script src="<?=base_url('dist/js/app.init.light-sidebar.js')?>"></script>
    <script src="<?=base_url('dist/js/app-style-switcher.js')?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?=base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')?>"></script>
    <script src="<?=base_url('assets/extra-libs/sparkline/sparkline.js')?>"></script>
    <!--Wave Effects -->
    <script src="<?=base_url('dist/js/waves.js')?>"></script>
    <!--Menu sidebar -->
    <script src="<?=base_url('dist/js/sidebarmenu.js')?>"></script>
    <!--Custom JavaScript -->
    <script src="<?=base_url('dist/js/custom.min.js')?>"></script>    

</body>

</html>