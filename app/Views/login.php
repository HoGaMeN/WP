<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>
<img src="<?= base_url(); ?>\Img\BG.png" class="bg-background">
<div class="container">
    <main role="main" class="container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3" style="padding-top: 5rem;">

                    <div class="card">
                        <h2 class="card-header"><?= lang('Auth.loginTitle') ?></h2>
                        <div class="card-body">

                            <?= view('Myth\Auth\Views\_message_block') ?>

                            <form action="<?= url_to('login') ?>" method="post">
                                <?= csrf_field() ?>

                                <?php if ($config->validFields === ['email']) : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.email') ?></label>
                                        <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="form-group">
                                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                                        <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="form-group">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                    <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <?php if ($config->allowRemembering) : ?>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                            <?= lang('Auth.rememberMe') ?>
                                        </label>
                                    </div>
                                <?php endif; ?>

                                <br>

                                <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"><?= lang('Auth.loginAction') ?></button>
                            </form>

                            <hr>

                            <?php if ($config->allowRegistration) : ?>
                                <p><a href=" <?= url_to('register') ?>">Belum Memiliki akun?</a></p>
                            <?php endif; ?>
                            <?php if ($config->activeResetter) : ?>
                                <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</div>
<?= $this->endSection(); ?>