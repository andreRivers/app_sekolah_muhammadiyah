<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_pengguna;
use App\Models\Model_man_sekolah;
use App\Models\Model_admin_siswa;


class Admin_siswa extends Controller
{

    protected $mp, $mms, $mas;
    public function __construct()
    {
        $this->mp = new Model_pengguna();
        $this->mms = new Model_man_sekolah();
        $this->mas = new Model_admin_siswa();
    }

    public function index()
    {
        $data = [
            'title' => 'List Siswa',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_siswa' => 'active',
            'v' => $this->mas->getSiswa()
        ];
        return view('admin/kesiswaan/siswa/v_siswa', $data);
    }


    public function createsiswa()
    {
        $data = [
            'title' => 'Tambah siswa',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_siswa' => 'active',
            'bentuk_pendidikan' => $this->mas->getBentukPendidikan(),
            'kelas' => $this->mas->getKelas(),
        ];

        return view('admin/kesiswaan/siswa/c_siswa', $data);
    }




    public function store()
    {
        $validation = \Config\Services::validation();
        // Validasi data
        $rules = [
            'name' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|valid_date',
            'hobi' => 'required',
            'no_hp_siswa' => 'required',
            'alamat' => 'required',
            'nis' => 'required|numeric',
            'nisn' => 'required|numeric',
            'kelas_id' => 'required',
            'bentuk_pendidikan_id' => 'required',
            'nm_ibu_kandung' => 'required',
            'nm_ayah_kandung' => 'required',
            'no_hp_ortu' => 'required',
            'sts_siswa' => 'required',
            'email' => 'required',
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses upload file
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move('uploads/siswa/', $imageName); // pastikan folder `uploads/siswa` ada

        $data = [
            'jk' => $this->request->getPost('jk'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'hobi' => $this->request->getPost('hobi'),
            'no_hp_siswa' => $this->request->getPost('no_hp_siswa'),
            'alamat' => $this->request->getPost('alamat'),
            'nis' => $this->request->getPost('nis'),
            'nisn' => $this->request->getPost('nisn'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'nm_ibu_kandung' => $this->request->getPost('nm_ibu_kandung'),
            'nm_ayah_kandung' => $this->request->getPost('nm_ayah_kandung'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
            'bentuk_pendidikan_id' => $this->request->getPost('bentuk_pendidikan_id'),
            'sts_siswa' => $this->request->getPost('sts_siswa'),
            'created_at' => date('Y-m-d h:i:s')
        ];

        $data2 = [
            'kode_person' =>  $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
            'sekolah_kode' => session()->get('sekolah_kode'),
            'role_id' => "4",
            'no_hp' => $this->request->getPost('no_hp_siswa'),
            'image' => $imageName,
            'is_active' => "1",
            'password' =>  password_hash("muhammadiyah", PASSWORD_DEFAULT),
            'at_created' => date('Y-m-d h:i:s')
        ];
        $this->mp->insert($data2);
        if ($this->mas->insert($data)) {
            session()->setFlashdata('sukses', 'Data Siswa berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Data Siswa Gagal Disimpan.');
        }
        return redirect()->to('/admin_siswa');
    }

    public function detail($id_siswa)
    {
        $data = [
            'title' => 'Detail Siswa',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_siswa' => 'active',
            'd' => $this->mas->getDetailSiswa($id_siswa)
        ];
        return view('admin/kesiswaan/siswa/d_siswa', $data);
    }

    public function edit($id_siswa)
    {
        $data = [
            'title' => 'Update Siswa',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_siswa' => 'active',
            'd' => $this->mas->getDetailSiswa($id_siswa),
            'bentuk_pendidikan' => $this->mas->getBentukPendidikan(),
            'kelas' => $this->mas->getKelas(),
        ];
        return view('admin/kesiswaan/siswa/u_siswa', $data);
    }


    public function updateGo()
    {
        $validation = \Config\Services::validation();
        // Validasi data
        $rules = [
            'id_siswa' => 'required',
            'name' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|valid_date',
            'hobi' => 'required',
            'no_hp_siswa' => 'required',
            'alamat' => 'required',
            'nis' => 'required|numeric',
            'nisn' => 'required|numeric',
            'kelas_id' => 'required',
            'bentuk_pendidikan_id' => 'required',
            'nm_ibu_kandung' => 'required',
            'nm_ayah_kandung' => 'required',
            'no_hp_ortu' => 'required',
            'sts_siswa' => 'required',
            'email' => 'required',
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses upload file
        $imageFile = $this->request->getFile('image');
        $imageName = $imageFile->getRandomName();
        $imageFile->move('uploads/siswa/', $imageName); // pastikan folder `uploads/siswa` ada
        $id_siswa = $this->request->getPost('id_siswa');
        $id_akun = $this->request->getPost('id_akun');
        $kode_person = $this->request->getPost('nis');
        $data = [
            'jk' => $this->request->getPost('jk'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'hobi' => $this->request->getPost('hobi'),
            'no_hp_siswa' => $this->request->getPost('no_hp_siswa'),
            'alamat' => $this->request->getPost('alamat'),
            'nis' => $kode_person,
            'nisn' => $this->request->getPost('nisn'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'nm_ibu_kandung' => $this->request->getPost('nm_ibu_kandung'),
            'nm_ayah_kandung' => $this->request->getPost('nm_ayah_kandung'),
            'no_hp_ortu' => $this->request->getPost('no_hp_ortu'),
            'bentuk_pendidikan_id' => $this->request->getPost('bentuk_pendidikan_id'),
            'sts_siswa' => $this->request->getPost('sts_siswa')
        ];

        $data2 = [
            'kode_person' =>  $this->request->getPost('nis'),
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
            'sekolah_kode' => session()->get('sekolah_kode'),
            'role_id' => "4",
            'no_hp' => $this->request->getPost('no_hp_siswa'),
            'image' => $imageName
        ];
        $this->mp->update($id_akun, $data2);
        if ($this->mas->update($id_siswa, $data)) {
            session()->setFlashdata('sukses', 'Data Siswa berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Data Siswa Gagal Disimpan.');
        }
        return redirect()->to('/admin_siswa');
    }

    public function importData()
    {
        $data = [
            'title' => 'Import Data Siswa',
            'act_mn_kesiswaan' => 'menu-open',
            'act_mn_kesis' => 'active',
            'act_mn_siswa' => 'active',
            'v' => $this->mas->getSiswa()
        ];
        return view('admin/kesiswaan/siswa/i_siswa', $data);
    }
}
