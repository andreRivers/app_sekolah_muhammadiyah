<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_pengguna;
use App\Models\Model_man_sekolah;
use App\Models\Model_admin_kelas;

class Admin_kelas extends Controller
{
    protected $mp, $mms, $mak;
    public function __construct()
    {
        $this->mp = new Model_pengguna();
        $this->mms = new Model_man_sekolah();
        $this->mak = new Model_admin_kelas();
    }

    public function index()
    {
        $data = [
            'title' => 'List Kelas',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_kelas' => 'active',
            'v' => $this->mak->getAll(),
            'bentuk_pendidikan' => $this->mak->getBentukPendidikan(),
        ];
        return view('admin/kesiswaan/kelas/v_kelas', $data);
    }


    public function store()
    {
        $nama_kelas = $this->request->getPost('nama_kelas');
        $kelas = $this->request->getPost('kelas');
        $bentuk_pendidikan_id = $this->request->getPost('bentuk_pendidikan_id');
        $sekolah_kode = $this->request->getPost('sekolah_kode');


        $data = [
            'nama_kelas' => $nama_kelas,
            'kelas' => $kelas,
            'bentuk_pendidikan_id' => $bentuk_pendidikan_id,
            'sekolah_kode' => $sekolah_kode
        ];


        if ($this->mak->insert($data)) {
            session()->setFlashdata('sukses', 'Data pengguna berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Gagal menyimpan data pengguna.');
        }
        return redirect()->to('/admin_kelas');
    }

    public function update($id_kelas)
    {
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'kelas' => $this->request->getPost('kelas'),
            'bentuk_pendidikan_id' => $this->request->getPost('bentuk_pendidikan_id')
        ];

        $this->mak->update($id_kelas, $data);

        return redirect()->to('admin_kelas')->with('sukses', 'Data berhasil diupdate');
    }
}
