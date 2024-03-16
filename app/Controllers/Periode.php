<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Periode extends BaseController
{
    public function index()
    {
        $data = [
            'title' => "Periode",
            'menu'  => "Periode",
            'submenu' => "Periode",
            'table'   => $this->periode->Alldata(),
            'kd_periode' => $this->periode->Kdperiode(),

        ];

        return view('admin/dperiode', $data);
    }

    public function tambah()
    {
        $kd_periode = $this->request->getVar("kd_periode");
        $tahun     = $this->request->getVar("tahun_periode");
        $mulai     = $this->request->getVar("tgl_mulai");
        $selesai   = $this->request->getVar("tgl_selesai");

        $validate = [
            'kd_periode' => [
                'rules' => 'required|is_unique[tbl_periode.kd_periode]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada, silahkan ganti dengan data yang lain.'
                ]
            ],
            'tahun_periode' => [
                'label' => 'Tahun Periode',
                'rules' => 'required|is_unique[tbl_periode.tahun_periode]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'tgl_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Tanggal Selesai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                "kd_periode"     => $kd_periode,
                "tahun_periode"  => $tahun,
                "tgl_mulai"     => $mulai,
                "tgl_selesai"   => $selesai
            ];


            $this->periode->insert($data);
            session()->setFlashdata('success', "Berhasil menambahkan periode $tahun");
        }
        return redirect()->to(base_url('Periode'));
    }

    public function edit($kd_periode)
    {
        $tahun     = $this->request->getVar("tahun_periode");
        $mulai     = $this->request->getVar("tgl_mulai");
        $selesai   = $this->request->getVar("tgl_selesai");

        // Mengambil data periode berdasarkan kd_periode
        $existing_periode = $this->periode->find($kd_periode);

        // Mendapatkan tahun lama dari data yang ada jika tersedia
        $tahun_lama = ($existing_periode != null) ? $existing_periode['tahun_periode'] : null;

        $validate = [
            'kd_periode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'tahun_periode' => [
                'label' => 'Tahun Periode',
                'rules' => ($tahun_lama == $tahun) ? 'required' : 'required|is_unique[tbl_periode.tahun_periode]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'tgl_mulai' => [
                'label' => 'Tanggal Mulai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'tgl_selesai' => [
                'label' => 'Tanggal Selesai',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($validate)) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        } else {

            $data = [
                "kd_periode"     => $kd_periode,
                "tahun_periode"  => $tahun,
                "tgl_mulai"     => $mulai,
                "tgl_selesai"   => $selesai
            ];

            $this->periode->update($kd_periode, $data);
            session()->setFlashdata('success', 'Data Berhasil Di Update');
        }
        return redirect()->to(base_url('Periode'));
    }

    public function hapus($kd_periode)
    {
        $this->periode->delete($kd_periode);
        session()->setFlashdata('success', 'Menghapus data kategori');
        return redirect()->to(base_url('Kategori'));
    }
}
