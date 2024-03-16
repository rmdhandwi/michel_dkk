<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeluser;

class Auth extends BaseController
{

    public function index()
    {
        $data = [
            'title'     => "Login",
            'menu'      => "Login",
            'submenu'   => "Login",
        ];
        return view('login', $data);
    }

    //menampilkan form register
    public function register()
    {
        return view('register');
    }

    //fungsi login
    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (!$this->validate([
            'username'  => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password'  => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth'));
        } else {
            // Panggil model untuk memeriksa kredensial pengguna
            $user = $this->auth->checkLogin($username);

            // dd($user);

            if ($user) {
                // Login berhasil
                $data = [
                    'logIn'     => true,
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                ];
                session()->set($data);
                session()->setFlashdata('signin', 'Berhasil Login Sebagai ' . $username);
                return redirect()->to(base_url('Dashboard'));
            } else {
                // User tidak ditemukan atau password tidak cocok
                session()->setFlashdata('gagal', 'Username atau Password Salah');
                return redirect()->to(base_url('Auth'));
            }
        }
    }



    public function daftar()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $confirm = $this->request->getVar('confirm');

        if ($this->validate([
            'username'  => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'password'  => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ],
            'confirm'  => [
                'label' => 'confirm',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                ]
            ]
        ])) {
            if ($password !== $confirm) {
                session()->setFlashdata('gagal', 'password tidak boleh berbeda');
                return redirect()->to(base_url('Auth/register'));
            }
            $data = [
                'user' => $username,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role' => 2,
            ];

            $this->auth->insert($data);

            session()->setFlashdata('sukses', 'berhasil daftar');
            return redirect()->to(base_url('Auth/register'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/register'));
        }
    }

    //fungsi logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Auth'));
    }
}
