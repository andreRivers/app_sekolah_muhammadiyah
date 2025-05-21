<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_pengguna extends Model
{
    protected $table = 'sm_users'; // ganti dengan nama tabel kamu
    protected $primaryKey = 'id_akun';
    protected $allowedFields = [
        'id_akun',
        'kode_person',
        'email',
        'name',
        'jurusan_kode',
        'sekolah_kode',
        'role_id',
        'is_active',
        'password',
        'image',
        'no_hp',
        'at_created',

    ];


    public function getAll()
    {
        $kelompok =  "<?= session('sekolah_kode'); ?>";
        $builder = $this->db->table('sm_users');
        $builder->select('sm_users.*, sm_sekolah.sekolah'); // pilih kolom yang ingin diambil
        $builder->join('sm_sekolah', 'sm_sekolah.kode_sekolah = sm_users.sekolah_kode', 'left');
        return $builder->get()->getResultArray();
    }

    public function getPenggunaById($id_akun)
    {
        return $this->db->table('sm_users')->where('id_akun', $id_akun)->get()->getRowArray();
    }
}
