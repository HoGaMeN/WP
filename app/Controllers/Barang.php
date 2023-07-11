<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\Kecamatan;
use App\Models\DesaModel;
use App\Models\PembeliModel;
use App\Models\TokoModel;
use Myth\Auth\Models\GroupModel;

class Barang extends BaseController
{

    protected $barangModel;
    protected $kategori;
    protected $kecamatan;
    protected $desaModel;
    protected $pembeli;
    protected $tokoModel;
    protected $groupModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategori = new KategoriModel();
        $this->kecamatan = new Kecamatan();
        $this->desaModel = new DesaModel();
        $this->pembeli = new PembeliModel();
        $this->tokoModel = new TokoModel();
        $this->groupModel = new GroupModel();
    }

    public function index()
    {
        $email = !empty(user()->email) ? user()->email : null;

        $data = [
            'title' => 'Dashboard | WarungPedia',
            'profil' => $this->pembeli->getProfil($email)
        ];
        return view('dashboard', $data);
    }

    public function login()
    {
        $email = !empty(user()->email) ? user()->email : null; // Mendapatkan email pengguna yang sedang login

        $data['config'] = config('Auth');
        $data['title'] = 'Login | WarungPedia';
        $data['profil'] = $this->pembeli->getProfil($email);

        return view('login', $data);
    }

    public function register()
    {
        $data = [
            'title' => 'Daftar | WarungPedia',
            'kecamatan' => $this->kecamatan->getKecamatan(),
            'desa' => $this->desaModel->getDesa(),
        ];
        return view('daftar_pembeli', $data);
    }

    // public function getDesaByKecamatan($kecamatanId)
    // {
    //     $model = new DesaModel();
    //     $desa = $model->getDesaByKecamatan($kecamatanId);
    //     echo json_encode($desa);
    // }

    public function barang()
    {
        $email = !empty(user()->email) ? user()->email : null; // Mendapatkan email pengguna yang sedang login
        $toko = $this->tokoModel->getToko($email);

        $id_toko = $toko['id_toko'];

        $data = [
            'title' => 'Barang | WarungPedia',
            'barang' => $this->barangModel->getBarangPenjual($id_toko),
            'profil' => $this->pembeli->getProfil($email),
        ];

        return view('Penjual/mybarang', $data);
    }

    public function detail($slug)
    {
        $email = !empty(user()->email) ? user()->email : null;

        $data = [
            'title' => 'Detail Barang | WarungPedia',
            'b_detail' => $this->barangModel->getBarang($slug),
            'profil' => $this->pembeli->getProfil($email)
        ];

        if (empty($data['b_detail'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama barang' . $slug . 'tidak ditemukan');
        }
        return view('Penjual/detail_barang', $data);
    }

    public function tambah_barang()
    {
        $email = !empty(user()->email) ? user()->email : null;

        $data = [
            'title' => 'Tambah Barang | WarungPedia',
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategori->getKategori(),
            'profil' => $this->tokoModel->getToko($email)
        ];

        return view('Penjual/tambah_barang', $data);
    }

    public function save()
    {
        $email = !empty(user()->email) ? user()->email : null;

        $profil = $this->tokoModel->getToko($email);

        $validationRules = [
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
        ];

        if (!$this->validate($validationRules)) {
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

        $slug = url_title($this->request->getVar('nama_barang'), '-', true);
        $kategoriId = $this->request->getVar('kategori');

        $kategoriModel = new \App\Models\KategoriModel();
        $kategoriExists = $kategoriModel->exists($kategoriId);

        if (!$kategoriExists) {
            session()->setFlashdata('err', 'Kategori yang dipilih tidak valid.');
            return redirect()->to('penjual/tambah_barang')->withInput();
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getVar('nama_barang'),
            'slug' => $slug,
            'harga' => $this->request->getVar('harga'),
            'stock' => $this->request->getVar('stock'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto_barang' => $namaSampul,
            'id_kategori' => $kategoriId,
            'id_toko' => $profil['id_toko']
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('penjual/barang');
    }

    public function delete($id_barang)
    {
        $barang = $this->barangModel->find($id_barang);

        if (!$barang) {
            session()->setFlashdata('err', 'Barang tidak ditemukan.');
            return redirect()->to('/'); // Ubah URL redirect sesuai kebutuhan
        }

        $this->barangModel->deleteBarang($id_barang);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('penjual/barang'); // Ubah URL redirect sesuai kebutuhan
    }



    public function penjual_simpan()
    {
        $email = !empty(user()->email) ? user()->email : null;

        $profil = $this->pembeli->getProfil($email);

        $user = user(); // Mendapatkan data pengguna saat ini
        $iduser = $user->id; // Mendapatkan ID pembeli dari pengguna saat ini
        $idPembeli = $profil['id_pembeli'];

        $validationRules = [
            'nama_toko' => [
                'rules' => 'required|is_unique[toko.nama_toko]',
                'errors' => [
                    'required' => 'Nama toko harus diisi.',
                    'is_unique' => 'Nama toko sudah digunakan.'
                ]
            ],
            'detail_alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Detail alamat harus diisi.'
                ]
            ],
            'foto_toko' => [
                'rules' => 'uploaded[foto_toko]|max_size[foto_toko,1024]|is_image[foto_toko,jpg,jpeg,png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu!',
                    'max_size' => 'Ukuran gambar terlalu besar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                    'is_image' => 'Yang anda pilih bukan gambar!'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('err', $validation->listErrors());
            return redirect()->to('daftar_penjual')->withInput();
        }

        $fileSampul = $this->request->getFile('foto_toko');
        if ($fileSampul->isValid()) {
            $fileSampul->move('./Img/');
            $foto_toko = $fileSampul->getName();
        } else {
            $foto_toko = 'kecap.jpg';
        }

        $kategoriId = $this->request->getVar('kategori');

        $kategoriModel = new \App\Models\KategoriModel();
        $kategori = $kategoriModel->find($kategoriId);

        if (!$kategori) {
            session()->setFlashdata('err', 'Kategori yang dipilih tidak valid.');
            return redirect()->to('daftar_penjual')->withInput();
        }

        // Mengambil data alamat
        $nama_toko = $this->request->getPost('nama_toko');
        $idKecamatan = $this->request->getPost('kecamatan');
        $idDesa = $this->request->getPost('desa');
        $detailAlamat = $this->request->getPost('detail_alamat');
        $foto_toko = $this->request->getFile('foto_toko');
        // Lakukan validasi dan manipulasi data foto jika diperlukan

        // Menyimpan data ke tabel toko
        $tokoModel = new TokoModel();
        $tokoData = [
            'nama_toko' => $nama_toko,
            'id_pembeli' => $idPembeli,
            'id_kecamatan' => $idKecamatan,
            'id_desa' => $idDesa,
            'detail_alamat' => $detailAlamat,
            'foto_toko' => $foto_toko->getName(), // Gunakan nama file foto yang sesuai
        ];
        $tokoModel->insert($tokoData);

        // Memperbarui data pada tabel auth_groups_users
        $authGroupModel = new \Myth\Auth\Models\GroupModel();
        $groupIDJ = 2; // ID grup penjual
        $groupIDP = 1; // ID grup pembeli
        $authGroupModel->addUserToGroup($iduser, $groupIDJ);
        $authGroupModel->removeUserFromGroup($iduser, $groupIDP);

        // Redirect ke halaman profil atau halaman lain yang sesuai
        return redirect()->to('/profil');
    }
}
