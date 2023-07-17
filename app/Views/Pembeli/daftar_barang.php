<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <?php if (!empty($searchError)) : ?>
        <div class="alert alert-warning" role="alert"><?= $searchError ?></div>
    <?php endif; ?>

    <!-- Tampilkan informasi pop up jika barang tidak ditemukan -->
    <?php if (!empty($notFound)) : ?>
        <div class="alert alert-info" role="alert"><?= $notFound ?></div>
    <?php endif; ?>
    <div class="container" style="padding-top: 5rem;">
        <h3 class="d-inline">Kategori</h3>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="margin-top: 20px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            </div>
            <div class="carousel-inner" style="max-height: 400px;">
                <div class="carousel-item active">
                    <a href=""><img src="/Img/makanan.jpg" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black;">Makan dan Minuman</h5>
                        <p style="color: black;">Cari makanan atau Minuman?, Warung Pedia saja.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href=""><img src="/Img/9892234_4273237.jpg" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black;">Kebutuhan Rumah Tangga</h5>
                        <p style="color: black;">Cari kebutuhan rumah tangga?, Warung Pedia saja.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href=""><img src="/Img/perabotan.jpg" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black;">Perabotan Rumah tangga</h5>
                        <p style="color: black;">Cari Perabotan Rumah Tangga?, Warung Pedia saja.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <a href=""><img src="/Img/sayur.jpg" class="d-block w-100" alt="..."></a>
                    <div class="carousel-caption d-none d-md-block">
                        <h5 style="color: black;">Sayuran</h5>
                        <p style="color: black;">Cari Sayuran?, Warung Pedia saja.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <?php if (in_groups('pembeli') || in_groups('penjual')) : ?>
            <h3 class="d-inline" style="margin-top: 20px;">Rekomendasi <a href=""><img src="/Img/next.png" width="24" height="24" style="margin-top: -5px;"></a></h3>
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
                                                            <a href="<?= base_url('/pembeli/tambah-ke-keranjang/' . $b['id_barang']); ?>" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
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
        <?php endif ?>
    </div>
    <div class="container" style="padding-top: 5rem; padding-bottom: 3rem;">
        <div class="card">
            <h2 class="card-header">Daftar Barang</h2>
            <div class="search ms-3 mt-2 mb-2">
                <div class="search-box">
                    <div class="search-field">
                        <form action="<?= base_url('barang/cari'); ?>" method="GET">
                            <input placeholder="Search..." class="input" type="text" name="keyword">
                            <div class="search-box-icon">
                                <button class="btn-icon-content" type="submit">
                                    <i class="search-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
                                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path>
                                        </svg>
                                    </i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <div class="row row-cols-2">
                    <?php foreach ($barang as $b) : ?>
                        <div class="col">
                            <div class="card mb-3 ms-3 tem" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 200px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $b['nama_barang']; ?></h5>
                                            <p class="card-text">Stok tersisa: <?= $b['stock']; ?></p>
                                            <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                            <p><a href="<?= base_url('toko/' . $b['id_toko']); ?>" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $b['nama_toko']; ?></a></p>
                                            <a href="<?= base_url('/pembeli/tambah-ke-keranjang/' . $b['id_barang']); ?>" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
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
    </div>
</body>
<?= $this->endSection(); ?>