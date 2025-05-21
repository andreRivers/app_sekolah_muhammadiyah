<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_pengguna;
use App\Models\Model_man_sekolah;

class Man_pengguna extends Controller
{
    protected $mp, $mms;
    public function __construct()
    {
        $this->mp = new Model_pengguna();
        $this->mms = new Model_man_sekolah();
    }

    public function index()
    {
        $data = [
            'title' => 'Data pengguna',
            'act_mn_users' => 'menu-open',
            'act_mn_user' => 'active',
            'act_mn_dt_pengguna' => 'active',
            'v' => $this->mp->getAll(),
        ];
        return view('man_pengguna/v_man_pengguna', $data);
    }

    public function createpengguna()
    {
        $data = [
            'title' => 'Tambah Data pengguna',
            'act_mn_users' => 'menu-open',
            'act_mn_user' => 'active',
            'act_mn_dt_pengguna' => 'active',
            'v' => $this->mms->getAll(),
        ];
        return view('man_pengguna/c_man_pengguna', $data);
    }

    public function storepengguna()
    {
        $validation = \Config\Services::validation();
        $request = $this->request;

        $data = [
            'kode_person' => $request->getPost('kode_person'),
            'email' => $request->getPost('email'),
            'name' => $request->getPost('name'), // sebaiknya ini bukan email, tapi hp. Nama fieldnya bisa diperbaiki
            'sekolah_kode' => $request->getPost('sekolah_kode'),
            'role_id' => $request->getPost('role_id'),
            'no_hp' => $request->getPost('no_hp'),
            'image' => "default.jpg",
            'is_active' => "1",
            'password' =>  password_hash("muhammadiyah", PASSWORD_DEFAULT),
            'at_created' => date('Y-m-d h:i:s')
        ];

        if (!$validation->run($data, 'pengguna')) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        if ($this->mp->insert($data)) {
            session()->setFlashdata('sukses', 'Data pengguna berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Gagal menyimpan data pengguna.');
        }

        return redirect()->to('/datapengguna');
    }

    public function detail($id_pengguna)
    {
        $pengguna = $this->mp->getpenggunaById($id_pengguna); // ambil berdasarkan ID pengguna

        if (!$pengguna) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("pengguna dengan ID $id_pengguna tidak ditemukan.");
        }

        $data = [
            'title' => 'Detail pengguna',
            'act_mn_pengguna' => 'active',
            'pengguna' => $pengguna,
        ];

        return view('man_pengguna/d_man_pengguna', $data);
    }

    public function edit($id_pengguna)
    {
        $pengguna = $this->mp->getpenggunaById($id_pengguna); // ambil berdasarkan ID pengguna

        if (!$pengguna) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("pengguna dengan ID $id_pengguna tidak ditemukan.");
        }

        $data = [
            'title' => 'Update pengguna',
            'act_mn_pengguna' => 'active',
            'pengguna' => $pengguna,
        ];

        return view('man_pengguna/u_man_pengguna', $data);
    }

    public function editGo()
    {
        $validation = \Config\Services::validation();
        $request = $this->request;
        $id_pengguna = $request->getPost('id_pengguna');

        $data = [
            'kode_pengguna'      => $request->getPost('kode_pengguna'),
            'nama_pengguna'      => $request->getPost('pengguna'),
            'no_hp'             => $request->getPost('telp_pengguna'), // sebaiknya ganti nama field ke 'no_hp'
            'bentuk_pendidikan' => $request->getPost('bentuk_pendidikan'),
            'active_pengguna'    => $request->getPost('active_pengguna')
        ];

        $this->mp->update($id_pengguna, $data);


        if ($this->mp->update($id_pengguna, $data)) {
            session()->setFlashdata('sukses', 'Data pengguna berhasil diperbarui.');
        } else {
            session()->setFlashdata('gagal', 'Gagal memperbarui data pengguna.');
        }

        return redirect()->to('/datapengguna');
    }


    public function activate($id_akun)
    {

        $data = [
            'is_active'    => "1"
        ];

        $this->mp->update($id_akun, $data);


        if ($this->mp->update($id_akun, $data)) {
            session()->setFlashdata('sukses', 'aktif Berhasil');
        } else {
            session()->setFlashdata('gagal', 'Gagal Diaktifkan.');
        }

        return redirect()->to('/datapengguna');
    }


    public function deactivate($id_akun)
    {

        $data = [
            'is_active'    => "0"
        ];

        $this->mp->update($id_akun, $data);


        if ($this->mp->update($id_akun, $data)) {
            session()->setFlashdata('sukses', 'aktif Berhasil');
        } else {
            session()->setFlashdata('gagal', 'Gagal Diaktifkan.');
        }

        return redirect()->to('/datapengguna');
    }

    public function resetpassword($id_akun)
    {

        $data = [
            'password' =>  password_hash("muhammadiyah", PASSWORD_DEFAULT),
        ];

        $this->mp->update($id_akun, $data);


        if ($this->mp->update($id_akun, $data)) {
            session()->setFlashdata('sukses', 'Password Berhasil diReset');
        } else {
            session()->setFlashdata('gagal', 'Password Gagal Berhasil diReset.');
        }

        return redirect()->to('/datapengguna');
    }
}
