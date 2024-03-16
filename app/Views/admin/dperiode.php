<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<button type="button" data-toggle="modal" data-target="#tambahPeriode" class="btn btn-primary mb-3"><i class="ti-plus"></i>Periode</button>

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped" id="myTable">
        <thead class="table-info">
          <tr>
            <th>No</th>
            <th>Kode Periode</th>
            <th>Tahun Periode</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($table as $key => $data) : ?>

            <?php
            $tgl_mulai = $data['tgl_mulai'];
            $tgl_selesai = $data['tgl_selesai'];

            $mulai_format = date("d-m-Y", strtotime($tgl_mulai));
            $selesai_format = date("d-m-Y", strtotime($tgl_selesai));
            ?>
            <tr>
              <td><?= $key + 1; ?></td>
              <td><?= esc($data['kd_periode']); ?></td>
              <td><?= esc($data['tahun_periode']) ?></td>
              <td><?= $mulai_format ?></td>
              <td><?= $selesai_format ?></td>
              <td>
                <button type="button" class="btn btn-warning ti-pencil text-dark" data-toggle="modal" data-target="#editPeriode<?= esc($data['kd_periode']) ?>" style="border-radius: 6px;"></button>
                <button type="button" class="btn btn-danger  ti-trash" onclick="confirmDelete('<?= esc($data['kd_periode']); ?>')" style="border-radius: 6px"></button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


<div id="tambahPeriode" class="modal fade" data-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="h4">Tambah Data Periode</div>
        <div class="btn-close btn" data-dismiss="modal">&times;</div>
      </div>
      <div class="modal-body">
        <?= form_open('Periode/tambah'); ?>
        <div class="form-group">
          <label for="inputKD">Kode Periode</label>
          <input name="kd_periode" type="text" value="<?= esc($kd_periode) ?>" class="form-control" id="inputKD" placeholder="ID Periode" readonly>
        </div>
        <div class="form-group">
          <label for="inputTahun">Tahun Periode</label>
          <select class="form-control" name="tahun_periode" id="inputTahun">
            <?php
            $tahunSekarang = date("Y");
            $tahunAwal = 1980;
            for ($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--) {
              echo "<option value='$tahun'>$tahun</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="inputMulai">Tanggal Mulai</label>
          <input type="date" name="tgl_mulai" class="form-control" id="inputMulai">
        </div>
        <div class="form-group">
          <label for="inputSelesai">Tanggal Selesai</label>
          <input type="date" name="tgl_selesai" class="form-control" id="inputSelesai">
        </div>
        <div class="form-group text-center">
          <button type="button" data-dismiss="modal" class="btn btn-danger"><i class="ti-times mr-2"></i>Batal</button>
          <button type="submit" class="btn btn-success"><i class="ti-save mr-2"></i>Simpan</button>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>
</div>

<?php foreach ($table as $key => $edit) : ?>
  <div id="editPeriode<?= esc($edit['kd_periode']) ?>" class="modal fade" data-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="h4">Tambah Data Periode</div>
          <div class="btn-close btn" data-dismiss="modal">&times;</div>
        </div>
        <div class="modal-body">
          <?= form_open("Periode/edit/" . esc($edit['kd_periode'])); ?>
          <div class="form-group">
            <label for="editKD">Kode Periode</label>
            <input name="kd_periode" type="text" value="<?= esc($edit['kd_periode']) ?>" class="form-control" id="editKD" placeholder="ID Periode" readonly>
          </div>
          <div class="form-group">
            <label for="editTahun">Tahun Periode</label>
            <select class="form-control" name="tahun_periode" id="editTahun">
              <option selected class="bg-primary" value="<?= esc($edit['tahun_periode']); ?>"><?= esc($edit['tahun_periode']); ?></option>
              <?php
              $tahunSekarang = date("Y");
              $tahunAwal = 1980;
              for ($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--) {
                echo "<option value='$tahun'>$tahun</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="editMulai">Tanggal Mulai</label>
            <input type="date" name="tgl_mulai" value="<?= esc($edit['tgl_mulai']); ?>" class="form-control" id="editMulai">
          </div>
          <div class="form-group">
            <label for="editSelesai">Tanggal Selesai</label>
            <input type="date" name="tgl_selesai" value="<?= esc($edit['tgl_selesai']); ?>" class="form-control" id="editSelesai">
          </div>
          <div class="form-group text-center">
            <button type="button" data-dismiss="modal" class="btn btn-danger"><i class="ti-close mr-2"></i>Batal</button>
            <button type="submit" class="btn btn-success"><i class="ti-save mr-2"></i>Ubah</button>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<?= $this->section('js'); ?>

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
          url: '<?= base_url('Periode/hapus/') ?>' + kode,
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