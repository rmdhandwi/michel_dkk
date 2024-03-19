<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelspj extends Model
{
    protected $table            = 'tbl_spj';
    protected $primaryKey       = 'kd_spj';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_spj',	
        'kd_kat',	
        'no_spj',	
        'tgl_spj',	
        'pengeluaran',	
        'penerimaan',	
        'total',	
        'spj_file'
    ];

    public function KDspj()
    {
        $lastRecord = $this->orderBy('kd_spj', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_spj'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newspj = 'SPJ' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newspj = 'SPJ0001';
        }
        return $newspj;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_spj', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getSpjByKd($kd_spj)
    {
        return $this->select('tbl_spj.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_spj.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_spj.kd_spj', $kd_spj)
            ->first();
    }
}
