<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<!-- Jika Status Pendaftaran Diverifikasi DAN Status Penerimaan Diterima -->
<?php if(($smp->status_pendaftaran === '3') && ($smp->status_penerimaan === '2')) : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h3 class="card-header bg-success text-white mt-0">STATUS PENERIMAAN</h3>
            <div class="card-body">
                <h1 class="card-title mt-0">
                    <b>SELAMAT</b><br>Kamu Berhasil Diterima di SMP Santa Ursula
                </h1>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Pendaftaran Diverifikasi DAN Status Penerimaan Tidak Diterima -->
<?php if(($smp->status_pendaftaran === '3') && ($smp->status_penerimaan === '3')) : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h3 class="card-header bg-danger text-white mt-0">STATUS PENERIMAAN</h3>
            <div class="card-body">
                <h1 class="card-title mt-0">
                    <b>MOHON MAAF</b><br>Kamu Belum Berhasil Diterima di SMP Santa Ursula
                </h1>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Penerimaan Belum Ada -->
<?php if($smp->status_penerimaan === '1') : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step done"><span>Pendaftaran</span></li>
                    <li class="c-progress-steps__step current"><span><?= $proses ?></span></li>
                    <li class="c-progress-steps__step"><span>Penerimaan</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Penerimaan Tidak Diterima -->
<?php if($smp->status_penerimaan === '3') : ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step done"><span>Pendaftaran</span></li>
                    <li class="c-progress-steps__step done"><span><?= $proses ?></span></li>
                    <li class="c-progress-steps__step current"><span>Penerimaan</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Penerimaan Diterima DAN Status Dapodik Belum Diisi ATAU Status Dapodik Belum Diverifikasi DAN Status Keuangan Belum Diisi ATAU Status Keuangan Belum Diverifikasi -->
<?php if($smp->status_penerimaan === '2' && 
($smp->status_dapodik === '1' || $smp->status_dapodik === '2') && 
($smp->status_keuangan === '1' || $smp->status_keuangan === '2')) : 
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step done"><span>Pendaftaran</span></li>
                    <li class="c-progress-steps__step done"><span><?= $proses ?></span></li>
                    <li class="c-progress-steps__step done"><span>Penerimaan</span></li>
                    <li class="c-progress-steps__step current"><span>Pengumupulan Data</span></li>
                    <li class="c-progress-steps__step"><span>Pengambilan Seragam & Buku</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Penerimaan Diterima DAN Status Dapodik Sudah Diverifikasi DAN Status Keuangan Sudah Diverifikasi DAN Status Seragam Belum Diisi ATAU Status Seragam Belum Diverifikasi DAN Status Buku Belum Diisi ATAU Buku Keuangan Belum Diverifikasi -->
<?php if($smp->status_penerimaan === '2' && 
$smp->status_dapodik === '3' && 
$smp->status_keuangan === '3' && 
($smp->status_seragam === '1' || $smp->status_seragam === '2') && 
($smp->status_buku === '1' || $smp->status_buku === '2')) : 
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step done"><span>Pendaftaran</span></li>
                    <li class="c-progress-steps__step done"><span><?= $proses ?></span></li>
                    <li class="c-progress-steps__step done"><span>Penerimaan</span></li>
                    <li class="c-progress-steps__step done"><span>Pengumupulan Data</span></li>
                    <li class="c-progress-steps__step current"><span>Pengambilan Seragam & Buku</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<!-- Jika Status Penerimaan Diterima DAN Status Lainnya Sudah Diverifikasi -->
