<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Data User',
            'menu'      => 'Data User',
            'submenu'   => 'Data User'
        ];
        return view('admin/user', $data);
    }
}
