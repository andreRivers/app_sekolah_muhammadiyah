<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin_pegawai extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pegawai',
            'act_mn_kepegawaian' => 'menu-open',
            'act_mn_pegawai' => 'active',

        ];

        return view('admin/kepegawaian/pegawai/v_pegawai', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data'
        ];

        return view('admin/kepegawaian/pegawai/c_pegawai', $data);
    }

    public function edit()
    {
        $data = [
            'title' => 'Edit Data'
        ];

        return view('admin/kepegawaian/pegawai/u_pegawai', $data);
    }
}
