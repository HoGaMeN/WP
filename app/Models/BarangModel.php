<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $useTimestamps = true;
    protected $primaryKey = 'id_barang';
    protected $allowedFields = ['nama_barang', 'slug', 'harga', 'stock', 'foto_barang', 'deskripsi', 'id_kategori', 'id_toko', 'id_barang'];

    public function getBarang($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getBarangPenjual($id_toko)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.slug, barang.harga, barang.foto_barang ')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('toko.id_toko', $id_toko)
            ->orderBy('barang.nama_barang', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function getDaftarBarang()
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.slug, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang,barang.updated_at, toko.nama_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->orderBy('barang.nama_barang', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function deleteBarang($id_barang)
    {
        $this->where('id_barang', $id_barang)->delete();
    }
}
