<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

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
            ->select('barang.nama_barang, barang.id_barang, barang.slug, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang,barang.updated_at, toko.nama_toko, toko.id_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->orderBy('barang.nama_barang', 'ASC')
            ->get()
            ->getResultArray();
    }

    // public function getBarangKategori

    public function getBarangRekomendasi($id_kecamatan)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.id_barang, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.id_kategori, barang.updated_at, toko.nama_toko, toko.id_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('toko.id_kecamatan', $id_kecamatan)
            ->orderBy('barang.harga')
            ->get()
            ->getResultArray();
    }

    public function deleteBarang($id_barang)
    {
        $this->where('id_barang', $id_barang)->delete();
    }

    public function searchBarang($keyword)
    {
        return $this->select('barang.nama_barang, barang.id_barang, barang.slug, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.updated_at, toko.nama_toko, toko.id_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->like('barang.nama_barang', $keyword)
            ->orLike('toko.nama_toko', $keyword)
            ->findAll();
    }

    public function searchBarangToko($keyword, $id_toko)
    {
        return $this->select('barang.nama_barang, barang.slug, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.updated_at, toko.nama_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->like('barang.nama_barang', $keyword)
            ->orLike('toko.nama_toko', $keyword)
            ->where('toko.id_toko', $id_toko)
            ->findAll();
    }

    public function getDetailToko($id_toko)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.id_barang, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.id_kategori, barang.updated_at, toko.nama_toko, toko.foto_toko, toko.detail_alamat, kecamatan.nama_kecamatan, desa.nama_desa')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->join('kecamatan', 'toko.id_kecamatan = kecamatan.id_kecamatan')
            ->join('desa', 'toko.id_desa = desa.id_desa')
            ->where('toko.id_toko', $id_toko)
            ->get()
            ->getResultArray();
    }

    public function getDetailBarang($id_barang)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.id_barang, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.id_kategori, barang.updated_at, toko.id_toko, toko.nama_toko, toko.foto_toko')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('barang.id_barang', $id_barang)
            ->get()
            ->getRowArray();
    }

    public function getBarangRekomendasiSejenis($id_kategori)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.id_barang, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.id_kategori, barang.updated_at, toko.id_toko, toko.nama_toko, toko.foto_toko, kategori.id_kategori')
            ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('barang.id_kategori', $id_kategori)
            ->get()
            ->getResultArray();
    }

    public function getBarangRekomendasiToko($id_toko)
    {
        return $this->db->table('barang')
            ->select('barang.nama_barang, barang.id_barang, barang.harga, barang.stock, barang.deskripsi, barang.foto_barang, barang.id_kategori, barang.updated_at, toko.id_toko, toko.nama_toko, toko.foto_toko, kategori.id_kategori')
            ->join('kategori', 'barang.id_kategori = kategori.id_kategori')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('barang.id_toko', $id_toko)
            ->get()
            ->getResultArray();
    }
}
