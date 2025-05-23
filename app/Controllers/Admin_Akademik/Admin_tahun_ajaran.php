<?php

namespace App\Controllers\Admin_Akademik;

use CodeIgniter\Controller;
use App\Models\Model_pengguna;
use App\Models\Admin_Akademik\Model_tahun_ajaran;


class Admin_tahun_ajaran extends Controller
{
    protected $mp, $mta;
    public function __construct()
    {
        $this->mp = new Model_pengguna();
        $this->mta = new Model_tahun_ajaran();
    }

    public function index()
    {
        $data = [
            'title' => 'List Tahun Ajaran',
            'act_mn_akademik' => 'menu-open',
            'act_mn_akd' => 'active',
            'act_mn_ajaran' => 'active',
            'v' => $this->mta->getTahunAjaran(),
        ];
        return view('admin/akademik/tahun_ajaran/v_ta', $data);
    }



    public function store()
    {
        $tahun_ajaran = $this->request->getPost('tahun_ajaran');
        $sekolah_kode = $this->request->getPost('sekolah_kode');


        $data = [
            'tahun_ajaran' => $tahun_ajaran,
            'sts_tahun_ajaran' => 0,
            'sekolah_kode' => $sekolah_kode,
            'created_at' => date('Y-m-d h:i:s'),
        ];


        if ($this->mta->insert($data)) {
            session()->setFlashdata('sukses', 'Data berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Gagal menyimpan data.');
        }
        return redirect()->to('/admin_tahun_ajaran');
    }

    public function edit($id_tahun_ajaran)
    {
        $data = [
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
        ];

        $this->mta->update($id_tahun_ajaran, $data);

        return redirect()->to('admin_tahun_ajaran')->with('sukses', 'Data berhasil diupdate');
    }


    public function activate($id_tahun_ajaran)
    {
        $data = [
            'sts_tahun_ajaran'    => "1"
        ];
        $this->mta->update($id_tahun_ajaran, $data);
        if ($this->mta->update($id_tahun_ajaran, $data)) {
            session()->setFlashdata('sukses', 'aktif Berhasil');
        } else {
            session()->setFlashdata('gagal', 'Gagal Diaktifkan.');
        }
        return redirect()->to('/admin_tahun_ajaran');
    }

    public function deactivate($id_tahun_ajaran)
    {
        $data = [
            'sts_tahun_ajaran'    => "0"
        ];
        $this->mta->update($id_tahun_ajaran, $data);
        if ($this->mta->update($id_tahun_ajaran, $data)) {
            session()->setFlashdata('sukses', 'aktif Berhasil');
        } else {
            session()->setFlashdata('gagal', 'Gagal Diaktifkan.');
        }
        return redirect()->to('/admin_tahun_ajaran');
    }
}
