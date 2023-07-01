<?= $this->extend('Layout/template'); ?>

<?= $this->section('content'); ?>

<body style="background: url('<?= base_url(); ?>/Img/DS.jpg') no-repeat center center fixed; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
    <img src="/Img/BG.png" class="bg-background">
    <div class="position-relative">
        <h1 class="align-middle" style="padding-top: 70px; padding-left: 40px;">WarungPedia</h1>
    </div>
</body>

<?= $this->endSection(); ?>