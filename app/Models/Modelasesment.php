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
        'keterangan',
        'file_asesment'
    ];

    public function KDasm()
    {
        $lastRecord = $this->orderBy('kd_asesment', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_asesment'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newasm = 'ASM' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newasm = 'ASM0001';
        }
        return $newasm;
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
        return $this->select('tbl_asesment.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_asesment.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_asesment.kd_asesment', $kd_asm)
            ->first();
    }
}
