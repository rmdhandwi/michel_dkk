<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeldos extends Model
{
    protected $table            = 'tbl_dos';
    protected $primaryKey       = 'kd_dos';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_dos',	'kd_kat',
        'judul_dokumentasi',
        'tgl_dos',
        'tempat',
        'keterangan_dos',
        'dos_file'	
    ];

    public function KDdos()
    {
        $lastRecord = $this->orderBy('kd_dos', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_dos'];
            $lastNumber = intval(substr($lastPri, 3));
            $newNumber = $lastNumber + 1;
            $newdos = 'DOS' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newdos = 'DOS0001';
        }
        return $newdos;
    }

    public function allData()
    {
        return $this->table($this->table)
            ->orderBy('kd_dos', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getDosByKd($kd_dos)
    {
        return $this->select('tbl_dos.*, tbl_kat.kd_kat')
            ->join('tbl_kat', 'tbl_dos.kd_kat = tbl_kat.kd_kat', 'left')
            ->where('tbl_dos.kd_dos', $kd_dos)
            ->first();
    }
}
