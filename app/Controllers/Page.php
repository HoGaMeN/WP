<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\Kecamatan;
use App\Models\DesaModel;
use App\Models\PembeliModel;
use App\Models\TokoModel;



class Page extends BaseController
{
    protected $barangModel;
    protected $kategori;
    protected $kecamatan;
    protected $desaModel;
    protected $pembeli;
    protected $tokoModel;

    public function __construct()

    {
        $this->barangModel = new BarangModel();
        $this->kategori = new KategoriModel();
        $this->kecamatan = new Kecamatan();
        $this->desaModel = new DesaModel();
        $this->pembeli = new PembeliModel();
        $this->tokoModel = new TokoModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function daftar_barang()
    {
        $email = !empty(user()->email) ? user()->email : null; // Mendapatkan email pengguna yang sedang login

        $profil = $email ? $this->pembeli->getProfil($email) : null;

        $data = [
            'title' => 'Barang | WarungPedia',
            'barang' => $this->barangModel->getDaftarBarang(),
            'profil' => $profil,
            'rekomendasi' => $this->barangModel->getBarangRekomendasi($profil ? $profil['fk_id_kecamatan'] : null)
        ];

        return view('Pembeli/daftar_barang', $data);
    }


    public function profil()
    {
        $email = !empty(user()->email) ? user()->email : null; // Mendapatkan email pengguna yang sedang login

        $data = [
            'title' => "Profile | WarungPedia",
            'profil' => $this->pembeli->getProfil($email)
        ];

        return view('Penjual/profil', $data);
    }

    public function daftar_penjual()
    {
        $email = !empty(user()->email) ? user()->email : null;

        $data = [
            'title' => 'Daftar Penjual | WarungPedia',
            'kecamatan' => $this->kecamatan->getKecamatan(),
            'desa' => $this->desaModel->getDesa(),
            'profil' => $this->pembeli->getProfil($email)
        ];
        return view('Pembeli/daftar_penjual', $data);
    }
}
