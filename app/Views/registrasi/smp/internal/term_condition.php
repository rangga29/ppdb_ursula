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
                            <h3 class="mt-0 mb-3 mt-5">
                                KETENTUAN PPDB ONLINE SMP SANTA URSULA [JALUR INTERNAL]
                            </h3>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>1</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Calon peserta didik terlebih dahulu melakukan pembayaran biaya
                                                        administrasi sebesar <b>Rp. 150.000,00</b> yang dapat ditrasfer
                                                        melalui rekening <b>Bank Mandiri : 13 100 7777 9900 a.n. Yayasan
                                                            Prasama Bhakti</b>. Bukti pembayaran dapat diupload saat
                                                        pengisian formulir pendaftaran.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>2</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Calon peserta didik diwajibkan menyertakan <b>surat
                                                            pengantar</b>
                                                        yang didapatkan dari sekolah. Surat pengantar tersebut di
                                                        <b>scan
                                                            kedalam bentuk PDF</b>. Informasi lengkap untuk mendapatkan
                                                        surat pengantar tersebut silahkan menghubungi wali kelas
                                                        masing-masing.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>3</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Penerimaan dengan surat pengantar hanya berlaku untuk
                                                        pendaftaran
                                                        mulai tanggal <b>17 - 28 Agustus 2021</b>.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>4</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Calon peserta didik diwajibkan untuk mengisi formulir
                                                        pendaftaran
                                                        dengan lengkap dan sebenar-benarnya.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>5</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Calon peserta didik diwajibkan <b>mengingat atau mencatat secara
                                                            pribadi alamat email dan password</b> yang diisi dalam
                                                        formulir
                                                        pendaftaran untuk keperluan login ke halaman dashboard calon
                                                        peserta
                                                        didik.
                                                    </p>
                                                </div>
                                                <div class="col-md-12 col-lg-1">
                                                    <p class="text-center"><b>6</b></p>
                                                </div>
                                                <div class="col-md-12 col-lg-11">
                                                    <p class="text-justify">
                                                        Untuk kenyamanan lebih dalam mengisi formulir pendaftaran,
                                                        direkomendasikan menggunakan PC atau laptop.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="/smp_registrasi/internal_form" class="form-horizontal auth-form my-4"
                                        method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitchSuccess">
                                                    <label class="custom-control-label" for="customSwitchSuccess">
                                                        <h4 style="margin: 0">
                                                            Saya sudah memahami dan menyetujui semua ketentuan yang
                                                            berlaku.
                                                        </h4>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button class="btn btn-lg btn-success waves-effect waves-light"
                                                    type="submit" name="sendNewSms" id="sendNewSms"
                                                    disabled="disabled">Formulir Pendaftaran</button>
                                            </div>
                                        </div>
                                    </form>
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