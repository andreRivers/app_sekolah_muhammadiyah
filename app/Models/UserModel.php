<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'sm_users';
    protected $primaryKey = 'id_akun';

    protected $allowedFields = ['name', 'email', 'password', 'role_id', 'is_active', 'image', 'jurusan_kode'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}
