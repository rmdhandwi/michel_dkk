<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="mb-3">
    <button id="tambahKategoriButton" data-target="#tambahKategoriModal" data-toggle="modal" class="btn btn-primary" style="border-radius: 6px;"><i class="ti-plus"></i>Kategori</button>
</div>

<div class="card" style="border-radius: 10px;">
    <div class="card-body kategori">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered justify-content-center">
                <thead class="table-info" style="border-bottom: 1px solid #000;color:#000">
                    <tr>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="color: #000;">
                    <?php foreach ($table as $key => $dtabel) : ?>
                        <tr>
                            <td><?= esc($dtabel['kd_kat']); ?></td>
                            <td><?= esc($dtabel['nama_kat']); ?></td>
                            <td>
                                <button class="btn btn-warning text-dark ti-pencil" data-toggle="modal" data-target="#edit<?= esc($dtabel['kd_kat']) ?>" style="border-radius: 6px;"></button>
                                <button type="button" class="btn btn-danger  ti-trash" onclick="confirmDelete('<?= esc($dtabel['kd_kat']); ?>')" style="border-radius: 6px"></button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal tambah data-->
<div id="tambahKategoriModal" class="modal fade" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Formulir untuk menambah kategori -->
                <?= form_open('Kategori/tambah'); ?>
                <div class="form-group">
                    <label for="kode">Kode Kategori:</label>
                    <input type="text" class="form-control" id="kode" name="kode" value="<?= $kd; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Kategori:</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" class="btn" data-dismiss="modal" style="border-radius: 6px;"><i class="ti-close"></i>Close</button>
                <button type="submit" class="btn btn-primary" style="border-radius: 6px;"><i class="ti-save"></i>Simpan</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- edit -->
<?php foreach ($table as $key => $value) :  ?>
    <div id="edit<?= esc($value['kd_kat']) ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <!-- Formulir untuk menambah kategori -->
                    <?= form_open('Kategori/edit/' . esc($value['kd_kat'])); ?>
                    <div class="form-group">
                        <label for="kode">Kode Kategori:</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= esc($value['kd_kat']); ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Kategori:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= esc($value['nama_kat']); ?>">
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn" data-dismiss="modal" style="border-radius: 6px;"><i class="ti-close"></i>Close</button>
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px;"><i class="ti-export"></i>Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<!-- Aktifkan modal saat tombol diklik -->
<!-- <script>
    $(document).ready(function() {
        $('#tambahKategoriButton').click(function() {
            $('#tambahKategoriModal').modal('show');
        });
    });
</script> -->

<?= $this->section('js'); ?>

<script>
    const toasts = new Toasts({
        width: 300,
        timing: 'ease',
        duration: '.5s',
        dimOld: false,
        position: 'top-center' // top-left | top-center | top-right | bottom-left | bottom-center | bottom-right
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
                title: 'Info',
                content: '<?= $error; ?>',
                style: 'verified',
                dismissAfter: '5s',
                closeButton: false,
            });
        <?php } ?>
    <?php } ?>
</script>

<script>
    function confirmDelete(kode) {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika dikonfirmasi, lakukan penghapusan dengan AJAX
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('Kategori/hapus/') ?>' + kode,
                    success: function(response) {
                        // Tampilkan pesan sukses
                        Swal.fire(
                            'Berhasil!',
                            'Data telah dihapus.',
                            'success'
                        ).then(() => {
                            // Refresh halaman atau lakukan operasi lain sesuai kebutuhan
                            location.reload();
                        });
                    },
                    error: function() {
                        // Tampilkan pesan error jika ada
                        Swal.fire(
                            'Gagal!',
                            'Terjadi kesalahan saat menghapus data.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection(); ?>

<?= $this->endSection(); ?>