<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsui extends Model
{
    protected $table            = 'tbl_sui';
    protected $primaryKey       = 'kd_sui';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_sui',
        'kd_kat,',
        'judul_sui',
        'tgl_sui',
        'deskripsi_sui',
        'jenis_sui',
        'metode',
        'jumlah',
        'sui_file'	

    ];

    public function KDsui()
    {
        $lastRecord = $this->orderBy('kd_sui', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_sui'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newsui = 'SUI' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newsui = 'SUI0001';
        }
        return $newsui;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_sui', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getSuiByKd($kd_sui)
    {
        return $this->select('tbl_sui.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_sui.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_sui.kd_sui', $kd_sui)
            ->first();
    }
}
