<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ModelPengguna;
use App\Models\Model_man_sekolah;

class Man_sekolah extends Controller
{
    protected $mms;

    public function __construct()
    {
        $this->mms = new Model_man_sekolah();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Sekolah',
            'act_mn_sekolah' => 'active',
            'v' => $this->mms->getAll(),
        ];

        return view('man_sekolah/v_man_sekolah', $data);
    }

    public function createsekolah()
    {
        $data = [
            'title' => 'Tambah Data Sekolah',
            'act_mn_sekolah' => 'active',
        ];

        return view('man_sekolah/c_man_sekolah', $data);
    }

    public function storesekolah()
{
    $validation = \Config\Services::validation();
    $request = $this->request;

    $data = [
        'kode_sekolah' => $request->getPost('kode_sekolah'),
        'sekolah' => $request->getPost('sekolah'),
        'telp_sekolah' => $request->getPost('telp_sekolah'), // sebaiknya ini bukan email, tapi hp. Nama fieldnya bisa diperbaiki
        'bentuk_pendidikan' => $request->getPost('bentuk_pendidikan'),
        'active_sekolah' => $request->getPost('active_sekolah'),
        'alamat' => "-",
        'provinsi' => "-",
        'kelurahan' => "-",
        'kecamatan' => "-",
        'kode_pos' => "-",
        'akreditasi' => "-",
        'kepala_sekolah' => "-",
        'sts_kepemilikan' => "-",
        'sk_pendirian' => "default.pdf",
        'tgl_pendirian' => "-",
        'sk_izin_operasional' => "default.pdf",
        'tgl_sk_izin_operasional' => "-",
        'at_created' => date('Y-m-d h:i:s')
    ]; 

    if (!$validation->run($data, 'sekolah')) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors());
    }

       if ( $this->mms->insert($data)) {
        session()->setFlashdata('sukses', 'Data sekolah berhasil Disimpan.');
    } else {
        session()->setFlashdata('gagal', 'Gagal menyimpan data sekolah.');
    }

    return redirect()->to('/datasekolah');
}

public function detail($id_sekolah)
{
    $sekolah = $this->mms->getSekolahById($id_sekolah); // ambil berdasarkan ID sekolah

    if (!$sekolah) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Sekolah dengan ID $id_sekolah tidak ditemukan.");
    }

    $data = [
        'title' => 'Detail Sekolah', 
        'act_mn_sekolah' => 'active',
        'sekolah' => $sekolah,
    ];

    return view('man_sekolah/d_man_sekolah', $data);
}

public function edit($id_sekolah)
{
    $sekolah = $this->mms->getSekolahById($id_sekolah); // ambil berdasarkan ID sekolah

    if (!$sekolah) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Sekolah dengan ID $id_sekolah tidak ditemukan.");
    }

    $data = [
        'title' => 'Update Sekolah',
        'act_mn_sekolah' => 'active',
        'sekolah' => $sekolah,
    ];

    return view('man_sekolah/u_man_sekolah', $data);
}

public function editGo()
{
    $validation = \Config\Services::validation();
    $request = $this->request;
    $id_sekolah = $request->getPost('id_sekolah');

      $data = [
        'kode_sekolah'      => $request->getPost('kode_sekolah'),
        'nama_sekolah'      => $request->getPost('sekolah'),
        'no_hp'             => $request->getPost('telp_sekolah'), // sebaiknya ganti nama field ke 'no_hp'
        'bentuk_pendidikan' => $request->getPost('bentuk_pendidikan'),
        'active_sekolah'    => $request->getPost('active_sekolah')
    ];

      $this->mms->update($id_sekolah, $data);


    if ($this->mms->update($id_sekolah, $data)) {
        session()->setFlashdata('sukses', 'Data sekolah berhasil diperbarui.');
    } else {
        session()->setFlashdata('gagal', 'Gagal memperbarui data sekolah.');
    }

    return redirect()->to('/datasekolah');

}


}
