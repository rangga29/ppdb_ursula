<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4>Ubah Data Pendaftaran</h4>
                <p>Silahkan melakukan login ulang untuk melihat perubahan data</p>
                <form action="/smp/update_data_pendaftaran/<?= $smp->id ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="slug_nama_lengkap" value="<?= $smp->slug_nama_lengkap ?>">
                    <input type="hidden" name="bukti_pembayaran" value="<?= $smp->bukti_pembayaran ?>">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Nama Lengkap</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $smp->nama_lengkap ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Kota Lahir</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="text" id="kota_lahir" name="kota_lahir"
                                                class="form-control <?= ($validation->hasError('kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kota_lahir')) ? old('kota_lahir') : $smp->kota_lahir ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Tangal Lahir</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                                class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $smp->tanggal_lahir ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($smp->asal_sekolah !== 'SD Santa Ursula Bandung') : ?>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Asal Sekolah</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="text" id="asal_sekolah" name="asal_sekolah"
                                                class="form-control <?= ($validation->hasError('asal_sekolah')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('asal_sekolah')) ? old('asal_sekolah') : $smp->asal_sekolah ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal_sekolah') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif ?>
                                    <hr>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 4 - Semester 1 - Bahasa Indonesia
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas4_sem1_indo" name="kelas4_sem1_indo"
                                                class="form-control <?= ($validation->hasError('kelas4_sem1_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas4_sem1_indo')) ? old('kelas4_sem1_indo') : $smp->kelas4_sem1_indo ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem1_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 4 - Semester 2 - Bahasa Indonesia
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas4_sem2_indo" name="kelas4_sem2_indo"
                                                class="form-control <?= ($validation->hasError('kelas4_sem2_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas4_sem2_indo')) ? old('kelas4_sem2_indo') : $smp->kelas4_sem2_indo ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem2_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 4 - Semester 1 - Matematika
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas4_sem1_mat" name="kelas4_sem1_mat"
                                                class="form-control <?= ($validation->hasError('kelas4_sem1_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas4_sem1_mat')) ? old('kelas4_sem1_mat') : $smp->kelas4_sem1_mat ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem1_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 4 - Semester 2 - Matematika
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas4_sem2_mat" name="kelas4_sem2_mat"
                                                class="form-control <?= ($validation->hasError('kelas4_sem2_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas4_sem2_mat')) ? old('kelas4_sem2_mat') : $smp->kelas4_sem2_mat ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas4_sem2_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 5 - Semester 1 - Bahasa Indonesia
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas5_sem1_indo" name="kelas5_sem1_indo"
                                                class="form-control <?= ($validation->hasError('kelas5_sem1_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas5_sem1_indo')) ? old('kelas5_sem1_indo') : $smp->kelas5_sem1_indo ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem1_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 5 - Semester 2 - Bahasa Indonesia
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas5_sem2_indo" name="kelas5_sem2_indo"
                                                class="form-control <?= ($validation->hasError('kelas5_sem2_indo')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas5_sem2_indo')) ? old('kelas5_sem2_indo') : $smp->kelas5_sem2_indo ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem2_indo') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 5 - Semester 1 - Matematika
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas5_sem1_mat" name="kelas5_sem1_mat"
                                                class="form-control <?= ($validation->hasError('kelas5_sem1_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas5_sem1_mat')) ? old('kelas5_sem1_mat') : $smp->kelas5_sem1_mat ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem1_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-4 col-4">
                                            <label class="col-form-label">
                                                Kelas 5 - Semester 2 - Matematika
                                            </label>
                                        </div>
                                        <div class="col-lg-8 col-8">
                                            <input type="text" id="kelas5_sem2_mat" name="kelas5_sem2_mat"
                                                class="form-control <?= ($validation->hasError('kelas5_sem2_mat')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('kelas5_sem2_mat')) ? old('kelas5_sem2_mat') : $smp->kelas5_sem2_mat ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kelas5_sem2_mat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Nama Lengkap Orangtua</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="text" id="nama_orangtua" name="nama_orangtua"
                                                class="form-control <?= ($validation->hasError('nama_orangtua')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('nama_orangtua')) ? old('nama_orangtua') : $smp->nama_orangtua ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_orangtua') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-3 col-3">
                                            <label class="col-form-label">Nomor Whatsapp</label>
                                        </div>
                                        <div class="col-lg-9 col-9">
                                            <input type="text" id="no_whatsapp" name="no_whatsapp"
                                                class="form-control <?= ($validation->hasError('no_whatsapp')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('no_whatsapp')) ? old('no_whatsapp') : $smp->no_whatsapp ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('no_whatsapp') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>