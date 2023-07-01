<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container" style="padding-top: 5rem;">
        <div class="card">
            <h2 class="card-header">Daftar Barang</h2>
            <div class="container text-center">
                <div class="row row-cols-2">
                    <?php foreach ($barang as $b) : ?>
                        <div class="col">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="/Img/<?= $b['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 200px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $b['nama_barang']; ?></h5>
                                            <p class="card-text">Stok tersisa : <?= $b['stock']; ?></p>
                                            <p class="card-text">Rp.<?= $b['harga']; ?></p>
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