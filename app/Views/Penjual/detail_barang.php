<?= $this->extend('Penjual/Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <h2 class="card-header">Detail Barang</h2>
        <div class="container text-center">
            <div class="card mb-3 container">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/Img/<?= $b_detail['foto_barang']; ?>" class="img-fluid rounded-start" alt="..." style="max-height: 600px;">
                    </div>
                    <div class="col-md-8" style="padding-top: 3rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $b_detail['nama_barang']; ?></h5>
                            <p class="card-text">Stok tersisa : <?= $b_detail['stock']; ?></p>
                            <p class="card-text">Rp.<?= $b_detail['harga']; ?></p>
                            <p class="card-text"><?= $b_detail['deskripsi']; ?></p>
                            <a href="" class="btn btn-outline-primary"><img src="/Img/keranjang.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                            <a href="" class="btn btn-outline-info">Detail Barang</a>
                            <p class="card-text"><small class="text-body-secondary">Terakhir diubah <?= $b_detail['updated_at']; ?></small></p>
                            <p class="card-text"><small class="text-body-secondary">Ditambahakan pada <?= $b_detail['created_at']; ?></small></p>
                            <!-- <a href="">Kembali ke daftar barang</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>