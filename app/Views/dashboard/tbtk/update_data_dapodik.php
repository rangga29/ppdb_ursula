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
                <form action="/tbtk/update_data_dapodik/<?= $dapodik->id ?>" method="post"
                    enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="old_pas_foto" value="<?= $dapodik->pas_foto ?>">
                    <input type="hidden" name="old_scan_kk" value="<?= $dapodik->scan_kk ?>">
                    <input type="hidden" name="old_scan_ak" value="<?= $dapodik->scan_ak ?>">
                    <input type="hidden" name="slug_nama_lengkap" value="<?= $tbtk->slug_nama_lengkap ?>">
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
                                                value="<?= (old('nama_lengkap')) ? old('nama_lengkap') : $dapodik->nama_lengkap ?>">
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
                                                value="<?= (old('nama_panggilan')) ? old('nama_panggilan') : $dapodik->nama_panggilan ?>">
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
                                                value="<?= (old('kota_lahir')) ? old('kota_lahir') : $dapodik->kota_lahir ?>">
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
                                                value="<?= (old('tanggal_lahir')) ? old('tanggal_lahir') : $dapodik->tanggal_lahir ?>">
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
                                                    <?= ($dapodik->jenis_kelamin === 'Laki-Laki' ? 'selected' : '') ?>>
                                                    Laki-Laki
                                                </option>
                                                <option value="Perempuan"
                                                    <?= ($dapodik->jenis_kelamin === 'Perempuan' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->kewarganegaraan === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= ($dapodik->kewarganegaraan === 'WNA' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->agama === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= ($dapodik->agama === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= ($dapodik->agama === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= ($dapodik->agama === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= ($dapodik->agama === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= ($dapodik->agama === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= ($dapodik->agama === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Paroki</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="paroki"
                                                value="<?= (old('paroki')) ? old('paroki') : $dapodik->paroki ?>"
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
                                                    <?= ($dapodik->kebutuhan_khusus === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?= ($dapodik->kebutuhan_khusus === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="jenis_kebutuhan_khusus"
                                                value="<?= (old('jenis_kebutuhan_khusus')) ? old('jenis_kebutuhan_khusus') : $dapodik->jenis_kebutuhan_khusus ?>"
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
                                                value="<?= (old('anak_keberapa')) ? old('anak_keberapa') : $dapodik->anak_keberapa ?>">
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
                                                value="<?= (old('saudara_kandung')) ? old('saudara_kandung') : $dapodik->saudara_kandung ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('saudara_kandung') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Golongan Darah</label>
                                        <div class="col-sm-3">
                                            <select name="gol_darah" class="custom-select" required="">
                                                <option value="a"
                                                    <?= ($dapodik->gol_darah === 'a' ? 'selected' : '') ?>>
                                                    A
                                                </option>
                                                <option value="b"
                                                    <?= ($dapodik->gol_darah === 'b' ? 'selected' : '') ?>>
                                                    B
                                                </option>
                                                <option value="ab"
                                                    <?= ($dapodik->gol_darah === 'ab' ? 'selected' : '') ?>>
                                                    AB
                                                </option>
                                                <option value="o"
                                                    <?= ($dapodik->gol_darah === 'o' ? 'selected' : '') ?>>
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
                                                value="<?= (old('tinggi')) ? old('tinggi') : $dapodik->tinggi ?>">
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
                                                value="<?= (old('berat')) ? old('berat') : $dapodik->berat ?>">
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
                                                value="<?= (old('kepala')) ? old('kepala') : $dapodik->kepala ?>">
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
                                                value="<?= (old('nisn')) ? old('nisn') : $dapodik->nisn ?>">
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
                                                value="<?= (old('pas_foto')) ? old('pas_foto') : $dapodik->pas_foto ?>"
                                                aria-describedby="pas_foto" accept="image/*"
                                                onchange="foto_pas_foto(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('pas_foto') ?>
                                            </div>
                                            <p>File Pas Foto Bertipe JPEG/JPG/PNG.<br>Pas Foto dari kepala sampai
                                                dada/perut.</p>
                                            <p></p>
                                            <hr>
                                            <img src="<?= base_url() ?>/upload/pas_foto/tbtk/<?= $dapodik->pas_foto ?>"
                                                id="output1" alt="Pas Foto" class="img-preview"
                                                style="max-width: 250px;" />
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
                                                value="<?= (old('nik')) ? old('nik') : $dapodik->nik ?>">
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
                                                value="<?= (old('nkk')) ? old('nkk') : $dapodik->nkk ?>">
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
                                                value="<?= (old('nak')) ? old('nak') : $dapodik->nak ?>">
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
                                                value="<?= (old('scan_kk')) ? old('scan_kk') : $dapodik->scan_kk ?>"
                                                aria-describedby="scan_kk" accept="image/*"
                                                onchange="foto_scan_kk(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('scan_kk') ?>
                                            </div>
                                            <p>File Scan Kartu Keluarga Bertipe JPEG/JPG/PNG.<br>Hasil Scan Posisi Datar
                                                dan Jelas.</p>
                                            <hr>
                                            <img src="<?= base_url() ?>/upload/scan_kk/tbtk/<?= $dapodik->scan_kk ?>"
                                                id="output2" alt="Pas Foto" class="img-preview"
                                                style="max-width: 500px;" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label required">Scan Akta kelahiran</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="scan_ak" id="scan_ak"
                                                class="form-control <?= ($validation->hasError('scan_ak')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('scan_ak')) ? old('scan_ak') : $dapodik->scan_ak ?>"
                                                aria-describedby="scan_ak" accept="image/*"
                                                onchange="foto_scan_ak(event)">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('scan_ak') ?>
                                            </div>
                                            <p>File Scan Akta Kelahiran Bertipe JPEG/JPG/PNG.<br>Hasil Scan Posisi Datar
                                                dan Jelas.</p>
                                            <hr>
                                            <img src="<?= base_url() ?>/upload/scan_ak/tbtk/<?= $dapodik->scan_ak ?>"
                                                id="output3" alt="Pas Foto" class="img-preview"
                                                style="max-width: 500px;" />
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
                                                        value="<?= (old('kk_alamat')) ? old('kk_alamat') : $dapodik->kk_alamat ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_alamat') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_rt" placeholder="[RT]"
                                                        class="form-control <?= ($validation->hasError('kk_rt')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_rt')) ? old('kk_rt') : $dapodik->kk_rt ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_rt') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_rw" placeholder="[RW]"
                                                        class="form-control <?= ($validation->hasError('kk_rw')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_rw')) ? old('kk_rw') : $dapodik->kk_rw ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_rw') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_kelurahan" placeholder="[Kelurahan]"
                                                        class="form-control <?= ($validation->hasError('kk_kelurahan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_kelurahan')) ? old('kk_kelurahan') : $dapodik->kk_kelurahan ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kelurahan') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="kk_kecamatan" placeholder="[Kecamatan]"
                                                        class="form-control <?= ($validation->hasError('kk_kecamatan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_kecamatan')) ? old('kk_kecamatan') : $dapodik->kk_kecamatan ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kecamatan') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="kk_kota" placeholder="[Kabupaten/Kota]"
                                                        class="form-control <?= ($validation->hasError('kk_kota')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_kota')) ? old('kk_kota') : $dapodik->kk_kota ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('kk_kota') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="kk_kodepos" placeholder="[Kodepos]"
                                                        class="form-control <?= ($validation->hasError('kk_kodepos')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('kk_kodepos')) ? old('kk_kodepos') : $dapodik->kk_kodepos ?>">
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
                                                        value="<?= (old('tt_alamat')) ? old('tt_alamat') : $dapodik->tt_alamat ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_alamat') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_rt" placeholder="[RT]"
                                                        class="form-control <?= ($validation->hasError('tt_rt')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_rt')) ? old('tt_rt') : $dapodik->tt_rt ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_rt') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_rw" placeholder="[RW]"
                                                        class="form-control <?= ($validation->hasError('tt_rw')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_rw')) ? old('tt_rw') : $dapodik->tt_rw ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_rw') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_kelurahan" placeholder="[Kelurahan]"
                                                        class="form-control <?= ($validation->hasError('tt_kelurahan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_kelurahan')) ? old('tt_kelurahan') : $dapodik->tt_kelurahan ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kelurahan') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="text" name="tt_kecamatan" placeholder="[Kecamatan]"
                                                        class="form-control <?= ($validation->hasError('tt_kecamatan')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_kecamatan')) ? old('tt_kecamatan') : $dapodik->tt_kecamatan ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kecamatan') ?>
                                                    </div><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="tt_kota" placeholder="[Kabupaten/Kota]"
                                                        class="form-control <?= ($validation->hasError('tt_kota')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_kota')) ? old('tt_kota') : $dapodik->tt_kota ?>">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('tt_kota') ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="tt_kodepos" placeholder="[Kodepos]"
                                                        class="form-control <?= ($validation->hasError('tt_kodepos')) ? 'is-invalid' : '' ?>"
                                                        value="<?= (old('tt_kodepos')) ? old('tt_kodepos') : $dapodik->tt_kodepos ?>">
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
                                                    <?= ($dapodik->tinggal_bersama === 'Orangtua' ? 'selected' : '') ?>>
                                                    Orangtua
                                                </option>
                                                <option value="Wali"
                                                    <?= ($dapodik->tinggal_bersama === 'Wali' ? 'selected' : '') ?>>
                                                    Wali
                                                </option>
                                                <option value="Asrama"
                                                    <?= ($dapodik->tinggal_bersama === 'Asrama' ? 'selected' : '') ?>>
                                                    Asrama
                                                </option>
                                                <option value="Panti Asuhan"
                                                    <?= ($dapodik->tinggal_bersama === 'Panti Asuhan' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->transportasi === 'Jalan Kaki' ? 'selected' : '') ?>>
                                                    Jalan Kaki
                                                </option>
                                                <option value="Jemputan Sekolah"
                                                    <?= ($dapodik->transportasi === 'Jemputan Sekolah' ? 'selected' : '') ?>>
                                                    Jemputan Sekolah
                                                </option>
                                                <option value="Kendaraan Pribadi"
                                                    <?= ($dapodik->transportasi === 'Kendaraan Pribadi' ? 'selected' : '') ?>>
                                                    Kendaraan Pribadi
                                                </option>
                                                <option value="Kendaraan Umum"
                                                    <?= ($dapodik->transportasi === 'Kendaraan Umum' ? 'selected' : '') ?>>
                                                    Kendaraan Umum
                                                </option>
                                                <option value="Ojek"
                                                    <?= ($dapodik->transportasi === 'Ojek' ? 'selected' : '') ?>>
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
                                                value="<?= (old('jarak_tempuh')) ? old('jarak_tempuh') : $dapodik->jarak_tempuh ?>">
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
                                                value="<?= (old('waktu_tempuh')) ? old('waktu_tempuh') : $dapodik->waktu_tempuh ?>">
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
                                                value="<?= (old('asal_sekolah')) ? old('asal_sekolah') : $dapodik->asal_sekolah ?>">
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
                                                value="<?= (old('asal_sekolah_alamat')) ? old('asal_sekolah_alamat') : $dapodik->asal_sekolah_alamat ?>"
                                                placeholder="">
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
                                                value="<?= (old('asal_sekolah_kota')) ? old('asal_sekolah_kota') : $dapodik->asal_sekolah_kota ?>"
                                                placeholder="">
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
                                                value="<?= (old('ayah_nama_lengkap')) ? old('ayah_nama_lengkap') : $dapodik->ayah_nama_lengkap ?>">
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
                                                value="<?= (old('ayah_nik')) ? old('ayah_nik') : $dapodik->ayah_nik ?>">
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
                                                value="<?= (old('ayah_kota_lahir')) ? old('ayah_kota_lahir') : $dapodik->ayah_kota_lahir ?>"
                                                placeholder="">
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
                                                value="<?= (old('ayah_tanggal_lahir')) ? old('ayah_tanggal_lahir') : $dapodik->ayah_tanggal_lahir ?>"
                                                placeholder="">
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
                                                    <?= ($dapodik->ayah_agama === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= ($dapodik->ayah_agama === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= ($dapodik->ayah_agama === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= ($dapodik->ayah_agama === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= ($dapodik->ayah_agama === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= ($dapodik->ayah_agama === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= ($dapodik->ayah_agama === 'Kepercayaan' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ayah_kewarganegaraan === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= ($dapodik->ayah_kewarganegaraan === 'WNA' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ayah_pendidikan === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= ($dapodik->ayah_pendidikan === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= ($dapodik->ayah_pendidikan === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= ($dapodik->ayah_pendidikan === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= ($dapodik->ayah_pendidikan === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= ($dapodik->ayah_pendidikan === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= ($dapodik->ayah_pendidikan === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= ($dapodik->ayah_pendidikan === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= ($dapodik->ayah_pendidikan === 'S3' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ayah_pekerjaan === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= ($dapodik->ayah_pekerjaan === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= ($dapodik->ayah_pekerjaan === 'Pensiunan' ? 'selected' : '') ?>>
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
                                                value="<?= (old('ayah_jabatan')) ? old('ayah_jabatan') : $dapodik->ayah_jabatan ?>"
                                                placeholder="">
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
                                                <option value="gol1"
                                                    <?= ($dapodik->ayah_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Tidak Berpenghasilan</option>
                                                <option value="gol2"
                                                    <?= ($dapodik->ayah_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Kurang dari Rp 2.000.000</option>
                                                <option value="gol3"
                                                    <?= ($dapodik->ayah_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Rp 2.000.000 - 5.000.000</option>
                                                <option value="gol4"
                                                    <?= ($dapodik->ayah_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Rp 5.000.000 - 10.000.000</option>
                                                <option value="gol5"
                                                    <?= ($dapodik->ayah_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Lebih Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_nama_perusahaan" name="ayah_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('ayah_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('ayah_nama_perusahaan')) ? old('ayah_nama_perusahaan') : $dapodik->ayah_nama_perusahaan ?>"
                                                placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ayah_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ayah_alamat_perusahaan" name="ayah_alamat_perusahaan"
                                                placeholder=""
                                                value="<?= (old('ayah_alamat_perusahaan')) ? old('ayah_alamat_perusahaan') : $dapodik->ayah_alamat_perusahaan ?>"
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
                                                    <?= ($dapodik->ayah_kebutuhan_khusus === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?= ($dapodik->ayah_kebutuhan_khusus === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ayah_jenis_kebutuhan_khusus"
                                                value="<?= (old('ayah_jenis_kebutuhan_khusus')) ? old('ayah_jenis_kebutuhan_khusus') : $dapodik->ayah_jenis_kebutuhan_khusus ?>"
                                                placeholder=""
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
                                                value="<?= (old('ayah_telepon')) ? old('ayah_telepon') : $dapodik->ayah_telepon ?>"
                                                placeholder="">
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
                                                value="<?= (old('ayah_email')) ? old('ayah_email') : $dapodik->ayah_email ?>"
                                                placeholder="">
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
                                                value="<?= (old('ibu_nama_lengkap')) ? old('ibu_nama_lengkap') : $dapodik->ibu_nama_lengkap ?>">
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
                                                value="<?= (old('ibu_nik')) ? old('ibu_nik') : $dapodik->ibu_nik ?>">
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
                                                value="<?= (old('ibu_kota_lahir')) ? old('ibu_kota_lahir') : $dapodik->ibu_kota_lahir ?>"
                                                placeholder="">
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
                                                value="<?= (old('ibu_tanggal_lahir')) ? old('ibu_tanggal_lahir') : $dapodik->ibu_tanggal_lahir ?>"
                                                placeholder="">
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
                                                    <?= ($dapodik->ibu_agama === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= ($dapodik->ibu_agama === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= ($dapodik->ibu_agama === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= ($dapodik->ibu_agama === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= ($dapodik->ibu_agama === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= ($dapodik->ibu_agama === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= ($dapodik->ibu_agama === 'Kepercayaan' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ibu_kewarganegaraan === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= ($dapodik->ibu_kewarganegaraan === 'WNA' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ibu_pendidikan === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= ($dapodik->ibu_pendidikan === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= ($dapodik->ibu_pendidikan === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= ($dapodik->ibu_pendidikan === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= ($dapodik->ibu_pendidikan === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= ($dapodik->ibu_pendidikan === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= ($dapodik->ibu_pendidikan === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= ($dapodik->ibu_pendidikan === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= ($dapodik->ibu_pendidikan === 'S3' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->ibu_pekerjaan === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= ($dapodik->ibu_pekerjaan === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= ($dapodik->ibu_pekerjaan === 'Pensiunan' ? 'selected' : '') ?>>
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
                                                value="<?= (old('ibu_jabatan')) ? old('ibu_jabatan') : $dapodik->ibu_jabatan ?>"
                                                placeholder="">
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
                                                    <?= ($dapodik->ibu_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Tidak Berpenghasilan</option>
                                                <option value="gol2"
                                                    <?= ($dapodik->ibu_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Kurang dari Rp 2.000.000</option>
                                                <option value="gol3"
                                                    <?= ($dapodik->ibu_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Rp 2.000.000 - 5.000.000</option>
                                                <option value="gol4"
                                                    <?= ($dapodik->ibu_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Rp 5.000.000 - 10.000.000</option>
                                                <option value="gol5"
                                                    <?= ($dapodik->ibu_pendapatan === 'Pensiunan' ? 'selected' : '') ?>>
                                                    Lebih Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_nama_perusahaan" name="ibu_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('ibu_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('ibu_nama_perusahaan')) ? old('ibu_nama_perusahaan') : $dapodik->ibu_nama_perusahaan ?>"
                                                placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('ibu_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="ibu_alamat_perusahaan" name="ibu_alamat_perusahaan"
                                                placeholder=""
                                                value="<?= (old('ibu_alamat_perusahaan')) ? old('ibu_alamat_perusahaan') : $dapodik->ibu_alamat_perusahaan ?>"
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
                                                    <?= ($dapodik->ibu_kebutuhan_khusus === 'Ya' ? 'selected' : '') ?>>
                                                    Ya
                                                </option>
                                                <option value="Tidak"
                                                    <?= ($dapodik->ibu_kebutuhan_khusus === 'Tidak' ? 'selected' : '') ?>>
                                                    Tidak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenis Kebutuhan Khusus</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="ibu_jenis_kebutuhan_khusus"
                                                value="<?= (old('ibu_jenis_kebutuhan_khusus')) ? old('ibu_jenis_kebutuhan_khusus') : $dapodik->ibu_jenis_kebutuhan_khusus ?>"
                                                placeholder=""
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
                                                value="<?= (old('ibu_telepon')) ? old('ibu_telepon') : $dapodik->ibu_telepon ?>"
                                                placeholder="">
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
                                                value="<?= (old('ibu_email')) ? old('ibu_email') : $dapodik->ibu_email ?>"
                                                placeholder="">
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
                                                value="<?= (old('wali_nama_lengkap')) ? old('wali_nama_lengkap') : $dapodik->wali_nama_lengkap ?>">
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
                                                value="<?= (old('wali_nik')) ? old('wali_nik') : $dapodik->wali_nik ?>">
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
                                                value="<?= (old('wali_kota_lahir')) ? old('wali_kota_lahir') : $dapodik->wali_kota_lahir ?>"
                                                placeholder="">
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
                                                value="<?= (old('wali_tanggal_lahir')) ? old('wali_tanggal_lahir') : $dapodik->wali_tanggal_lahir ?>"
                                                placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_tanggal_lahir') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <select name="wali_agama" class="custom-select">
                                                <option value="" <?= ($dapodik->wali_agama === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Katolik"
                                                    <?= ($dapodik->wali_agama === 'Katolik' ? 'selected' : '') ?>>
                                                    Katolik
                                                </option>
                                                <option value="Protestan"
                                                    <?= ($dapodik->wali_agama === 'Protestan' ? 'selected' : '') ?>>
                                                    Protestan
                                                </option>
                                                <option value="Islam"
                                                    <?= ($dapodik->wali_agama === 'Islam' ? 'selected' : '') ?>>
                                                    Islam
                                                </option>
                                                <option value="Hindu"
                                                    <?= ($dapodik->wali_agama === 'Hindu' ? 'selected' : '') ?>>
                                                    Hindu
                                                </option>
                                                <option value="Budha"
                                                    <?= ($dapodik->wali_agama === 'Budha' ? 'selected' : '') ?>>
                                                    Budha
                                                </option>
                                                <option value="Kong Hu Cu"
                                                    <?= ($dapodik->wali_agama === 'Kong Hu Cu' ? 'selected' : '') ?>>
                                                    Kong Hu Cu
                                                </option>
                                                <option value="Kepercayaan"
                                                    <?= ($dapodik->wali_agama === 'Kepercayaan' ? 'selected' : '') ?>>
                                                    Kepercayaan Kepada Tuhan YME
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Kewarganegaraan</label>
                                        <div class="col-sm-9">
                                            <select name="wali_kewarganegaraan" class="custom-select">
                                                <option value="" selected>
                                                </option>
                                                <option value="WNI"
                                                    <?= ($dapodik->wali_kewarganegaraan === 'WNI' ? 'selected' : '') ?>>
                                                    WNI
                                                </option>
                                                <option value="WNA"
                                                    <?= ($dapodik->wali_kewarganegaraan === 'WNA' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->wali_pendidikan === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="SD"
                                                    <?= ($dapodik->wali_pendidikan === 'SD' ? 'selected' : '') ?>>
                                                    SD
                                                </option>
                                                <option value="SMP"
                                                    <?= ($dapodik->wali_pendidikan === 'SMP' ? 'selected' : '') ?>>
                                                    SMP
                                                </option>
                                                <option value="SMA"
                                                    <?= ($dapodik->wali_pendidikan === 'SMA' ? 'selected' : '') ?>>
                                                    SMA
                                                </option>
                                                <option value="D1"
                                                    <?= ($dapodik->wali_pendidikan === 'D1' ? 'selected' : '') ?>>
                                                    D1
                                                </option>
                                                <option value="D2"
                                                    <?= ($dapodik->wali_pendidikan === 'D2' ? 'selected' : '') ?>>
                                                    D2
                                                </option>
                                                <option value="D3"
                                                    <?= ($dapodik->wali_pendidikan === 'D3' ? 'selected' : '') ?>>
                                                    D3
                                                </option>
                                                <option value="D4/S1"
                                                    <?= ($dapodik->wali_pendidikan === 'D4/S1' ? 'selected' : '') ?>>
                                                    D4/S1
                                                </option>
                                                <option value="S2"
                                                    <?= ($dapodik->wali_pendidikan === 'S2' ? 'selected' : '') ?>>
                                                    S2
                                                </option>
                                                <option value="S3"
                                                    <?= ($dapodik->wali_pendidikan === 'S3' ? 'selected' : '') ?>>
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
                                                    <?= ($dapodik->wali_pekerjaan === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Tidak Bekerja"
                                                    <?= ($dapodik->wali_pekerjaan === 'Tidak Bekerja' ? 'selected' : '') ?>>
                                                    Tidak Bekerja
                                                </option>
                                                <option value="PNS/TNI/POLRI"
                                                    <?= ($dapodik->wali_pekerjaan === 'PNS/TNI/POLRI' ? 'selected' : '') ?>>
                                                    PNS/TNI/POLRI
                                                </option>
                                                <option value="Karyawan Swasta"
                                                    <?= ($dapodik->wali_pekerjaan === 'Karyawan Swasta' ? 'selected' : '') ?>>
                                                    Karyawan Swasta
                                                </option>
                                                <option value="Pedagang Kecil"
                                                    <?= ($dapodik->wali_pekerjaan === 'Pedagang Kecil' ? 'selected' : '') ?>>
                                                    Pedagang Kecil
                                                </option>
                                                <option value="Pedagang Besar"
                                                    <?= ($dapodik->wali_pekerjaan === 'Pedagang Besar' ? 'selected' : '') ?>>
                                                    Pedagang Besar
                                                </option>
                                                <option value="Wiraswasta"
                                                    <?= ($dapodik->wali_pekerjaan === 'Wiraswasta' ? 'selected' : '') ?>>
                                                    Wiraswasta
                                                </option>
                                                <option value="Wirausaha"
                                                    <?= ($dapodik->wali_pekerjaan === 'Wirausaha' ? 'selected' : '') ?>>
                                                    Wirausaha
                                                </option>
                                                <option value="Buruh"
                                                    <?= ($dapodik->wali_pekerjaan === 'Buruh' ? 'selected' : '') ?>>
                                                    Buruh
                                                </option>
                                                <option value="Pensiunan"
                                                    <?= ($dapodik->wali_pekerjaan === 'Pensiunan' ? 'selected' : '') ?>>
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
                                                value="<?= (old('wali_jabatan')) ? old('wali_jabatan') : $dapodik->wali_jabatan ?>"
                                                placeholder="">
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
                                                    <?= ($dapodik->wali_pendapatan === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="gol1"
                                                    <?= ($dapodik->wali_pendapatan === 'gol1' ? 'selected' : '') ?>>
                                                    Tidak Berpenghasilan</option>
                                                <option value="gol2"
                                                    <?= ($dapodik->wali_pendapatan === 'gol2' ? 'selected' : '') ?>>
                                                    Kurang dari Rp 2.000.000</option>
                                                <option value="gol3"
                                                    <?= ($dapodik->wali_pendapatan === 'gol3' ? 'selected' : '') ?>>Rp
                                                    2.000.000 - 5.000.000</option>
                                                <option value="gol4"
                                                    <?= ($dapodik->wali_pendapatan === 'gol4' ? 'selected' : '') ?>>Rp
                                                    5.000.000 - 10.000.000</option>
                                                <option value="gol5"
                                                    <?= ($dapodik->wali_pendapatan === 'gol5' ? 'selected' : '') ?>>
                                                    Lebih Dari Rp 10.000.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_nama_perusahaan" name="wali_nama_perusahaan"
                                                class="form-control <?= ($validation->hasError('wali_nama_perusahaan')) ? 'is-invalid' : '' ?>"
                                                value="<?= (old('wali_nama_perusahaan')) ? old('wali_nama_perusahaan') : $dapodik->wali_nama_perusahaan ?>"
                                                placeholder="">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('wali_nama_perusahaan') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="wali_alamat_perusahaan" name="wali_alamat_perusahaan"
                                                placeholder=""
                                                value="<?= (old('wali_alamat_perusahaan')) ? old('wali_alamat_perusahaan') : $dapodik->wali_alamat_perusahaan ?>"
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
                                                value="<?= (old('wali_telepon')) ? old('wali_telepon') : $dapodik->wali_telepon ?>"
                                                placeholder="">
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
                                                value="<?= (old('wali_email')) ? old('wali_email') : $dapodik->wali_email ?>"
                                                placeholder="">
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
                                                    <?= ($dapodik->wali_hubungan_anak === '' ? 'selected' : '') ?>>
                                                </option>
                                                <option value="Kakek/Nenek"
                                                    <?= ($dapodik->wali_hubungan_anak === 'Kakek/Nenek' ? 'selected' : '') ?>>
                                                    Kakek/Nenek
                                                </option>
                                                <option value="Om/Tante"
                                                    <?= ($dapodik->wali_hubungan_anak === 'Om/Tante' ? 'selected' : '') ?>>
                                                    Om/Tante
                                                </option>
                                                <option value="Lainnya"
                                                    <?= ($dapodik->wali_hubungan_anak === 'Lainnya' ? 'selected' : '') ?>>
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