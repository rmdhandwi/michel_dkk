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
            'KDrab'    => $this->rab->KDrab()

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
        $kd_asm = $this->request->getPost('kd_asesment');
        $data_asm = $this->asm->getASMByKd($kd_asm);
        return $this->response->setJSON($data_asm);
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
}
