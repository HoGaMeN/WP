<?php

namespace App\Models;

use CodeIgniter\Model;

class TokoModel extends Model
{
    protected $table = 'toko';
    protected $allowedFields = ['id_toko', 'nama_toko', 'id_pembeli', 'id_kecamatan', 'id_desa', 'detail_alamat', 'foto_toko'];

    public function getToko($email)
    {
        return $this->db->table('users')
            ->select('toko.id_toko, toko.nama_toko,id_kecamatan,id_desa,detail_alamat,foto_toko')
            ->join('pembeli', 'users.email = pembeli.email')
            ->join('toko', 'pembeli.id_pembeli = toko.id_pembeli')
            ->where('users.email', $email)
            ->get()
            ->getRowArray();
    }
}
