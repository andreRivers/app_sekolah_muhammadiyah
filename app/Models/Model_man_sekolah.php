<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_man_sekolah extends Model
{
    protected $table = 'sm_sekolah'; // ganti dengan nama tabel kamu
    protected $primaryKey = 'id_sekolah';
    protected $allowedFields = [
              'kode_sekolah',
              'sekolah',
              'alamat',
              'provinsi',
              'kelurahan',
              'kecamatan',
              'telp_sekolah',
              'kode_pos',
              'active_sekolah',
              'akreditasi',
              'kepala_sekolah',
              'bentuk_pendidikan',
              'sts_kepemilikan',
              'sk_pendirian',
              'tgl_pendirian',
              'sk_izin_operasional',
              'tgl_sk_izin_operasional',
              'at_created'
            ];


    public function getAll()
    {
        $builder = $this->db->table('sm_sekolah');
        return $builder->get()->getResultArray();
    }

    public function getSekolahById($id_sekolah)
    {
    return $this->db->table('sm_sekolah')->where('id_sekolah', $id_sekolah)->get()->getRowArray();
    }
    
}
