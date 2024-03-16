<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelintervensi extends Model
{
    protected $table            = 'tbl_ins';
    protected $primaryKey       = 'kd_ins';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_ins',
        'intervensi',
        'tgl_intervensi',
        'hasil_intervensi',
        'hasil_intervensi',
        'kesimpulan_intervensi',
        'tindaklanjut_intervensi',
        'file_intervensi',
    ];

    public function KDins()
    {
        $lastRecord = $this->orderBy('kd_ins', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_ins'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newins = 'INS' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newins = 'INS0001';
        }
        return $newins;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_ins', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getInsByKd($kd_ins)
    {
        return $this->select('tbl_ins.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_ins.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_ins.kd_ins', $kd_ins)
            ->first();
    }
}
