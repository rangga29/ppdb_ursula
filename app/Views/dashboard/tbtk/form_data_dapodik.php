<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>
<?php
    $tingkat = 'tingkat';
    if ($tbtk->pilihan_tingkat === '1') {
        $tingkat = 'TB';
    } elseif ($tbtk->pilihan_tingkat === '2') {
        $tingkat = 'TK A';
    } else {
        $tingkat = 'TK B';
    }
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3>FORM DATA PESERTA DIDIK</h3>
                <form action="/tbtk/tambah_data_dapodik/<?= $tbtk->slug_nama_lengkap ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA PRIBADI</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="id" id="id" value="<?= $tbtk->id ?>">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">No. Registrasi</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="no_registrasi" value="<?= $tbtk->no_registrasi ?>"
                                                disabled class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="email" value="<?= $tbtk->email ?>" disabled
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Masuk Ke Kelas</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="pilihan_tingkat" class="form-control"
                                                value="<?= $tingkat ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_lengkap" placeholder="[Sesuai Akta Kelahiran]"
                                                class="form-control <?= ($validation->hasError('nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nama_lengkap') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nama Panggilan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_panggilan" placeholder=""
                                                class="form-control <?= ($validation->hasError('nama_panggilan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nama_panggilan') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_panggilan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="kota_lahir" placeholder=""
                                                class="form-control <?= ($validation->hasError('kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kota_lahir') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tanggal_lahir" placeholder=""
                                                class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('tanggal_lahir') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select name="jenis_kelamin" class="custom-select" required="">
                                                <option value="Laki-Laki"
                                                    <?= (old('jenis_kelamin') === 'Laki-Laki' ? 'selected' : '') ?>>
                                                    Laki-Laki
                                                </option>
                                                <option value="Perempuan"
                                                    <?= (old('jenis_kelamin') === 'Perempuan' ? 'selected' : '') ?>>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="kewarganegaraan" class="custom-select" required="">
                                                <option value="WNI"
                                                    <?= (old('kewarganegaraan') === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= (old('kewarganegaraan') === 'WNA' ? 'selected' : '') ?>>
                                                    WNA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Agama</label>
                                        <div class="col-sm-9">
                                            <select name="agama" class="custom-select" required="">
                                                <option value="Katolik"
                                                    <?= (old('agama') === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= (old('agama') === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= (old('agama') === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= (old('agama') === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= (old('agama') === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= (old('agama') === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= (old('agama') === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Paroki</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="paroki" value="<?= old('paroki') ?>"
                                                class="form-control <?= ($validation->hasError('paroki')) ? 'is-invalid' : '' ?>"
                                                placeholder="[Wajib Diisi Jika Beragama Katolik]">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('paroki') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Berkebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <select name="kebutuhan_khusus" class="custom-select" required="">
                                                <option value="Ya"
                                                    <?php (old('kebutuhan_khusus') === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?php (old('kebutuhan_khusus') === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jenis_kebutuhan_khusus"
                                                value="<?= old('jenis_kebutuhan_khusus') ?>"
                                                placeholder="[Wajib Diisi Jika Berkebutuhan Khusus]"
                                                class="form-control <?= ($validation->hasError('jenis_kebutuhan_khusus')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jenis_kebutuhan_khusus') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Anak Keberapa</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="anak_keberapa" placeholder=""
                                                class="form-control <?= ($validation->hasError('anak_keberapa')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('anak_keberapa') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('anak_keberapa') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Jumlah Saudara Kandung</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="saudara_kandung" placeholder=""
                                                class="form-control <?= ($validation->hasError('saudara_kandung')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('saudara_kandung') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('saudara_kandung') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Golongan Darah</label>
                                        <div class="col-sm-3">
                                            <select name="gol_darah" class="custom-select" required="">
                                                <option value="a" <?= (old('gol_darah') === 'a' ? 'selected' : '') ?>>
                                                    A
                                                </option>
                                                <option value="b" <?= (old('gol_darah') === 'b' ? 'selected' : '') ?>>
                                                    B
                                                </option>
                                                <option value="ab" <?= (old('gol_darah') === 'ab' ? 'selected' : '') ?>>
                                                    AB
                                                </option>
                                                <option value="o" <?= (old('gol_darah') === 'o' ? 'selected' : '') ?>>
                                                    O
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tinggi Badan</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="tinggi" placeholder=""
                                                class="form-control <?= ($validation->hasError('tinggi')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('tinggi') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('tinggi') ?>
                                            </div>
                                        </div>
                                        <small class="col-sm-3 col-form-label">CM</small>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Berat Badan</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="berat" placeholder=""
                                                class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('berat') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('berat') ?>
                                            </div>
                                        </div>
                                        <small class="col-sm-3 col-form-label">KG</small>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Lingkar Kepala</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="kepala" placeholder=""
                                                class="form-control <?= ($validation->hasError('kepala')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('kepala') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('kepala') ?>
                                            </div>
                                        </div>
                                        <small class="col-sm-3 col-form-label">CM</small>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomor Induk Siswa Nasional</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nisn" placeholder="[Dikosongkan Jika Tidak Ada]"
                                                class="form-control <?= ($validation->hasError('nisn')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nisn') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nisn') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pas Foto</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="pas_foto" id="pas_foto"
                                                class="form-control <?= ($validation->hasError('pas_foto')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('pas_foto') ?>" aria-describedby="pas_foto"
                                                accept="image/*" onchange="foto_pas_foto(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pas_foto') ?>
                                            </div>
                                            <p>File Pas Foto Bertipe JPEG/JPG/PNG.<br>Pas Foto dari kepala sampai
                                                dada/perut.</p>
                                            <p></p>
                                            <hr>
                                            <img src="<?= base_url() ?>/back/images/1.png" id="output1" alt="Pas Foto"
                                                class="img-preview" style="max-width: 250px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA KEPENDUDUKAN</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor Induk Kependudukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nik" placeholder="[Diambil Dari Kartu Keluarga]"
                                                class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nik') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor Kartu Keluarga</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nkk" placeholder="[Diambil Dari Kartu Keluarga]"
                                                class="form-control <?= ($validation->hasError('nkk')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nkk') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nkk') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor Registrasi Akta
                                            Kelahiran</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nak" placeholder="[Diambil Dari Akta Kelahiran]"
                                                class="form-control <?= ($validation->hasError('nak')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('nak') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nak') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Scan Kartu Keluarga</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="scan_kk" id="scan_kk"
                                                class="form-control <?= ($validation->hasError('scan_kk')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('scan_kk') ?>" aria-describedby="scan_kk"
                                                accept="image/*" onchange="foto_scan_kk(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('scan_kk') ?>
                                            </div>
                                            <p>File Scan Kartu Keluarga Bertipe JPEG/JPG/PNG.<br>Hasil Scan Posisi Datar
                                                dan Jelas.</p>
                                            <hr>
                                            <img src="<?= base_url() ?>/back/images/1.png" id="output2" alt="Pas Foto"
                                                class="img-preview" style="max-width: 500px;" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Scan Akta kelahiran</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="scan_ak" id="scan_ak"
                                                class="form-control <?= ($validation->hasError('scan_ak')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('scan_ak') ?>" aria-describedby="scan_ak"
                                                accept="image/*" onchange="foto_scan_ak(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('scan_ak') ?>
                                            </div>
                                            <p>File Scan Akta Kelahiran Bertipe JPEG/JPG/PNG.<br>Hasil Scan Posisi Datar
                                                dan Jelas.</p>
                                            <hr>
                                            <img src="<?= base_url() ?>/back/images/1.png" id="output3" alt="Pas Foto"
                                                class="img-preview" style="max-width: 500px;" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA TEMPAT TINGGAL</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Alamat Sesuai Kartu
                                            Keluarga</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" name="kk_alamat" placeholder="[Nama Jalan]"
                                                        class="form-control <?= ($validation->hasError('kk_alamat')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_alamat') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_alamat') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_rt" placeholder="[RT]"
                                                        class="form-control <?= ($validation->hasError('kk_rt')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_rt') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_rt') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_rw" placeholder="[RW]"
                                                        class="form-control <?= ($validation->hasError('kk_rw')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_rw') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_rw') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_kelurahan" placeholder="[Kelurahan]"
                                                        class="form-control <?= ($validation->hasError('kk_kelurahan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_kelurahan') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kelurahan') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_kecamatan" placeholder="[Kecamatan]"
                                                        class="form-control <?= ($validation->hasError('kk_kecamatan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_kecamatan') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kecamatan') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="kk_kota" placeholder="[Kabupaten/Kota]"
                                                        class="form-control <?= ($validation->hasError('kk_kota')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_kota') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kota') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="kk_kodepos" placeholder="[Kodepos]"
                                                        class="form-control <?= ($validation->hasError('kk_kodepos')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('kk_kodepos') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kodepos') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Tempat Tinggal</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <input type="text" name="tt_alamat"
                                                        placeholder="[Dikosongkan Jika Sama Dengan Alamat Kartu Keluarga]"
                                                        class="form-control <?= ($validation->hasError('tt_alamat')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_alamat') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_alamat') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_rt" placeholder="[RT]"
                                                        class="form-control <?= ($validation->hasError('tt_rt')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_rt') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_rt') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_rw" placeholder="[RW]"
                                                        class="form-control <?= ($validation->hasError('tt_rw')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_rw') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_rw') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_kelurahan" placeholder="[Kelurahan]"
                                                        class="form-control <?= ($validation->hasError('tt_kelurahan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_kelurahan') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kelurahan') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_kecamatan" placeholder="[Kecamatan]"
                                                        class="form-control <?= ($validation->hasError('tt_kecamatan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_kecamatan') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kecamatan') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="tt_kota" placeholder="[Kabupaten/Kota]"
                                                        class="form-control <?= ($validation->hasError('tt_kota')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_kota') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kota') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="tt_kodepos" placeholder="[Kodepos]"
                                                        class="form-control <?= ($validation->hasError('tt_kodepos')) ? 'is-invalid' : '' ?>"
                                                        value="<?= old('tt_kodepos') ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kodepos') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tinggal Bersama</label>
                                        <div class="col-sm-9">
                                            <select name="tinggal_bersama" class="custom-select" required="">
                                                <option value="Orangtua"
                                                    <?php (old('tinggal_bersama') === 'Orangtua' ? 'selected' : '') ?>>
                                                    Orangtua
                                                </option>
                                                <option value="Wali"
                                                    <?php (old('tinggal_bersama') === 'Wali' ? 'selected' : '') ?>>
                                                    Wali
                                                </option>
                                                <option value="Asrama"
                                                    <?php (old('tinggal_bersama') === 'Asrama' ? 'selected' : '') ?>>
                                                    Asrama
                                                </option>
                                                <option value="Panti Asuhan"
                                                    <?php (old('tinggal_bersama') === 'Panti Asuhan' ? 'selected' : '') ?>>
                                                    Panti Asuhan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Moda Transportasi</label>
                                        <div class="col-sm-9">
                                            <select name="transportasi" class="custom-select" required="">
                                                <option value="Jalan Kaki"
                                                    <?php (old('transportasi') === 'Jalan Kaki' ? 'selected' : '') ?>>
                                                    Jalan Kaki
                                                </option>
                                                <option value="Jemputan Sekolah"
                                                    <?php (old('transportasi') === 'Jemputan Sekolah' ? 'selected' : '') ?>>
                                                    Jemputan Sekolah
                                                </option>
                                                <option value="Kendaraan Pribadi"
                                                    <?php (old('transportasi') === 'Kendaraan Pribadi' ? 'selected' : '') ?>>
                                                    Kendaraan Pribadi
                                                </option>
                                                <option value="Kendaraan Umum"
                                                    <?php (old('transportasi') === 'Kendaraan Umum' ? 'selected' : '') ?>>
                                                    Kendaraan Umum
                                                </option>
                                                <option value="Ojek"
                                                    <?php (old('transportasi') === 'Ojek' ? 'selected' : '') ?>>
                                                    Ojek
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Jarak Tempuh Ke Sekolah</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="jarak_tempuh" placeholder=""
                                                class="form-control <?= ($validation->hasError('jarak_tempuh')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('jarak_tempuh') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('jarak_tempuh') ?>
                                            </div>
                                        </div>
                                        <small class="col-sm-3 col-form-label">KM</small>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Waktu Tempuh Ke Sekolah</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="waktu_tempuh" placeholder=""
                                                class="form-control <?= ($validation->hasError('waktu_tempuh')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('waktu_tempuh') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('waktu_tempuh') ?>
                                            </div>
                                        </div>
                                        <small class="col-sm-3 col-form-label">Menit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($tbtk->asal_sekolah != NULL) : ?>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA ASAL SEKOLAH</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Asal Sekolah</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="asal_sekolah" placeholder=""
                                                class="form-control <?= ($validation->hasError('asal_sekolah')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('asal_sekolah') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal_sekolah') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="asal_sekolah_alamat" name="asal_sekolah_alamat"
                                                class="form-control <?= ($validation->hasError('asal_sekolah_alamat')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('asal_sekolah_alamat') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal_sekolah_alamat') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Kota</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="asal_sekolah_kota" name="asal_sekolah_kota"
                                                class="form-control <?= ($validation->hasError('asal_sekolah_kota')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('asal_sekolah_kota') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('asal_sekolah_kota') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA AYAH</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ayah_nama_lengkap"
                                                placeholder="[Sesuai Yang Tertera Pada Akta Kelahiran Anak]"
                                                class="form-control <?= ($validation->hasError('ayah_nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_nama_lengkap') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor Induk Kependudukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ayah_nik" placeholder=""
                                                class="form-control <?= ($validation->hasError('ayah_nik')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_nik') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_kota_lahir" name="ayah_kota_lahir"
                                                class="form-control <?= ($validation->hasError('ayah_kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_kota_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="ayah_tanggal_lahir" name="ayah_tanggal_lahir"
                                                class="form-control <?= ($validation->hasError('ayah_tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_tanggal_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Agama</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_agama" class="custom-select" required="">
                                                <option value="Katolik"
                                                    <?= (old('ayah_agama') === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= (old('ayah_agama') === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= (old('ayah_agama') === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= (old('ayah_agama') === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= (old('ayah_agama') === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= (old('ayah_agama') === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= (old('ayah_agama') === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_kewarganegaraan" class="custom-select" required="">
                                                <option value="WNI"
                                                    <?= (old('ayah_kewarganegaraan') === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= (old('ayah_kewarganegaraan') === 'WNA' ? 'selected' : '') ?>>
                                                    WNA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pendidikan Terakhir</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_pendidikan" class="custom-select" required="">
                                                <option value="SD"
                                                    <?= (old('ayah_pendidikan') === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= (old('ayah_pendidikan') === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= (old('ayah_pendidikan') === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= (old('ayah_pendidikan') === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= (old('ayah_pendidikan') === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= (old('ayah_pendidikan') === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= (old('ayah_pendidikan') === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= (old('ayah_pendidikan') === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= (old('ayah_pendidikan') === 'S3' ? 'selected' : '') ?>>
                                                    S3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_pekerjaan" class="custom-select" required="">
                                                <option value="Tidak Bekerja"
                                                    <?= (old('ayah_pekerjaan') === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= (old('ayah_pekerjaan') === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= (old('ayah_pekerjaan') === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= (old('ayah_pekerjaan') === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= (old('ayah_pekerjaan') === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= (old('ayah_pekerjaan') === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= (old('ayah_pekerjaan') === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= (old('ayah_pekerjaan') === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= (old('ayah_pekerjaan') === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Pensiunan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_jabatan" name="ayah_jabatan"
                                                class="form-control <?= ($validation->hasError('ayah_jabatan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_jabatan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_jabatan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pendapatan</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_pendapatan" id="ayah_pendapatan" class="custom-select"
                                                required="">
                                                <option value="gol1" <?= (old('gol5') === 'gol1' ? 'selected' : '') ?>>
                                                    Tidak Berpenghasilan</option>
                                                <option value="gol2" <?= (old('gol5') === 'gol2' ? 'selected' : '') ?>>
                                                    Kurang dari Rp 2.000.000</option>
                                                <option value="gol3" <?= (old('gol5') === 'gol3' ? 'selected' : '') ?>>
                                                    Rp 2.000.000 - 5.000.000</option>
                                                <option value="gol4" <?= (old('gol5') === 'gol4' ? 'selected' : '') ?>>
                                                    Rp 5.000.000 - 10.000.000</option>
                                                <option value="gol5" <?= (old('gol5') === 'gol5' ? 'selected' : '') ?>>
                                                    Lebih Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_nama_perusahaan" name="ayah_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('ayah_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_nama_perusahaan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_alamat_perusahaan" name="ayah_alamat_perusahaan"
                                                placeholder="" value="<?= old('ayah_alamat_perusahaan') ?>"
                                                class="form-control <?= ($validation->hasError('ayah_alamat_perusahaan')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_alamat_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Berkebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <select name="ayah_kebutuhan_khusus" class="custom-select" required="">
                                                <option value="Ya"
                                                    <?= (old('ayah_kebutuhan_khusus') === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?= (old('ayah_kebutuhan_khusus') === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ayah_jenis_kebutuhan_khusus"
                                                value="<?= old('ayah_jenis_kebutuhan_khusus') ?>" placeholder=""
                                                class="form-control <?= ($validation->hasError('ayah_jenis_kebutuhan_khusus')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_jenis_kebutuhan_khusus') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor HP/Whatsapp</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="ayah_telepon" name="ayah_telepon"
                                                class="form-control <?= ($validation->hasError('ayah_telepon')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_telepon') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_telepon') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Email</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="ayah_email" name="ayah_email"
                                                class="form-control <?= ($validation->hasError('ayah_email')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ayah_email') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_email') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA IBU</h4>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ibu_nama_lengkap"
                                                placeholder="[Sesuai Yang Tertera Pada Akta Kelahiran Anak]"
                                                class="form-control <?= ($validation->hasError('ibu_nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_nama_lengkap') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor Induk Kependudukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ibu_nik" placeholder=""
                                                class="form-control <?= ($validation->hasError('ibu_nik')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_nik') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_kota_lahir" name="ibu_kota_lahir"
                                                class="form-control <?= ($validation->hasError('ibu_kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_kota_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="ibu_tanggal_lahir" name="ibu_tanggal_lahir"
                                                class="form-control <?= ($validation->hasError('ibu_tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_tanggal_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Agama</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_agama" class="custom-select" required="">
                                                <option value="Katolik"
                                                    <?= (old('ibu_agama') === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= (old('ibu_agama') === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= (old('ibu_agama') === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= (old('ibu_agama') === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= (old('ibu_agama') === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= (old('ibu_agama') === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= (old('ibu_agama') === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_kewarganegaraan" class="custom-select" required="">
                                                <option value="WNI"
                                                    <?= (old('ibu_kewarganegaraan') === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= (old('ibu_kewarganegaraan') === 'WNA' ? 'selected' : '') ?>>
                                                    WNA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pendidikan Terakhir</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_pendidikan" class="custom-select" required="">
                                                <option value="SD"
                                                    <?= (old('ibu_pendidikan') === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= (old('ibu_pendidikan') === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= (old('ibu_pendidikan') === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= (old('ibu_pendidikan') === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= (old('ibu_pendidikan') === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= (old('ibu_pendidikan') === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= (old('ibu_pendidikan') === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= (old('ibu_pendidikan') === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= (old('ibu_pendidikan') === 'S3' ? 'selected' : '') ?>>
                                                    S3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_pekerjaan" class="custom-select" required="">
                                                <option value="Tidak Bekerja"
                                                    <?= (old('ibu_pekerjaan') === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= (old('ibu_pekerjaan') === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= (old('ibu_pekerjaan') === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= (old('ibu_pekerjaan') === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= (old('ibu_pekerjaan') === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= (old('ibu_pekerjaan') === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= (old('ibu_pekerjaan') === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= (old('ibu_pekerjaan') === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= (old('ibu_pekerjaan') === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Pensiunan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_jabatan" name="ibu_jabatan"
                                                class="form-control <?= ($validation->hasError('ibu_jabatan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_jabatan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_jabatan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Pendapatan</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_pendapatan" id="ibu_pendapatan" class="custom-select"
                                                required="">
                                                <option value="gol1"
                                                    <?= (old('ibu_pendapatan') === 'gol1' ? 'selected' : '') ?>>Tidak
                                                    Berpenghasilan</option>
                                                <option value="gol2"
                                                    <?= (old('ibu_pendapatan') === 'gol2' ? 'selected' : '') ?>>Kurang
                                                    dari Rp 2.000.000</option>
                                                <option value="gol3"
                                                    <?= (old('ibu_pendapatan') === 'gol3' ? 'selected' : '') ?>>Rp
                                                    2.000.000 - 5.000.000</option>
                                                <option value="gol4"
                                                    <?= (old('ibu_pendapatan') === 'gol4' ? 'selected' : '') ?>>Rp
                                                    5.000.000 - 10.000.000</option>
                                                <option value="gol5"
                                                    <?= (old('ibu_pendapatan') === 'gol5' ? 'selected' : '') ?>>Lebih
                                                    Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_nama_perusahaan" name="ibu_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('ibu_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_nama_perusahaan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_alamat_perusahaan" name="ibu_alamat_perusahaan"
                                                placeholder="" value="<?= old('ibu_alamat_perusahaan') ?>"
                                                class="form-control <?= ($validation->hasError('ibu_alamat_perusahaan')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_alamat_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Berkebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <select name="ibu_kebutuhan_khusus" class="custom-select" required="">
                                                <option value="Ya"
                                                    <?= (old('ibu_kebutuhan_khusus') === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?= (old('ibu_kebutuhan_khusus') === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ibu_jenis_kebutuhan_khusus"
                                                value="<?= old('ibu_jenis_kebutuhan_khusus') ?>" placeholder=""
                                                class="form-control <?= ($validation->hasError('ibu_jenis_kebutuhan_khusus')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_jenis_kebutuhan_khusus') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Nomor HP/Whatsapp</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="ibu_telepon" name="ibu_telepon"
                                                class="form-control <?= ($validation->hasError('ibu_telepon')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_telepon') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_telepon') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Email</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="ibu_email" name="ibu_email"
                                                class="form-control <?= ($validation->hasError('ibu_email')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('ibu_email') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_email') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4>DATA WALI</h4>
                            <p>Jika tinggal dengan orangtua, dapat dikosongkan.</p>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="wali_nama_lengkap" placeholder=""
                                                class="form-control <?= ($validation->hasError('wali_nama_lengkap')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_nama_lengkap') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_nama_lengkap') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomor Induk Kependudukan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="wali_nik" placeholder=""
                                                class="form-control <?= ($validation->hasError('wali_nik')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_nik') ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_kota_lahir" name="wali_kota_lahir"
                                                class="form-control <?= ($validation->hasError('wali_kota_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_kota_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_kota_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" id="wali_tanggal_lahir" name="wali_tanggal_lahir"
                                                class="form-control <?= ($validation->hasError('wali_tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_tanggal_lahir') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <select name="wali_agama" class="custom-select">
                                                <option value="" <?= (old('wali_agama') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Katolik"
                                                    <?= (old('wali_agama') === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= (old('wali_agama') === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= (old('wali_agama') === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= (old('wali_agama') === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= (old('wali_agama') === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= (old('wali_agama') === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= (old('wali_agama') === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="wali_kewarganegaraan" class="custom-select">
                                                <option value=""
                                                    <?= (old('wali_kewarganegaraan') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="WNI"
                                                    <?= (old('wali_kewarganegaraan') === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= (old('wali_kewarganegaraan') === 'WNA' ? 'selected' : '') ?>>
                                                    WNA
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-sm-9">
                                            <select name="wali_pendidikan" class="custom-select">
                                                <option value=""
                                                    <?= (old('wali_pendidikan') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="SD"
                                                    <?= (old('wali_pendidikan') === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= (old('wali_pendidikan') === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= (old('wali_pendidikan') === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= (old('wali_pendidikan') === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= (old('wali_pendidikan') === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= (old('wali_pendidikan') === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= (old('wali_pendidikan') === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= (old('wali_pendidikan') === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= (old('wali_pendidikan') === 'S3' ? 'selected' : '') ?>>
                                                    S3
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <select name="wali_pekerjaan" class="custom-select">
                                                <option value=""
                                                    <?= (old('wali_pekerjaan') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Tidak Bekerja"
                                                    <?= (old('wali_pekerjaan') === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= (old('wali_pekerjaan') === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= (old('wali_pekerjaan') === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= (old('wali_pekerjaan') === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= (old('wali_pekerjaan') === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= (old('wali_pekerjaan') === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= (old('wali_pekerjaan') === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= (old('wali_pekerjaan') === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= (old('wali_pekerjaan') === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Pensiunan
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jabatan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_jabatan" name="wali_jabatan"
                                                class="form-control <?= ($validation->hasError('wali_jabatan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_jabatan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_jabatan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pendapatan</label>
                                        <div class="col-sm-9">
                                            <select name="wali_pendapatan" id="wali_pendapatan" class="custom-select">
                                                <option value=""
                                                    <?= (old('wali_pendapatan') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="gol1"
                                                    <?= (old('wali_pendapatan') === 'gol1' ? 'selected' : '') ?>>
                                                    Tidak Berpenghasilan</option>
                                                <option value="gol2"
                                                    <?= (old('wali_pendapatan') === 'gol2' ? 'selected' : '') ?>>
                                                    Kurang dari Rp 2.000.000</option>
                                                <option value="gol3"
                                                    <?= (old('wali_pendapatan') === 'gol3' ? 'selected' : '') ?>>
                                                    Rp 2.000.000 - 5.000.000</option>
                                                <option value="gol4"
                                                    <?= (old('wali_pendapatan') === 'gol4' ? 'selected' : '') ?>>
                                                    Rp 5.000.000 - 10.000.000</option>
                                                <option value="gol5"
                                                    <?= (old('wali_pendapatan') === 'gol5' ? 'selected' : '') ?>>
                                                    Lebih Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_nama_perusahaan" name="wali_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('wali_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_nama_perusahaan') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_alamat_perusahaan" name="wali_alamat_perusahaan"
                                                placeholder="" value="<?= old('wali_alamat_perusahaan') ?>"
                                                class="form-control <?= ($validation->hasError('wali_alamat_perusahaan')) ? 'is-invalid' : '' ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_alamat_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nomor HP/Whatsapp</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="wali_telepon" name="wali_telepon"
                                                class="form-control <?= ($validation->hasError('wali_telepon')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_telepon') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_telepon') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="tel" id="wali_email" name="wali_email"
                                                class="form-control <?= ($validation->hasError('wali_email')) ? 'is-invalid' : '' ?>"
                                                value="<?= old('wali_email') ?>" placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_email') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Hubungan Dengan Anak</label>
                                        <div class="col-sm-9">
                                            <select name="wali_hubungan_anak" class="custom-select">
                                                <option value=""
                                                    <?= (old('wali_hubungan_anak') === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Kakek/Nenek"
                                                    <?= (old('wali_hubungan_anak') === 'Kakek/Nenek' ? 'selected' : '') ?>>
                                                    Kakek/Nenek
                                                </option>
                                                <option value="Om/Tante"
                                                    <?= (old('wali_hubungan_anak') === 'Om/Tante' ? 'selected' : '') ?>>
                                                    Om/Tante
                                                </option>
                                                <option value="Lainnya"
                                                    <?= (old('wali_hubungan_anak') === 'Lainnya' ? 'selected' : '') ?>>
                                                    Lainnya
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group row">
                                        <button type="submit" class="btn btn-lg btn-block btn-primary">
                                            Simpan Data
                                        </button>
                                    </div>
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