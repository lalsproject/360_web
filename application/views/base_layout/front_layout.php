<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pura Srijong</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>ltr/assets/vendor/datatables/jquery-3.5.1.js"></script>
    <link href="<?php echo base_url() ?>ltr/assets/extra-libs/css-chart/css-chart.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>ltr/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ltr/assets/offline/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>ltr/assets/offline/buttons.bootstrap4.min.css">

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
    />
    <link href="<?= base_url()?>ltr/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/assets/vendor/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>ltr/assets/offline/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    
    <script src="<?php echo base_url() ?>ltr/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url() ?>ltr/dist/js/app.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/dist/js/app.init.js"></script>
    <script src="<?php echo base_url() ?>ltr/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url() ?>ltr/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url() ?>ltr/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url() ?>ltr/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url() ?>ltr/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <script src="<?php echo base_url() ?>ltr/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/vendor/datatables/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/vendor/datatables/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/offline/select2.min.js"></script>
    
    <script src="<?= base_url() ?>ltr/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/buttons.bootstrap4.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/vfs_fonts.js"></script>
    
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/buttons.colVis.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url() ?>ltr/assets/offline/table2excel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
        html, body{
          /*font-size: 100%;*/
/*       font-family: 'Courier', sans-serif;*/
          scroll-behavior: smooth;
        }
        th{
            font-weight: 900 !important;
        }
        body{
            font-size:0.800rem;
        }
        .btn-flat{
            border-radius: 0px;
        }
        .bg-dark{
            color: white;
        }
        .btn-primary {
            background-color: #035f9f!important;
            border-color: #035f9f!important;
        }
        .bg-primary{
            background-color: #035f9f!important;
            color: white;
            border-bottom: 3px solid #ffc107;
        }
        .bg-dark{
            background-color: #035f9f!important;
            color: white;
            border-bottom: 3px solid #ffc107;
        }
        .page-item.active .page-link{
            background-color: #035f9f!important;
            border-color:#035f9f!important;
        }

        #main-wrapper[data-layout=vertical] .topbar .navbar-collapse[data-navbarbg=skin1], #main-wrapper[data-layout=vertical] .topbar[data-navbarbg=skin1], #main-wrapper[data-layout=horizontal] .topbar .navbar-collapse[data-navbarbg=skin1], #main-wrapper[data-layout=horizontal] .topbar[data-navbarbg=skin1]{
            background:#035f9f!important;
        }
        #main-wrapper[data-layout=vertical] .topbar .top-navbar .navbar-header[data-logobg=skin6], #main-wrapper[data-layout=horizontal] .topbar .top-navbar .navbar-header[data-logobg=skin6]{
            background:#035f9f!important;
        }
        #main-wrapper[data-layout=vertical] .topbar .top-navbar .navbar-header[data-logobg=skin6] .nav-toggler, #main-wrapper[data-layout=vertical] .topbar .top-navbar .navbar-header[data-logobg=skin6] .topbartoggler, #main-wrapper[data-layout=horizontal] .topbar .top-navbar .navbar-header[data-logobg=skin6] .nav-toggler, #main-wrapper[data-layout=horizontal] .topbar .top-navbar .navbar-header[data-logobg=skin6] .topbartoggler{
            color: white;
        }
        .input-group-text{
            background-color:#e9ecef;
        }
       /* #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin6], #main-wrapper[data-layout=vertical] .left-sidebar[data-sidebarbg=skin6] .sidebar-nav ul, #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin6], #main-wrapper[data-layout=horizontal] .left-sidebar[data-sidebarbg=skin6] .sidebar-nav ul{
            background: #414755;
        }*/
        .dataTables_processing{
            background: #2424246b;
            color: white;
        }
        .bg-icon{
            padding: 10px;
        }
        body {
            font-family: Arial, sans-serif;
        }

        .navbar-nav .nav-link {
            font-weight: bold;
            color: black;
        }

        .content {
            text-align: center;
            padding: 50px 0;
        }

        .description {
            margin-top: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-align: justify;
            font-size: 14px;
        }

        .btn-virtual-tour {
            margin-top: 20px;
        }

        .navbar {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;
        }

        .carousel-inner img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }
    </style>
    <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo base_url() ?>ltr/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <a class="navbar-brand" href="<?= site_url('home') ?>">PURA SRIJONG</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('home') ?>">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('home_galery') ?>">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('about') ?>">ABOUT</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="content">
        <div class="container mt-5">
            <?php echo $this->session->flashdata('notif'); ?>
            <?php $this->load->view($content); ?>
        </div>
    </div>

    <script>
        var url = window.location;
        $('ul>li.nav-item a').filter(function() {
           return this.href == url;
        }).parent().addClass('active');
    </script>           
</body>

</html>
