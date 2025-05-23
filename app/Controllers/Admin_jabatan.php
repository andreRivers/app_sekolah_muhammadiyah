<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_admin_jabatan;
use App\Models\Model_admin_kelas;
use App\Models\Model_admin_pegawai;

class Admin_jabatan extends Controller
{
    protected $maj, $mak, $map;
    public function __construct()
    {
        $this->maj = new Model_admin_jabatan();
        $this->mak = new Model_admin_kelas();
        $this->map = new Model_admin_pegawai();
    }

    public function index()
    {
        $data = [
            'title' => 'List Jabatan',
            'act_mn_kepegawaian' => 'menu-open',
            'act_mn_kepeg' => 'active',
            'act_mn_kepeg2' => 'active',
            'bentuk_pendidikan' => $this->mak->getBentukPendidikan(),
            'v' => $this->maj->getAll(),
        ];
        return view('admin/kepegawaian/jabatan/v_jabatan', $data);
    }

    public function store()
    {
        $bentuk_pendidikan = $this->request->getPost('bentuk_pendidikan');
        $kode_jabatan = $this->request->getPost('kode_jabatan');
        $nama_jabatan = $this->request->getPost('nama_jabatan');
        $sekolah_kode = $this->request->getPost('sekolah_kode');


        $data = [
            'bentuk_pendidikan' => $bentuk_pendidikan,
            'kode_jabatan' => $kode_jabatan,
            'jabatan' => $nama_jabatan,
            'kode_sekolah' => $sekolah_kode
        ];


        if ($this->maj->insert($data)) {
            session()->setFlashdata('sukses', 'Data pengguna berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Gagal menyimpan data pengguna.');
        }
        return redirect()->to('/admin_jabatan');
    }

    public function update($id_jabatan)
    {
        $data = [
            'bentuk_pendidikan' => $this->request->getPost('bentuk_pendidikan'),
            'kode_jabatan' => $this->request->getPost('kode_jabatan'),
            'jabatan' => $this->request->getPost('nama_jabatan')
        ];

        $this->maj->update($id_jabatan, $data);

        return redirect()->to('admin_jabatan')->with('sukses', 'Data berhasil diupdate');
    }
}
