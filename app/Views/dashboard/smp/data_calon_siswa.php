<?= $this->extend('dashboard/layouts/template') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body met-pro-bg">
                <div class="met-profile">
                    <div class="row">
                        <div class="col-lg-8 align-self-center mb-3 mb-lg-0">
                            <div class="met-profile-main">
                                <div class="met-profile-main-pic">
                                    <img src="<?= base_url() ?>/back/images/logo_serviam.png" alt=""
                                        style="max-width: 120px;" class="rounded-circle">
                                </div>
                                <div class="met-profile_user-detail">
                                    <h5 class="met-user-name"><?= $smp->nama_lengkap ?></h5>
                                    <p class="mb-0 met-user-name-post">
                                        <b>Calon Peserta Didik Kelas <?= $smp->pilihan_tingkat ?></b> -
                                        <b><?= $unit ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ml-auto">
                            <ul class="list-unstyled personal-detail">
                                <li class=""><i class="dripicons-document-new mr-2 text-info font-18"></i>
                                    <b> No. Pendaftaran </b> : <?= $smp->no_registrasi ?>
                                </li>
                                <li class="mt-3"><i class="dripicons-document text-info font-18 mt- mr-2"></i>
                                    <b> No. Virtual Account </b> : <?= $smp->no_virtual ?>
                                </li>
                                <li class="mt-3 md-0"><i class="dripicons-mail text-info font-18 mt-2 mr-2"></i>
                                    <b> Email </b> : <?= $smp->email ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-0" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="data_pendaftaran_tab" data-toggle="pill" href="#data_pendaftaran">
                            Data Pendaftaran
                        </a>
                    </li>
                    <?php if(($smp->status_penerimaan === '2')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="data_peserta_didik_tab" data-toggle="pill" href="#data_peserta_didik">
                            Data Peserta Didik
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if(($smp->status_penerimaan === '2')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="data_pernyataan_tab" data-toggle="pill" href="#data_pernyataan">
                            Data Pernyataan
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if(($smp->status_penerimaan === '2')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="data_keuangan_tab" data-toggle="pill" href="#data_keuangan">
                            Data Keuangan
                        </a>
                    </li>
                    <?php endif ?>
                    <?php if(($smp->status_penerimaan === '2')) : ?>
                    <li class="nav-item">
                        <a class="nav-link" id="data_pembayaran_tab" data-toggle="pill" href="#data_pembayaran">
                            Data Pembayaran
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php if(session()->getFlashdata('pesan')) : ?>
<div class="alert alert-success" role="alert">
    <?= session()->getFlashdata('pesan') ?>
</div>
<?php endif ?>

<div class="row">
    <div class="col-12">
        <div class="tab-content detail-list" id="pills-tabContent">
            <div class="tab-pane fade active" id="data_pendaftaran">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PENDAFTARAN</b></h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <tr>
                                                <a href="/<?= $slug_unit ?>/ubah_data_pendaftaran/<?= $smp->slug_nama_lengkap ?>"
                                                    class="btn btn-lg btn-primary btn-block <?= ($smp->status_pendaftaran === '3' ? 'disabled' : '') ?>">
                                                    Ubah Data Pendaftaran
                                                </a>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <tr>
                                                <td><b>Tempat Tanggal Lahir</b></td>
                                                <td><?= $smp->kota_lahir ?>,
                                                    <?= date("d F Y", strtotime($smp->tanggal_lahir)) ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><b>Asal Sekolah</b></td>
                                                <td><?= $smp->asal_sekolah ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Nama Orangtua</b></td>
                                                <td><?= $smp->nama_orangtua ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>No. Whatsapp</b></td>
                                                <td><?= $smp->no_whatsapp ?></td>
                                            </tr>
                                            <tr>
                                                <td><b>Bukti Pembayaran</b></td>
                                                <td>
                                                    <img src="<?= base_url() ?>/upload/bukti_pembayaran/<?= $slug_unit ?>/<?= $smp->bukti_pembayaran ?>"
                                                        alt="<?= $smp->nama_lengkap ?>" style="max-width: 300px;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(($smp->status_penerimaan === '2') && ($smp->status_dapodik === '1')) : ?>
            <div class="tab-pane fade" id="data_peserta_didik">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PESERTA DIDIK BELUM DIISI</b><br>Untuk Melakukan Pengisian,
                                                Dapat Menekan Tombol Form Data Peserta Didik Pada Halaman Dashboard.
                                            </h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && (($smp->status_dapodik === '2') || $smp->status_dapodik === '3')) : ?>
            <div class="tab-pane fade" id="data_peserta_didik">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PESERTA DIDIK</b></h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <tr>
                                                <a href="/<?= $slug_unit ?>/ubah_data_dapodik/<?= $smp->slug_nama_lengkap ?>"
                                                    class="btn btn-lg btn-primary btn-block <?= ($smp->status_dapodik === '3' ? 'disabled' : '') ?>">
                                                    Ubah Data Peserta Didik
                                                </a>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA PRIBADI</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap</b></td>
                                                        <td><?= $dapodik->nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Panggilan</b></td>
                                                        <td><?= $dapodik->nama_panggilan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tempat, Tanggal Lahir</b></td>
                                                        <td><?= $dapodik->kota_lahir ?>,
                                                            <?= date("d F Y", strtotime($dapodik->tanggal_lahir)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jenis Kelamin</b></td>
                                                        <td><?= $dapodik->jenis_kelamin ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kewarganegaraan</b></td>
                                                        <td><?= $dapodik->kewarganegaraan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Agama</b></td>
                                                        <td><?= $dapodik->agama ?></td>
                                                    </tr>
                                                    <?php if($dapodik->agama === 'Katolik') : ?>
                                                    <tr>
                                                        <td><b>Paroki</b></td>
                                                        <td><?= $dapodik->paroki ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Berkebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php if($dapodik->kebutuhan_khusus === 'Ya') : ?>
                                                    <tr>
                                                        <td><b>Jenis Kebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->jenis_kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Anak Ke</b></td>
                                                        <td><?= $dapodik->anak_keberapa ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Saudara Kandung</b></td>
                                                        <td><?= $dapodik->saudara_kandung ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Golongan Darah</b></td>
                                                        <td><?= strtoupper($dapodik->gol_darah) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tinggi Badan</b></td>
                                                        <td><?= $dapodik->tinggi ?> cm</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Berat Badan</b></td>
                                                        <td><?= $dapodik->berat ?> kg</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Lingkar Kepala</b></td>
                                                        <td><?= $dapodik->kepala ?> cm</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nomor Induk Siswa Nasional</b></td>
                                                        <td><?= $dapodik->nisn ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pas Foto</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/pas_foto/<?= $slug_unit ?>/<?= $dapodik->pas_foto ?>"
                                                                alt="<?= $dapodik->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA KEPENDUDUKAN</b></h5>
                                                    <tr>
                                                        <td><b>Nomor Induk Kependudukan</b></td>
                                                        <td><?= $dapodik->nik ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nomor Kartu Keluarga</b></td>
                                                        <td><?= $dapodik->nkk ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nomor Registrasi Akta Kelahiran</b></td>
                                                        <td><?= $dapodik->nak ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Scan Kartu Keluarga</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/scan_kk/<?= $slug_unit ?>/<?= $dapodik->scan_kk ?>"
                                                                alt="<?= $dapodik->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Scan Akta Kelahiran</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/scan_ak/<?= $slug_unit ?>/<?= $dapodik->scan_ak ?>"
                                                                alt="<?= $dapodik->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA TEMPAT TINGGAL</b></h5>
                                                    <tr>
                                                        <td><b>Alamat Sesuai KK</b></td>
                                                        <td>
                                                            <?= $dapodik->kk_alamat ?> RT <?= $dapodik->kk_rt ?> RW
                                                            <?= $dapodik->kk_rw ?>, Kelurahan
                                                            <?= $dapodik->kk_kelurahan ?>, Kecamatan
                                                            <?= $dapodik->kk_kecamatan ?>, <?= $dapodik->kk_kota ?>
                                                            <?= $dapodik->kk_kodepos ?>
                                                        </td>
                                                    </tr>
                                                    <?php if($dapodik->tt_alamat != null) : ?>
                                                    <tr>
                                                        <td><b>Alamat Tempat Tinggal</b></td>
                                                        <td>
                                                            <?= $dapodik->tt_alamat ?> RT <?= $dapodik->tt_rt ?> RW
                                                            <?= $dapodik->tt_rw ?>, Kelurahan
                                                            <?= $dapodik->tt_kelurahan ?>, Kecamatan
                                                            <?= $dapodik->tt_kecamatan ?>, <?= $dapodik->tt_kota ?>
                                                            <?= $dapodik->tt_kodepos ?>
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Tinggal Bersama</b></td>
                                                        <td><?= $dapodik->tinggal_bersama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Moda Transportasi</b></td>
                                                        <td><?= $dapodik->transportasi ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jarak Tempuh ke Sekolah</b></td>
                                                        <td><?= $dapodik->jarak_tempuh ?> km</td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Waktu Tempuh ke Sekolah</b></td>
                                                        <td><?= $dapodik->waktu_tempuh ?> menit</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row">
                            <?php if($smp->asal_sekolah != NULL) : ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA ASAL SEKOLAH</b></h5>
                                                    <tr>
                                                        <td><b>Nama Sekolah</b></td>
                                                        <td><?= $dapodik->asal_sekolah ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat</b></td>
                                                        <td><?= $dapodik->asal_sekolah_alamat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kota</b></td>
                                                        <td><?= $dapodik->asal_sekolah_kota ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php if($dapodik->ayah_nama_lengkap != NULL) : ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA AYAH</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap</b></td>
                                                        <td><?= $dapodik->ayah_nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>NIK</b></td>
                                                        <td><?= $dapodik->ayah_nik ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tempat, Tanggal Lahir</b></td>
                                                        <td><?= $dapodik->ayah_kota_lahir ?>,
                                                            <?= date("d F Y", strtotime($dapodik->ayah_tanggal_lahir)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Agama</b></td>
                                                        <td><?= $dapodik->ayah_agama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kewarganegaraan</b></td>
                                                        <td><?= $dapodik->ayah_kewarganegaraan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pendidikan Terakhir</b></td>
                                                        <td><?= $dapodik->ayah_pendidikan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pekerjaan</b></td>
                                                        <td><?= $dapodik->ayah_pekerjaan ?></td>
                                                    </tr>
                                                    <?php if($dapodik->ayah_jabatan != null) : ?>
                                                    <tr>
                                                        <td><b>Jabatan</b></td>
                                                        <td><?= $dapodik->ayah_jabatan ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Penghasilan</b></td>
                                                        <?php if($dapodik->ayah_pendapatan === 'gol1') { ?>
                                                        <td>Tidak Berpenghasilan</td>
                                                        <?php } elseif($dapodik->ayah_pendapatan === 'gol2') { ?>
                                                        <td>Kurang dari Rp 2.000.000</td>
                                                        <?php } elseif($dapodik->ayah_pendapatan === 'gol3') { ?>
                                                        <td>Rp 2.000.000 - 5.000.000</td>
                                                        <?php } elseif($dapodik->ayah_pendapatan === 'gol4') { ?>
                                                        <td>Rp 5.000.000 - 10.000.000</td>
                                                        <?php } elseif($dapodik->ayah_pendapatan === 'gol5') { ?>
                                                        <td>Lebih dari Rp 10.000.000</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Perusahaan</b></td>
                                                        <td><?= $dapodik->ayah_nama_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat Perusahaan</b></td>
                                                        <td><?= $dapodik->ayah_alamat_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Berkebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->ayah_kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php if($dapodik->kebutuhan_khusus === 'Ya') : ?>
                                                    <tr>
                                                        <td><b>Jenis Kebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->ayah_jenis_kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>No. HP/Whatsapp</b></td>
                                                        <td><?= $dapodik->ayah_telepon ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td><?= $dapodik->ayah_email ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php if($dapodik->ibu_nama_lengkap != NULL) : ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA IBU</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap</b></td>
                                                        <td><?= $dapodik->ibu_nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>NIK</b></td>
                                                        <td><?= $dapodik->ibu_nik ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tempat, Tanggal Lahir</b></td>
                                                        <td><?= $dapodik->ibu_kota_lahir ?>,
                                                            <?= date("d F Y", strtotime($dapodik->ibu_tanggal_lahir)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Agama</b></td>
                                                        <td><?= $dapodik->ibu_agama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kewarganegaraan</b></td>
                                                        <td><?= $dapodik->ibu_kewarganegaraan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pendidikan Terakhir</b></td>
                                                        <td><?= $dapodik->ibu_pendidikan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pekerjaan</b></td>
                                                        <td><?= $dapodik->ibu_pekerjaan ?></td>
                                                    </tr>
                                                    <?php if($dapodik->ibu_jabatan != null) : ?>
                                                    <tr>
                                                        <td><b>Jabatan</b></td>
                                                        <td><?= $dapodik->ibu_jabatan ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Penghasilan</b></td>
                                                        <?php if($dapodik->ibu_pendapatan === 'gol1') { ?>
                                                        <td>Tidak Berpenghasilan</td>
                                                        <?php } elseif($dapodik->ibu_pendapatan === 'gol2') { ?>
                                                        <td>Kurang dari Rp 2.000.000</td>
                                                        <?php } elseif($dapodik->ibu_pendapatan === 'gol3') { ?>
                                                        <td>Rp 2.000.000 - 5.000.000</td>
                                                        <?php } elseif($dapodik->ibu_pendapatan === 'gol4') { ?>
                                                        <td>Rp 5.000.000 - 10.000.000</td>
                                                        <?php } elseif($dapodik->ibu_pendapatan === 'gol5') { ?>
                                                        <td>Lebih dari Rp 10.000.000</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Perusahaan</b></td>
                                                        <td><?= $dapodik->ibu_nama_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat Perusahaan</b></td>
                                                        <td><?= $dapodik->ibu_alamat_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Berkebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->ibu_kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php if($dapodik->kebutuhan_khusus === 'Ya') : ?>
                                                    <tr>
                                                        <td><b>Jenis Kebutuhan Khusus</b></td>
                                                        <td><?= $dapodik->ibu_jenis_kebutuhan_khusus ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>No. HP/Whatsapp</b></td>
                                                        <td><?= $dapodik->ibu_telepon ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td><?= $dapodik->ibu_email ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php if($dapodik->wali_nama_lengkap != NULL) : ?>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA WALI</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap</b></td>
                                                        <td><?= $dapodik->wali_nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>NIK</b></td>
                                                        <td><?= $dapodik->wali_nik ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Tempat, Tanggal Lahir</b></td>
                                                        <td><?= $dapodik->wali_kota_lahir ?>,
                                                            <?= date("d F Y", strtotime($dapodik->wali_tanggal_lahir)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Agama</b></td>
                                                        <td><?= $dapodik->wali_agama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Kewarganegaraan</b></td>
                                                        <td><?= $dapodik->wali_kewarganegaraan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pendidikan Terakhir</b></td>
                                                        <td><?= $dapodik->wali_pendidikan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Pekerjaan</b></td>
                                                        <td><?= $dapodik->wali_pekerjaan ?></td>
                                                    </tr>
                                                    <?php if($dapodik->wali_jabatan != null) : ?>
                                                    <tr>
                                                        <td><b>Jabatan</b></td>
                                                        <td><?= $dapodik->wali_jabatan ?></td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <tr>
                                                        <td><b>Penghasilan</b></td>
                                                        <?php if($dapodik->wali_pendapatan === 'gol1') { ?>
                                                        <td>Tidak Berpenghasilan</td>
                                                        <?php } elseif($dapodik->wali_pendapatan === 'gol2') { ?>
                                                        <td>Kurang dari Rp 2.000.000</td>
                                                        <?php } elseif($dapodik->wali_pendapatan === 'gol3') { ?>
                                                        <td>Rp 2.000.000 - 5.000.000</td>
                                                        <?php } elseif($dapodik->wali_pendapatan === 'gol4') { ?>
                                                        <td>Rp 5.000.000 - 10.000.000</td>
                                                        <?php } elseif($dapodik->wali_pendapatan === 'gol5') { ?>
                                                        <td>Lebih dari Rp 10.000.000</td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Nama Perusahaan</b></td>
                                                        <td><?= $dapodik->wali_nama_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat Perusahaan</b></td>
                                                        <td><?= $dapodik->wali_alamat_perusahaan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>No. HP/Whatsapp</b></td>
                                                        <td><?= $dapodik->wali_telepon ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Email</b></td>
                                                        <td><?= $dapodik->wali_email ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Hubungan Dengan Anak</b></td>
                                                        <td><?= $dapodik->wali_hubungan_anak ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && ($smp->status_pernyataan === '1')) : ?>
            <div class="tab-pane fade" id="data_pernyataan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PERNYATAAN BELUM DIISI</b><br>Untuk Melakukan Pengisian,
                                                Dapat Menekan Tombol Form Data Pernyataan Pada Halaman Dashboard.
                                            </h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && (($smp->status_pernyataan === '2') || $smp->status_pernyataan === '3')) : ?>
            <div class="tab-pane fade" id="data_pernyataan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PERNYATAAN</b></h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA ORANG TUA</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap Orang Tua</b></td>
                                                        <td><?= $pernyataan->nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat Rumah</b></td>
                                                        <td><?= $pernyataan->alamat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>No.HP/Whatsapp</b></td>
                                                        <td><?= $pernyataan->handphone ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && ($smp->status_keuangan === '1')) : ?>
            <div class="tab-pane fade" id="data_keuangan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA KEUANGAN BELUM DIISI</b><br>Untuk Melakukan Pengisian,
                                                Dapat Menekan Tombol Form Data Keuangan Pada Halaman Dashboard.
                                            </h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && (($smp->status_keuangan === '2') || $smp->status_keuangan === '3')) : ?>
            <div class="tab-pane fade" id="data_keuangan">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA KEUANGAN</b></h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA ORANG TUA</b></h5>
                                                    <tr>
                                                        <td><b>Nama Lengkap Orang Tua</b></td>
                                                        <td><?= $keuangan->nama_lengkap ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Alamat Rumah</b></td>
                                                        <td><?= $keuangan->alamat ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>No.HP/Whatsapp</b></td>
                                                        <td><?= $keuangan->handphone ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA UANG SEKOLAH & UANG PANGKAL</b></h5>
                                                    <?php
                                                    if ($beasiswa) {
                                                        $pengurangan_uang_pangkal = $beasiswa->uang_pangkal;
                                                        $uang_pangkal = 10000000 - $pengurangan_uang_pangkal;
                                                        $uang_sekolah = 800000;
                                                    } else {
                                                        $uang_pangkal = 10000000;
                                                        $uang_sekolah = 800000;
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td><b>Uang Pangkal</b></td>
                                                        <td>
                                                            Rp.<?= number_format($uang_pangkal, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Uang Sekolah</b></td>
                                                        <td>
                                                            Rp.<?= number_format($uang_sekolah, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>DATA PERJANJIAN KEUANGAN</b></h5>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran Tahap 1</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_1 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_1, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <?php if($keuangan->uang_tahap_2 != 0) : ?>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran Tahap 2</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_2 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_2, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <?php if($keuangan->uang_tahap_3 != 0) : ?>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran Tahap 3</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_3 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_3, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <?php if($keuangan->uang_tahap_4 != 0) : ?>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran Tahap 4</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_4 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_4, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && ($smp->status_keuangan === '1')) : ?>
            <div class="tab-pane fade" id="data_pembayaran">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA KEUANGAN BELUM DIISI</b><br>Untuk Melakukan Pengisian,
                                                Dapat Menekan Tombol Form Data Keuangan Pada Halaman Dashboard.
                                            </h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
            <?php if(($smp->status_penerimaan === '2') && (($smp->status_keuangan === '2') || $smp->status_keuangan === '3')) : ?>
            <div class="tab-pane fade" id="data_pembayaran">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-centered">
                                        <tbody>
                                            <h4><b>DATA PEMBAYARAN</b></h4>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <tbody>
                                                    <h5><b>UPLOAD BUKTI PEMBAYARAN</b></h5>
                                                    <tr>
                                                        <td><b>Pembayaran Tahap 1</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_1 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_1, 0, '', '.') ?>,-
                                                        </td>
                                                        <td>
                                                            <a href="/<?= $slug_unit ?>/pembayaran_tahap_1/<?= $smp->slug_nama_lengkap ?>"
                                                                class="btn btn-lg btn-primary <?= ($keuangan->status_tahap_1 === '1' ? 'disabled' : '') ?>">
                                                                Upload Bukti Pembayaran
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php if($keuangan->uang_tahap_2 != 0) : ?>
                                                    <tr>
                                                        <td><b>Pembayaran Tahap 2</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_2 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_2, 0, '', '.') ?>,-
                                                        </td>
                                                        <td>
                                                            <a href="/<?= $slug_unit ?>/pembayaran_tahap_2/<?= $smp->slug_nama_lengkap ?>"
                                                                class="btn btn-lg btn-primary <?= ($keuangan->status_tahap_2 === '1' ? 'disabled' : '') ?>">
                                                                Upload Bukti Pembayaran
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <?php if($keuangan->uang_tahap_3 != 0) : ?>
                                                    <tr>
                                                        <td><b>Pembayaran Tahap 3</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_3 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_3, 0, '', '.') ?>,-
                                                        </td>
                                                        <td>
                                                            <a href="/<?= $slug_unit ?>/pembayaran_tahap_3/<?= $smp->slug_nama_lengkap ?>"
                                                                class="btn btn-lg btn-primary <?= ($keuangan->status_tahap_3 === '1' ? 'disabled' : '') ?>">
                                                                Upload Bukti Pembayaran
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                    <?php if($keuangan->uang_tahap_4 != 0) : ?>
                                                    <tr>
                                                        <td><b>Pembayaran Tahap 4</b></td>
                                                        <td>
                                                            <?= $keuangan->tanggal_pembayaran ?> <?= $bulan_tahap_4 ?>
                                                        </td>
                                                        <td>
                                                            Rp.<?= number_format($keuangan->uang_tahap_4, 0, '', '.') ?>,-
                                                        </td>
                                                        <td>
                                                            <a href="/<?= $slug_unit ?>/pembayaran_tahap_4/<?= $smp->slug_nama_lengkap ?>"
                                                                class="btn btn-lg btn-primary <?= ($keuangan->status_tahap_4 === '1' ? 'disabled' : '') ?>">
                                                                Upload Bukti Pembayaran
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endif ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <?php if($pembayaran_tahap_1) { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 1</b></h5>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran</b></td>
                                                        <td>
                                                            <?= strftime("%d %B %Y", strtotime($pembayaran_tahap_1->tanggal_bayar)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Pembayaran</b></td>
                                                        <td>
                                                            Rp.<?= number_format($pembayaran_tahap_1->jumlah_bayar, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bukti Pembayaran</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/bukti_tahap_1/<?= $slug_unit ?>/<?= $pembayaran_tahap_1->bukti_bayar ?>"
                                                                alt="<?= $smp->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } else { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 1</b></h5>
                                                    <tr>
                                                        <td><b>Belum Melakukan Upload Bukti Pembayaran</b></td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php if($keuangan->uang_tahap_2 != 0) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <?php if($pembayaran_tahap_2) { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 2</b></h5>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran</b></td>
                                                        <td>
                                                            <?= strftime("%d %B %Y", strtotime($pembayaran_tahap_2->tanggal_bayar)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Pembayaran</b></td>
                                                        <td>
                                                            Rp.<?= number_format($pembayaran_tahap_2->jumlah_bayar, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bukti Pembayaran</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/bukti_tahap_2/<?= $slug_unit ?>/<?= $pembayaran_tahap_2->bukti_bayar ?>"
                                                                alt="<?= $smp->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } else { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 2</b></h5>
                                                    <tr>
                                                        <td><b>Belum Melakukan Upload Bukti Pembayaran</b></td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php if($keuangan->uang_tahap_3 != 0) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <?php if($pembayaran_tahap_3) { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 3</b></h5>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran</b></td>
                                                        <td>
                                                            <?= strftime("%d %B %Y", strtotime($pembayaran_tahap_3->tanggal_bayar)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Pembayaran</b></td>
                                                        <td>
                                                            Rp.<?= number_format($pembayaran_tahap_3->jumlah_bayar, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bukti Pembayaran</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/bukti_tahap_3/<?= $slug_unit ?>/<?= $pembayaran_tahap_3->bukti_bayar ?>"
                                                                alt="<?= $smp->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } else { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 3</b></h5>
                                                    <tr>
                                                        <td><b>Belum Melakukan Upload Bukti Pembayaran</b></td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            <?php if($keuangan->uang_tahap_4 != 0) : ?>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0 table-centered">
                                                <?php if($pembayaran_tahap_4) { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 4</b></h5>
                                                    <tr>
                                                        <td><b>Tanggal Pembayaran</b></td>
                                                        <td>
                                                            <?= strftime("%d %B %Y", strtotime($pembayaran_tahap_4->tanggal_bayar)) ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Jumlah Pembayaran</b></td>
                                                        <td>
                                                            Rp.<?= number_format($pembayaran_tahap_4->jumlah_bayar, 0, '', '.') ?>,-
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bukti Pembayaran</b></td>
                                                        <td>
                                                            <img src="<?= base_url() ?>/upload/bukti_tahap_4/<?= $slug_unit ?>/<?= $pembayaran_tahap_4->bukti_bayar ?>"
                                                                alt="<?= $smp->nama_lengkap ?>"
                                                                style="max-width: 300px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <?php } else { ?>
                                                <tbody>
                                                    <h5><b>PEMBAYARAN TAHAP 4</b></h5>
                                                    <tr>
                                                        <td><b>Belum Melakukan Upload Bukti Pembayaran</b></td>
                                                    </tr>
                                                </tbody>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>