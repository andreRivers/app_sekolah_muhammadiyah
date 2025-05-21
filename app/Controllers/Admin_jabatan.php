<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_admin_jabatan;

class Admin_jabatan extends Controller
{
    protected $maj;
    public function __construct()
    {
        $this->maj = new Model_admin_jabatan();
    }

    public function index()
    {
        $data = [
            'title' => 'List Jabatan',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_kelas' => 'active',
            'v' => $this->maj->getAll(),
        ];
        return view('admin/kesiswaan/kelas/v_kelas', $data);
    }
}
