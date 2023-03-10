<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['photo', 'name', 'email', 'jabatan', 'gender'];

    public function search($keyword)
    {
        return $this->table('pegawai')->like('name', $keyword);
    }
}
