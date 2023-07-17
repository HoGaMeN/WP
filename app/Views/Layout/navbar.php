<nav class="navbar navbar-expand-lg bg-body-tertiary --bs-tertiary-bg-rgb">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/Img/WP.png" alt="Logo" width="50" height="40" class="d-inline-block align-text-top">
            WarungPedia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Pembeli -->
        <?php if (in_groups('pembeli')) : ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/barang">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="/pembeli/keranjang">Keranjang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a type="btn" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (isset($profil['foto_pembeli'])) : ?>
                                <img src="/Img/<?= $profil['foto_pembeli']; ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                            <?php endif; ?>
                            <span class="mr-2 d-one d-lg-inline small"><?= user()->username; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profil">Profil</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat pembelian</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">keluar</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Profil</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- Navbar Penjual -->
        <?php elseif (in_groups('penjual')) : ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/barang">Daftar Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Keranjang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a type="btn" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (isset($profil['foto_pembeli'])) : ?>
                                <img src="/Img/<?= $profil['foto_pembeli']; ?>" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                            <?php endif; ?>
                            <span class="mr-2 d-one d-lg-inline small"><?= user()->username; ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profil">Profil</a></li>
                            <li><a class="dropdown-item" href="/penjual/barang">Barang</a></li>
                            <li><a class="dropdown-item" href="#">Riwayat pembelian</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('logout'); ?>">keluar</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Profil</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        <?php else : ?>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="barang">Daftar Barang</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a type="btn" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="/Img/PF.jpg" alt="Logo" width="20" height="20" class="d-inline-block align-text-top">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/login">Masuk</a></li>
                            <li><a class="dropdown-item" href="/register">Daftar</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Profil</a></li> -->
                        </ul>
                    </li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</nav>