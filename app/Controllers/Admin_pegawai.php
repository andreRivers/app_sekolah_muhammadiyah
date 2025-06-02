<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Model_admin_jabatan;
use App\Models\Model_admin_kelas;
use App\Models\Model_admin_pegawai;
use App\Models\Model_man_sekolah;
use App\Models\Model_pengguna;

class Admin_pegawai extends Controller
{
    protected $mp, $mms, $mak, $map;
    public function __construct()
    {
        $this->mms = new Model_man_sekolah();
        $this->mak = new Model_admin_kelas();
        $this->map = new Model_admin_pegawai();
        $this->mp = new Model_pengguna();
    }

    public function index()
    {
        $data = [
            'title' => 'List Pegawai',
            'act_mn_kepegawaian' => 'menu-open',
            'act_mn_kepeg' => 'active',
            'act_mn_pegawai' => 'active',
            'bentuk_pendidikan' => $this->mak->getBentukPendidikan(),
            'v' => $this->map->getAll()

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
            'bentuk_pendidikan' => $this->mak->getBentukPendidikan(),
            'jabatan' => $this->map->getBentukJabatan(),
        ];

        return view('admin/kepegawaian/pegawai/c_pegawai', $data);
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        // Validasi data
        $pegawai = [
            'person_kode' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|valid_date',
            'pendidikan_terakhir' => 'required',
            'bentuk_pendidikan_id' => 'required',
            'sts_kepegawaian' => 'required',
            'alamat_rumah' => 'required',
            'no_hp_pegawai' => 'required',
            'tgl_masuk' => 'required',
            'jabatan_id' => 'required',
            'email' => 'required'
        ];

        if (!$this->validate($pegawai)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Proses upload file
        $imageFile = $this->request->getFile('image');

        if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
            $imageName = $imageFile->getRandomName();
            $imageFile->move('uploads/siswa/', $imageName);
        } else {
            $imageName = 'default.jpg'; // Gunakan default jika tidak ada file
        }
        $data = [
            'person_kode' => $this->request->getPost('person_kode'),
            'jk' => $this->request->getPost('jk'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'bentuk_pendidikan_id' => $this->request->getPost('bentuk_pendidikan_id'),
            'sts_kepegawaian' => $this->request->getPost('sts_kepegawaian'),
            'alamat_rumah' => $this->request->getPost('alamat_rumah'),
            'no_hp_pegawai' => $this->request->getPost('no_hp_pegawai'),
            'tgl_masuk' => $this->request->getPost('tgl_masuk'),
            'tgl_keluar' => $this->request->getPost('tgl_keluar'),
            'jabatan_id' => $this->request->getPost('jabatan_id'),
            'created_at' => date('Y-m-d h:i:s')
        ];

        $data2 = [
            'kode_person' =>  $this->request->getPost('person_kode'),
            'email' => $this->request->getPost('email'),
            'name' => $this->request->getPost('name'),
            'sekolah_kode' => session()->get('sekolah_kode'),
            'role_id' => "6",
            'no_hp' => $this->request->getPost('no_hp_pegawai'),
            'image' => $imageName,
            'is_active' => "1",
            'password' =>  password_hash("123456", PASSWORD_DEFAULT),
            'at_created' => date('Y-m-d h:i:s')
        ];
        $this->mp->insert($data2);
        if ($this->map->insert($data)) {
            session()->setFlashdata('sukses', 'Data Siswa berhasil Disimpan.');
        } else {
            session()->setFlashdata('gagal', 'Data Siswa Gagal Disimpan.');
        }
        return redirect()->to('/admin_pegawai');
    }
}
