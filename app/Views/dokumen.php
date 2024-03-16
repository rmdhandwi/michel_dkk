<?= $this->include('layout/front/header.php'); ?>

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <?= $this->include('layout/front/sidemenu.php'); ?>


        <div class="pcoded-content">
            <!-- Page-header start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard</h5>
                                <p class="m-b-0">Selamat Datang <?= session()->get('username'); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="<?= base_url('webkantor') ?>/assets/index"> <i class="fa fa-home"></i> </a>
                                </li>
                                <li class="breadcrumb-item"><a href="<?= base_url('webkantor') ?>/assets/#!">Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-header end -->

            <!-- ISI KONTEN -->
            <div class="container mt-3 position-relative" style="background-color: #ffffff; padding: 20px; border-radius: 6px;">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-info" style="border-bottom: 5px solid #f5f5f5;">
                            <tr>
                                <th class="table-light" style="border: none;">No</th>
                                <th style="text-align: left;">Nama</th>
                                <th style="text-align: left;">Nama Dokumen</th>
                                <th style="text-align: left;">Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped table-light">
                            <?php $i = 1; ?>
                            <?php foreach ($dokumen as $d) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td style="text-align: left;"><?= $d['nama_arsip']; ?></td>
                                    <td style="text-align: left;"><?= $d['deskripsi']; ?></td>
                                    <td style="text-align: left;">01/01/2023</td>
                                    <td>
                                        <a href="" class="btn btn-primary ti-zoom-in" style="border-radius: 6px;"></a>
                                        <button class="btn btn-warning ti-pencil" style="border-radius: 6px;"></button>
                                        <button class="btn btn-danger ti-trash" style="border-radius: 6px"></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tombol Tambah Data -->
                <button class="btn btn-primary" style="border-radius: 6px;">Tambah Data</button>
            </div>


            <!-- Include Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        </div>
    </div>
</div>




<!-- Required Jquery -->
<script src="<?= base_url('webkantor') ?>/assets/js/jquery/jquery.min.js"></script>
<script src="<?= base_url('webkantor') ?>/assets/js/jquery-ui/jquery-ui.min.js "></script>
<script src="<?= base_url('webkantor') ?>/assets/js/popper.js/popper.min.js"></script>
<script src="<?= base_url('webkantor') ?>/assets/js/bootstrap/js/bootstrap.min.js "></script>
<script src="<?= base_url('webkantor') ?>/assets/pages/widget/excanvas.js "></script>
<!-- waves js -->
<script src="<?= base_url('webkantor') ?>/assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script src="<?= base_url('webkantor') ?>/assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
<!-- modernizr js -->
<script src="<?= base_url('webkantor') ?>/assets/js/modernizr/modernizr.js "></script>
<!-- slimscroll js -->
<script src="<?= base_url('webkantor') ?>/assets/js/SmoothScroll.js"></script>
<script src="<?= base_url('webkantor') ?>/assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
<!-- Chart js -->
<script src="<?= base_url('webkantor') ?>/assets/js/chart.js/Chart.js"></script>
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
<script src="<?= base_url('webkantor') ?>/assets/pages/dashboard/custom-dashboard.js"></script>
<script src="<?= base_url('webkantor') ?>/assets/js/script.js "></script>
</body>
