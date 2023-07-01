<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/penjual/tambah_barang" class="btn btn-primary mt-3">Tambah Barang</a>
                <table class="table caption-top">
                    <caption>List Barang</caption>
                    <?php if (session()->get('pesan')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar Produk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($barang as $b) : ?>
                            <tr>
                                <th scope="row"><?= $n++; ?></th>
                                <td><img src="/Img/<?= $b['foto_barang']; ?>" alt="" class="sampul"></td>
                                <td><?= $b['nama_barang']; ?></td>
                                <td>Rp.<?= $b['harga']; ?></td>
                                <td>
                                    <a href="/penjual/barang/detail/<?= $b['slug']; ?>" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?= $this->endSection(); ?>