<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <h2 class="card-header">Detail Barang</h2>
        <div class="container text-center">
            <div class="card mb-3 container">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/Img/<?= $barang['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 600px;">
                    </div>
                    <div class="col-md-8" style="padding-top: 3rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
                            <p class="card-text">Stok tersisa : <?= $barang['stock']; ?></p>
                            <p class="card-text">Rp.<?= $barang['harga']; ?></p>
                            <p class="card-text"><?= $barang['deskripsi']; ?></p>
                            <p><a href="<?= base_url('toko/' . $barang['id_toko']); ?>" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $barang['nama_toko']; ?></a></p>
                            <div class="kuantitas">Kuantitas</div>
                            <div class="d-flex-center" style="margin-top: 5px; margin-bottom: 5px;">
                                <button onclick="decrement()" class="btn btn-danger d-inline">-</button>
                                <input onchange="batas()" style="width: 100px" type="number" id="inputKuantitas" class="form-control d-inline" value="1" min="1" max="<?= $barang['stock']; ?>">
                                <button onclick="increment()" class="btn btn-primary d-inline">+</button>
                            </div>
                            <a href="<?= base_url('barang/edit_barang/' . $barang['id_barang']); ?>" class="btn btn-outline-success"><img src="/Img/keranjang.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                            <a href="<?= base_url('barang/delete/' . $barang['id_barang']); ?>" class="btn btn-outline-primary"><img src="/Img/checklist.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Beli Sekarang
                            </a>
                            <p class="card-text"><small class="text-body-secondary">Terakhir diubah <?= $barang['updated_at']; ?></small></p>
                            <!-- <a href="">Kembali ke daftar barang</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="padding-top: 5rem;">
    <h3 class="d-inline">Rekomendasi serupa <a href=""><img src="/Img/next.png" width="24" height="24" style="margin-top: -5px;"></a></h3>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="padding-top: 10px;">
        <div class="carousel-inner">
            <?php
            $chunks = array_chunk($rekomendasi, 2); // Memecah array data barang menjadi kelompok dengan ukuran 2
            foreach ($chunks as $index => $chunk) : ?>
                <div class="carousel-item <?= ($index == 0) ? 'active' : ''; ?>">
                    <div class="container text-center">
                        <div class="row row-cols-2">
                            <?php foreach ($chunk as $b) : ?>
                                <div class="col">
                                    <div class="card mb-3 ms-3 tem" style="max-width: 540px; margin-top: 20px;">
                                        <div class=" row g-0">
                                            <div class="col-md-4">
                                                <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 200px;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $b['nama_barang']; ?></h5>
                                                    <p class="card-text">Stok tersisa: <?= $b['stock']; ?></p>
                                                    <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                                    <p><a href="<?= base_url('toko/' . $b['id_toko']); ?>" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $b['nama_toko']; ?></a></p>
                                                    <a href="" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                                                    <a href="<?= base_url('/barang/detail/' . $b['id_barang']); ?>" class="btn btn-outline-info">Detail Barang</a>
                                                    <p class="card-text"><small class="text-body-secondary">Terakhir diubah oleh penjual <?= $b['updated_at']; ?></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev btn btn-dark" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn btn-dark" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>
<div class="container" style="padding-top: 5rem;">
    <h3 class="d-inline">Rekomendasi barang toko yang sama <a href=""><img src="/Img/next.png" width="24" height="24" style="margin-top: -5px;"></a></h3>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" style="padding-top: 10px;">
        <div class="carousel-inner">
            <?php
            $chunks = array_chunk($rekomendasiToko, 2); // Memecah array data barang menjadi kelompok dengan ukuran 2
            foreach ($chunks as $index => $chunk) : ?>
                <div class="carousel-item <?= ($index == 0) ? 'active' : ''; ?>">
                    <div class="container text-center">
                        <div class="row row-cols-2">
                            <?php foreach ($chunk as $b) : ?>
                                <div class="col">
                                    <div class="card mb-3 ms-3 tem" style="max-width: 540px; margin-top: 20px;">
                                        <div class=" row g-0">
                                            <div class="col-md-4">
                                                <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 200px;">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?= $b['nama_barang']; ?></h5>
                                                    <p class="card-text">Stok tersisa: <?= $b['stock']; ?></p>
                                                    <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                                    <p><a href="<?= base_url('toko/' . $b['id_toko']); ?>" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $b['nama_toko']; ?></a></p>
                                                    <a href="" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                                                    <a href="<?= base_url('/barang/detail/' . $b['id_barang']); ?>" class="btn btn-outline-info">Detail Barang</a>
                                                    <p class="card-text"><small class="text-body-secondary">Terakhir diubah oleh penjual <?= $b['updated_at']; ?></small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev btn btn-dark" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next btn btn-dark" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script>
    var stock = <?= $barang['stock']; ?>; // Jumlah stok yang tersedia

    function increment() {
        var inputKuantitas = document.getElementById("inputKuantitas");
        var kuantitas = parseInt(inputKuantitas.value);

        if (kuantitas < stock) {
            kuantitas++;
            inputKuantitas.value = kuantitas;
        }
    }

    function batas() {
        var inputKuantitas = document.getElementById("inputKuantitas");
        var kuantitas = parseInt(inputKuantitas.value);

        if (kuantitas > stock) {
            inputKuantitas.value = stock;
        }
    }

    function decrement() {
        var inputKuantitas = document.getElementById("inputKuantitas");
        var kuantitas = parseInt(inputKuantitas.value);

        if (kuantitas > 1) {
            kuantitas--;
            inputKuantitas.value = kuantitas;
        }
    }
</script>


<?= $this->endSection(); ?>