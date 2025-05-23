<?php

namespace App\Models\Admin_Akademik;

use CodeIgniter\Model;

class Model_semester extends Model
{
    protected $table = 'sm_semester';
    protected $primaryKey = 'id_semester';
    protected $allowedFields = ['semester', 'tahun_ajaran_id', 'sekolah_kode', 'created_at'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at


    public function getSemester()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_semester a');
        $builder->select('a.*, b.*');
        $builder->join('sm_tahun_ajaran b', 'b.id_tahun_ajaran = a.tahun_ajaran_id', 'left');
        $builder->where('a.sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }

    public function getTahunAjaran()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_tahun_ajaran');
        $builder->where('sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }
}
