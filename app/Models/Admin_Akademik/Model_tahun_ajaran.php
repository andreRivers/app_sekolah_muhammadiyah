<?php

namespace App\Models\Admin_Akademik;

use CodeIgniter\Model;

class Model_tahun_ajaran extends Model
{
    protected $table = 'sm_tahun_ajaran';
    protected $primaryKey = 'id_tahun_ajaran';
    protected $allowedFields = ['tahun_ajaran', 'sts_tahun_ajaran', 'sekolah_kode', 'created_at'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at


    public function getTahunAjaran()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_tahun_ajaran');
        $builder->where('sm_tahun_ajaran.sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }
}
