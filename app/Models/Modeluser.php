<?php

namespace App\Models;

use CodeIgniter\Model;

class Modeluser extends Model
{
    protected $table            = 'tbl_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_user',
        'username',
        'password',
        'role',
    ];

    public function checkLogin($username)
    {
        return $this->db->table('tbl_user')
            ->where('username', $username)
            ->get()
            ->getRowArray();
    }
}
