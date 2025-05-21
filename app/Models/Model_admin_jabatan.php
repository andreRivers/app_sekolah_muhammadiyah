<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin_jabatan extends Model
{
    protected $table = 'sm_jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['kode_jabatan', 'jabatan', 'sekolah_kode'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at


    public function getAll()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_jabatan');
        $builder->where('sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }
}
