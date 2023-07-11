<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url(); ?>\Img\BG.png" class="bg-background">
<div class="container">
    <div class="col-sm-6 offset-sm-3" style="padding-top: 5rem;">
        <div class="card">
            <h2 class="card-header">Daftar</h2>
            <div class="card-body">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <form action="<?= url_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="form-group">
                        <label for="email"><?= lang('Auth.email') ?></label>
                        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted">Kami tidak akan membagikan data pribadi anda</small>
                    </div>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control <?php if (session('errors.nama')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan Nama" value="<?= old('nama') ?>">
                    </div>

                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" class="form-control <?php if (session('errors.telepon')) : ?>is-invalid<?php endif ?>" placeholder="Masukkan Nomor Telepon" value="<?= old('telepon') ?>">
                    </div>

                    <div class="form-group">
                        <label for="Alamat">Alamat</label>
                        <div class="d-flex">
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

                    <div class="form-group" style="padding-top: 1rem;">
                        <textarea name="detail_alamat" class="form-control <?php if (session('errors.detail_alamt')) : ?>is-invalid<?php endif ?>" rows=" 4" cols="40" placeholder="Masukkan Detail Alamat" value="<?= old('detail_alamt') ?>"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Pastikan alamat yang anda masukkan sesuai dengan yang semestinya</small>
                    </div>

                    <div class="form-group">
                        <label for="password"><?= lang('Auth.password') ?></label>
                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Daftar</button>
                </form>


                <hr>

                <p>Sudah memiliki akun. <a href="<?= base_url('login') ?>">Masuk</a></p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>