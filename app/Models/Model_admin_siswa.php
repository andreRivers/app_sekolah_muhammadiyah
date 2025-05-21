<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_admin_siswa extends Model
{
    protected $table = 'sm_siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['jk', 'tempat_lahir', 'tgl_lahir', 'hobi', 'no_hp_siswa', 'alamat', 'nis', 'nisn', 'bentuk_pendidikan_id', 'kelas_id', 'sts_siswa', 'nm_ibu_kandung', 'nm_ayah_kandung', 'no_hp_ortu', 'created_at', 'updated_at'];
    protected $useTimestamps = false; // Atau true jika tabel memiliki created_at/updated_at
    public function getBentukPendidikan()
    {
        $builder = $this->db->table('sm_bentuk_pendidikan');
        return $builder->get()->getResultArray();
    }



    public function getSiswa()
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_siswa');
        $builder->select('sm_siswa.*, sm_bentuk_pendidikan.bentuk_pendidikan, sm_kelas.nama_kelas, sm_users.*');
        $builder->join('sm_bentuk_pendidikan', 'sm_bentuk_pendidikan.id_bentuk_pendidikan = sm_siswa.bentuk_pendidikan_id', 'left');
        $builder->join('sm_kelas', 'sm_kelas.id_kelas = sm_siswa.kelas_id', 'left');
        $builder->join('sm_users', 'sm_users.kode_person = sm_siswa.nis', 'left');
        return $builder->get()->getResultArray();
    }

    public function getKelas()
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

    public function getDetailSiswa($id_siswa)
    {
        $kelompok =  session()->get('sekolah_kode');
        $builder = $this->db->table('sm_siswa');
        $builder->select('sm_siswa.*, sm_bentuk_pendidikan.bentuk_pendidikan, sm_kelas.kelas, sm_users.*');
        $builder->join('sm_bentuk_pendidikan', 'sm_bentuk_pendidikan.id_bentuk_pendidikan = sm_siswa.bentuk_pendidikan_id', 'left');
        $builder->join('sm_kelas', 'sm_kelas.id_kelas = sm_siswa.kelas_id', 'left');
        $builder->join('sm_users', 'sm_users.kode_person = sm_siswa.nis', 'left');
        $builder->where('sm_users.sekolah_kode', $kelompok);
        $builder->where('sm_siswa.id_siswa', $id_siswa);
        return $builder->get()->getRowArray();
    }
}
