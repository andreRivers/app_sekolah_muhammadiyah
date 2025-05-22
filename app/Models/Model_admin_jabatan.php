<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin_jabatan extends Model
{
    protected $table = 'sm_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['kode_jabatan', 'jabatan', 'kode_sekolah', 'bentuk_pendidikan'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at


    public function getAll()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_jabatan');
        $builder->join('sm_sekolah', 'sm_sekolah.kode_sekolah = sm_jabatan.kode_sekolah', 'left');
        $builder->where('sm_jabatan.kode_sekolah', $kelompok);
        return $builder->get()->getResultArray();
    }

    public function getBentukJabatan()
    {
        $builder = $this->db->table('sm_jabatan');
        return $builder->get()->getResultArray();
    }
}
