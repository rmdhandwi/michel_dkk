<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelskpb extends Model
{
    protected $table            = 'tbl_skpb';
    protected $primaryKey       = 'kd_skpb';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kd_skpb',
        'kd_kat',
        'nama_lengkap',
        'no_identifikasi',
        'foto_identifikasi',
        'alamat',
        'jns_bantuan',
        'jmlh_bantuan',
        'kd_priode',
    ];

    public function KDskpb()
    {
        $lastRecord = $this->orderBy('kd_skpb', 'DESC')->first();

        if ($lastRecord) {
            $lastPri = $lastRecord['kd_skpb'];
            $lastNumber = intval(substr($lastPri, 4));
            $newNumber = $lastNumber + 1;
            $newskpb = 'SKPB' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $newskpb = 'SKPB0001';
        }
        return $newskpb;
    }

    public function Alldata($kd_skpb = null)
    {
        if ($kd_skpb) {
            return $this->db->table($this->table)
                ->where('kd_skpb', $kd_skpb)
                ->get()
                ->getRowArray();
        } else {
            return $this->db->table($this->table)
                ->orderBy('kd_skpb', 'ASC')
                ->get()
                ->getResultArray();
        }
    }

    public function getSkpbByKd($kd_skpb)
    {
        return $this->select('tbl_skpb.*, tbl_periode.tahun_periode')
            ->join('tbl_periode', 'tbl_skpb.kd_periode = tbl_periode.kd_periode', 'left')
            ->where('tbl_skpb.kd_skpb', $kd_skpb)
            ->first();
    }
}
