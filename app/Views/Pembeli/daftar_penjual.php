<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url('Img/BG.png'); ?>" class="bg-background">
<div class="container" style="padding-top: 5rem;">
    <div class="card">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h2 class="my-3">Daftar Penjual</h2>

                    <?php echo form_open_multipart('daftar_penjual/daftar'); ?>
                    <?php if (session()->has('err')) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo session('err'); ?>
                        </div>
                    <?php endif; ?>
                    <?= csrf_field(); ?>
                    <div class="row mb-3">
                        <label for="nama_toko" class="col-sm-2 col-form-label">Nama Toko</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('nama_toko')) ? 'is-invalid' : ''; ?>" id="nama_toko" name="nama_toko" autofocus value="<?= old('nama_toko'); ?>">
                            <?php if (isset($validation) && $validation->hasError('nama_toko')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nama_barang'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="kecamatan" id="kecamatan">
                                <?php foreach ($kecamatan as $k) : ?>
                                    <option value="<?= $k['id_kecamatan']; ?>" placeholder="Pilih Kecamatan"><?= $k['nama_kecamatan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="form-select" name="desa" id="desa">
                                <?php foreach ($desa as $d) : ?>
                                    <option value="<?= $d['id_desa']; ?>" placeholder="Pilih Desa"><?= $d['nama_desa']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="detail_alamat" class="col-sm-2 col-form-label">Detail Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="detail_alamat" class="form-control <?php if (session('errors.detail_alamat')) : ?>is-invalid<?php endif ?>" rows=" 4" cols="40" placeholder="Masukkan Detail Alamat" value="<?= old('detail_alamat') ?>"></textarea>
                            <?php if (isset($validation) && $validation->hasError('stock')) : ?>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('stock'); ?>
                                </div>
                            <?php endif; ?>
                            <small id="alamathelp" class="form-text text-muted">Pastikan alamat yang anda masukkan sesuai dengan yang semestinya</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_toko" class="col-sm-2 col-form-label">Foto barang</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="foto_toko" name="foto_toko" value="<?= old('foto_toko'); ?>" onchange="previewImg()">
                        </div>
                        <?php if (isset($validation) && $validation->hasError('foto_toko')) : ?>
                            <div class="invalid-feedback">
                                <?php echo $validation->getError('foto_toko'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3 col-sm-12 ml-1">Daftar</button>
                    <?php echo form_close(); ?>
                </div>
                <div class="col" style="padding-left: 4rem; padding-top: 2rem;">
                    <div class="card mb-3" style="max-width: 300px;">
                        <div class="md-4 container">
                            <img src="/Img/DS.jpg" class="img-thumbnail img-preview" style="max-height: 350px;">
                            <label class="custom-file-label container" for="foto_toko" value="<?= old('foto_toko'); ?>" hidden>Pilih Gambar</label>
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
                const sampul = document.querySelector('#foto_toko');
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