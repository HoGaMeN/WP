<?php

namespace App\Models;

use CodeIgniter\Model;

class transaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_toko', 'id_barang', 'nama_toko', 'id_pembeli', 'id_kecamatan', 'id_desa', 'detail_alamat', 'foto_toko', 'status'];

    public function getKeranjangByPembeli($id_pembeli)
    {
        return $this->db->table('transaksi')
            ->select('transaksi.*, barang.nama_barang, barang.harga, barang.stock, barang.foto_barang, toko.id_toko, toko.nama_toko')
            ->join('barang', 'transaksi.id_barang = barang.id_barang')
            ->join('toko', 'barang.id_toko = toko.id_toko')
            ->where('transaksi.id_pembeli', $id_pembeli)
            ->where('transaksi.status', 'keranjang')
            ->get()
            ->getResultArray();
    }
}
