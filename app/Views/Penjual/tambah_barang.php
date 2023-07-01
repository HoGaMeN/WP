<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Tambah barang</h2>

                    <?php echo form_open('penjual/tambah_barang/simpan', ['enctype' => 'multipart/form-data']); ?>
                    <?php if (session()->has('err')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo session('err'); ?>
                        </div>
                    <?php endif; ?>
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('nama_barang')) ? 'is-invalid' : ''; ?>" id="nama_barang" name="nama_barang" autofocus value="<?= old('nama_barang'); ?>">
                            <?php if (isset($validation) && $validation->hasError('nama_barang')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_barang'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control <?= (isset($validation) && $validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= old('harga'); ?>">
                            <?php if (isset($validation) && $validation->hasError('harga')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('harga'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control <?= (isset($validation) && $validation->hasError('stock')) ? 'is-invalid' : ''; ?>" id="stock" name="stock" value="<?= old('stock'); ?>">
                            <?php if (isset($validation) && $validation->hasError('stock')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stock'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_barang" class="col-sm-2 col-form-label">Foto barang</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto_barang" name="foto_barang" value="<?= old('foto_barang'); ?>" onchange="previewImg()">
                        </div>
                        <?php if (isset($validation) && $validation->hasError('foto_barang')) : ?>
                            <div class="invalid-feedback">
                                <?php echo $validation->getError('foto_barang'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 col-sm-12 ml-1">Tambah Barang</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col" style="padding-left: 4rem; padding-top: 2rem;">
                    <div class="card mb-3" style="max-width: 300px;">
                        <div class="md-4 container">
                            <img src="/Img/kecap.jpg" class="img-thumbnail img-preview" style="max-height: 350px;">
                            <label class="custom-file-label container" for="foto_barang" value="<?= old('foto_barang'); ?>" hidden>Pilih Gambar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- js for image preview -->
        <script>
            function previewImg() {
                const sampul = document.querySelector('#foto_barang');
                const sampulLabel = document.querySelector('.custom-file-label');
                const imgPreview = document.querySelector('.img-preview');

                sampulLabel.textContent = sampul.files[0].name;

                const fileSampul = new FileReader();
                fileSampul.readAsDataURL(sampul.files[0]);

                fileSampul.onload = function(e) {
                    imgPreview.src = e.target.result;
                }
            }
        </script>
        <?= $this->endSection(); ?>