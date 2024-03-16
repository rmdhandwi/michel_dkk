<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelarsip;

class Kategori extends BaseController
{

    public function index()
    {

        $data = [
            'title'     => 'Kategori',
            'menu'      => 'Kategori',
            'submenu'   => 'Kategori',
            'kd'        => $this->kat->generateKdkat(),
            'table'     => $this->kat->getAll()
        ];
        return view('admin/kategori', $data);
    }

    public function tambah()
    {
        if ($this->validate([
            'nama' => [
                'label'     => 'nama kategori',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $kode = $this->request->getVar('kode');
            $nama = $this->request->getVar('nama');
            $data = [
                'nama_kat'  => $nama,
                'kd_kat'    => $kode
            ];
            $this->kat->insert($data);
            session()->setFlashdata('success', 'Menambahkan Kategori ' . $nama);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        }
        return redirect()->to(base_url('Kategori'));
    }

    public function edit($kd)
    {
        if ($this->validate([
            'nama' => [
                'label'     => 'nama kategori',
                'rules'     => 'required',
                'errors'    => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            $nama = $this->request->getVar('nama');
            $data = [
                'nama_kat'  => $nama,
            ];
            $this->kat->update($kd, $data);
            session()->setFlashdata('success', 'Update kategori' . $nama);
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        }
        return redirect()->to(base_url('Kategori'));
    }

    public function hapus($kd)
    {
        $this->kat->delete($kd);
        session()->setFlashdata('success', 'Menghapus data kategori');
        return redirect()->to(base_url('Kategori'));
    }
}
