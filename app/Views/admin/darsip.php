<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <!-- Multiple Open Accordion start -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-header-text">Tambah Data Arsip</h5>
            </div>
            <div class="card-block accordion-block">
                <div id="accordion" role="tablist" aria-multiselectable="true">

                    <!-- SKPB -->
                    <div class="accordion-panel">
                        <div class="accordion-heading" role="tab" id="headingOne">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Surat Keputusan Penerima Bantuan
                                </a>
                            </h3>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="accordion-content accordion-desc">
                                <div class="form-group row">
                                    <div class="ml-auto mt-2">
                                        <button type="button" class="btn btn-primary btn-round" id="TabelSKPB"><i class="ti-bar-chart"></i>Data Tabel</button>
                                        <button type="button" class="btn btn-primary btn-round" id="TambahSKPB"><i class="ti-plus mr-1"></i>Tambah Data</button>
                                    </div>
                                </div>

                                <div class="container" id="FormTabelSKPB">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="myTable">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode SKPB</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Foto</th>
                                                    <th>Detail</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($tableskpb as $key => $value) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= esc($value['kd_skpb']); ?></td>
                                                        <td><?= esc($value['nama_lengkap']); ?></td>
                                                        <td>
                                                            <button" class="btn btn-info" data-toggle="modal" data-target="#foto-<?= esc($value['kd_skpb']) ?>"><i class="ti-eye"></i></button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-secondary"><i class="ti-receipt"></i></button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning text-dark" onclick="editSKPB('<?= esc($value['kd_skpb']); ?>')"><i class="ti-pencil mr-2""></i></button>
                                                            <button class=" btn btn-danger" onclick="confirmDelete('<?= esc($value['kd_skpb']); ?>')"><i class="ti-trash mr-2"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="formTambah">
                                    <?= form_open_multipart("Arsip/tambahSKPB", ['class' => 'mt-3', 'id' => "FormTambahSKPB"]); ?>
                                    <div class="form-group row">
                                        <label class="col-3" for="KDskpb">Kode SKPB</label>
                                        <input type="text" name="kd_skpb" class="form-control col-9" value="<?= $KDskpb ?>" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat" class="col-3">Kode Kategori</label>
                                        <select name="kd_kat" id="kd_kat" class="form-control col-9">
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($datakat as $key => $kategori) : ?>
                                                <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="nama">Nama Lengkap:</label>
                                        <input type="text" class="form-control col-9" id="nama" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= old('nama_lengkap'); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="nomor_identifikasi">Nomor Identifikasi (KTP/NIK):</label>
                                        <input type="text" class="form-control col-9" id="nomor_identifikasi" name="nomor_identifikasi" placeholder="Masukkan nomor Identifikasi" maxlength="16" value="<?= old('nomor_identifikasi'); ?>">
                                        <div class="offset-3 col-6 " style="margin-top:10px">
                                            <div class="col-3"></div>
                                            <span id="error-message-nama" style="display: none" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan hanya angka</span>
                                            <span id="error-message-length" style="display: none" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan 16 karakter</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="file_identitas">Upload Foto</label>
                                        <input type="file" class="form-control-file col-5" name="file_identitas" id="file_identitas">
                                        <img id="preview_file_identitas" class="img-thumbnail col-3" src="" alt="foto-identitas">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="alamat">Alamat:</label>
                                        <textarea class="form-control col-9" id="alamat" name="alamat"><?= old('alamat'); ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="jenis_bantuan">Jenis Bantuan:</label>
                                        <select class="form-control col-9" id="jenis_bantuan" name="jns_bantuan">
                                            <option value="">Pilih Bantuan</option>
                                            <?php
                                            $options = ['Sembako', 'Uang'];
                                            foreach ($options as $option) :
                                                $selected = (old('jns_bantuan') == $option) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="besaran_bantuan">Besaran Bantuan:</label>
                                        <input type="text" class="form-control col-9" id="besar_bantuan" name="besar_bantuan" placeholder="Masukkan Besaran Bantuan" value="<?= old('besar_bantuan'); ?>">
                                        <div class="col-3"></div>
                                        <div id="error-message-bantuan" style="display: none; margin-top:10px; margin-left:-10px" class="text-danger col-9"><i class="ti-alert mr-2"></i>Masukkan hanya angka</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="periode_bantuan">Periode Bantuan:</label>
                                        <select class="form-control col-9" id="periode_bantuan" name="periode_bantuan">
                                            <option value="">Pilih Periode</option>
                                            <?php foreach ($dataperiode as $key => $periode) : ?>
                                                <?php $selected = (old('periode_bantuan') == $periode['kd_periode']) ? 'selected' : ''; ?>
                                                <option value="<?= esc($periode['kd_periode']) ?>" <?= $selected ?>><?= esc($periode['tahun_periode']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <button class="btn btn-success"><i class="ti-save mr-2"></i>Simpan</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                                <div class="formEdit">
                                    <?= form_open_multipart('', ['class' => 'mt-3', 'id' => "FormEditSKPB"]); ?>
                                    <div class="form-group row">
                                        <label class="col-3" for="edit_kd_skpb">Kode SKPB</label>
                                        <input type="text" name="edit_kd_skpb" id="edit_kd_skpb" class="form-control col-9" readonly>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_kd_kat" class="col-3">Kode Kategori</label>
                                        <select name="edit_kd_kat" id="edit_kd_kat" class="form-control col-9">
                                            <option value="">Pilih Kategori</option>
                                            <?php foreach ($datakat as $key => $kategori) : ?>
                                                <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_nama">Nama Lengkap:</label>
                                        <input type="text" class="form-control col-9" id="edit_nama" name="edit_nama_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= old('nama_lengkap'); ?>">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_nomor_identifikasi">Nomor Identifikasi (KTP/NIK):</label>
                                        <input type="text" class="form-control col-9" id="edit_nomor_identifikasi" name="edit_nomor_identifikasi" placeholder="Masukkan nomor Identifikasi" maxlength="16" value="<?= old('nomor_identifikasi'); ?>">
                                        <div class="offset-3 col-6 " style="margin-top:10px">
                                            <div class="col-3"></div>
                                            <span id="error-message-nama" style="display: none" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan hanya angka</span>
                                            <span id="error-message-length" style="display: none" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan 16 karakter</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_file_identitas">Upload Foto</label>
                                        <input type="file" class="form-control-file" name="edit_file_identitas" id="edit_file_identitas">
                                        <div class="col-3">
                                            <img id="old_preview_file_identitas" class="img-thumbnail" src="" alt="old_foto-identitas" width="200" height="200">
                                            <div class="text-danger">Gambar Lama</div>
                                        </div>
                                        <div class="col-3">
                                            <img id="new_preview_file_identitas" class="img-thumbnail" src="" alt="new_foto-identitas" width="200" height="200">
                                            <div class="text-primary">Gambar Baru</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_alamat">Alamat:</label>
                                        <textarea class="form-control col-9" id="edit_alamat" name="edit_alamat"><?= old('alamat'); ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_jenis_bantuan">Jenis Bantuan:</label>
                                        <select class="form-control col-9" id="edit_jenis_bantuan" name="edit_jns_bantuan">
                                            <option value="">Pilih Bantuan</option>
                                            <?php
                                            $options = ['Sembako', 'Uang'];
                                            foreach ($options as $option) :
                                                $selected = (old('jns_bantuan') == $option) ? 'selected' : '';
                                            ?>
                                                <option value="<?= $option ?>" <?= $selected ?>><?= $option ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_besar_bantuan">Besaran Bantuan:</label>
                                        <input type="text" class="form-control col-9" id="edit_besar_bantuan" name="edit_besar_bantuan" placeholder="Masukkan Besaran Bantuan" value="<?= old('besar_bantuan'); ?>">
                                        <div class="col-3"></div>
                                        <div id="error-message-bantuan" style="display: none; margin-top:10px; margin-left:-10px" class="text-danger col-9"><i class="ti-alert mr-2"></i>Masukkan hanya angka</div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label" for="edit_periode_bantuan">Periode Bantuan:</label>
                                        <select class="form-control col-9" id="edit_periode_bantuan" name="edit_periode_bantuan">
                                            <option value="">Pilih Periode</option>
                                            <?php foreach ($dataperiode as $key => $periode) : ?>
                                                <?php $selected = (old('periode_bantuan') == $periode['kd_periode']) ? 'selected' : ''; ?>
                                                <option value="<?= esc($periode['kd_periode']) ?>" <?= $selected ?>><?= esc($periode['tahun_periode']) ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-3"></div>
                                        <button class="btn btn-primary"><i class="ti-save mr-2"></i>Update</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- RAB -->
                    <div class="accordion-panel">
                        <div class="accordion-heading" role="tab" id="headingTwo">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Rencana Anggaran Biaya
                                </a>
                            </h3>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="accordion-content accordion-desc">
                                <div class="form-group row">
                                    <div class="ml-auto mt-2">
                                        <button type="button" class="btn btn-primary btn-round" id="TabelRAB"><i class="ti-bar-chart mr-1"></i>Data Tabel</button>
                                        <button type="button" class="btn btn-primary btn-round" id="TambahRAB"><i class="ti-plus mr-1"></i>Tambah Data</button>
                                    </div>
                                </div>

                                <div class="formTabel" id="FormTabelRAB">
                                    <div class="table-responsive">
                                        <table class="table-stripad table" id="myTableRAB">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode RAB</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Anggaran</th>
                                                    <th>Deskripsi</th>
                                                    <th>Foto Dokumen</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tablerab as $key => $rab) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= esc($rab['kd_rab']); ?></td>
                                                        <td><?= esc($rab['nama_kegiatan']); ?></td>
                                                        <td><?= esc($rab['anggaran']); ?></td>
                                                        <td><?= esc($rab['deskripsi']); ?></td>
                                                        <td>
                                                            <button class="btn tbn-primary" data-target="#foto<?= esc($rab['kd_rab']); ?>" data-toggle="modal"><i class="ti-eye"></i></button>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-warning text-dark" onclick="editRAB('<?= esc($rab['kd_rab']); ?>')"><i class="ti-pencil"></i></button>
                                                            <button class="btn btn-danger" onclick="deleteRAB('<?= esc($rab['kd_rab']); ?>')"><i class="ti-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="FormTambahRAB">
                                    <?= form_open_multipart("Arsip/tambahRAB", ['id' => 'FormTambahRAB']); ?>
                                    <div class=" form-group row">
                                        <label for="kdRAB" class="col-3 col-form-label col-form-label">Koded RAB:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="kdRAB" name="kd_rab" value="<?= $KDrab; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat_rab" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="kd_kat_rab" id="kd_kat_rab" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="inputKegiatan" class="col-3 col-form-label col-form-label">Kegiatan:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputKegiatan" name="kegiatan" placeholder="Masukkan nama kegiatan" value="<?= old('kegiatan'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTahun" class="col-3 col-form-label col-form-label">Tahun:</label>
                                        <div class="col-9">
                                            <select class="form-control col-12" id="inputTahun" name="tahun">
                                                <option value="">Pilih Periode</option>
                                                <?php foreach ($dataperiode as $key => $tahun) : ?>
                                                    <?php $selected = (old('tahun') == $tahun['kd_periode']) ? 'selected' : ''; ?>
                                                    <option value="<?= esc($tahun['kd_periode']) ?>" <?= $selected ?>><?= esc($tahun['tahun_periode']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAnggaran" class="col-3 col-form-label col-form-label">Anggaran (Rp):</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputAnggaran" name="anggaran" placeholder="Masukkan anggaran" value="<?= old('anggaran'); ?>">
                                        </div>
                                        <div class="offset-3 col-9 mt-2">
                                            <span id="error-message-anggaran" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan hanya angka</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputDeskripsi" class="col-3 col-form-label col-form-label">Deskripsi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputDeskripsi" name="deskripsi" placeholder="Masukkan deskripsi"><?= old('deskripsi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-6">
                                            <input type="file" class="form-control-file" id="inputFile" name="file_rab">
                                        </div>
                                        <div class="col-3">
                                            <img src="" alt="file Lampiran RAB" class="img-thumbnail" style="display: none;" id="preview_file_rab">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success"><i class="ti-save mr-1"></i>Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                                <div class="FormEditRAB">
                                    <?= form_open_multipart("", ['id' => 'FormEditRAB']); ?>
                                    <div class=" form-group row">
                                        <label for="edit_kdRAB" class="col-3 col-form-label col-form-label">Koded RAB:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_kdRAB" name="edit_kd_rab" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_kat_rab" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="edit_kat_rab" id="edit_kat_rab" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="edit_inputKegiatan" class="col-3 col-form-label col-form-label">Kegiatan:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputKegiatan" name="edit_kegiatan" placeholder="Masukkan nama kegiatan" value="<?= old('kegiatan'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputTahun" class="col-3 col-form-label col-form-label">Tahun:</label>
                                        <div class="col-9">
                                            <select class="form-control col-12" id="edit_inputTahun" name="edit_tahun">
                                                <option value="">Pilih Periode</option>
                                                <?php foreach ($dataperiode as $key => $tahun) : ?>
                                                    <?php $selected = (old('tahun') == $tahun['kd_periode']) ? 'selected' : ''; ?>
                                                    <option value="<?= esc($tahun['kd_periode']) ?>" <?= $selected ?>><?= esc($tahun['tahun_periode']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputAnggaran" class="col-3 col-form-label col-form-label">Anggaran (Rp):</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputAnggaran" name="edit_anggaran" placeholder="Masukkan anggaran" value="<?= old('anggaran'); ?>">
                                        </div>
                                        <div class="offset-3 col-9 mt-2">
                                            <span id="error-message-Eanggaran" class="text-danger col-4"><i class="ti-alert mr-2"></i>Masukkan hanya angka</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputDeskripsi" class="col-3 col-form-label col-form-label">Deskripsi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputDeskripsi" name="edit_deskripsi" placeholder="Masukkan deskripsi"><?= old('deskripsi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-4">
                                            <input type="file" class="form-control-file" id="edit_inputFile" name="edit_file_rab">
                                        </div>
                                        <div class="col-2">
                                            <span class=""></span>
                                            <img src="" alt="old Lampiran RAB" class="img-thumbnail" style="display: blok;" id="old_preview_file_rab">
                                            <span class="text-danger">File Lama</span>
                                        </div>
                                        <div class="col-2">
                                            <img src="" alt="new Lampiran RAB" class="img-thumbnail" style="display: blok;" id="new_preview_file_rab">
                                            <span class="text-success">File baru</span>
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success"><i class="ti-upload mr-2"></i>Update</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Hasil Asesment -->
                    <div class=" accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingThree">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Hasil Asesment
                                </a>
                            </h3>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="accordion-content accordion-desc">
                                <div class="form-group row">
                                    <div class="ml-auto mt-2">
                                        <button type="button" class="btn btn-primary btn-round" id="TabelASM"><i class="ti-bar-chart mr-1"></i>Data Tabel</button>
                                        <button type="button" class="btn btn-primary btn-round" id="TambahASM"><i class="ti-plus mr-1"></i>Tambah Data</button>
                                    </div>
                                </div>
                                <!-- Table  -->
                                <div id="FormTabelASM">
                                    <div class="table-responsive">
                                        <table class="table" id="myTableASM">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Asesment</th>
                                                    <th>Nama</th>
                                                    <th>Usia</th>
                                                    <th>Hasil Asesment</th>
                                                    <th>keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tableasm as $key => $asm) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= esc($asm['kd_asesment']); ?></td>
                                                        <td><?= esc($asm['nama_asesment']); ?></td>
                                                        <td><?= esc($asm['usia']); ?></td>
                                                        <td><?= esc($asm['hasil_asesment']); ?></td>
                                                        <td><?= esc($asm['keterangan']); ?></td>
                                                        <td><?= esc($asm['']); ?></td>
                                                        <td>
                                                            <button class="btn btn-warning text-dark" onclick="editASM('<?= esc($asm['kd_asesment']); ?>')"><i class="ti-pencil"></i></button>
                                                            <button class="btn btn-danger" onclick="deleteASM('<?= esc($asm['kd_asesment']); ?>')"><i class="ti-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Tambah -->
                                <div class="FormTambahASM">
                                    <?= form_open("Arsip/tambahASM", ['id' => 'FormTambahASM']); ?>
                                    <div class="form-group row">
                                        <label for="KDasm" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="KDasm" name="KDasm" value="<?= $KDasm; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat_asm" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="kd_kat_asm" id="kd_kat_asm" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat_asm') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNama" class="col-3 col-form-label col-form-label">Nama:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputNama" value="<?= old('nama'); ?>" name="nama" placeholder="Masukkan nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputUsia" class="col-3 col-form-label col-form-label">Usia:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputUsia" value="<?= old('usia'); ?>" name="usia" placeholder="Masukkan usia" maxlength="3">
                                        </div>
                                        <div class="offset-3 col-9 mt-2">
                                            <span class="text-danger d-none" id="error-message-usia"><i class="ti-alert mr-2"></i>Masukkan Angka</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHasil" class="col-3 col-form-label col-form-label">Hasil Asesmen:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputHasil" name="hasil" placeholder="Masukkan hasil asesmen"><?= old('hasil'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKeterangan" class="col-3 col-form-label col-form-label">Keterangan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputKeterangan" name="keterangan" placeholder="Masukkan keterangan"><?= old('keterangan'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="inputFile" name="file_asesment">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success"><i class="ti-save mr-2"></i>Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                                <!-- EDIT -->
                                <div class="FormEditASM">
                                    <?= form_open("", ['id' => 'FormEditASM']); ?>
                                    <div class="form-group row">
                                        <label for="edit_KDasm" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_KDasm" name="edit_KDasm" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_kat_asm" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="edit_kat_asm" id="edit_kat_asm" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputNama" class="col-3 col-form-label col-form-label">Nama:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputNama" name="edit_nama" placeholder="Masukkan nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputUsia" class="col-3 col-form-label col-form-label">Usia:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputUsia" name="edit_usia" placeholder="Masukkan usia" maxlength="3">
                                        </div>
                                        <div class="offset-3 col-9 mt-2">
                                            <span class="text-danger d-none" id="error-message-usia"><i class="ti-alert mr-2"></i>Masukkan Angka</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputHasil" class="col-3 col-form-label col-form-label">Hasil Asesmen:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputHasil" name="edit_hasil" placeholder="Masukkan hasil asesmen"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputKeterangan" class="col-3 col-form-label col-form-label">Keterangan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputKeterangan" name="edit_keterangan" placeholder="Masukkan keterangan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="edit_inputFile" name="edit_file_asesment">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-success"><i class="ti-save mr-2"></i>Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Temu Bahas Kasus -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingFour">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Temu Bahas Kasus
                                </a>
                            </h3>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="accordion-content accordion-desc">
                                <div class="form-group row">
                                    <div class="ml-auto mt-2">
                                        <button type="button" class="btn btn-primary btn-round" id="TabelASM"><i class="ti-bar-chart mr-1"></i>Data Tabel</button>
                                        <button type="button" class="btn btn-primary btn-round" id="TambahASM"><i class="ti-plus mr-1"></i>Tambah Data</button>
                                    </div>
                                </div>
                                <!-- Table  -->
                                <div id="FormTabelTBK">
                                    <div class="table-responsive">
                                        <table class="table" id="myTableTBK">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Temu Bahas Kasus</th>
                                                    <th>Nama Kasus</th>
                                                    <th>Tanggal Kasus</th>
                                                    <th>Nama Peserta</th>
                                                    <th>Jabatan Peserta</th>
                                                    <th>Peran Peserta</th>
                                                    <th>Deskripsi</th>
                                                    <th>Rekomendasi</th>
                                                    <th>Tindak Lanjut</th>
                                                    <th>Kesimpulan</th>
                                                    <th>File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tabletbk as $key => $tbk) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= esc($tbk['kd_tbk']); ?></td>
                                                        <td><?= esc($tbk['nama_tbk']); ?></td>
                                                        <td><?= esc($tbk['tgl_kasus']); ?></td>
                                                        <td><?= esc($tbk['nama_peserta']); ?></td>
                                                        <td><?= esc($tbk['jabatan_peserta']); ?></td>
                                                        <td><?= esc($tbk['peran_peserta']); ?></td>
                                                        <td><?= esc($tbk['deskripsi']); ?></td>
                                                        <td><?= esc($tbk['rekomendasi']); ?></td>
                                                        <td><?= esc($tbk['tindaklanjut']); ?></td>
                                                        <td><?= esc($tbk['kesimpulan']); ?></td>
                                                        <td><?= esc($tbk['file']); ?></td>
                                                        <td>
                                                            <button class="btn btn-warning text-dark" onclick="editTBK('<?= esc($tbk['kd_bahaskasus']); ?>')"><i class="ti-pencil"></i></button>
                                                            <button class="btn btn-danger" onclick="deleteTBK('<?= esc($tbk['kd_bahaskasus']); ?>')"><i class="ti-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- TAMBAH -->
                                <div class="FormTambahTBK">
                                    <?= form_open("Arsip/tambahTBK", ['id' => 'FormTambahTBK']); ?>
                                    <div class="form-group row">
                                        <label for="KDtbk" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="KDtbk" name="KDtbk" value="<?= $KDtbk; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat_tbk" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="kd_kat_tbk" id="kd_kat_tbk" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat_tbk') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKasus" class="col-3 col-form-label col-form-label">Nama Kasus:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputKasus" value="<?= old('kasus'); ?>" name="kasus" placeholder="Masukkan nama kasus">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" id="inputTanggal" value="<?= old('tanggal'); ?>" name="tanggal" placeholder="Masukkan tanggal">
                                        </div>
                                    </div>
                                    <!-- Tambah Peserta -->
                                    <div class="form-group row" id="peserta1">
                                        <label for="inputPeserta" class="col-3 col-form-label">Peserta:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputNama" value="<?= old('tbk_nama'); ?>" name="tbk_nama" placeholder="Nama">
                                            <br>
                                            <input type="text" class="form-control" id="inputJabatan" value="<?= old('tbk_jabatan'); ?>" name="tbk_jabatan" placeholder="Jabatan">
                                            <br>
                                            <input type="text" class="form-control" id="inputPeran" value="<?= old('tbk_peran'); ?>" name="tbk_peran" placeholder="Peran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button type="button" class="btn btn-primary" onclick="tambahPeserta()">Tambah Peserta</button>
                                        </div>
                                    </div>
                                    <!-- Tambah Peserta -->

                                    <div class="form-group row">
                                        <label for="inputDeskripsiKasus" class="col-3 col-form-label col-form-label">Deskripsi Kasus:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputDeskripsiKasus" name="deskripsikasus" placeholder="Deskripsi kasus"><?= old('deskripsikasus'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRekomendasi" class="col-3 col-form-label col-form-label">Rekomendasi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputRekomendasi" name="rekomendasi" placeholder="Masukkan Rekomendasi"><?= old('rekomendasi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTindakLanjut" class="col-3 col-form-label col-form-label">Tindak Lanjut:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputTindakLanjut" name="tindaklanjut" placeholder="Tindak Lanjut"><?= old('tindaklanjut'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKesimpulan" class="col-3 col-form-label col-form-label">Kesimpulan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputKesimpulan" name="kesimpulan" placeholder="Masukkan Kesimpulan"><?= old('kesimpulan'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="inputFile" value="<?= old('tbk_file'); ?>" name="tbk_file">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                                <!-- EDIT -->
                                <div class="FormEditTBK">
                                    <?= form_open("Arsip/editTBK", ['id' => 'FormEditTBK']); ?>
                                    <div class="form-group row">
                                        <label for="KDtbk" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_KDtbk" name="edit_KDtbk" value="<?= $KDtbk; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_kat_tbk" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="edit_kat_tbk" id="edit_kat_tbk" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputKasus" class="col-3 col-form-label col-form-label">Nama Kasus:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputKasus" name="edit_kasus" placeholder="Masukkan nama kasus">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" id="edit_inputTanggal" name="edit_tanggal" placeholder="Masukkan tanggal">
                                        </div>
                                    </div>
                                    <!-- Tambah Peserta -->
                                    <div class="form-group row" id="peserta1">
                                        <label for="inputPeserta" class="col-3 col-form-label">Peserta:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputNama" name="edit_tbk_nama" placeholder="Nama">
                                            <br>
                                            <input type="text" class="form-control" id="edit_inputJabatan" name="edit_tbk_jabatan" placeholder="Jabatan">
                                            <br>
                                            <input type="text" class="form-control" id="edit_inputPeran" name="edit_tbk_peran" placeholder="Peran">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-3"></div>
                                        <div class="col-9">
                                            <button type="button" class="btn btn-primary" onclick="tambahPeserta()">Tambah Peserta</button>
                                        </div>
                                    </div>
                                    <!-- Tambah Peserta -->

                                    <div class="form-group row">
                                        <label for="edit_inputDeskripsiKasus" class="col-3 col-form-label col-form-label">Deskripsi Kasus:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputDeskripsiKasus" name="edit_deskripsikasus" placeholder="Deskripsi kasus"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputRekomendasi" class="col-3 col-form-label col-form-label">Rekomendasi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputRekomendasi" name="edit_rekomendasi" placeholder="Masukkan Rekomendasi"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputTindakLanjut" class="col-3 col-form-label col-form-label">Tindak Lanjut:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputTindakLanjut" name="edit_tindaklanjut" placeholder="Tindak Lanjut"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputKesimpulan" class="col-3 col-form-label col-form-label">Kesimpulan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputKesimpulan" name="edit_kesimpulan" placeholder="Masukkan Kesimpulan"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="edit_inputFile" name="edit_tbk_file">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Hasil Intervensi -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingFive">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Hasil Intervensi
                                </a>
                            </h3>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="accordion-content accordion-desc">
                                <div class="form-group row">
                                    <div class="ml-auto mt-2">
                                        <button type="button" class="btn btn-primary btn-round" id="TabelINS"><i class="ti-bar-chart mr-1"></i>Data Tabel</button>
                                        <button type="button" class="btn btn-primary btn-round" id="TambahINS"><i class="ti-plus mr-1"></i>Tambah Data</button>
                                    </div>
                                </div>
                                <!-- Table  -->
                                <div id="FormTabelINS">
                                    <div class="table-responsive">
                                        <table class="table" id="myTableINS">
                                            <thead class="table-info">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Intervensi</th>
                                                    <th>Intervensi</th>
                                                    <th>Tanggal Intervensi</th>
                                                    <th>Hasil</th>
                                                    <th>Kesimpulan</th>
                                                    <th>Tindak Lanjut</th>
                                                    <th>File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($tableins as $key => $ins) : ?>
                                                    <tr>
                                                        <td><?= $key + 1; ?></td>
                                                        <td><?= esc($ins['kd_ins']); ?></td>
                                                        <td><?= esc($ins['nama_intervensi']); ?></td>
                                                        <td><?= esc($ins['tgl_intervensi']); ?></td>
                                                        <td><?= esc($ins['hasil_intervensi']); ?></td>
                                                        <td><?= esc($ins['kesimpulan_intervensi']); ?></td>
                                                        <td><?= esc($ins['tindaklanjut_intervensi']); ?></td>
                                                        <td><?= esc($ins['file_intervensi']); ?></td>
                                                        <td>
                                                            <button class="btn btn-warning text-dark" onclick="editINS('<?= esc($ins['kd_bahaskasus']); ?>')"><i class="ti-pencil"></i></button>
                                                            <button class="btn btn-danger" onclick="deleteINS('<?= esc($ins['kd_bahaskasus']); ?>')"><i class="ti-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- TAMBAH -->
                                <div class="FormTambahINS">
                                    <?= form_open("Arsip/tambahINS", ['id' => 'FormTambahINS']); ?>
                                    <div class="form-group row">
                                        <label for="KDins" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="KDins" name="KDins" value="<?= $KDins; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat_ins" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="kd_kat_ins" id="kd_kat_ins" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat_ins') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputINtervensi" class="col-3 col-form-label col-form-label">Judul Intervensi:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="inputIntervensi" value="<?= old('nama_intervensi'); ?>" name="nama_intervensi" placeholder="Masukkan judul intervensi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTglIntervensi" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" id="inputTglIntervensi" value="<?= old('tgl_intervensi'); ?>" name="tgl_intervensi" placeholder="Masukkan tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputHasil" class="col-3 col-form-label col-form-label">Hasil Intervensi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputHasil" name="hasil_intervensi" placeholder="Masukkan hasil intervensi"><?= old('hasil_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKesimpulan" class="col-3 col-form-label col-form-label">Kesimpulan atau Catatan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputKesimpulan" name="kesimpulan_intervensi" placeholder="Masukkan kesimpulan atau catatan"><?= old('kesimpulan_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTindakLanjut" class="col-3 col-form-label col-form-label">Tindak Lanjut:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="inputTindakLanjut" name="tindaklanjut_intervensi" placeholder="Tindak lanjut"><?= old('tindaklanjut_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="inputFile" value="<?= old('file_intervensi'); ?>" name="file_intervensi">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>

                                <!-- EDIT -->
                                <div class="FormEditINS">
                                <?= form_open("Arsip/editINS", ['id' => 'FormEditINS']); ?>
                                    <div class="form-group row">
                                        <label for="KDins" class="col-3 col-form-label col-form-label">Kode Asesment:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="KDins" name="KDins" value="<?= $KDins; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="kd_kat_ins" class="col-3">Kode Kategori</label>
                                        <div class="col-9">
                                            <select name="kd_kat_ins" id="kd_kat_ins" class="form-control">
                                                <option value="">Pilih Kategori</option>
                                                <?php foreach ($datakat as $key => $kategori) : ?>
                                                    <?php $selected = (old('kd_kat_ins') == $kategori['kd_kat']) ? 'selected' : ''; ?>
                                                    <option <?= $selected ?> value="<?= esc($kategori['kd_kat']) ?>"><?= esc($kategori['nama_kat']) ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputIntervensi" class="col-3 col-form-label col-form-label">Judul Intervensi:</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="edit_inputIntervensi" value="<?= old('edit_nama_intervensi'); ?>" name="edit_nama_intervensi" placeholder="Masukkan judul intervensi">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputTglIntervensi" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                        <div class="col-9">
                                            <input type="date" class="form-control" id="edit_inputTglIntervensi" value="<?= old('edit_tgl_intervensi'); ?>" name="edit_tgl_intervensi" placeholder="Masukkan tanggal">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputHasil" class="col-3 col-form-label col-form-label">Hasil Intervensi:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputHasil" name="edit_hasil_intervensi" placeholder="Masukkan hasil intervensi"><?= old('edit_hasil_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputKesimpulan" class="col-3 col-form-label col-form-label">Kesimpulan atau Catatan:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputKesimpulan" name="edit_kesimpulan_intervensi" placeholder="Masukkan kesimpulan atau catatan"><?= old('edit_kesimpulan_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputTindakLanjut" class="col-3 col-form-label col-form-label">Tindak Lanjut:</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="edit_inputTindakLanjut" name="edit_tindaklanjut_intervensi" placeholder="Tindak lanjut"><?= old('edit_tindaklanjut_intervensi'); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edit_inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                        <div class="col-9">
                                            <input type="file" class="form-control-file" id="edit_inputFile" value="<?= old('editfile_intervensi'); ?>" name="editfile_intervensi">
                                        </div>
                                    </div>
                                    <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                    <div class="form-group row">
                                        <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Berita Acara Serah Terima Bantuan -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingSix">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Berita Acara Serah Terima Bantuan
                                </a>
                            </h3>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="accordion-content accordion-desc">
                                <?= form_open(""); ?>
                                <div class="form-group row">
                                    <label for="inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Masukkan tanggal">
                                    </div>
                                </div>
                                <!-- Pihak Penyerah -->
                                <div class="form-group row" id="penyerah1">
                                    <label for="inputPenyerahan" class="col-3 col-form-label">Pihak yang Menyerahkan:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="penyerah[]" placeholder="Pihak yang Menyerahkan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-primary" onclick="tambahPenyerah()">Tambah Pihak Penyerah</button>
                                    </div>
                                </div>
                                <!-- Pihak Penyerah -->
                                <div class="form-group row">
                                    <label for="inputDeskripsiBantuan" class="col-3 col-form-label col-form-label">Deskripsi Bantuan:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="inputDeskripsiBantuan" name="deskripsibantuan" placeholder="Deskripsi Bantuan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputJumlah" class="col-3 col-form-label col-form-label">Jumlah Bantuan:</label>
                                    <div class="col-9">
                                        <input type="number" class="form-control" id="inputbantuan" name="bantuan" placeholder="Masukkan Jumlah Bantuan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputKeterangan" class="col-3 col-form-label col-form-label">Keterangan:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="inputKeterangan" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control-file" id="inputFile" name="lampiran">
                                    </div>
                                </div>
                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- SPJ -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingSeven">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Surat Pertanggung Jawaban
                                </a>
                            </h3>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="accordion-content accordion-desc">
                                <?= form_open(""); ?>
                                <div class="form-group row">
                                    <label for="inputSPJ" class="col-3 col-form-label col-form-label">Nomor SPJ:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputSPJ" name="spj" placeholder="Masukkan nomor SPJ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Masukkan tanggal">
                                    </div>
                                </div>
                                <!-- Pihak Penerima -->
                                <div class="form-group row" id="penerima1">
                                    <label for="inputPenerima" class="col-3 col-form-label">Penerima:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" name="penerima[]" placeholder="Nama penerima">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <button type="button" class="btn btn-primary" onclick="tambahPenerima()">Tambah nama penerima</button>
                                    </div>
                                </div>
                                <!-- Pihak Penerima -->
                                <div class="form-group row">
                                    <label for="inputJumlah" class="col-3 col-form-label col-form-label">Jumlah Pembayaran:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputJumlah" name="jumlah" placeholder="Masukkan jumlah pembayaran">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMetode" class="col-3 col-form-label col-form-label">Metode Pembayaran:</label>
                                    <div class="col-9">
                                        <input type="number" class="form-control" id="inputMetode" name="bantuan" placeholder="Metode Pembayaran">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputKeterangan" class="col-3 col-form-label col-form-label">Keterangan:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="inputKeterangan" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control-file" id="inputFile" name="lampiran">
                                    </div>
                                </div>
                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Dokumentasi -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingSeven">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Dokumentasi
                                </a>
                            </h3>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="accordion-content accordion-desc">
                                <?= form_open(""); ?>
                                <div class="form-group row">
                                    <label for="inputJudul" class="col-3 col-form-label col-form-label">Judul:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputJudul" name="judul" placeholder="Masukkan judul dokumentasi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Masukkan tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTempat" class="col-3 col-form-label col-form-label">Tempat:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputTempat" name="tempat" placeholder="Masukkan nama tempat/lokasi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputKeterangan" class="col-3 col-form-label col-form-label">Keterangan:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="inputKeterangan" name="keterangan" placeholder="Masukkan keterangan"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control-file" id="inputFile" name="lampiran">
                                    </div>
                                </div>
                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END -->

                    <!-- Sumber Informasi -->
                    <div class="accordion-panel">
                        <div class=" accordion-heading" role="tab" id="headingEight">
                            <h3 class="card-title accordion-title">
                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    Sumber Informasi
                                </a>
                            </h3>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="accordion-content accordion-desc">
                                <?= form_open(""); ?>
                                <div class="form-group row">
                                    <label for="inputJudul" class="col-3 col-form-label col-form-label">Judul Proyek/Penelitian:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputJudul" name="judul" placeholder="Masukkan judul proyek/penelitian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDeskripsiSumber" class="col-3 col-form-label col-form-label">Deskripsi Sumber Informasi:</label>
                                    <div class="col-9">
                                        <textarea class="form-control" id="inputDeskripsiSumber" name="deskripsisumber" placeholder="Masukkan deskripsi sumber informasi"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTanggal" class="col-3 col-form-label col-form-label">Tanggal:</label>
                                    <div class="col-9">
                                        <input type="date" class="form-control" id="inputTanggal" name="tanggal" placeholder="Masukkan tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputJenisSumber" class="col-3 col-form-label col-form-label">Jenis Sumber Informasi:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputJenisSumber" name="jenissumber" placeholder="Masukkan jenis sumber informasi (survei, wawancara, data sekunder, dll.)">
                                    </div>
                                </div>

                                <!-- Metode Pengumpulan (survei, observasi, studi literatur, dll) -->
                                <div class="form-group row">
                                    <label for="inputMetode" class="col-3 col-form-label col-form-label">Metode Pengumpulan:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputMetode" name="metode" placeholder="Masukkan metode pengumpulan informasi (survei, observasi, studi literatur, dll)">
                                    </div>
                                </div>
                                <!-- Metode Pengumpulan (survei, observasi, studi literatur, dll) -->

                                <div class="form-group row">
                                    <label for="inputJumlahSumber" class="col-3 col-form-label col-form-label">Jumlah Sumber Informasi:</label>
                                    <div class="col-9">
                                        <input type="text" class="form-control" id="inputJumlahSumber" name="jumlahsumber" placeholder="Masukkan jumlah sumber">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputFile" class="col-3 col-form-label col-form-label">File Lampiran:</label>
                                    <div class="col-9">
                                        <input type="file" class="form-control-file" id="inputFile" name="lampiran">
                                    </div>
                                </div>
                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <div class="form-group row">
                                    <div class="col-sm-8 offset-sm-4 col-md-10 offset-md-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- END -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tambah field -->
<script>
    let pesertaCounter = 1;

    function tambahPeserta() {
        pesertaCounter++;
        let newPesertaDiv = document.createElement('div');
        newPesertaDiv.className = 'form-group row';
        newPesertaDiv.id = 'peserta' + pesertaCounter;
        newPesertaDiv.innerHTML = `
            <label class="col-3 col-form-label">Peserta:</label>
            <div class="col-9">
            <input type="text" class="form-control" name="nama[]" placeholder="Nama">
            <br>
            <input type="text" class="form-control" name="jabatan[]" placeholder="Jabatan">
            <br>
            <input type="text" class="form-control" name="peran[]" placeholder="Peran">
            </div>
        `;
        document.getElementById('peserta' + (pesertaCounter - 1)).insertAdjacentElement('afterend', newPesertaDiv);
    }

    let PenerimaCounter = 1;

    function tambahPenerima() {
        PenerimaCounter++;
        let newPenerimaDiv = document.createElement('div');
        newPenerimaDiv.className = 'form-group row';
        newPenerimaDiv.id = 'Penerima' + PenerimaCounter;
        newPenerimaDiv.innerHTML = `
        <label class="col-3 col-form-label">Pihak Penerima:</label>
        <div class="col-9">
            <input type="text" class="form-control" name="Penerima[]" placeholder="Pihak yang Menyerahkan">
        </div>
    `;
        document.getElementById('Penerima' + (PenerimaCounter - 1)).insertAdjacentElement('afterend', newPenerimaDiv);
    }

    let penyerahCounter = 1;

    function tambahPenyerah() {
        penyerahCounter++;
        let newPenyerahDiv = document.createElement('div');
        newPenyerahDiv.className = 'form-group row';
        newPenyerahDiv.id = 'penyerah' + penyerahCounter;
        newPenyerahDiv.innerHTML = `
        <label class="col-3 col-form-label">Pihak Penyerah:</label>
        <div class="col-9">
            <input type="text" class="form-control" name="penyerah[]" placeholder="Pihak yang Menyerahkan">
        </div>
    `;
        document.getElementById('penyerah' + (penyerahCounter - 1)).insertAdjacentElement('afterend', newPenyerahDiv);
    }
</script>

<?= $this->section('js'); ?>
<script>
    $(document).ready(function() {
        $("#FormTambahSKPB").hide();
        $("#FormTambahRAB").hide();
        $("#FormTambahASM").hide();

        $("#FormEditSKPB").hide();
        $("#FormEditRAB").hide();
        $("#FormEditASM").hide();

        $("#TabelSKPB").hide();
        $("#TabelRAB").hide();
        $("#TabelASM").hide();

        $("#error-message-anggaran").hide();
        $("#error-message-Eanggaran").hide();
        $("#preview_file_identitas").hide();

        $("#TambahRAB").click(function() {
            $("#FormTambahRAB").show();
            $("#FormEditRAB").hide();
            $("#FormTabelRAB").hide();
            $("#TambahRAB").hide();
            $("#TabelRAB").show();
        });

        $("#TambahASM").click(function() {
            $("#FormTambahASM").show();
            $("#FormEditASM").hide();
            $("#FormTabelASM").hide();
            $("#TambahASM").hide();
            $("#TabelASM").show();
        });

        $("#TabelASM").click(function() {
            $("#FormTambahASM").hide();
            $("#FormEditASM").hide();
            $("#FormTabelASM").show();
            $("#TambahASM").show();
            $("#TabelASM").hide();
        });

        $("#TabelRAB").click(function() {
            $("#FormTambahRAB").hide();
            $("#FormEditRAB").hide();
            $("#FormTabelRAB").show();
            $("#TambahRAB").show();
            $("#TabelRAB").hide();
        });

        // Event listener untuk tombol "Tambah Data"
        $("#TambahSKPB").click(function() {
            $("#FormTabelSKPB").hide();
            $("#FormTambahSKPB").show();
            $("#TambahSKPB").hide();
            $("#TabelSKPB").show();
        });

        // Event listener untuk tombol "Tabel"
        $("#TabelSKPB").click(function() {
            $("#FormTabelSKPB").show();
            $("#FormTambahSKPB").hide();
            $("#TambahSKPB").show();
            $("#TabelSKPB").hide();
            $('#FormEditSKPB').hide();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#besar_bantuan').on('keypress', function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                $('#error-message-bantuan').show();
                $(this).addClass('form-control-danger');
                return false;
            }

            $('#error-message-bantuan').hide();
            $(this).removeClass('form-control-danger');
        });
    });

    $(document).ready(function() {
        $('#inputAnggaran').on('input', function(event) {
            // Menghapus karakter selain angka
            $(this).val($(this).val().replace(/[^0-9]/g, ''));

            // Menampilkan pesan kesalahan jika anggaran tidak valid
            if ($(this).val() === '') {
                $('#error-message-anggaran').show();
                $(this).addClass('form-control-danger');
            } else {
                $('#error-message-anggaran').hide();
                $(this).removeClass('form-control-danger');
            }
        });
    });

    $(document).ready(function() {
        $('#edit_inputAnggaran').on('input', function(event) {
            // Menghapus karakter selain angka
            $(this).val($(this).val().replace(/[^0-9]/g, ''));

            // Menampilkan pesan kesalahan jika anggaran tidak valid
            if ($(this).val() === '') {
                $('#error-message-Eanggaran').show();
                $(this).addClass('form-control-danger');
            } else {
                $('#error-message-Eanggaran').hide();
                $(this).removeClass('form-control-danger');
            }
        });
    });
    $(document).ready(function() {
        $('#inputUsia').on('input', function(event) {
            // Menghapus karakter selain angka
            $(this).val($(this).val().replace(/[^0-9]/g, ''));

            // Menampilkan pesan kesalahan jika anggaran tidak valid
            if ($(this).val() === '') {
                $('#error-message-usia').removeClass('d-none');
                $(this).addClass('form-control-danger');
            } else {
                $('#error-message-usia').addClass('d-none');
                $(this).removeClass('form-control-danger');
            }
        });
    });

    $(document).ready(function() {
        $('#nomor_identifikasi').on('input', function() {
            var value = $(this).val();
            var charLength = value.length;
            if (charLength < 16) {
                $('#error-message-length').show();
                $(this).addClass('form-control-danger');
            } else {
                $('#error-message-length').hide();
                $(this).removeClass('form-control-danger');
            }
        });

        $('#nomor_identifikasi').on('keypress', function(event) {
            var charCode = (event.which) ? event.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {

                $('#error-message-nama').show();
                $(this).addClass('form-control-danger');
                return false;
            }

            $('#error-message-nama').hide();
            $(this).removeClass('form-control-danger');
        });
    });

    $(document).ready(function() {
        $('#file_identitas').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_file_identitas').attr('src', e.target.result);
                    $('#preview_file_identitas').show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    $(document).ready(function() {
        $('#edit_file_identitas').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#new_preview_file_identitas').attr('src', e.target.result);
                    $('#new_preview_file_identitas').show(); // Menampilkan pratinjau gambar
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    $(document).ready(function() {
        $('#inputFile').change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#preview_file_rab').attr('src', e.target.result);
                    $('#preview_file_rab').show(); // Menampilkan pratinjau gambar

                    // Memperoleh ekstensi file yang diunggah
                    var ext = input.files[0].name.split('.').pop().toLowerCase();

                    // Menentukan gambar pratinjau berdasarkan ekstensi file
                    if (ext == 'docx' || ext == 'doc') {
                        $('#preview_file_rab').attr('src', '<?= base_url('webkantor/assets/images/word.png') ?>'); // Ganti path_to_docx_image dengan path gambar untuk docx
                    } else if (ext == 'xlsx') {
                        $('#preview_file_rab').attr('src', '<?= base_url('webkantor/assets/images/exel.png') ?>'); // Ganti path_to_xlsx_image dengan path gambar untuk xlsx
                    } else if (ext == 'pdf') {
                        $('#preview_file_rab').attr('src', '<?= base_url('webkantor/assets/images/pdf.png') ?>'); // Ganti path_to_pdf_image dengan path gambar untuk pdf
                    } else {
                        $('#preview_file_rab').hide(); // Sembunyikan gambar pratinjau jika ekstensi tidak didukung
                    }
                }
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    // RAB EDIT
    function editRAB(kd_rab) {
        $.ajax({
            url: 'Arsip/ambil_data_rab',
            method: 'POST',
            dataType: 'json',
            data: {
                kd_rab: kd_rab
            },
            success: function(response) {
                if (response) {


                    var fileExtension = response.file_rab.split('.').pop().toLowerCase();
                    var iconUrl;

                    // Menentukan ikon yang sesuai berdasarkan ekstensi file
                    switch (fileExtension) {
                        case 'xlsx':
                        case 'xls':
                            iconUrl = '<?= base_url('webkantor/assets/images/exel.png') ?>';
                            break;
                        case 'docx':
                        case 'doc':
                            iconUrl = '<?= base_url('webkantor/assets/images/word.png') ?>';
                            break;
                        case 'pdf':
                            iconUrl = '<?= base_url('webkantor/assets/images/pdf.png') ?>';
                            break;
                        default:
                            iconUrl = '<?= base_url('webkantor/assets/images/default.png') ?>'; // Jika ekstensi tidak dikenali, tampilkan ikon default
                    }

                    // Isi formulir dengan data yang diterima dari server
                    $('#edit_kdRAB').val(response.kd_rab);
                    $('#edit_inputKegiatan').val(response.nama_kegiatan);
                    $('#edit_kat_rab').val(response.kd_kat);
                    $('#old_preview_file_rab').attr('src', iconUrl);
                    $('#edit_inputTahun').val(response.kd_periode);
                    $('#edit_inputAnggaran').val(response.anggaran)
                    $('#edit_inputDeskripsi').val(response.deskripsi);
                    // Lanjutkan dengan mengisi input lainnya sesuai kebutuhan

                    // Set action formulir
                    $('#FormEditRAB').attr('action', 'Arsip/editRAB/' + response.kd_rab);
                    // Tampilkan formulir edit
                    $('#FormEditRAB').show();
                    $('#TambahRAB').hide();
                    $('#TabelRAB').show();
                    $('#FormTabelRAB').hide();
                    $('#new_preview_file_rab').hide();

                    // Tampilkan ikon sesuai dengan ekstensi file
                    $('#file_icon').attr('src', iconUrl);
                } else {
                    // Tampilkan pesan kesalahan jika data tidak ditemukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan!'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat mengambil data!'
                });
                console.error(xhr.responseText);
            }
        });
    }

    //  SKB EDIT
    function editSKPB(kd_skpb) {
        $.ajax({
            url: 'Arsip/ambil_data_skpb',
            method: 'POST',
            dataType: 'json',
            data: {
                kd_skpb: kd_skpb
            },
            success: function(response) {
                if (response) {

                    var fotoUrl = '<?= base_url('upload/skpb/') ?>' + response.foto_identifikasi;
                    // Isi formulir dengan data yang diterima dari server
                    $('#edit_kd_skpb').val(response.kd_skpb);
                    $('#edit_nama').val(response.nama_lengkap);
                    $('#edit_nomor_identifikasi').val(response.no_identifikasi);
                    $('#edit_kd_kat').val(response.kd_kat);
                    $('#old_preview_file_identitas').attr('src', fotoUrl);
                    $('#edit_alamat').val(response.alamat)
                    $('#edit_jenis_bantuan').val(response.jns_bantuan);
                    $('#edit_besar_bantuan').val(response.jmlh_bantuan);
                    $('#edit_periode_bantuan').val(response.kd_periode);
                    // Lanjutkan dengan mengisi input lainnya sesuai kebutuhan

                    // Set action formulir
                    $('#FormEditSKPB').attr('action', 'Arsip/editSKPB/' + response.kd_skpb);
                    // Tampilkan formulir edit
                    $('#FormEditSKPB').show();
                    $('#TambahSKPB').hide();
                    $('#TabelSKPB').show();
                    $('#FormTabelSKPB').hide();
                    $('#new_preview_file_identitas').hide();
                } else {
                    // Tampilkan pesan kesalahan jika data tidak ditemukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan!'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat mengambil data!'
                });
                console.error(xhr.responseText);
            }
        });
    }

    // ASM EDIT
    function editASM(kd_asm) {
        $.ajax({
            url: 'Arsip/ambil_data_asm',
            method: 'POST',
            dataType: 'json',
            data: {
                kd_asm: kd_asm
            },
            success: function(response) {
                if (response) {

                    // Isi formulir dengan data yang diterima dari server
                    $('#edit_kat_asm').val(response.kd_kat);
                    $('#edit_kdASM').val(response.kd_asesment);
                    $('#edit_inputNama').val(response.nama_asesment);
                    $('#edit_inputUsia').val(response.usia);
                    $('#edit_inputHasil').val(response.hasil_asesment);
                    $('#edit_inputKeterangan').val(response.keterangan)
                    // Lanjutkan dengan mengisi input lainnya sesuai kebutuhan

                    // Set action formulir
                    $('#FormEditASM').attr('action', 'Arsip/editASM/' + response.kd_asm);
                    // Tampilkan formulir edit
                    $('#FormEditASM').show();
                    $('#TambahASM').hide();
                    $('#TabelASM').show();
                    $('#FormTabelASM').hide();

                } else {
                    // Tampilkan pesan kesalahan jika data tidak ditemukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan!'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat mengambil data!'
                });
                console.error(xhr.responseText);
            }
        });
    }

    // TBK EDIT
    function editTBK(kd_tbk) {
        $.ajax({
            url: 'Arsip/ambil_data_tbk',
            method: 'POST',
            dataType: 'json',
            data: {
                kd_tbk: kd_tbk
            },
            success: function(response) {
                if (response) {

                    // Isi formulir dengan data yang diterima dari server
                    $('#edit_kdTBK').val(response.kd_tbk);
                    $('#edit_kat_tbk').val(response.kd_kat);
                    $('#edit_inputKasus').val(response.nama_tbk);
                    $('#edit_inputTanggal').val(response.tgl_kasus);
                    $('#edit_inputNama').val(response.nama_peserta);
                    $('#edit_inputJabatan').val(response.jabatan_peserta);
                    $('#edit_inputPeran').val(response.peran_peserta);
                    $('#edit_inputDeskripsiKasus').val(response.deskripsi)
                    $('#edit_inputRekomendasi').val(response.rekomendasi)
                    $('#edit_inputTindakLanjut').val(response.tindaklanjut)
                    $('#edit_inputKesimpulan').val(response.kesimpulan)
                    $('#edit_inputFile').val(response.tbk_file)
                    // Lanjutkan dengan mengisi input lainnya sesuai kebutuhan

                    // Set action formulir
                    $('#FormEditTBK').attr('action', 'Arsip/editTBK/' + response.kd_tbk);
                    // Tampilkan formulir edit
                    $('#FormEditTBK').show();
                    $('#TambahTBK').hide();
                    $('#TabelTBK').show();
                    $('#FormTabelTBK').hide();

                } else {
                    // Tampilkan pesan kesalahan jika data tidak ditemukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan!'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat mengambil data!'
                });
                console.error(xhr.responseText);
            }
        });
    }

    // INS EDIT
    function editTBK(kd_ins) {
        $.ajax({
            url: 'Arsip/ambil_data_ins',
            method: 'POST',
            dataType: 'json',
            data: {
                kd_ins: kd_ins
            },
            success: function(response) {
                if (response) {

                    // Isi formulir dengan data yang diterima dari server
                    $('#edit_kat_ins').val(response.kd_kat);
                    $('#edit_kdINS').val(response.kd_asesment);
                    $('#edit_inputNama').val(response.nama_asesment);
                    $('#edit_inputUsia').val(response.usia);
                    $('#edit_inputHasil').val(response.hasil_asesment);
                    $('#edit_inputKeterangan').val(response.keterangan)
                    // Lanjutkan dengan mengisi input lainnya sesuai kebutuhan

                    // Set action formulir
                    $('#FormEditINS').attr('action', 'Arsip/editINS/' + response.kd_ins);
                    // Tampilkan formulir edit
                    $('#FormEditINS').show();
                    $('#TambahINS').hide();
                    $('#TabelINS').show();
                    $('#FormTabelINS').hide();

                } else {
                    // Tampilkan pesan kesalahan jika data tidak ditemukan
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data tidak ditemukan!'
                    });
                }
            },
            error: function(xhr, status, error) {
                // Tampilkan pesan kesalahan jika terjadi kesalahan AJAX
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi kesalahan saat mengambil data!'
                });
                console.error(xhr.responseText);
            }
        });
    }

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
                    url: '<?= base_url('Arsip/hapusSKPB/') ?>' + kode,
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

    function deleteRAB(kode) {
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
                    url: '<?= base_url('Arsip/hapusRAB/') ?>' + kode,
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