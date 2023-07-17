<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<?php if (in_groups('pembeli')) : ?>
    <div class="border-black border-bottom border-top border-4" style="background-color: aquamarine; padding-top: 2rem; padding-bottom: 2rem;">
        <div class="container">
            <div class="col" id="memed">
                <?php if (isset($profil['foto_pembeli'])) : ?>
                    <img src="/Img/<?= $profil['foto_pembeli']; ?>" class="rounded-circle" style="max-height: 275px;">
                <?php endif; ?>
                <div class="nama" style="padding-top: 1rem;">
                    <h4><?= $profil['nama']; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: aquamarine; padding-top: 20px;">
        <div class="border border-primary border-3 rounded-pill" style="background-color: azure;">
            <div class="row rounded-pill" style="padding-top: 20px; padding-bottom: 20px;">
                <div class="col" style="padding-left: 50px;">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/receipt.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Riwayat Pembelian</button>
                </div>
                <div class="col">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/order-delivery.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Pesanan</button>
                </div>
                <div class="col" style="padding-right: 50px;">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/keranjang.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</button>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: aquamarine; width: auto; padding-bottom: 5%;">
        <div class="container">
            <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
                <button class="btn btn-info" style="width: 100%; height: 4rem;">Ubah Profil</button>
            </div>
            <?php if (!in_groups('penjual')) : ?>
                <div class="row" style="padding-bottom: 20px;">
                    <a class="btn btn-info " style="width: 100%; height: 4rem;" href="daftar_penjual">Daftar Penjual</a>
                </div>
            <?php endif; ?>
            <div class="row" style="padding-bottom: 20px;">
                <a class="btn btn-warning " style="width: 100%; height: 4rem;" href="<?= base_url('logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
<?php elseif (in_groups('penjual')) : ?>
    <div class="border-black border-bottom border-top border-4" style="background-color: aquamarine; padding-top: 2rem; padding-bottom: 2rem;">
        <div class="container">
            <div class="col" id="memed">
                <?php if (isset($profil['foto_pembeli'])) : ?>
                    <img src="/Img/<?= $profil['foto_pembeli']; ?>" class="rounded" style="max-height: 275px;">
                <?php endif; ?>
                <div class="nama mt-2">
                    <h4><?= $profil['nama']; ?></h4>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: aquamarine; padding-top: 20px;">
        <div class="border border-primary border-3 rounded-pill" style="background-color: azure;">
            <div class="row rounded-pill" style="padding-top: 20px; padding-bottom: 20px;">
                <div class="col" style="padding-left: 50px;">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/receipt.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Riwayat Pembelian</button>
                </div>
                <div class="col">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/order-delivery.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Pesanan</button>
                </div>
                <div class="col" style="padding-right: 50px;">
                    <button class="btn btn-info" style="width: 100%; height: 4rem;"><img src="/Img/keranjang.png" alt="Logo" width="20" height="20" class="d-inline-block align-text-top"> | Keranjang</button>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: aquamarine; width: auto; padding-bottom: 5%;">
        <div class="container">
            <div class="row" style="padding-bottom: 20px; padding-top: 20px;">
                <button class="btn btn-info" style="width: 100%; height: 4rem;">Ubah Profil</button>
            </div>
            <div class="row" style="padding-bottom: 20px;">
                <button class="btn btn-info " style="width: 100%; height: 4rem;">Toko</button>
            </div>
            <div class="row" style="padding-bottom: 20px;">
                <a class="btn btn-warning" style="width: 100%; height: 4rem;" href="<?= base_url('logout'); ?>">Keluar</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>