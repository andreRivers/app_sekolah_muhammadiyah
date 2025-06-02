<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin_pegawai extends Model
{
    protected $table = 'sm_pegawai';
    protected $primaryKey = 'id_pegawai';
    protected $allowedFields = ['person_kode', 'jk', 'tempat_lahir', 'tgl_lahir', 'pendidikan_terakhir', 'bentuk_pendidikan_id', 'sts_kepegawaian', 'alamat_rumah', 'no_hp_pegawai', 'tgl_masuk', 'tgl_keluar', 'jabatan_id'];
    protected $useTimestamps = true; // Atau true jika tabel memiliki created_at/updated_at


    public function getAll()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_pegawai');
        $builder->select('sm_pegawai.*, sm_users.*, sm_bentuk_pendidikan.*, sm_jabatan.*');
        $builder->join('sm_users', 'sm_users.kode_person = sm_pegawai.person_kode', 'left');
        $builder->join('sm_bentuk_pendidikan', 'sm_bentuk_pendidikan.id_bentuk_pendidikan = sm_pegawai.bentuk_pendidikan_id', 'left');
        $builder->join('sm_jabatan', 'sm_jabatan.id_jabatan = sm_pegawai.jabatan_id', 'left');
        $builder->where('sm_users.sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }

    public function getBentukJabatan()
    {
        $builder = $this->db->table('sm_jabatan');
        return $builder->get()->getResultArray();
    }
}
