<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_admin_jabatan;
use App\Models\Model_admin_kelas;
use App\Models\Model_admin_pegawai;

class Admin_pegawai extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pegawai',
            'act_mn_kepegawaian' => 'menu-open',
            'act_mn_kepeg' => 'active',
            'act_mn_pegawai' => 'active',

        ];

        return view('admin/kepegawaian/pegawai/v_pegawai', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data',
            'act_mn_kepegawaian' => 'menu-open',
            'act_mn_kepeg' => 'active',
            'act_mn_pegawai' => 'active',
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
