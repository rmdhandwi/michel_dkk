<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'menu'      => 'Dashboard',
            'submenu'   => 'Dashboard'
        ];
        return view('admin/dashboard', $data);
    }
}
