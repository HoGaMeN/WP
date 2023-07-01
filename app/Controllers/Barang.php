<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{

    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard | WarungPedia',
        ];
        return view('dashboard', $data);
    }

    public function login()
    {
        $data['config'] = config('Auth');
        $data['title'] = 'Login | WarungPedia';

        return view('login', $data);
    }

    public function register()
    {
        $data['title'] = 'Daftar | WarungPedia';
        return view('daftar_pembeli', $data);
    }

    public function barang()
    {
        $data = [
            'title' => 'Barang | WarungPedia',
            'barang' => $this->barangModel->getBarang()
        ];
        return view('Penjual/mybarang', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Barang | WarungPedia',
            'b_detail' => $this->barangModel->getBarang($slug)
        ];

        if (empty($data['b_detail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama barang' . $slug . 'tidak ditemukan');
        }
        return view('Penjual/detail_barang', $data);
    }

    public function tambah_barang()
    {
        $data = [
            'title' => 'Tambah Barang | WarungPedia',
            'validation' => \Config\Services::validation()
        ];

        return view('Penjual/tambah_barang', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama barang harus diisi.'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga harus diisi.'
                ]
            ],
            'stock' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok harus diisi.'
                ]
            ],
            'foto_barang' => [
                'rules' => 'uploaded[foto_barang]|max_size[foto_barang,1024]|is_image[foto_barang,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu!',
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                    'is_image' => 'Yang anda pilih bukan gambar!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('err', $validation->listErrors());
            return redirect()->to('penjual/tambah_barang')->withInput();
        }

        $fileSampul = $this->request->getFile('foto_barang');
        if ($fileSampul->isValid()) {
            $fileSampul->move('./Img/');
            $namaSampul = $fileSampul->getName();
        } else {
            $namaSampul = 'kecap.jpg';
        }

        $slug =  url_title($this->request->getVar('nama_barang'), '-', true);
        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stock' => $this->request->getVar('stock'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto_barang' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('penjual/barang');
    }
}
