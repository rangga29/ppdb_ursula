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
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->nama_lengkap ?></div>
                                                        <div class="col-sm-5"><b>Tempat Tanggal Lahir</b></div>
                                                        <div class="col-sm-6">:
                                                            <?= $siswa_tbtk->kota_lahir?>,
                                                            <?= date("d F Y", strtotime($siswa_tbtk->tanggal_lahir)) ?>
                                                        </div>
                                                        <div class="col-sm-5"><b>Asal Sekolah</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->asal_sekolah ?></div>
                                                        <?php 
                                                            $x = 'tingkat';
                                                            if($siswa_tbtk->pilihan_tingkat === '1') {
                                                                $x = 'TB';
                                                            } else if($siswa_tbtk->pilihan_tingkat === '2') {
                                                                $x = 'TK A';
                                                            } else {
                                                                $x = 'TK B';
                                                            }
                                                        ?>
                                                        <div class="col-sm-5"><b>Tingkat Yang Dituju</b></div>
                                                        <div class="col-sm-6">: <?= $x ?></div>
                                                        <div class="col-sm-5"><b>Nama Orangtua</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->nama_orangtua ?>
                                                        </div>
                                                        <div class="col-sm-5"><b>Nomor Whatsapp</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->no_whatsapp ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6"><b>Nomor Pendaftaran</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->no_registrasi ?>
                                                        </div>
                                                        <div class="col-sm-6"><b>Nomer Rekening Virtual Account</b>
                                                        </div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->no_virtual ?>
                                                        </div>
                                                        <div class="col-sm-6"><b>Alamat Email</b></div>
                                                        <div class="col-sm-6">: <?= $siswa_tbtk->email ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <p class="lead">Catatan</p>
                                            <ul>
                                                <li>Proses selanjutnya adalah observasi yang jadwalnya akan diberikan
                                                    oleh pihak TB-TK.</li>
                                                <li>Diharapkan email dan password untuk diingat dan dicatat secara
                                                    pribadi untuk keperluan login dashboard calon peserta didik.</li>
                                                <li>Untuk masuk ke halaman login dashboard calon peserta didik, dapat
                                                    menekan tombol dibawah ini.</li>
                                                <li>Bila terdapat pertanyaan dapat menghubungi melalui kontak yang
                                                    disediakan.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a class="btn btn-primary btn-lg" href="/tbtk_login" role="button">
                                        Login Calon Peserta Didik
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