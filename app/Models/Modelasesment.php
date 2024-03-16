<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelasesment extends Model
{
    protected $table            = 'tbl_asesment';
    protected $primaryKey       = 'kd_asesment';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_asesment',
        'kd_kat',
        'nama_asesment',
        'usia',
        'hasil_asesment',
        'keterangan'
    ];

    public function KDasm()
    {
        $lastRecord = $this->orderBy('kd_asesment', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_asesment'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newrab = 'ASM' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newrab = 'ASM0001';
        }
        return $newrab;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_asesment', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getAsmByKd($kd_asm)
    {
        return $this->select('tbl_asesment.*, tbl_periode.tahun_periode')
        ->join('tbl_periode', 'tbl_asesment.kd_periode = tbl_periode.kd_periode', 'left')
        ->where('tbl_asesment.kd_asesment', $kd_asm)
            ->first();
    }
}
