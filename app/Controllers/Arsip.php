<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Arsip extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Data Arsip',
            'menu'      => 'Data Arsip',
            'submenu'   => 'Data Arsip',
            'datakat'   => $this->kat->getAll(),
            'dataperiode' => $this->periode->Alldata(),

            'tableskpb' => $this->skpb->Alldata(),
            'KDskpb'    => $this->skpb->KDskpb(),

            'tableasm' => $this->asm->Alldata(),
            'KDasm'    => $this->asm->KDasm(),

            'tablerab' => $this->rab->Alldata(),
            'KDrab'    => $this->rab->KDrab(),

            'tabletbk' => $this->tbk->Alldata(),
            'KDtbk'    => $this->tbk->KDtbk(),

            'tableins' => $this->ins->Alldata(),
            'KDins'    => $this->ins->KDins(),

        ];
        return view('admin/darsip', $data);
    }

    public function ambil_data_skpb()
    {
        $kd_skpb = $this->request->getPost('kd_skpb');
        $data_skpb = $this->skpb->getSkpbByKd($kd_skpb);
        return $this->response->setJSON($data_skpb);
    }

    public function ambil_data_rab()
    {
        $kd_rab = $this->request->getPost('kd_rab');
        $data_rab = $this->rab->getRabByKd($kd_rab);
        return $this->response->setJSON($data_rab);
    }

    public function ambil_data_asm()
    {
        $kd_asm = $this->request->getPost('kd_asm');
        $data_asm = $this->asm->getAsmByKd($kd_asm);
        return $this->response->setJSON($data_asm);
    }

    public function ambil_data_tbk()
    {
        $kd_tbk = $this->request->getPost('kd_tbk');
        $data_tbk = $this->tbk->getTbkByKd($kd_tbk);
        return $this->response->setJSON($data_tbk);
    }

    public function ambil_data_ins()
    {
        $kd_ins = $this->request->getPost('kd_ins');
        $data_ins = $this->ins->getInsByKd($kd_ins);
        return $this->response->setJSON($data_ins);
    }

    public function ambil_data_bast()
    {
        $kd_bast = $this->request->getPost('kd_bast');
        $data_bast = $this->bast->getBastByKd($kd_bast);
        return $this->response->setJSON($data_bast);
    }

    public function ambil_data_spj()
    {
        $kd_spj = $this->request->getPost('kd_spj');
        $data_spj = $this->spj->getSpjByKd($kd_spj);
        return $this->response->setJSON($data_spj);
    }
    public function ambil_data_dos()
    {
        $kd_dos = $this->request->getPost('kd_dos');
        $data_dos = $this->dos->getDosByKd($kd_dos);
        return $this->response->setJSON($data_dos);
    }
    public function ambil_data_sui()
    {
        $kd_sui = $this->request->getPost('kd_sui');
        $data_sui = $this->sui->getSuiByKd($kd_sui);
        return $this->response->setJSON($data_sui);
    }

    // SKPB
    public function tambahSKPB()
    {
        $validate = [
            'kd_skpb'  => [
                'label'     => 'Kode SKPB',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'kd_kat'  => [
                'label'     => 'Kode Kategori',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nama_lengkap'  => [
                'label'     => 'Nama Lengkap',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'nomor_identifikasi' => [
                'label'     => 'Nomor Identifikasi',
                'rules'     => 'required|max_length[16]|min_length[16]|is_numeric|is_unique[tbl_skpb.no_identifikasi]',
                'errors'    => [
                    'required'      => '{field} harus diisi.',
                    'is_numeric'    => '{field} hanya disiikan angka saja',
                    'min_length'    => '{field} Minimal 16 Karakter',
                    'max_length'    => '{field} Maksimal 16 Karakter',
                    'is_unique'     => '{field} Nomor identifikasi Sudah ada'
                ]
            ],
            'alamat'        => [
                'label'     => 'Alamat',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'jns_bantuan'        => [
                'label'     => 'Jenis Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus dipilih.',
                ]
            ],
            'besar_bantuan'        => [
                'label'     => 'Besar Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'besar_bantuan'        => [
                'label'     => 'Besar Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'periode_bantuan'        => [
                'label'     => 'Periode Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus dipilih.',
                ]
            ],
            'file_identitas' => [
                'label' => 'File Identitas',
                'rules' => 'uploaded[file_identitas]|max_size[file_identitas,1024]|mime_in[file_identitas,image/jpg,image/jpeg,image/png]|is_image[file_identitas]',
                'errors' => [
                    'uploaded' => 'Pilih gambar untuk diunggah',
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 1MB',
                    'mime_in' => 'Format file yang diunggah harus berupa JPG, JPEG, atau PNG',
                    'is_image' => 'File yang diunggah bukan gambar'
                ]
            ]

        ];

        $kode_skpb          = $this->request->getVar('kd_skpb');
        $kd_kat             = $this->request->getVar('kd_kat');
        $namaLengkap        = $this->request->getVar('nama_lengkap');
        $nomorIdentifikasi  = $this->request->getVar('nomor_identifikasi');
        $alamat             = $this->request->getVar('alamat');
        $jenisBantuan       = $this->request->getVar('jns_bantuan');
        $besarBantun        = $this->request->getVar('besar_bantuan');
        $periodeBantuan     = $this->request->getVar('periode_bantuan');
        $fileIdentitas      = $this->request->getFile('file_identitas');

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            // Pindahkan file gambar
            $newFileName = $kode_skpb . '_' . $namaLengkap . '_fileIdentitas.jpg';


            $data = [
                'kd_skpb'           => $kode_skpb,
                'kd_kat'            => $kd_kat,
                'nama_lengkap'      => $namaLengkap,
                'no_identifikasi'   => $nomorIdentifikasi,
                'foto_identifikasi' => $newFileName,
                'alamat'            => $alamat,
                'jns_bantuan'       => $jenisBantuan,
                'jmlh_bantuan'      => $besarBantun,
                'kd_periode'        => $periodeBantuan,
            ];

            $this->skpb->insert($data);

            $fileIdentitas->move('upload/skpb', $newFileName);
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editSKPB($kd_skpb)
    {
        $nomorIdentifikasi  = $this->request->getVar('edit_nomor_identifikasi');

        $skpbData = $this->skpb->find($kd_skpb);

        // Mendapatkan tahun lama dari data yang ada jika tersedia
        $nomor_identitaslama = ($skpbData != null) ? $skpbData['no_identifikasi'] : null;

        $validate = [
            'edit_kd_skpb'  => [
                'label'     => 'Kode SKPB',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'edit_kd_kat'  => [
                'label'     => 'Kode Kategori',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'edit_nama_lengkap'  => [
                'label'     => 'Nama Lengkap',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'edit_nomor_identifikasi' => [
                'label'     => 'Nomor Identifikasi',
                'rules'     => ($nomor_identitaslama == $nomorIdentifikasi) ? 'required|max_length[16]|min_length[16]|is_numeric' : 'required|max_length[16]|min_length[16]|is_numeric|is_unique[tbl_skpb.no_identifikasi]',
                'errors'    => [
                    'required'      => '{field} harus diisi.',
                    'is_numeric'    => '{field} hanya disiikan angka saja',
                    'min_length'    => '{field} Minimal 16 Karakter',
                    'max_length'    => '{field} Maksimal 16 Karakter',
                    'is_unique'     => '{field} Nomor identifikasi Sudah ada'
                ]
            ],
            'edit_alamat'        => [
                'label'     => 'Alamat',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'edit_jns_bantuan'        => [
                'label'     => 'Jenis Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus dipilih.',
                ]
            ],
            'edit_besar_bantuan'        => [
                'label'     => 'Besar Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'edit_periode_bantuan'        => [
                'label'     => 'Periode Bantuan',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus dipilih.',
                ]
            ],
            'edit_file_identitas' => [
                'label' => 'File Identitas',
                'rules' => 'max_size[edit_file_identitas,1024]|mime_in[edit_file_identitas,image/jpg,image/jpeg,image/png]|is_image[edit_file_identitas]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh melebihi 1MB',
                    'mime_in' => 'Format file yang diunggah harus berupa JPG, JPEG, atau PNG',
                    'is_image' => 'File yang diunggah bukan gambar'
                ]
            ]
        ];

        $kd_kat             = $this->request->getVar('edit_kd_kat');
        $namaLengkap        = $this->request->getVar('edit_nama_lengkap');
        $alamat             = $this->request->getVar('edit_alamat');
        $jenisBantuan       = $this->request->getVar('edit_jns_bantuan');
        $besarBantun        = $this->request->getVar('edit_besar_bantuan');
        $periodeBantuan     = $this->request->getVar('edit_periode_bantuan');
        $fileIdentitas      = $this->request->getFile('edit_file_identitas');

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $oldFileName = $skpbData['foto_identifikasi'];

            if ($fileIdentitas->isValid() && !$fileIdentitas->hasMoved()) {
                if (file_exists('upload/skpb/' . $oldFileName)) {
                    unlink('upload/skpb/' . $oldFileName);
                    session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
                }

                $newFileName = $kd_skpb . '_' . $namaLengkap . '_fileIdentitas.jpg';
                $fileIdentitas->move('upload/skpb', $newFileName);
            } else {
                $newFileName = $oldFileName;
            }

            // Siapkan data untuk disimpan ke database
            $data = [
                'kd_kat'            => $kd_kat,
                'nama_lengkap'      => $namaLengkap,
                'no_identifikasi'   => $nomorIdentifikasi,
                'foto_identifikasi' => $newFileName,
                'alamat'            => $alamat,
                'jns_bantuan'       => $jenisBantuan,
                'jmlh_bantuan'      => $besarBantun,
                'kd_periode'        => $periodeBantuan,
            ];

            // Perbarui data SKPB di database
            $this->skpb->update($kd_skpb, $data);
            session()->setFlashdata('success', "Data $namaLengkap diupdate");
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusSKPB($kd_skpb)
    {

        $skpbData = $this->skpb->find($kd_skpb);

        $datafoto = $skpbData['foto_identifikasi'];

        if (file_exists('upload/skpb/' . $datafoto)) {
            unlink('upload/skpb/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->skpb->delete($kd_skpb);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // RAB
    public function tambahRAB()
    {
        $kd_rab         = $this->request->getVar('kd_rab');
        $kd_kat         = $this->request->getVar('kd_kat_rab');
        $nama_kegiatan  = $this->request->getVar('kegiatan');
        $tahun          = $this->request->getVar('tahun');
        $anggaran       = $this->request->getVar('anggaran');
        $deskripsi      = $this->request->getVar('deskripsi');
        $file_rab       = $this->request->getFile('file_rab');

        $validate = [

            'kd_rab' => [
                'label' => 'Kode RAB',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'tahun' => [
                'label' => 'Tahun Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'file_rab' => [
                'label' => 'Upload File RAB',
                'rules' => 'uploaded[file_rab]|max_size[file_rab,1024]|mime_in[file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'uploaded'   => 'Pilih file yang akan diupload',
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $extensi_file = $file_rab->getExtension();
            $newFileName = $kd_rab . '_' . $nama_kegiatan . '.' . $extensi_file;

            $data = [
                'kd_rab'        => $kd_rab,
                'kd_kat'        => $kd_kat,
                'nama_kegiatan' => $nama_kegiatan,
                'kd_periode'    => $tahun,
                'anggaran'      => $anggaran,
                'deskripsi'     => $deskripsi,
                'file_rab'      => $newFileName,
            ];

            $this->rab->insert($data);

            $file_rab->move('upload/rab', $newFileName);

            session()->setFlashdata('success', ' Data RAB berhasil ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editRAB($kd_rab)
    {

        $rabData = $this->rab->find($kd_rab);

        $kd_rab         = $this->request->getVar('edit_kd_rab');
        $kd_kat         = $this->request->getVar('edit_kat_rab');
        $nama_kegiatan  = $this->request->getVar('edit_kegiatan');
        $tahun          = $this->request->getVar('edit_tahun');
        $anggaran       = $this->request->getVar('edit_anggaran');
        $deskripsi      = $this->request->getVar('edit_deskripsi');
        $file_rab       = $this->request->getFile('edit_file_rab');

        $validate = [

            'edit_kd_rab' => [
                'label' => 'Kode RAB',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_tahun' => [
                'label' => 'Tahun Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_file_rab' => [
                'label' => 'Upload File RAB',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $oldFileName = $rabData['file_rab'];

            if ($file_rab->isValid() && !$file_rab->hasMoved()) {
                if (file_exists('upload/rab/' . $oldFileName)) {
                    unlink('upload/rab/' . $oldFileName);
                    session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
                }

                $newFileName = $kd_rab . '_' . $nama_kegiatan . '_fileIdentitas.jpg';
                $file_rab->move('upload/rab', $newFileName);
            } else {
                $newFileName = $oldFileName;
            }

            $data = [
                'kd_rab'        => $kd_rab,
                'kd_kat'        => $kd_kat,
                'nama_kegiatan' => $nama_kegiatan,
                'kd_periode'    => $tahun,
                'anggaran'      => $anggaran,
                'deskripsi'     => $deskripsi,
                'file_rab'      => $newFileName,
            ];

            $this->rab->update($kd_rab, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusRAB($kd_rab)
    {
        $rabData = $this->rab->find($kd_rab);

        $datafoto = $rabData['file_rab'];

        if (file_exists('upload/rab/' . $datafoto)) {
            unlink('upload/rab/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->rab->delete($kd_rab);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // ASM
    public function tambahASM()
    {
        $kd_asm = $this->request->getVar('KDasm');
        $nama = $this->request->getVar('nama');
        $kd_kat = $this->request->getVar('kd_kat_asm');
        $usia = $this->request->getVar('usia');
        $hasil = $this->request->getVar('hasil');
        $keterangan = $this->request->getVar('keterangan');

        $validate = [

            'KDasm' => [
                'label' => 'Kode Asesment',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_asm' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'usia' => [
                'label' => 'Usia',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'hasil' => [
                'label' => 'Hasil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'kd_asesment'   => $kd_asm,
                'kd_kat'        => $kd_kat,
                'nama_asesment' => $nama,
                'usia'          => $usia,
                'hasil_asesment' => $hasil,
                'keterangan'    => $keterangan
            ];

            $this->asm->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editASM($kd_asm)
    {

        $asmData = $this->asm->find($kd_asm);

        $kd_asesment       = $this->request->getVar('edit_KDasm');
        $kd_kat            = $this->request->getVar('edit_kat_asm');
        $nama_asesment     = $this->request->getVar('edit_nama');
        $usia              = $this->request->getVar('edit_usia');
        $hasil_asesment    = $this->request->getVar('edit_hasil');
        $keterangan        = $this->request->getVar('edit_keterangan');
        $file_asesment     = $this->request->getFile('edit_file_asesment');

        $validate = [

            'edit_KDasm' => [
                'label' => 'Kode RAB',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_kat_asm' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_nama' => [
                'label' => 'Nama Asesment',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_usia' => [
                'label' => 'Usia',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_hasil' => [
                'label' => 'Hasil Asesment',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
            'edit_keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
            'edit_file_asesment' => [
                'label' => 'File',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            // $oldFileName = $asmData['file_asm'];

            // if ($file_asesment->isValid() && !$file_asesment->hasMoved()) {
            //     if (file_exists('upload/asm/' . $oldFileName)) {
            //         unlink('upload/asm/' . $oldFileName);
            //         session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
            //     }

            //     $newFileName = $kd_asesment . '_' . $nama_asesment . '_fileIdentitas.jpg';
            //     $file_asesment->move('upload/asm', $newFileName);
            // } else {
            //     $newFileName = $oldFileName;
            // }

            $data = [
                'KDasm'         => $kd_asm,
                'kd_kat_asm'    => $kd_kat,
                'nama'          => $nama_asesment,
                'usia'          => $usia,
                'hasil'         => $hasil_asesment,
                'keterangan'    => $keterangan,
                'file_asesment' => $file_asesment,
            ];

            $this->asm->update($kd_asm, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusASM($kd_asm)
    {
        $asmData = $this->asm->find($kd_asm);

        $datafoto = $asmData['file_asm'];

        if (file_exists('upload/asm/' . $datafoto)) {
            unlink('upload/asm/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->asm->delete($kd_asm);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // TBK
    public function tambahTBK()
    {
        $kd_tbk = $this->request->getVar('KDtbk');
        $kd_kat = $this->request->getVar('kd_kat_tbk');
        $nama_tbk = $this->request->getVar('kasus');
        $tgl_kasus = $this->request->getVar('tanggal');
        $nama_peserta = $this->request->getVar('tbk_nama');
        $jabatan_peserta = $this->request->getVar('tbk_jabatan');
        $peran_peserta = $this->request->getVar('tbk_peran');
        $deskripsi = $this->request->getVar('deskripsikasus');
        $rekomendasi = $this->request->getVar('rekomendasi');
        $tindaklanjut = $this->request->getVar('tindaklanjut');
        $kesimpulan = $this->request->getVar('kesimpulan');
        $tbk_file = $this->request->getVar('tbk_file');

        $validate = [

            'KDtbk' => [
                'label' => 'Kode Temu Bahas Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_tbk' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kasus' => [
                'label' => 'Nama Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'tanggal' => [
                'label' => 'Tanggal Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'tbk_nama' => [
                'label' => 'Nama Peserta',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tbk_jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tbk_peran' => [
                'label' => 'Peran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'deskripsikasus' => [
                'label' => 'Deksripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'rekomendasi' => [
                'label' => 'Rekomendasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tindaklanjut' => [
                'label' => 'Tindak Lanjut',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'kesimpulan' => [
                'label' => 'Kesimpulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tbk_file' => [
                'label' => 'File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'KDtbk'             => $kd_tbk,
                'kd_kat_tbk'        => $kd_kat,
                'kasus'             => $nama_tbk,
                'tanggal'           => $tgl_kasus,
                'tbk_nama'          => $nama_peserta,
                'tbk_jabatan'       => $jabatan_peserta,
                'tbk_peran'         => $peran_peserta,
                'deskripsikasus'    => $deskripsi,
                'rekomendasi'       => $rekomendasi,
                'tindaklanjut'      => $tindaklanjut,
                'kesimpulan'        => $kasimpulan,
                'tbk_file'          => $tbk_file,
            ];

            $this->tbk->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editTBK($kd_tbk)
    {

        $tbkData = $this->tbk->find($kd_tbk);

        $kd_tbk = $this->request->getVar('edit_KDtbk');
        $kd_kat = $this->request->getVar('edit_kat_tbk');
        $nama_tbk = $this->request->getVar('edit_kasus');
        $tgl_kasus = $this->request->getVar('edit_tanggal');
        $nama_peserta = $this->request->getVar('edit_tbk_nama');
        $jabatan_peserta = $this->request->getVar('edit_tbk_jabatan');
        $peran_peserta = $this->request->getVar('edit_tbk_peran');
        $deskripsi = $this->request->getVar('edit_deskripsikasus');
        $rekomendasi = $this->request->getVar('edit_rekomendasi');
        $tindaklanjut = $this->request->getVar('edit_tindaklanjut');
        $kesimpulan = $this->request->getVar('edit_kesimpulan');
        $tbk_file = $this->request->getVar('edit_tbk_file');

        $validate = [

            'edit_KDtbk' => [
                'label' => 'Kode Temu Bahas Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'edit_kat_tbk' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'edit_kasus' => [
                'label' => 'Nama Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'edit_tanggal' => [
                'label' => 'Tanggal Kasus',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'edit_tbk_nama' => [
                'label' => 'Nama Peserta',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tbk_jabatan' => [
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tbk_peran' => [
                'label' => 'Peran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_deskripsikasus' => [
                'label' => 'Deksripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_rekomendasi' => [
                'label' => 'Rekomendasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tindaklanjut' => [
                'label' => 'Tindak Lanjut',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_kesimpulan' => [
                'label' => 'Kesimpulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tbk_file' => [
                'label' => 'File',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            // $oldFileName = $tbkData['tbk_file'];

            $data = [
                'KDtbk'             => $kd_tbk,
                'kd_kat'            => $kd_kat,
                'kasus'             => $nama_tbk,
                'tanggal'           => $tgl_kasus,
                'nama_peserta'      => $nama_peserta,
                'jabatan_peserta'   => $jabatan_peserta,
                'peran_peserta'     => $peran_peserta,
                'deskripsikasus'    => $deskripsi,
                'rekomendasi'       => $rekomendasi,
                'tindaklanjut'      => $tindaklanjut,
                'kesimpulan'        => $kesimpulan,
                'tbk_file'          => $tbk_file,
            ];

            $this->tbk->update($kd_tbk, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusTBK($kd_tbk)
    {
        $tbkData = $this->tbk->find($kd_tbk);

        $tbk_file = $tbkData['tbk_file'];

        // if (file_exists('upload/tbk/' . $datafoto)) {
        //     unlink('upload/tbk/' . $datafoto);
        //     session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        // }

        $this->tbk->delete($kd_tbk);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // INS
    public function tambahINS()
    {
        $kd_ins = $this->request->getVar('KDins');
        $kd_kat = $this->request->getVar('kd_kat_ins');
        $nama_intervensi = $this->request->getVar('nama_intervensi');
        $tgl_intervensi = $this->request->getVar('tgl_intervensi');
        $hasil_intervensi = $this->request->getVar('hasil_intervensi');
        $kesimpulan_intervensi = $this->request->getVar('kesimpulan_intervensi');
        $tindaklanjut_intervensi = $this->request->getVar('tindaklanjut_intervensi');
        $file_intervensi = $this->request->getVar('file_intervensi');

        $validate = [

            'KDins' => [
                'label' => 'Kode intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_ins' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'nama_intervensi' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'tgl_intervensi' => [
                'label' => 'Tanggal Intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'hasil_intervensi' => [
                'label' => 'Hasil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'kesimpulan_intervensi' => [
                'label' => 'Kesimpulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tindaklanjut_intervensi' => [
                'label' => 'Tindak Lanjut',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'file_intervensi' => [
                'label' => 'File_intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'KDins'                     => $kd_ins,
                'kd_kat_ins'                => $kd_kat,
                'nama_intervensi'           => $nama_intervensi,
                'tgl_intervensi'            => $tgl_intervensi,
                'hasil_intervensi'          => $hasil_intervensi,
                'kesimpulan_intervensi'     => $kesimpulan_intervensi,
                'tindaklanjut_intervensi'   => $tindaklanjut_intervensi,
                'file_intervensi'           => $file_intervensi
            ];

            $this->ins->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editINS($kd_ins)
    {

        $insData = $this->ins->find($kd_ins);

        $kd_ins                     = $this->request->getVar('edit_KDins');
        $kd_kat                     = $this->request->getVar('edit_kat_ins');
        $nama_intervensi            = $this->request->getVar('edit_nama_intervensi');
        $tgl_intervensi             = $this->request->getVar('edit_tgl_intervensi');
        $hasil_intervensi           = $this->request->getVar('edit_hasil_intervensi');
        $kesimpulan_intervensi      = $this->request->getVar('edit_kesimpulan_intervensi');
        $tindaklanjut_intervensi    = $this->request->getFile('edit_tindaklanjut_intervensi');
        $file_intervensi    = $this->request->getFile('edit_file_intervensi');
        $validate = [

            'edit_KDins' => [
                'label' => 'Kode INS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],
            'edit_kat_ins' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],
            'edit_nama_intervensi' => [
                'label' => 'Nama Intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tgl_intervensi' => [
                'label' => 'Tanggal Intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_kesimpulan_intervensi' => [
                'label' => 'Kesimpulan Intervensi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tindaklanjut_intervensi' => [
                'label' => 'Tindak Lanjut',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_file_intervensi' => [
                'label' => 'File Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            // $oldFileName = $insData['edit_file_intervensi'];

            // if ($file_intervensi->isValid() && !$file_intervensi->hasMoved()) {
            //     if (file_exists('upload/ins/' . $oldFileName)) {
            //         unlink('upload/ins/' . $oldFileName);
            //         session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
            //     }

            //     $newFileName = $kd_ins . '_' . $nama_intervensi . '_fileIdentitas.jpg';
            //     $file_intervensi->move('upload/ins', $newFileName);
            // } else {
            //     $newFileName = $oldFileName;
            // }

            $data = [
                'KDins'                     => $kd_ins,
                'kd_kat_ins'                => $kd_kat,
                'nama_intervensi'           => $nama_intervensi,
                'tgl_intervensi'            => $tgl_intervensi,
                'hasil_intervensi'          => $hasil_intervensi,
                'kesimpulan_intervensi'     => $kesimpulan_intervensi,
                'tindaklanjut_intervensi'   => $tindaklanjut_intervensi,
                'file_intervensi'           => $file_intervensi,
            ];

            $this->ins->update($kd_ins, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusINS($kd_ins)
    {
        $insData = $this->ins->find($kd_ins);

        // $datafoto = $insData['file_intervensi'];

        // if (file_exists('upload/ins/' . $datafoto)) {
        //     unlink('upload/ins/' . $datafoto);
        //     session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        // }

        $this->ins->delete($kd_ins);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // BAST
    public function tambahBAST()
    {
        $kd_bast = $this->request->getVar('KDbast');
        $kd_kat = $this->request->getVar('kd_kat_bast');
        $tgl_bast = $this->request->getVar('tanggal_bast');
        $penyerah = $this->request->getVar('penyerah');
        $deskripsi_bast = $this->request->getVar('deskripsi_bast');
        $bantuan_bast = $this->request->getVar('bantuan_bast');
        $keterangan_bast = $this->request->getVar('keterangan_bast');
        $bast_file = $this->request->getVar('bast_file');

        $validate = [

            'KDbast' => [
                'label' => 'Kode BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'tanggal_bast' => [
                'label' => 'Tanggal BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'penyerah' => [
                'label' => 'Penyerah Bantuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'deskripsi_bast' => [
                'label' => 'Deskripsi Bast',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'bantuan_bast' => [
                'label' => 'Bantuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'keterangan_bast' => [
                'label' => 'Keterangan BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'bast_file' => [
                'label' => 'File BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'KDbast'            => $kd_bast,
                'kd_kat_bast'       => $kd_kat,
                'tanggal_bast'      => $tgl_bast,
                'penyerah'          => $penyerah,
                'deskripsi_bast'    => $deskripsi_bast,
                'bantuan_bast'      => $bantuan_bast,
                'keterangan_bast'   => $keterangan_bast,
                'bast_file'         => $bast_file
            ];

            $this->bast->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editBAST($kd_bast)
    {

        $bastData = $this->bast->find($kd_bast);

        $kd_bast = $this->request->getVar('edit_KDbast');
        $kd_kat = $this->request->getVar('edit_kat_bast');
        $tgl_bast = $this->request->getVar('edit_tgl_bast');
        $penyerah = $this->request->getVar('edit_penyerah');
        $deskripsi_bast = $this->request->getVar('edit_deskripsi_bast');
        $bantuan_bast = $this->request->getVar('edit_bantuan_bast');
        $keterangan_bast = $this->request->getVar('edit_keterangan_bast');
        $bast_file = $this->request->getVar('edit_bast_file');

        $validate = [

            'edit_KDbast' => [
                'label' => 'Kode BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_tanggal_bast' => [
                'label' => 'Tanggal BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_penyerah' => [
                'label' => 'Penyerah Bantuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_deskripsi_bast' => [
                'label' => 'Deskripsi Bast',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_bantuan_bast' => [
                'label' => 'Bantuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_keterangan_bast' => [
                'label' => 'Keterangan BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'edit_bast_file' => [
                'label' => 'File BAST',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            // $oldFileName = $bastData['bast_file'];

            // if ($bast_file->isValid() && !$bast_file->hasMoved()) {
            //     if (file_exists('upload/bast/' . $oldFileName)) {
            //         unlink('upload/bast/' . $oldFileName);
            //         session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
            //     }

            //     $newFileName = $kd_bast . '_' . $nama_kegiatan . '_fileIdentitas.jpg';
            //     $bast_file->move('upload/bast', $newFileName);
            // } else {
            //     $newFileName = $oldFileName;
            // }

            $data = [
                'edit_KDbast'            => $kd_bast,
                'edit_kd_kat_bast'       => $kd_kat,
                'edit_tanggal_bast'      => $tgl_bast,
                'edit_penyerah'          => $penyerah,
                'edit_deskripsi_bast'    => $deskripsi_bast,
                'edit_bantuan_bast'      => $bantuan_bast,
                'edit_keterangan_bast'   => $keterangan_bast,
                'edit_bast_file'         => $bast_file
            ];

            $this->bast->update($kd_bast, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusBAST($kd_bast)
    {
        $bastData = $this->bast->find($kd_bast);

        $this->bast->delete($kd_bast);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // SPJ
    public function tambahSPJ()
    {
        $kd_spj = $this->request->getVar('KDspj');
        $nama = $this->request->getVar('nama');
        $kd_kat = $this->request->getVar('kd_kat_asm');
        $usia = $this->request->getVar('usia');
        $hasil = $this->request->getVar('hasil');
        $keterangan = $this->request->getVar('keterangan');

        $validate = [

            'KDasm' => [
                'label' => 'Kode Asesment',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_asm' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'usia' => [
                'label' => 'Usia',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'hasil' => [
                'label' => 'Hasil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'kd_asesment'   => $kd_asm,
                'kd_kat'        => $kd_kat,
                'nama_asesment' => $nama,
                'usia'          => $usia,
                'hasil_asesment' => $hasil,
                'keterangan'    => $keterangan
            ];

            $this->asm->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editSPJ($kd_spj)
    {

        $spjData = $this->spj->find($kd_spj);

        $kd_rab         = $this->request->getVar('edit_kd_rab');
        $kd_kat         = $this->request->getVar('edit_kat_rab');
        $nama_kegiatan  = $this->request->getVar('edit_kegiatan');
        $tahun          = $this->request->getVar('edit_tahun');
        $anggaran       = $this->request->getVar('edit_anggaran');
        $deskripsi      = $this->request->getVar('edit_deskripsi');
        $file_rab       = $this->request->getFile('edit_file_rab');

        $validate = [

            'edit_kd_rab' => [
                'label' => 'Kode RAB',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_tahun' => [
                'label' => 'Tahun Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_file_rab' => [
                'label' => 'Upload File RAB',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $oldFileName = $rabData['file_rab'];

            if ($file_rab->isValid() && !$file_rab->hasMoved()) {
                if (file_exists('upload/rab/' . $oldFileName)) {
                    unlink('upload/rab/' . $oldFileName);
                    session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
                }

                $newFileName = $kd_rab . '_' . $nama_kegiatan . '_fileIdentitas.jpg';
                $file_rab->move('upload/rab', $newFileName);
            } else {
                $newFileName = $oldFileName;
            }

            $data = [
                'kd_rab'        => $kd_rab,
                'kd_kat'        => $kd_kat,
                'nama_kegiatan' => $nama_kegiatan,
                'kd_periode'    => $tahun,
                'anggaran'      => $anggaran,
                'deskripsi'     => $deskripsi,
                'file_rab'      => $newFileName,
            ];

            $this->rab->update($kd_rab, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusSPJ($kd_spj)
    {
        $spjData = $this->spj->find($kd_spj);

        $datafoto = $spjData['file_spj'];

        if (file_exists('upload/spj/' . $datafoto)) {
            unlink('upload/spj/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->spj->delete($kd_spj);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // DOS
    public function tambahDOS()
    {
        $kd_dos = $this->request->getVar('KDdos');
        $nama = $this->request->getVar('nama');
        $kd_kat = $this->request->getVar('kd_kat_asm');
        $usia = $this->request->getVar('usia');
        $hasil = $this->request->getVar('hasil');
        $keterangan = $this->request->getVar('keterangan');

        $validate = [

            'KDasm' => [
                'label' => 'Kode Asesment',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_asm' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'usia' => [
                'label' => 'Usia',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'hasil' => [
                'label' => 'Hasil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'kd_asesment'   => $kd_asm,
                'kd_kat'        => $kd_kat,
                'nama_asesment' => $nama,
                'usia'          => $usia,
                'hasil_asesment' => $hasil,
                'keterangan'    => $keterangan
            ];

            $this->asm->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editDOS($kd_dos)
    {
        $dosData = $this->dos->find($kd_dos);

        $kd_dos         = $this->request->getVar('edit_kd_dos');
        $kd_kat         = $this->request->getVar('edit_kat_dos');
        $nama_kegiatan  = $this->request->getVar('edit_kegiatan');
        $tahun          = $this->request->getVar('edit_tahun');
        $anggaran       = $this->request->getVar('edit_anggaran');
        $deskripsi      = $this->request->getVar('edit_deskripsi');
        $file_dos       = $this->request->getFile('edit_file_dos');

        $validate = [

            'edit_kd_dos' => [
                'label' => 'Kode DOS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_tahun' => [
                'label' => 'Tahun Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_file_rab' => [
                'label' => 'Upload File RAB',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $oldFileName = $rabData['file_rab'];

            if ($file_rab->isValid() && !$file_rab->hasMoved()) {
                if (file_exists('upload/rab/' . $oldFileName)) {
                    unlink('upload/rab/' . $oldFileName);
                    session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
                }

                $newFileName = $kd_rab . '_' . $nama_kegiatan . '_fileIdentitas.jpg';
                $file_rab->move('upload/rab', $newFileName);
            } else {
                $newFileName = $oldFileName;
            }

            $data = [
                'kd_rab'        => $kd_rab,
                'kd_kat'        => $kd_kat,
                'nama_kegiatan' => $nama_kegiatan,
                'kd_periode'    => $tahun,
                'anggaran'      => $anggaran,
                'deskripsi'     => $deskripsi,
                'file_rab'      => $newFileName,
            ];

            $this->rab->update($kd_rab, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusDOS($kd_dos)
    {
        $dosData = $this->dos->find($kd_dos);

        $datafoto = $dosData['file_dos'];

        if (file_exists('upload/dos/' . $datafoto)) {
            unlink('upload/dos/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->dos->delete($kd_dos);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }

    // SUI
    public function tambahSUI()
    {
        $kd_sui = $this->request->getVar('KDsui');
        $nama = $this->request->getVar('nama');
        $kd_kat = $this->request->getVar('kd_kat_asm');
        $usia = $this->request->getVar('usia');
        $hasil = $this->request->getVar('hasil');
        $keterangan = $this->request->getVar('keterangan');

        $validate = [

            'KDsui' => [
                'label' => 'Kode Asesment',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'kd_kat_asm' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'usia' => [
                'label' => 'Usia',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]

            ],
            'hasil' => [
                'label' => 'Hasil',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
            'keterangan' => [
                'label' => 'Keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                'kd_asesment'   => $kd_asm,
                'kd_kat'        => $kd_kat,
                'nama_asesment' => $nama,
                'usia'          => $usia,
                'hasil_asesment' => $hasil,
                'keterangan'    => $keterangan
            ];

            $this->asm->insert($data);
            session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function editSUI($kd_sui)
    {

        $suiData = $this->sui->find($kd_sui);

        $kd_sui         = $this->request->getVar('edit_kd_sui');
        $kd_kat         = $this->request->getVar('edit_kat_sui');
        $nama_kegiatan  = $this->request->getVar('edit_kegiatan');
        $tahun          = $this->request->getVar('edit_tahun');
        $anggaran       = $this->request->getVar('edit_anggaran');
        $deskripsi      = $this->request->getVar('edit_deskripsi');
        $file_sui       = $this->request->getFile('edit_file_sui');

        $validate = [

            'edit_kd_rab' => [
                'label' => 'Kode RAB',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_kegiatan' => [
                'label' => 'Nama Kegiatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus Diisi'
                ]
            ],

            'edit_tahun' => [
                'label' => 'Tahun Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_anggaran' => [
                'label' => 'Anggaran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi',
                ]
            ],

            'edit_file_rab' => [
                'label' => 'Upload File RAB',
                'rules' => 'max_size[edit_file_rab,1024]|mime_in[edit_file_rab,application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'errors' => [
                    'max_size'   => 'Ukuran {field} terlalu besar, maksimal 1MB',
                    'mime_in'    => 'Hanya file {field} dengan format PDF, Excel, atau Word yang diizinkan'
                ]
            ],
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $oldFileName = $rabData['file_rab'];

            if ($file_rab->isValid() && !$file_rab->hasMoved()) {
                if (file_exists('upload/rab/' . $oldFileName)) {
                    unlink('upload/rab/' . $oldFileName);
                    session()->setFlashdata('success_foto', 'Foto Lama berhasil dihapus');
                }

                $newFileName = $kd_rab . '_' . $nama_kegiatan . '_fileIdentitas.jpg';
                $file_rab->move('upload/rab', $newFileName);
            } else {
                $newFileName = $oldFileName;
            }

            $data = [
                'kd_rab'        => $kd_rab,
                'kd_kat'        => $kd_kat,
                'nama_kegiatan' => $nama_kegiatan,
                'kd_periode'    => $tahun,
                'anggaran'      => $anggaran,
                'deskripsi'     => $deskripsi,
                'file_rab'      => $newFileName,
            ];

            $this->rab->update($kd_rab, $data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
        }
        return redirect()->to(base_url('Arsip'))->withInput();
    }

    public function hapusSUI($kd_sui)
    {
        $suiData = $this->sui->find($kd_sui);

        $datafoto = $suiData['file_sui'];

        if (file_exists('upload/sui/' . $datafoto)) {
            unlink('upload/sui/' . $datafoto);
            session()->setFlashdata('success_foto', 'Foto berhasil dihapus');
        }

        $this->sui->delete($kd_sui);
        session()->setFlashdata('success', 'Data berhasil dihapus');
        return redirect()->to(base_url('Arsip'));
    }
}
