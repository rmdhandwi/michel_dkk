<!DOCTYPE html>
<html lang="en">

<head>
    <title>SPD | <?= $title; ?></title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes" />


    <!-- Fontawesome -->
    <!-- Favicon icon -->

    <link rel="icon" href="<?= base_url('webkantor') ?>/assets/images/logo_bbppks.png" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="<?= base_url('webkantor') ?>/assets/plugin/toastr/css/Toasts.css">
</head>

<body themebg-pattern="theme1">
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

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->

                    <?= form_open('Auth/login', ['class' => 'md-float-material form-material']); ?>
                    <?= csrf_field(); ?>
                    <div class="text-center">
                        <img src="<?= base_url('webkantor') ?>/assets/images/logo_bbppks.png" alt="logo.png" width="140" height="140">
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center">Login</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input type="text" name="username" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Username</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="password" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Masuk</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <?= form_close(); ?>

                    <!-- end of form -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="/assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="/assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="/assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="/assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="/assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script src="<?= base_url('webkantor') ?>/assets/js/jquery/jquery.min.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/popper.js/popper.min.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script src="<?= base_url('webkantor') ?>/assets/plugin/toastr/js/Toasts.js"></script>
    <!-- waves js -->
    <script src="<?= base_url('webkantor') ?>/assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script src="<?= base_url('webkantor') ?>/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script src="<?= base_url('webkantor') ?>/assets/js/SmoothScroll.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- i18next.min.js -->
    <script src="bower_components/i18next/js/i18next.min.js"></script>
    <script src="bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
    <script src="bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
    <script src="<?= base_url('webkantor') ?>/assets/js/common-pages.js"></script>

    <script>
        const toasts = new Toasts({
            width: 300,
            timing: 'ease',
            duration: '.5s',
            dimOld: false,
            position: 'top-right' // top-left | top-center | top-right | bottom-left | bottom-center | bottom-right
        });

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

        if (!empty($errors)) { ?>
            <?php foreach ($errors as $error) { ?>
                toasts.push({
                    title: 'Verified',
                    content: '<?= $error; ?>',
                    style: 'verified',
                    dismissAfter: '5s',
                    closeButton: false,
                });
            <?php } ?>
        <?php } ?>
    </script>
</body>

</html>