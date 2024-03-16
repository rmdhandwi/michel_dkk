<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelrab extends Model
{
    protected $table            = 'tbl_rab';
    protected $primaryKey       = 'kd_rab';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_rab',
        'kd_kat',
        'nama_kegiatan',
        'kd_periode',
        'anggaran',
        'deskripsi',
        'file_rab'
    ];

    public function KDrab()
    {
        $lastRecord = $this->orderBy('kd_rab', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_rab'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newrab = 'RAB' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newrab = 'RAB0001';
        }
        return $newrab;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_rab', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getRabByKd($kd_rab)
    {
        return $this->select('tbl_rab.*, tbl_periode.tahun_periode')
            ->join('tbl_periode', 'tbl_rab.kd_periode = tbl_periode.kd_periode', 'left')
            ->where('tbl_rab.kd_rab', $kd_rab)
            ->first();
    }
}
