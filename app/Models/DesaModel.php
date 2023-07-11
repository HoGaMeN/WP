<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    protected $table = 'desa';
    protected $allowedFields = ['id_kecamatan', 'nama_desa'];

    public function getDesa()
    {
        return $this->findAll();
    }
}