<?php if($smp->status_penerimaan === '2' && 
$smp->status_dapodik === '3' && 
$smp->status_keuangan === '3' && 
$smp->status_seragam === '3' && 
$smp->status_buku === '3') : 
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <ol class="c-progress-steps">
                    <li class="c-progress-steps__step done"><span>Pendaftaran</span></li>
                    <li class="c-progress-steps__step done"><span><?= $proses ?></span></li>
                    <li class="c-progress-steps__step done"><span>Penerimaan</span></li>
                    <li class="c-progress-steps__step done"><span>Pengumupulan Data</span></li>
                    <li class="c-progress-steps__step done"><span>Pengambilan Seragam & Buku</span></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php if(session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('pesan') ?>
</div>
<?php endif ?>
<div class="row">
    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="jumbotron bg-light">
                            <h1 class="display-6 text-center">
                                <b>DASHBOARD CALON PESERTA DIDIK <br>PPDB 2022/2023 <br>SMP SANTA URSULA BANDUNG</b>
                            </h1>
                            <p class="lead text-justify">Seluruh proses PPDB Santa Ursula 2021 akan dilakukan
                                disini. Pastikan untuk selalu mengingat email dan password yang diberikan saat
                                pendaftaran serta selalu mengecek kembali untuk mengetahui informasi terbaru.</p>
                            <p class="lead text-justify">Jika terdapat pertanyaan dapat menghubungi kontak dari
                                Panitia PPDB yang ada di halaman website.</p>
                            <?php if($beasiswa) : ?>
                            <?php if($beasiswa->uang_pangkal !== '0') : ?>
                            <hr class="my-4">
                            <h4 class="text-justify">
                                Selamat anda mendapatkan beasiswa <b>uang pangkal</b> sebesar
                                <b>Rp.<?= number_format($beasiswa->uang_pangkal, 0, '', '.') ?>,-</b>
                            </h4>
                            <?php endif ?>
                            <?php if($beasiswa->uang_sekolah !== '0') : ?>
                            <h4 class="text-justify">
                                Selamat anda mendapatkan beasiswa <b>uang sekolah</b> sebesar
                                <b>Rp.<?= number_format($beasiswa->uang_sekolah, 0, '', '.') ?>,-</b>
                            </h4>
                            <?php endif ?>
                            <?php endif ?>
                            <hr class="my-4">
                            <!-- Jika Status Penerimaan Diterima -->
                            <?php if($smp->status_penerimaan === '1') : ?>
                            <h4 class="text-justify">Terima kasih telah mendaftar di SMP Santa Ursula Bandung.
                                Tahap selanjutnya adalah proses verifikasi data pendaftaran oleh pihak sekolah. Jika
                                sudah terverifikasi, orangtua akan dihubungi oleh pihak sekolah untuk proses
                                <?= $proses ?>.
                            </h4>
                            <?php endif ?>
                            <!-- Jika Status Penerimaan Diterima -->
                            <?php if($smp->status_penerimaan === '2') : ?>
                            <h4 class="text-justify">Selamat karena sudah diterima di SMP Santa Ursula Bandung. Proses
                                selanjutnya adalah pengisian data-data untuk dokumen sekolah. Untuk pengisian data dapat
                                melihat kolom di sebelah kanan. Silahkan klik nama form untuk mulai mengisi.</h4>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Pendaftaran</h4>
                    <!-- Jika Status Pendaftaran Belum Diverifikasi -->
                    <?php if($smp->status_pendaftaran === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Pendaftaran Sudah Diverifikasi -->
                    <?php if($smp->status_pendaftaran === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <!-- Jika Status Pendaftaran Sudah Diverifikasi DAN Status Penerimaan Diterima -->
            <?php if(($smp->status_pendaftaran === '3') && ($smp->status_penerimaan === '2')) : ?>
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Peserta Didik</h4>
                    <!-- Jika Status Dapodik Belum Diisi -->
                    <?php if($smp->status_dapodik === '1') : ?>
                    <a href="/<?= $slug_unit ?>/data_dapodik/<?= $smp->slug_nama_lengkap ?>" type="button"
                        class="btn btn-primary" style="color: white;">
                        FORM DATA PESERTA DIDIK
                    </a>
                    <?php endif ?>
                    <!-- Jika Status Dapodik Belum Diverifikasi -->
                    <?php if($smp->status_dapodik === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Dapodik Sudah Diverifikasi -->
                    <?php if($smp->status_dapodik === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Pernyataan</h4>
                    <!-- Jika Status Pernyataan Belum Diisi -->
                    <?php if($smp->status_pernyataan === '1') : ?>
                    <a href="/<?= $slug_unit ?>/data_pernyataan/<?= $smp->slug_nama_lengkap ?>" type="button"
                        class="btn btn-primary" style="color: white;">
                        FORM DATA PERNYATAAN
                    </a>
                    <?php endif ?>
                    <!-- Jika Status Pernyataan Belum Diverifikasi -->
                    <?php if($smp->status_pernyataan === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Pernyataan Sudah Diverifikasi -->
                    <?php if($smp->status_pernyataan === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Keuangan</h4>
                    <!-- Jika Status Keuangan Belum Diisi -->
                    <?php if($smp->status_keuangan === '1') : ?>
                    <a href="/<?= $slug_unit ?>/data_keuangan/<?= $smp->slug_nama_lengkap ?>" type="button"
                        class="btn btn-primary" style="color: white;">
                        FORM DATA KEUANGAN
                    </a>
                    <?php endif ?>
                    <!-- Jika Status Keuangan Belum Diverifikasi -->
                    <?php if($smp->status_keuangan === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Keuangan Sudah Diverifikasi -->
                    <?php if($smp->status_keuangan === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Seragam</h4>
                    <!-- Jika Status Seragam Belum Diisi -->
                    <?php if($smp->status_seragam === '1') : ?>
                    <button type="button" class="btn btn-danger" disabled>
                        <i class="dripicons-cross"></i>
                        BELUM DIISI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Seragam Belum Diverifikasi -->
                    <?php if($smp->status_seragam === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Seragam Sudah Diverifikasi -->
                    <?php if($smp->status_seragam === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card card-body text-center">
                    <h4 class="card-title mt-0">Data Buku</h4>
                    <!-- Jika Status Buku Belum Diisi -->
                    <?php if($smp->status_buku === '1') : ?>
                    <button type="button" class="btn btn-danger" disabled>
                        <i class="dripicons-cross"></i>
                        BELUM DIISI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Buku Belum Diverifikasi -->
                    <?php if($smp->status_buku === '2') : ?>
                    <button type="button" class="btn btn-warning" disabled>
                        <i class="dripicons-search"></i> PROSES VERIFIKASI
                    </button>
                    <?php endif ?>
                    <!-- Jika Status Buku Sudah Diverifikasi -->
                    <?php if($smp->status_buku === '3') : ?>
                    <button type="button" class="btn btn-success" disabled>
                        <i class="dripicons-checkmark"></i> TERVERIFIKASI
                    </button>
                    <?php endif ?>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>