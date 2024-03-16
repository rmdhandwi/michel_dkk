<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkategori extends Model
{
    protected $table            = 'tbl_kat';
    protected $primaryKey       = 'kd_kat';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_kat',
        'nama_kat'
    ];

    public function getAll()
    {
        return $this->db->table($this->table)
            ->orderBy('kd_kat', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function generateKdkat()
    {
        $lastRecord = $this->orderBy('kd_kat', 'DESC')->first();

        if ($lastRecord) {
            $lastKat = $lastRecord['kd_kat'];
            $lastNumber = intval(substr($lastKat, 2));
            $newNumber = $lastNumber + 1;
            $newKat = 'SR' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newKat = 'SR001';
        }
        return $newKat;
    }
}
