<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelbast extends Model
{
    protected $table            = 'tbl_bast';
    protected $primaryKey       = 'kd_bast';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_bast',
        'kd_kat',
        'tgl_bast',
        'penyerah',
        'deskripsi_bast',
        'bantuan_bast',
        'keterangan_bast',
        'bast_file'
    ];

    public function KDbast()
    {
        $lastRecord = $this->orderBy('kd_bast', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_bast'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newbast = 'BAST' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newbast = 'BAST0001';
        }
        return $newbast;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_bast', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getBastByKd($kd_bast)
    {
        return $this->select('tbl_bast.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_bast.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_bast.kd_bast', $kd_bast)
            ->first();
    }
}
