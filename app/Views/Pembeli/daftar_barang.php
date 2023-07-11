<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container" style="padding-top: 5rem;">
        <div class="card">
            <h2 class="card-header">Daftar Barang</h2>
            <div class="search ms-3 mt-2 mb-2">
                <div class="search-box">
                    <div class="search-field">
                        <input placeholder="Search..." class="input" type="text">
                        <div class="search-box-icon">
                            <button class="btn-icon-content">
                                <i class="search-icon">
                                    <svg xmlns="://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
                                        <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" fill="#fff"></path>
                                    </svg>
                                </i>
                            </button>
                        </div>
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
                                            <p class="card-text">Stok tersisa : <?= $b['stock']; ?></p>
                                            <p class="card-text">Rp.<?= $b['harga']; ?></p>
                                            <p><a href="" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko : <?= $b['nama_toko']; ?></a></p>
                                            <a href="" class="btn btn-outline-primary"><img src="/Img/keranjang.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                                            <a href="" class="btn btn-outline-info">Detail Barang</a>
                                            <p class="card-text"><small class="text-body-secondary">Terakhir diubah oleh penjual <?= $b['updated_at']; ?></small></p>
                                            <!-- <a href="">Kembali ke daftar barang</a> -->
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