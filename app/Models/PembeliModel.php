<?php

namespace App\Models;

use CodeIgniter\Model;

class PembeliModel extends Model
{
    protected $table = 'pembeli';
    protected $allowedFields = ['nama', 'alamat', 'email', 'foto_pembeli', 'fk_id_kecamatan', 'fk_id_desa', 'telepon'];

    public function getProfil($email)
    {
        return $this->db->table('pembeli')
            ->select('pembeli.id_pembeli, pembeli.nama, pembeli.alamat, pembeli.email, pembeli.foto_pembeli, pembeli.fk_id_kecamatan, pembeli.fk_id_desa, pembeli.telepon')
            ->join('users', 'pembeli.email = users.email')
            ->where('pembeli.email', $email)
            ->get()
            ->getRowArray();
    }
}
