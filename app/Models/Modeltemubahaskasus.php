<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeltemubahaskasus extends Model
{
    protected $table            = 'tbl_tbk';
    protected $primaryKey       = 'kd_tbk';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_tbk',
        'kd_kat',
        'nama_tbk',
        'tgl_kasus',
        'nama_peserta',
        'jabatan_peserta',
        'peran_peserta',
        'deskripsi',
        'rekomendasi',
        'tindaklanjut',
        'kesimpulan',
        'tbk_file',
    ];

    public function KDtbk()
    {
        $lastRecord = $this->orderBy('kd_tbk', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_tbk'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newtbk = 'TBK' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newtbk = 'TBK0001';
        }
        return $newtbk;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_tbk', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getTbkByKd($kd_tbk)
    {
        return $this->select('tbl_tbk.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_tbk.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_tbk.kd_tbk', $kd_tbk)
            ->first();
    }
}
