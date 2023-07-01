<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Page extends BaseController
{
    protected $barangModel;

    public function __construct()

    {
        $this->barangModel = new BarangModel();
    }
    public function index()
    {
        return view('welcome_message');
    }

    public function daftar_barang()
    {
        $data = [
            'title' => 'Barang | WarungPedia',
            'barang' => $this->barangModel->getBarang()
        ];
        return view('Pembeli/daftar_barang', $data);
    }
}
