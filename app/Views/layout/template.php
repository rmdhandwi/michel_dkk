<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?>| Sistem Pengarsipan Dokumen</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="<?= base_url('webkantor') ?>/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="<?= base_url('webkantor') ?>/https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" href="<?= base_url('webkantor') ?>/assets/images/logo_bbppks2.png">
    <!-- <link rel="icon" href="<?= base_url('webkantor') ?>/assets/images/favicon.ico" type="image/x-icon"> -->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url('webkantor') ?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="<?= base_url('webkantor') ?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/icon/themify-icons/themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/css/jquery.mCustomScrollbar.css">
    <!-- am chart export.css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />

    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor/assets/plugin/toastr/css/Toasts.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor/assets/plugin/sweetalert/sweetalert2.css') ?>">

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/css/style.css">

    <style>
        .btn{
            border-radius: 6px !important;
        }
    </style>
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?= $this->include('layout/navbar'); ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    <?= $this->include('layout/sidebar'); ?>

                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10"><?= $title; ?> | Sistem Pengarsipan Dokumen</h5>
                                            <p class="m-b-0">Welcome to <?= session()->get('username'); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb-title">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!"><?= $submenu; ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <?= $this->renderSection('content'); ?>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Jquery -->
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/pages/widget/excanvas.js "></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/plugin/toastr/js/Toasts.js"></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/plugin/sweetalert/sweetalert2.min.js"></script>
    <!-- waves js -->
    <script src="<?= base_url('webkantor') ?>/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <!-- <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/SmoothScroll.js"></script> -->
    <script src="<?= base_url('webkantor') ?>/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/pages/widget/amchart/gauge.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/pages/widget/amchart/serial.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/pages/widget/amchart/light.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="<?= base_url('webkantor') ?>/assets/js/pcoded.min.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="<?= base_url('webkantor') ?>/assets/js/script.js "></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <?= $this->renderSection('js'); ?>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#myTableRAB').DataTable();
            $('#myTableASM').DataTable();
        })
    </script>

    <script>
        const toasts = new Toasts({
            width: 300,
            timing: 'ease',
            duration: '.5s',
            dimOld: false,
            position: 'top-right' // top-left | top-center | top-right | bottom-left | bottom-center | bottom-right
        });

        <?php
        if (session()->getFlashdata('success')) { ?>
            toasts.push({
                title: 'Berhasil',
                content: '<?= session()->getFlashdata('success'); ?>',
                style: 'success',
                dismissAfter: '5s',
                closeButton: false
            });
        <?php } ?>

        <?php
        if (session()->getFlashdata('success_foto')) { ?>
            toasts.push({
                title: 'Berhasil',
                content: '<?= session()->getFlashdata('success_foto'); ?>',
                style: 'success',
                dismissAfter: '5s',
                closeButton: false
            });
        <?php } ?>

        <?php
        if (session()->getFlashdata('gagal')) { ?>
            toasts.push({
                title: 'Kesalahan',
                content: '<?= session()->getFlashdata('gagal'); ?>',
                style: 'error',
                dismissAfter: '5s',
                closeButton: false
            });
        <?php } ?>



        <?php
        // pesan validasi error
        $errors = session()->getFlashdata('errors');

        if (!empty($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                toasts.push({
                    title: 'Info',
                    content: '<?= $error; ?>',
                    style: 'verified',
                    dismissAfter: '5s',
                    closeButton: false,
                });
            <?php endforeach ?>
        <?php endif ?>
    </script>
</body>

</html>