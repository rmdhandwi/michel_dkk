<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelperiode extends Model
{
    protected $table            = 'tbl_periode';
    protected $primaryKey       = 'kd_periode';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_periode',
        'tahun_periode',
        'tgl_mulai',
        'tgl_selesai'
    ];

    public function Kdperiode()
    {
        $lastRecord = $this->orderBy('kd_periode', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_periode'];
            $lastNumber = intval(substr($lastPri, 2));
            $newNumber = $lastNumber + 1;
            $newPeriode = 'PR' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newPeriode = 'PR001';
        }
        return $newPeriode;
    }

    public function Alldata()
    {
        return $this->db->table($this->table)
            ->orderBy('kd_periode', 'ASC')
            ->get()
            ->getResultArray();
    }
}
