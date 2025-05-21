<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    public function register()
    {
        return view('auth/register');
    }

    public function registerProcess()
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'matches[password]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/login')->with('message', 'Registrasi berhasil. Silakan login.');
    }

    public function login()
    {
        $data = [
            'title' => 'Login Page',
        ];
        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $this->request->getPost('email'))->first();

        if (!$user) {
            // Akun tidak ditemukan
            return redirect()->back()->withInput()->with('error', 'Akun tidak terdaftar!');
        }

        if ($user['is_active'] == 0) {
            // Akun dinonaktifkan
            return redirect()->back()->withInput()->with('error', 'Akun Anda telah dinonaktifkan!');
        }

        if (password_verify($this->request->getPost('password'), $user['password'])) {
            // Login berhasil, set session
            session()->set([
                'id_akun'   => $user['id_akun'],
                'name'      => $user['name'],
                'email'     => $user['email'],
                'role_id'   => $user['role_id'],
                'image'   => $user['image'],
                'sekolah_kode'   => $user['sekolah_kode'],
                'is_logged' => true
            ]);

            // Redirect ke halaman yang sesuai berdasarkan role_id
            switch ($user['role_id']) {
                case 1: // Superadmin
                    return redirect()->to('/superadmin');
                case 2: // Admin
                    return redirect()->to('/admin');
                case 3: // Operator
                    return redirect()->to('/operator');
                case 4: // Siswa
                    return redirect()->to('/siswa');
                case 5: // Orangtua
                    return redirect()->to('/orangtua');
                case 6: // Guru
                    return redirect()->to('/guru');
                case 7: // Walikelas
                    return redirect()->to('/walikelas');
                default:
                    return redirect()->to('/login')->with('error', 'Role tidak dikenali!');
            }
        } else {
            // Password salah
            return redirect()->back()->withInput()->with('error', 'Password salah!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}