<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card" style="border-radius: 10px;">
    <div class="card-body user">
        <div class="table-responsive">
            <table id="myTable" class="table table-striped table-bordered justify-content-center">
                <thead class="table-info" style="border-bottom: 1px solid #000;color:#000">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody style="color: #000;">
                    <?php $i = 1; ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td>Pokja 1</td>
                        <td>
                            <button class="btn btn-info ti-pencil" style="border-radius: 6px;"></button>
                            <button class="btn btn-danger ti-trash" style="border-radius: 6px"></button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex mt-3 justify-content-between">
                <button id="tambahKategoriButton" class="btn btn-primary" style="border-radius: 6px;">Tambah Kategori</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="tambahKategoriModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <!-- Formulir untuk menambah kategori -->
                <form>
                    <div class="form-group">
                        <label for="kategori">Nama Kategori:</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>
                </form>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal" style="border-radius: 6px;">Close</button>
                <button type="button" class="btn btn-primary" style="border-radius: 6px;">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Aktifkan modal saat tombol diklik -->
<script>
    $(document).ready(function() {
        $('#tambahKategoriButton').click(function() {
            $('#tambahKategoriModal').modal('show');
        });
    });
</script>

<?= $this->endSection(); ?>