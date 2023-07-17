<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="border-black border-bottom border-top border-4" style="background-color: aquamarine; padding-top: 2rem; padding-bottom: 2rem;">
    <div class="container">
        <div class="col" id="memed">
            <?php if (!empty($barang)) : ?>
                <?php if (isset($barang[0]['foto_toko'])) : ?>
                    <img src="/Img/<?= $barang[0]['foto_toko']; ?>" class="rounded-circle" style="max-height: 275px;">
                <?php endif; ?>
                <div class="nama" style="padding-top: 1rem;">
                    <?php if (!empty($barang[0]['nama_toko'])) : ?>
                        <h4><?= $barang[0]['nama_toko']; ?></h4>
                        <p>Kecamatan <?= $barang[0]['nama_kecamatan']; ?>, Desa <?= $barang[0]['nama_desa']; ?>, Detil alamat <?= $barang[0]['detail_alamat']; ?></p>
                    <?php else : ?>
                        <h4>Toko tidak ditemukan</h4>
                    <?php endif; ?>
                </div>
            <?php else : ?>
                <h4>Toko tidak ditemukan</h4>
            <?php endif; ?>
            <a href="https://wa.me/6285157222618?text=Halo%2C%20saya%20tertarik%20untuk%20berbicara%20dengan%20Anda" target="_blank">Hubungi via WhatsApp</a>
        </div>

    </div>
</div>
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <h2 class="card-header">Daftar Barang</h2>
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
                                        <p><a href="" class="link-info link-offset-2 link-underline link-underline-opacity-0">Toko: <?= $b['nama_toko']; ?></a></p>
                                        <a href="" class="btn btn-outline-primary"><img src="/Img/keranjang.png" id="keranjang" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</a>
                                        <a href="" class="btn btn-outline-info">Detail Barang</a>
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