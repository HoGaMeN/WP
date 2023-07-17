<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <h2>Keranjang</h2>
    <?php if (empty($keranjang)) : ?>
        <p>Keranjang Anda kosong.</p>
    <?php else : ?>
        <?php foreach ($keranjang as $item) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- Tampilkan informasi gambar barang -->
                            <img src="/Img/<?= $item['foto_barang']; ?>" alt="<?= $item['nama_barang']; ?>" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h5><?= $item['nama_barang']; ?></h5>
                            <p>Harga: <?= $item['harga']; ?></p>
                            <p>Stok: <?= $item['stock']; ?></p>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex">
                                <div class="form-check">
                                    <!-- Checkbox untuk memilih barang -->
                                    <input class="form-check-input" type="checkbox" value="<?= $item['id_barang']; ?>">
                                    <label class="form-check-label">Pilih</label>
                                </div>
                                <div class="input-group mx-3">
                                    <button onclick="decrement(<?= $item['id_barang']; ?>)" class="btn btn-danger">-</button>
                                    <!-- Tampilkan input kuantitas dan atur atributnya -->
                                    <input type="number" id="inputKuantitas<?= $item['id_barang']; ?>" class="form-control" value="<?= $item['jumlah_barang']; ?>" min="1" max="<?= $item['stock']; ?>">
                                    <button onclick="increment(<?= $item['id_barang']; ?>, <?= $item['stock']; ?>)" class="btn btn-primary">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <button onclick="checkout()" class="btn btn-success">Checkout</button>
    <?php endif; ?>
</div>

<script>
    function increment(id_barang, stock) {
        var inputKuantitas = document.getElementById("inputKuantitas" + id_barang);
        var kuantitas = parseInt(inputKuantitas.value);

        if (kuantitas < stock) {
            kuantitas++;
            inputKuantitas.value = kuantitas;
        }
    }

    function decrement(id_barang) {
        var inputKuantitas = document.getElementById("inputKuantitas" + id_barang);
        var kuantitas = parseInt(inputKuantitas.value);
        if (kuantitas > 1) {
            kuantitas--;
            inputKuantitas.value = kuantitas;
        }
    }

    function checkout() {
        // Mendapatkan daftar checkbox yang dicentang
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        var selectedBarang = [];

        checkboxes.forEach(function(checkbox) {
            selectedBarang.push(checkbox.value);
        });

        // Mengirim data barang yang dicentang ke halaman checkout
        window.location.href = "/pembeli/checkout?barang=" + selectedBarang.join(',');
    }
</script>

<?= $this->endSection(); ?>