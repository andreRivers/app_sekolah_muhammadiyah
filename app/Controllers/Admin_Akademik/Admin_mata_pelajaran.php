<?php

namespace App\Controllers\Admin_Akademik;

use CodeIgniter\Controller;
use App\Models\Model_pengguna;
use App\Models\Admin_Akademik\Model_mata_pelajaran;


class Admin_semester extends Controller
{
    protected $mp, $mmp;
    public function __construct()
    {
        $this->mp = new Model_pengguna();
        $this->mmp = new Model_mata_pelajaran();
    }

    public function index()
    {
        $data = [
            'title' => 'List Semester',
            'act_mn_akademik' => 'menu-open',
            'act_mn_akd' => 'active',
            'act_mn_semester' => 'active',
            'v' => $this->mmp->getSemester(),
            'ajaran' => $this->mmp->getTahunAjaran(),
        ];
        return view('admin/akademik/semester/v_semester', $data);
    }



    public function store()
    {
        $tahun_ajaran_id = $this->request->getPost('tahun_ajaran_id');
        $sekolah_kode = $this->request->getPost('sekolah_kode');
        $semester = $this->request->getPost('semester');

        $data = [
            'tahun_ajaran_id' => $tahun_ajaran_id,
            'semester' =>  $semester,
            'sekolah_kode' => $sekolah_kode,
            'created_at' => date('Y-m-d h:i:s'),
        ];


        if ($this->mmp->insert($data)) {
            session()->setFlashdata('sukses', 'Data berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Gagal menyimpan data.');
        }
        return redirect()->to('/admin_semester');
    }

    public function edit($id_semester)
    {
        $data = [
            'tahun_ajaran_id' => $this->request->getPost('tahun_ajaran_id'),
            'semester' => $this->request->getPost('semester'),
        ];

        $this->mmp->update($id_semester, $data);

        return redirect()->to('admin_semester')->with('sukses', 'Data berhasil diupdate');
    }
}
