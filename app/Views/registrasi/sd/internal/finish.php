<?= $this->extend('registrasi/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row vh-100 ">
    <div class="col-12 align-self-center">
        <div class="auth-page">
            <div class="card auth-card shadow-lg">
                <div class="card-body">
                    <div class="px-3">
                        <div class="auth-logo-box">
                            <a href="#0">
                                <img src="<?= base_url() ?>/back/images/logo_serviam.png" height="80" alt="logo"
                                    class="auth-logo">
                                <img src="<?= base_url() ?>/back/images/logo_entrepreneur.png" height="80" alt="logo"
                                    class="auth-logo">
                            </a>
                        </div>
                        <div class="text-center auth-logo-text">
                        </div><br><br><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="jumbotron mb-0 bg-light">
                                            <h1 class="display-5">Terima Kasih</h1>
                                            <p class="lead">Proses Pengisian Form Pendaftaran <strong>PPDB
                                                    <?= $unit ?></strong> Sudah Selesai.</p>
                                            <hr class="my-4">
                                            <p class="lead">Rangkuman Data Pendaftaran</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-5"><b>Nama Lengkap</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->nama_lengkap ?></div>
                                                        <div class="col-sm-5"><b>Tempat Tanggal Lahir</b></div>
                                                        <div class="col-sm-6">:
                                                            <?= $siswa_sd->kota_lahir?>,
                                                            <?= date("d F Y", strtotime($siswa_sd->tanggal_lahir)) ?>
                                                        </div>
                                                        <div class="col-sm-5"><b>Asal Sekolah</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->asal_sekolah ?></div>
                                                        <div class="col-sm-5"><b>Tingkat Yang Dituju</b></div>
                                                        <div class="col-sm-6">: Kelas <?= $siswa_sd->pilihan_tingkat ?>
                                                        </div>
                                                        <div class="col-sm-5"><b>Nama Orangtua</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->nama_orangtua ?>
                                                        </div>
                                                        <div class="col-sm-5"><b>Nomor Whatsapp</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->no_whatsapp ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6"><b>Nomor Pendaftaran</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->no_registrasi ?>
                                                        </div>
                                                        <div class="col-sm-6"><b>Nomer Rekening Virtual Account</b>
                                                        </div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->no_virtual ?>
                                                        </div>
                                                        <div class="col-sm-6"><b>Alamat Email</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_sd->email ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <p class="lead">Catatan</p>
                                            <ul>
                                                <li>Diharapkan email dan password untuk diingat dan dicatat secara
                                                    pribadi untuk keperluan login dashboard calon peserta didik.</li>
                                                <li>Untuk masuk ke halaman login dashboard calon peserta didik, dapat
                                                    menekan tombol login dibawah ini.</li>
                                                <li>Bila terdapat pertanyaan dapat menghubungi melalui kontak yang
                                                    disediakan.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary btn-lg" href="/sd_login" role="button">
                                        Login Calon Siswa
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>