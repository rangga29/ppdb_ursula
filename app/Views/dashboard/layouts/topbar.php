<div class="topbar">
    <nav class="topbar-main">
        <div class="topbar-left">
            <a href="/dashboard/<?= $slug_unit ?>/<?= session()->get('slug_nama_lengkap') ?>" class="logo">
                <span>
                    <img src="<?= base_url() ?>/back/images/logo_website.png" alt="logo-small" class="logo-sm">
                </span>
            </a>
        </div>
        <ul class="list-unstyled topbar-nav float-right mb-0">
            <li class="dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user pr-0" data-toggle="dropdown"
                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="<?= base_url() ?>/back/images/logo_serviam.png" alt="profile-user"
                        class="rounded-circle" />
                    <span class="ml-1 nav-user-name hidden-sm"><?= session()->get('nama_lengkap') ?> <i
                            class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item"
                        href="/<?= $slug_unit ?>/penggantian_password/<?= session()->get('slug_nama_lengkap') ?>">
                        <i class="dripicons-exit mr-2"></i> Ganti Password
                    </a>
                    <a class="dropdown-item" href="/<?= $slug_unit ?>_login/logout">
                        <i class="dripicons-exit mr-2"></i> Logout
                    </a>
                </div>
            </li>
            <li class="menu-item">
                <a class="navbar-toggle nav-link" id="mobileToggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
    <div class="navbar-custom-menu">
        <div class="container-fluid">
            <div id="navigation">
                <ul class="navigation-menu">
                    <li><a href="/dashboard/<?= $slug_unit ?>/<?= session()->get('slug_nama_lengkap') ?>"><i
                                class="dripicons-home"></i> Dashboard</a></li>
                    <li><a href="/<?= $slug_unit ?>/data_calon_siswa/<?= session()->get('slug_nama_lengkap') ?>">
                            <i class="dripicons-blog"></i> Data Calon Peserta Didik
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>