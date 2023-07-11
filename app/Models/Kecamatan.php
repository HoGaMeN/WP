<?php

namespace App\Models;

use CodeIgniter\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $allowedFields = ['id_kecamatan', 'nama_kecamatan'];

    public function getKecamatan()
    {
        return $this->findAll();
    }


    public function getDesaByKecamatanId($kecamatanId)
    {
        return $this->db->table('desa')
            ->select('nama_desa')
            ->join('kecamatan', 'desa.fk_id_kecamatan = kecamatan.id_kecamatan')
            ->where('desa.fk_id_kecamatan', $kecamatanId)
            ->orderBy('desa.nama_desa', 'ASC')
            ->get()
            ->getResultArray();
    }


    // public function exists($kecamataniId)
    // {
    //     return $this->where('id_kecamatn', $kecamId)->countAllResults() > 0;
    // }
}
