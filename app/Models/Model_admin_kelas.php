<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin_kelas extends Model
{
    protected $table = 'sm_kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['nama_kelas', 'kelas', 'bentuk_pendidikan_id', 'sekolah_kode'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at


    public function getBentukPendidikan()
    {
        $builder = $this->db->table('sm_bentuk_pendidikan');
        return $builder->get()->getResultArray();
    }


    public function getAll()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_kelas');
        $builder->select('sm_kelas.*, sm_bentuk_pendidikan.bentuk_pendidikan'); // pilih kolom yang ingin diambil
        $builder->join(
            'sm_bentuk_pendidikan',
            'sm_bentuk_pendidikan.id_bentuk_pendidikan = sm_kelas.bentuk_pendidikan_id',
            'left'
        );
        $builder->where('sm_kelas.sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }

    public function getSiswa()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_kelas');
        $builder->select('sm_kelas.*, sm_bentuk_pendidikan.bentuk_pendidikan'); // pilih kolom yang ingin diambil
        $builder->join(
            'sm_bentuk_pendidikan',
            'sm_bentuk_pendidikan.id_bentuk_pendidikan = sm_kelas.bentuk_pendidikan_id',
            'left'
        );
        $builder->where('sm_kelas.sekolah_kode', $kelompok);
        return $builder->get()->getResultArray();
    }
}
