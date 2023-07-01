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
                        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                    </div>

                    <div class="form-group">
                        <label for="username"><?= lang('Auth.username') ?></label>
                        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
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

                <p>Sudah memiliki akun. <a href="<?= url_to('login') ?>">Masuk</a></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>