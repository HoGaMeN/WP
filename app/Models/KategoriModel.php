<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['kategori'];

    public function getKategori()
    {
        return $this->findAll();
    }

    public function exists($kategoriId)
    {
        return $this->where('id_kategori', $kategoriId)->countAllResults() > 0;
    }
}
