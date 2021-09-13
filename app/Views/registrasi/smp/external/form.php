<?= $this->extend('registrasi/layouts/template') ?>

<?= $this->section('content') ?>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body text-center">
                        <h4 class="mt-0 header-title">
                            Formulir Pendaftaran Calon Peserta Didik SMP Santa Ursula [Jalur External]
                        </h4>
                    </div>
                </div>
                <form action="/smp_registrasi/external_save" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Data Calon Peserta Didik</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_lengkap" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nama_lengkap') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kota Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="kota_lahir" id="kota_lahir"
                                                class="form-control <?= ($validation->hasError('kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kota_lahir') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                                class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('tanggal_lahir') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Asal Sekolah</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="asal_sekolah" id="asal_sekolah"
                                                class="form-control <?= ($validation->hasError('asal_sekolah')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('asal_sekolah') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal_sekolah') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tingkat Yang Dituju</label>
                                        <div class="col-sm-10">
                                            <select name="pilihan_tingkat" id="pilihan_tingkat" class="custom-select"
                                                required="">
                                                <option value="7" selected>Kelas 7</option>
                                                <option value="8">Kelas 8</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Data Nilai Rapot Kelas 4</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 1 - Bahasa Indonesia - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas4_sem1_indo" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas4_sem1_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas4_sem1_indo') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem1_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 1 - Matematika - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas4_sem1_mat" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas4_sem1_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas4_sem1_mat') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem1_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 2 - Bahasa Indonesia - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas4_sem2_indo" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas4_sem2_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas4_sem2_indo') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem2_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 2 - Matematika - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas4_sem2_mat" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas4_sem2_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas4_sem2_mat') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem2_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Data Nilai Rapot Kelas 5</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 1 - Bahasa Indonesia - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas5_sem1_indo" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas5_sem1_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas5_sem1_indo') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem1_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 1 - Matematika - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas5_sem1_mat" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas5_sem1_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas5_sem1_mat') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem1_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 2 - Bahasa Indonesia - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas5_sem2_indo" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas5_sem2_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas5_sem2_indo') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem2_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">
                                            Semester 2 - Matematika - KI.3 (Pengetahuan)
                                        </label>
                                        <div class="col-sm-7">
                                            <input type="text" name="kelas5_sem2_mat" id="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('kelas5_sem2_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kelas5_sem2_mat') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem2_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Data Orang Tua</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama_orangtua" id="nama_orangtua"
                                                class="form-control <?= ($validation->hasError('nama_orangtua')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nama_orangtua') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_orangtua') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nomor Whatsapp</label>
                                        <div class="col-sm-10">
                                            <input type="tel" name="no_whatsapp" id="no_whatsapp"
                                                class="form-control <?= ($validation->hasError('no_whatsapp')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('no_whatsapp') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_whatsapp') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Akun Dashboard Calon Peserta Didik</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" id="email" value="<?= old('email') ?>"
                                                class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password" id="password"
                                                class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('password') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password') ?>
                                            </div>
                                            Password dapat berisi kombinasi huruf dan angka serta minimal 8
                                            karakter.<br>Diharapkan email dan password untuk diingat atau dicatat
                                            secara pribadi untuk keperluan login dashboard calon peserta didik.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h1 class="mt-0 header-title">Upload Dokumen</h1>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Bukti Pembayaran</label>
                                        <div class="col-sm-10">
                                            <div class="custom-file">
                                                <input type="file" name="bukti_pembayaran" id="bukti_pembayaran"
                                                    class="custom-file-input <?= ($validation->hasError('bukti_pembayaran')) ? 'is-invalid' : '' ?>"
                                                    aria-describedby="bukti_pembayaran" accept="image/*"
                                                    onchange="foto_bukti_pembayaran(event)">
                                                <label class="custom-file-label" for="bukti_pembayaran">Choose
                                                    file</label>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('bukti_pembayaran') ?>
                                                </div>
                                                Diharapkan foto bukti pembayaran jelas dan mudah dibaca.
                                            </div>
                                            <hr>
                                            <img src="<?= base_url() ?>/back/images/1.png" id="output"
                                                alt="Bukti Pembayaran" class="img-preview" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-5"></div>
                                <div class="col-lg-2 text-center">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Submit</button>
                                </div>
                                <div class="col-lg-5"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>